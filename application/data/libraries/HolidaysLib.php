<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

class HolidaysLib 
{
	var $c;
	private $startdate;
	private $enddate;

	function __construct()
	{
		$this->ci =& get_instance();
		$this->startdate = $this->ci->config->item('startdate','holidays');
		$this->enddate    = $this->ci->config->item('enddate','holidays');
		$this->holidays();
	}


	public function holidays()
	{

		$nowdate = strtotime(date('Y-m-d'));
		$sdate   = strtotime($this->startdate);
		$edate   = strtotime($this->enddate);

		
		if($nowdate >= $sdate and $nowdate <= $edate)
		{
			if($this->ci->router->fetch_class() != 'attention')
			{
				redirect('attention');
			}
		}
	}
}