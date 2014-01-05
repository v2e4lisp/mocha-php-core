<?php

namespace Preview\Reporter;

class DropDown extends Base {
    private $failed_cases = 0;
    private $passed_cases = 0;
    private $skipped_cases = 0;
    private $traces = array();

    public function after_case($case) {
        $title = $case->full_title();
        if ($case->passed()) {
            echo Util::color("  o ", "green");
            echo $title.Util::br();
            $this->passed_cases += 1;

        } else if ($err = $case->error_or_failed()) {
            $this->failed_cases += 1;
            echo Util::color("  x ".$title.Util::br(), "red");
            $this->traces[] = array(
                $case->full_title(),
                $err->getTraceAsString(),
                $err->getMessage(),
            );

        } else {
            $this->skipped_cases += 1;
            echo Util::color("  - ".$title.Util::br(), "dark_gray");
        }
    }

    public function after_suite($suite) {
        if ($suite->skipped()) {
            $num = count($suite->all_cases());
            $this->skipped_cases += $num;
        }
    }

    public function before_all($results) {
        echo Util::br();
    }

    public function after_all($results) {
        $this->print_summary($this->timespan($results));
        echo Util::br();

        foreach ($this->traces as $i => $t) {
            echo " ".($i + 1).") ";
            echo Util::color($t[0].Util::br(), "red");
            if (!empty($t[2])) {
                echo Util::color($t[2].Util::br(), "red");
            }
            echo $this->trace_message($t[1].Util::br(2));
            echo Util::br();
        }
    }

    protected function print_summary($time) {
        echo Util::br();
        echo Util::color("        passed: ", "green");
        echo $this->passed_cases;
        echo Util::color("  failed: ", "red");
        echo $this->failed_cases;
        echo Util::color("  skipped: ", "yellow");
        echo $this->skipped_cases;
        echo Util::br();
        echo Util::color("        running time: ". $time. " seconds", "dark_gray");
        echo Util::br(2);
    }
}
