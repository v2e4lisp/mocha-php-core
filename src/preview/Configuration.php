<?php
/**
 * Configuration for preview
 *
 * @package Preview
 * @author Wenjun Yan
 * @email mylastnameisyan@gmail.com
 */

namespace Preview;

class Configuration {
    /**
     * Exception types which will be catched as a test failure error message.
     *
     * @var array $assertion_errors default is array("\\Exception")
     */
    public $assertion_errors = array("\\Exception");

    /**
     * Reporter object.
     *
     * @var object $reporter
     */
    public $reporter = null;

    /**
     * Use color for terminal report
     *
     * @var bool $color_support default is true.
     */
    public $color_support = true;

    /**
     * Specify the test groups to run.
     * Default is all which means run all the tests.
     *
     * @var array $test_groups default is empty array
     */
    public $test_groups = array();

    /**
     * If this property set to true, the context object will be the $this used
     * in the testcase callback and other before/after hooks.
     * Otherwise context object will be passed as an arguments to them.
     *
     * @var bool $use_implicit_context default is true.
     */
    public $use_implicit_context = true;
}