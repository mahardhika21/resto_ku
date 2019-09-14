<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Base extends MX_Controller {
	/***
	 * Theme :
	 * - Default {header, footer}
	 * - Minimal {header}
	 * */
	function __construct()
	{
		parent::__construct();
		$this->load->model(array('M_base'));
	
	}




public function header($user_access='')
	{
		

		$data = array();

		if($user_access === "admin")
		{
		
			return $this->load->view("admin/header", $data, true);
		}elseif ($user_access === "kasir") 
		{
			return $this->load->view("kasir/header", $data, true);
		}
		elseif($user_access === "waiter")
		{
			return $this->load->view("waiter/header", $data, true);
		}
		else
		{
            return $this->load->view("header", $data, true);
		}
	}


public function reservation_report()
{
	if($this->session->userdata('data_login')['level'] == "waiter")
	{
		$id = $this->session->userdata('data_login')['id'];

		$data['data'] = $this->M_base->get_reservation('col',$id);
	}
	else
	{
		$data['data'] = $this->M_base->get_reservation('all');
	}

	$dt =  $this->session->userdata('data_login');
	$arr_data = array
    					(
    						"title_logs" => "print laporan",
    						"desc_logs"  => "user ". $dt['username'] ." melakukan print lapoaran",
    						"url_logs"   => "/base/reservation_report",
    						"id_user"    => $dt['id'],
    					);
    $this->M_base->add_log($arr_data);
    $data['title'] = 'Laporan-pemesana-'.date('Y/m/d');
	$this->load->view('exel-data',$data);
}








	public function footer($theme='default')
	{

		
		$data = array();

		return $this->load->view("footer", $data, true);
	}


   function tgl_now()
   {
   		echo date('Y-m-d H:i:s');
   }

   

}
