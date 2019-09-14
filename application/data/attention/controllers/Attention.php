<?php 
if( !defined("BASEPATH"))exit("No Direct Access Page Allowed");

class Attention extends MX_Controller
{
	function __construct()
	{
		parent::__construct();
		
	}

// tambahkan config di custom.php
// $config['holidays'] = array
// 						(
// 							"startdate"  => "2019-06-05",
// 							"enddate"    => "2019-06-06",
// 						);
	function index()
	{
		$this->load->view('index');
	}
}