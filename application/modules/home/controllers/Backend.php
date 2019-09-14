<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Backend extends MX_Controller {

	 function __construct()
	 {
	 	parent::__construct();
	 	$this->load->module('base');
    $this->load->module('base/logs');
	 	$this->load->model(array('M_home'));
	 }


	  public function login()
	  {
	  		$datum  = $this->input->post('datum');
	  		$result = $this->M_home->get_user($datum);

	  		if(count($result) > 0)
	  		{

            if($result[0]['status_user'] == 'true')
            {
                $data = array
                (
                  "username"   => $datum['username'],
                  "is_login"   => true,
                  "level"      => $result[0]['level'],
                  "id"         => $result[0]['id_user']
                );
            
              $this->session->set_userdata('data_login',$data);

              // logs login
              $this->logs->log_login();

              $resp = array
                    (
                       "status"   => 'true',
                       "code"     => 'danger',
                       "level"    => $result[0]['level'],
                       "message"  => 'success login',
                    );
            }
            else
            {
                 $resp = array
                    (
                       "status"   => 'false',
                       "code"     => 'danger',
                       "message"  => 'login gagal, user akun tidak aktif',
                    );
            }
        
	  		}
        else
        {

           $resp = array
                  (
                     "status"   => 'false',
                     "code"     => 'danger',
                     "message"  => 'login gagal, password/username yang dimasukkan salah',
                  );
	  		}

        echo json_encode($resp);
	  }


       function update_password()
      {
        $data               = $this->input->post('datum');
        $data['username']   = $this->session->userdata('data_login')['username'];
       
        if($data['new_password'] == $data['re_new_assword']){
           $result = $this->M_home->update_password($data);
        if($result == "success")
        {
           $this->session->set_flashdata('msg',"proses update password berhasil");
           $this->logs->logs_user('reset_password');
           redirect($this->session->userdata('data_login')['level'].'/reset_password');
        }
        else
        {
         //  echo $result; die();
            $this->session->set_flashdata('msg',"proses update password gagal cobalah beberapa saat lagi, pastikan password lama dimasukkan dengan benar");
           redirect($this->session->userdata('data_login')['level'].'/reset_password');
        }
        }
        else
        {
         $this->session->set_flashdata('msg',"proses update password gagal pastikan password lama dimasukkan dengan benar");
           redirect($this->session->userdata('data_login')['level'].'/reset_password');
        }
   }



	  

   function see_session()
   {
   	  //echo '<pre>'.print_r($this->session->userdata('data_login'), true) .'</pre>';

   	  echo '<pre>'.print_r($this->authentication->see_data(), true) .'</pre>';

   }


   function logout()
   {
   		$this->authentication->remove_info_session('home');
   }


    function see_log()
    {
        $this->logs->see_log();
    }
}