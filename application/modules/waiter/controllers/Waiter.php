<?php if( !defined("BASEPATH"))exit("No Direct Access Page Allowed");


class Waiter extends MX_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->module(array('base'));
		$this->load->model(array('M_admin','M_menu','M_reservation'));
		$this->authentication->is_login('waiter');
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
			'title'  => 'Dashboard Waiter',
			'menu'   => $this->M_menu->get_menu_ready(),
			'part' => array(
				'header' 	=> $this->base->header('waiter'),
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
			'title'          => 'Profile waiter',
			'part' => array(
				'header' 	=> $this->base->header('waiter'),
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
			'title'  => 'Reset Password waiter',
			'part' => array(
				'header' 	=> $this->base->header('waiter'),
				'footer' 	=> $this->base->footer(),	
			)
		);

		$this->load->view('reset_password', $data);
	}


public function menu()
	{

		$data = array(
			'message_status' => '',
			'title'          => 'List Menu',
			'message' => $this->session->flashdata('msg'),
			'part' => array(
				'header' 	=> $this->base->header('waiter'),
				'footer' 	=> $this->base->footer(),	
			)
		);

		$this->load->view('menu', $data);
	}

public function reservation()
	{

		$data = array(
			'message_status' => '',
			'title'          => 'List reservation',
			'message' => $this->session->flashdata('msg'),
			'part' => array(
				'header' 	=> $this->base->header('waiter'),
				'footer' 	=> $this->base->footer(),	
			)
		);

		$this->load->view('reservation', $data);
	}
	
public function edit_reservation($id)
	{
		$data = array(
			'message_status' => '',
			'title'  => 'edit reservation',
			'detail_res'   => $this->M_reservation->get_detail_reservation($id),
			'reser'   => $this->M_reservation->get_detail_by_id($id),
			'menu'   => $this->M_menu->get_menu_ready(),
			'part' => array(
				'header' 	=> $this->base->header('waiter'),
				'footer' 	=> $this->base->footer(),	
			)
		);

		$this->load->view('edit_reservation', $data);
	}
	

	public function detail_reservation($id)
	{
		$data = array(
			'message_status' => '',
			'title'  => 'detail reservation',
			'detail_res'   => $this->M_reservation->get_detail_reservation($id),
			'reser'   => $this->M_reservation->get_detail_by_id($id),
			'menu'   => $this->M_menu->get_menu_ready(),
			'part' => array(
				'header' 	=> $this->base->header('waiter'),
				'footer' 	=> $this->base->footer(),	
			)
		);

		$this->load->view('detail_reservation', $data);
	}
	




}