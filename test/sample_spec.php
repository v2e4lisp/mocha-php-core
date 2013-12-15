<?php
namespace Preview\DSL\BDD;

require_once 'ok.php';

describe("Array functions", function() {
    describe("array_pop", function () {
        context("nonempty array", function () {
            sleep(1);
            it("should return the last element", function () {
                sleep(1);
                $arr = array(1,2,3,4);
                ok(array_pop($arr) == 4);
            });
        });

        context("empty array", function () {
            it("should return null", function () {
                $arr = array();
                ok(array_pop($arr)); // error
            });
        });
    });

    describe("array_shift");

    describe("array_unshift");

    it("array_push", function () {
        $sample = array(1,2,3);
        array_push($sample, 4);
        ok($sample == array(1,2,2,3,4)); // error
    });
});
