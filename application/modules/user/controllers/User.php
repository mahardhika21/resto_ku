<?php if( !defined("BASEPATH"))exit("No Direct Access Page Allowed");


class Admin extends MX_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->module(array('base'));
		$this->load->model(array('M_admin'));
		$this->load->helper('skpi');
		$this->authentication->is_login('admin');
	}


	public function index()
	{
		$this->front();
	}


	/***
	 * Menampilkan halaman utama user admin
	 *     Use	  : site_url().'/home/front';
     *     param  : no need
	 * Status : draft
	 * */
	public function front()
	{
		$data = array(
			'message_status' => '',
			'title'  => 'Dashboard Admin',
			'data_extra' => "",
			'part' => array(
				'header' 	=> $this->base->header('admin'),
				'footer' 	=> $this->base->footer(),	
			)
		);

		$this->load->view('index', $data);
	}



		/***
	 * Menampilkan halaman profile user admin
	 *     Use	  : site_url().'/home/front';
     *     param  : no need
	 * Status : draft
	 * */
	public function profile()
	{

		$data = array(
			'message_status' => '',
			"profile"        => $this->M_admin->get_profile($this->session->userdata('data_login')['username']),
			'email'          => $this->session->userdata('data_login')['email'],
			'title'          => 'Profile Admin',
			'part' => array(
				'header' 	=> $this->base->header('admin'),
				'footer' 	=> $this->base->footer(),	
			)
		);

		$this->load->view('profile', $data);
	}


		/***
	 * Menampilkan halaman reset password user admin
	 *     Use	  : site_url().'/home/front';
     *     param  : no need
	 * Status : draft
	 * */

	public function reset_password()
	{

		$data = array(
			'message_status' => '',
			'message' => $this->session->flashdata('msg'),
			'title'  => 'Reset Password Admin',
			'part' => array(
				'header' 	=> $this->base->header('admin'),
				'footer' 	=> $this->base->footer(),	
			)
		);

		$this->load->view('reset_password', $data);
	}


		/***
	 * Menampilkan halaman profile list user
	 *     Use	  : site_url().'/home/front';
     *     param  : no need
	 * Status : draft
	 * */
	public function user()
	{
		
		$data = array(
			'message_status' => '',
			'message' => $this->session->flashdata('msg'),
			'data'    => $this->M_admin->get_user(),
			'uname'   => $this->session->userdata('data_login')['username'],
			'title'  => 'list user',
			'part' => array(
				'header' 	=> $this->base->header('admin'),
				'footer' 	=> $this->base->footer(),	
			)
		);

		$this->load->view('user', $data);
	}


	function see_data()
	{
		echo '<pre>'.print_r($this->session->userdata('data_login'),true) .'</pre>';
	}




}