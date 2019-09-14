<?php

class Authentication {
	
	var $ci;
	var  $session;

	function __construct()
	{
		$this->ci = &get_instance();

		$this->session = $this->ci->session->userdata('data_login');
	}


	public function is_login($acces_page)
	{
		if(!empty($this->session))
		{
			if($this->session['level'] != $acces_page)
			{
				redirect($this->session['level']);
			}
		}else{
			
			if($acces_page != "home")
			{
				redirect('home');
			}
		}
	}


	private function redirect_page($acces_page)
	{
		if($acces_page == "admin")
		{
			redirect('admin');
		}elseif($acces_page == "kasir")
		{
			redirect('kasir');
		}elseif($acces_page == 'waiter')
		{
			redirect('waiter');
		}
	}

	public function remove_info_session($page)
	{
		if (empty($page))
		{
			show_error("Need value where page be redirect.", 500);
		}

		$this->ci->session->sess_destroy();
		
		$message= 'logout_success';

		redirect($page);
	}

	public function see_data()
	{
		return $this->session;
	}
}