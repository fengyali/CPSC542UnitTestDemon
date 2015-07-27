<?php
/**
 * This is a demonstrating code testing a lib file of Drupal "DRUPAL_PATH/includes/common.inc" with PHPUnitTest!
 * Author: Fengya Li; Email: fengya@csu.fullerton.edu
 * Created at 07-24-2015
**/

include 'phpunit.phar';

//Set the Drupal path to be tested.
$PROGRAMME_PATH = "/Users/fengyali/Documents/classes/CPSC 542/project/drupal code/drupal/";
$FILE_TO_TEST = $PROGRAMME_PATH . "includes/common.inc";

require_once($FILE_TO_TEST);

class DrupalCommonTest extends PHPUnit_Framework_Testcase {

	//Test cases about common.php: drupal_parse_url()

	public function drupal_parse_url_testcase0(){
		echo "Running test case 0...\n";

		// Configuration for this test case.
		$input_url = "https://moodle-2015-2016.fullerton.edu/course/view.php?id=30901";
		$output_path = "https://moodle-2015-2016.fullerton.edu/course/view.php";
		$output_query = array("id"=>"30901");
		$output_fragment = "";

		$received = drupal_parse_url($input_url);
		
		//assertions
		$this->assertEquals($received["path"] ,$output_path);
		$this->assertEquals($received["query"] ,$output_query);
		$this->assertEquals($received["fragment"] ,$output_fragment);
	}

	public function drupal_parse_url_testcase1(){
		echo "Running test case 1...\n";

		// Configuration for this test case.
		$input_url = "http://www.baidu.com/baidu?cl=3&tn=sitehao123_03&fr=top1000&noise=&ref=91helper#head3";
		$output_path = "http://www.baidu.com/baidu";
		$output_query = array("cl"=>"3","tn"=>"sitehao123_03","fr"=>"top1000","ref"=>"91helper","noise"=>"");
		$output_fragment = "head3";

		$received = drupal_parse_url($input_url);
		var_dump($received);
		
		//Assertions
		$this->assertEquals($received["path"] ,$output_path);
		$this->assertEquals($received["query"] ,$output_query);
		$this->assertEquals($received["fragment"] ,$output_fragment);
	}

	public function drupal_parse_url_testcase2(){
		echo "Running test case 2...\n";

		// Configuration for this test case.
		$input_url = "www.@.com";
		$output_path = "";
		$output_query = array();
		$output_fragment = "";

		$received = drupal_parse_url($input_url);

		//Assertions
		$this->assertEquals($received["path"] ,$output_path);
		$this->assertEquals($received["query"] ,$output_query);
		$this->assertEquals($received["fragment"] ,$output_fragment);		
	}

	//Test cases about common.php: drupal_parse_url()
}

$test = new DrupalCommonTest();

//Test cases about common.php: drupal_parse_url()
$test->drupal_parse_url_testcase0();
$test->drupal_parse_url_testcase1();
$test->drupal_parse_url_testcase2();
echo "All Test Cases Passed!\n";


// Assertion method:
// assertEmpty
// assertEquals
// assertNotEmpty
// assertTrue
// And so on...

?>
