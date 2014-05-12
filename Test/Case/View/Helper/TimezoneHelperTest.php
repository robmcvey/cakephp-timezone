<?php
// 
//  TimezoneHelperTest.php
//  cakephp-timezone
//  
//  Created by Rob Mcvey on 2013-09-30.
//  Copyright 2013 Rob McVey. All rights reserved.
// 
App::uses('Controller', 'Controller');
App::uses('CakeRequest', 'Network');
App::uses('View', 'View');
App::uses('TimezoneHelper', 'Timezone.View/Helper');

/**
 * UsersTestController class
 */
class UsersTestController extends Controller {

}

/**
 * TimezoneHelper Test Case
 */
class TimezoneHelperTest extends CakeTestCase {

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Controller = new UsersTestController();
		$View = new View($this->Controller);
		$this->Timezone = new TimezoneHelper($View);
		$this->Timezone->request = new CakeRequest('users/edit', false);
		$this->Timezone->request->params['controller'] = 'users';
		$this->Timezone->request->params['action'] = 'edit';
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Timezone);
		parent::tearDown();
	}
	
/**
 * test_select
 *
 * @return void
 * @author Rob Mcvey
 **/
	public function test_select() {
		$select = $this->Timezone->select('timezone');
		$regexes = array(
			"/(<select\sid\=\"UserTimezone\"\sname\=\"data\[User\]\[timezone\]\">\n)/",
			"/(<optgroup\slabel\=\"\w+\">\n)/",
			"/(\t<option\svalue\=\"\w+\/\w+\">GMT\s)/",
			"/(\t<option\svalue\=\"\w+\/\w+\">GMT\s\+|\-)(\d{1,2}\:\d{1,2}\s\(\d{1,2}\:\d{1,2})(am|pm)(\)<\/option>\n)/",
			"/(<\/optgroup>\n)/",
			"/<\/select>/"
		);
		foreach ($regexes as $reg) {
			$this->assertRegExp($reg , $select);
		}
	}
	
/**
 * test_select_no_params
 *
 * @return void
 * @author Rob Mcvey
 **/
	public function test_select_no_params() {
		$select = $this->Timezone->select();
		$regexes = array(
			"/(<select\sid\=\"UserTimezone\"\sname\=\"data\[User\]\[timezone\]\">\n)/",
			"/(<optgroup\slabel\=\"\w+\">\n)/",
			"/(\t<option\svalue\=\"\w+\/\w+\">GMT\s)/",
			"/(\t<option\svalue\=\"\w+\/\w+\">GMT\s\+|\-)(\d{1,2}\:\d{1,2}\s\(\d{1,2}\:\d{1,2})(am|pm)(\)<\/option>\n)/",
			"/(<\/optgroup>\n)/",
			"/<\/select>/"
		);
		foreach ($regexes as $reg) {
			$this->assertRegExp($reg , $select);
		}
	}	
	
/**
 * test_select_passed_model
 *
 * @return void
 * @author Rob Mcvey
 **/
	public function test_select_passed_model() {
		$select = $this->Timezone->select('User.timezone');
		$regexes = array(
			"/(<select\sid\=\"UserTimezone\"\sname\=\"data\[User\]\[timezone\]\">\n)/",
			"/(<optgroup\slabel\=\"\w+\">\n)/",
			"/(\t<option\svalue\=\"\w+\/\w+\">GMT\s)/",
			"/(\t<option\svalue\=\"\w+\/\w+\">GMT\s\+|\-)(\d{1,2}\:\d{1,2}\s\(\d{1,2}\:\d{1,2})(am|pm)(\)<\/option>\n)/",
			"/(<\/optgroup>\n)/",
			"/<\/select>/"
		);
		foreach ($regexes as $reg) {
			$this->assertRegExp($reg , $select);
		}
	}	
	
/**
 * test_select_passed_model_not_user
 *
 * @return void
 * @author Rob Mcvey
 **/
	public function test_select_passed_model_not_user() {
		$select = $this->Timezone->select('Post.timezone');
		$regexes = array(
			"/(<select\sid\=\"PostTimezone\"\sname\=\"data\[Post\]\[timezone\]\">\n)/",
			"/(<optgroup\slabel\=\"\w+\">\n)/",
			"/(\t<option\svalue\=\"\w+\/\w+\">GMT\s)/",
			"/(\t<option\svalue\=\"\w+\/\w+\">GMT\s\+|\-)(\d{1,2}\:\d{1,2}\s\(\d{1,2}\:\d{1,2})(am|pm)(\)<\/option>\n)/",
			"/(<\/optgroup>\n)/",
			"/<\/select>/"
		);
		foreach ($regexes as $reg) {
			$this->assertRegExp($reg , $select);
		}
	}	
	
/**
 * test_select_passed_model_not_user_field_not_timezone
 *
 * @return void
 * @author Rob Mcvey
 **/
	public function test_select_passed_model_not_user_field_not_timezone() {
		$select = $this->Timezone->select('Post.clock');
		$regexes = array(
			"/(<select\sid\=\"PostClock\"\sname\=\"data\[Post\]\[clock\]\">\n)/",
			"/(<optgroup\slabel\=\"\w+\">\n)/",
			"/(\t<option\svalue\=\"\w+\/\w+\">GMT\s)/",
			"/(\t<option\svalue\=\"\w+\/\w+\">GMT\s\+|\-)(\d{1,2}\:\d{1,2}\s\(\d{1,2}\:\d{1,2})(am|pm)(\)<\/option>\n)/",
			"/(<\/optgroup>\n)/",
			"/<\/select>/"
		);
		foreach ($regexes as $reg) {
			$this->assertRegExp($reg , $select);
		}
	}	
	
/**
 * test options contain every Country
 *
 * @return void
 * @author Rob Mcvey
 **/
	public function test_options() {
		$options = $this->Timezone->options();
		$countries = $this->Timezone->getCountries();
		foreach ($countries as $code => $country) {
			if (!array_key_exists($country , $options)) {
				return $this->fail("Failed to assert $country is in \$options");
			}
		}
		return true;
	}	
	
/**
 * test_format_and_utc_difference
 *
 * @return void
 * @author Rob Mcvey
 **/
	public function test_format_and_utc_difference() {
		$options = $this->Timezone->options();
		// Matches the format 'GMT -7:00 (6:56am)'
		$regex = "/(GMT\s)[\-|\+]\d{1,2}\:\d{1,2}\s\(\d{1,2}\:\d{1,2}(am|pm)\)/";
		foreach ($options as $country => $timezones) {
			$this->assertFalse(empty($timezones));
			foreach ($timezones as $timezone) {
				$this->assertRegExp($regex, $timezone);
			}
		}
	}

/**
 * Test that the value attribute adds selected="selected" in the Europe/London option
 * 
 * @author Chris Green
 */
	public function test_value_attribute() {
		$select = $this->Timezone->select('timezone', null, array('value' => 'Europe/London'));
		$regexes = array(
			"/(<select\sid\=\"UserTimezone\"\sname\=\"data\[User\]\[timezone\]\">\n)/",
			"/(<optgroup\slabel\=\"\w+\">\n)/",
			"/(\t<option\svalue\=\"\w+\/\w+\">GMT\s)/",
			"/(\t<option\sselected\=\"selected\"\svalue\=\"Europe\/London\">)/",
			"/(\t<option\svalue\=\"\w+\/\w+\">GMT\s\+|\-)(\d{1,2}\:\d{1,2}\s\(\d{1,2}\:\d{1,2})(am|pm)(\)<\/option>\n)/",
			"/(<\/optgroup>\n)/",
			"/<\/select>/"
		);
		foreach ($regexes as $reg) {
			$this->assertRegExp($reg, $select);
		}
	}
	
/**
 * Test that a class is correctly added to the select
 *
 * @author Chris Green
 */
	public function test_class_attribute() {
		$select = $this->Timezone->select('timezone', null, array('class' => 'a_class'));
		$regexes = array(
			"/(<select\sid\=\"\w+\"\sclass=\"\w+\"\sname\=\"\w+\[\w+\]\[timezone\]\">\n)/",
			"/(<optgroup\slabel\=\"\w+\">\n)/",
			"/(\t<option\svalue\=\"\w+\/\w+\">GMT\s)/",
			"/(\t<option\svalue\=\"\w+\/\w+\">GMT\s\+|\-)(\d{1,2}\:\d{1,2}\s\(\d{1,2}\:\d{1,2})(am|pm)(\)<\/option>\n)/",
			"/(<\/optgroup>\n)/",
			"/<\/select>/"
		);
		foreach ($regexes as $reg) {
			$this->assertRegExp($reg, $select);
		}
	}
	
}
