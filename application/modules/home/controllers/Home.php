<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MX_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->module('base');
		$this->authentication->is_login('home');
	}


	public function index()
	{
		$this->front();
	}


	public function front($message="")
	{
		$data = array(
			'message_status' => '',
			'title' => 'Beranda | Login',
			'part' => array(
				'header' 	=> $this->base->header(),
				'footer' 	=> $this->base->footer(),
				
			)
		);

		$this->load->view('front', $data);
	}


	/***
	 * Menampilkan halaman about (tentang) website
	 *     Use	  : site_url().'/home/front';
     *     param  : no need
	 * Status : draft
	 * */
	public function about($message="")
	{
		$data = array(
			'message_status' => '',
			'title' => 'Tentang Aplikasi',
			'part' => array(
				'header' 	=> $this->base->header(),
				'footer' 	=> $this->base->footer(),
				
			)
		);

		$this->load->view('about', $data);
	}

	

}
