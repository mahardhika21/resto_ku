<?php if( !defined("BASEPATH"))exit("No Direct Access Page Allowed");


class Backend extends MX_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->module(array('base'));
		$this->load->model(array('M_admin'));
		$this->load->library(array("YandexLib"));
		$this->authentication->is_login('admin');
	}


    /***
	 * fungsi yang digunakan untuk memperbarui profile user admin
	 * */
	
	function update_profile()
	{
		$data = $this->input->post('datum');
		$email = $this->input->post('email');
		$username = $data['username'];
		// echo '<pre>'.print_r($data, true) .'</pre>';
		if($email['email'] == $email['email_real'])
		{
			$this->M_admin->update_profile($username,$data);
			redirect('admin/profile');
		}else{
			$val = array("email"=>$email['email']);
			if($this->M_admin->update_profile($username,$data) == true AND $this->M_admin->update_user($nim,$val) ==  true)
			{
				$sesi = $this->session->userdata('data_login');
				$sesi['email'] = $email['email'];
				$this->session->set_userdata('data_login',$sesi);
				redirect('admin/profile');
			}
		}
	}

 /***
	 * fungsi yang digunakan untuk memasukkan data mahasiswa oleh admin
	 * */
	function insert_data_mahasiswa()
	{
		$datum = $this->input->post('datum');
		$email = $this->input->post('email');
		$datum['status'] = '1';
		$val = array
				(
					"username" => $datum['nim'],
					"email"    => $email,
					"password" => sha1($datum['nim']),
					"level"    => 'mahasiswa'
				);

	  $whereUser['username'] = $datum['nim'];
	  $whereMhs['nim']       = $datum['nim'];

	  if(count($this->M_admin->cek_user('mahasiswa', $whereMhs)))
	  {
	  	  $msg= array('status'=>'danger', 'code'=>'error','msg'=> "Data Mahasiswa dengan nim ". $datum['nim']." sudah terdaftar");
	  	  $this->session->set_flashdata('msg', $msg);
	  	  redirect('admin/mahasiswa');
	  }

	  if(count($this->M_admin->cek_user('mahasiswa', $whereMhs)))
	  {
	  	  $msg= array('status'=>'danger', 'code'=>'error','msg'=> "Data User dengan Username ". $datum['nim']." sudah terdaftar");
	  	  $this->session->set_flashdata('msg', $msg);
	  	  redirect('admin/mahasiswa');
	  }

	 if($this->M_admin->add_mahasiswa($datum) == true AND $this->M_admin->add_user($val) == true)
	 {
	 	$msg= array('status'=>'success', 'code'=>'success','msg'=> "Data Mahasiswa dengan nim ". $datum['nim']." sudah berhasil terdaftar");
	 	$this->session->set_flashdata('msg',$msg);
	 	redirect('admin/mahasiswa');
	 }else{
	 	$msg= array('status'=>'danger', 'code'=>'error','msg'=> "Data Mahasiswa dengan nim ". $datum['nim']." gagal terdaftar");
	 	$this->session->set_flashdata('msg',$msg);
	 	redirect('admin/mahasiswa');
	 }

	}

	 /***
	 * fungsi yang digunakan untuk menghapus  user oleh admin
	 * */
	function delete_user($id)
	{
		
		if($this->session->userdata('data_login')['access'] == 'root' and $this->session->userdata('data_login')['username'] != $id)
		{
			
			$this->M_admin->delete_user($id);
		redirect('admin/user');
		}else{
			echo "anda tidak mempunyai access untuk menghapus user ". $id;
		}
	}

 /***
	 * fungsi yang digunakan untuk menambah  user admin/bak oleh admin level root
	 * */
	function add_user(){
		$datum = $this->input->post('datum');
// echo '<pre>'.print_r($datum, true) .'</pre>';

// echo '<pre>'.print_r($this->session->userdata('data_login'), true) .'</pre>';
// 		die();
		$whereUser =array('username' => $datum['username']);
		  if(count($this->M_admin->cek_user('user', $whereUser)))
	  {
	  	  $msg= array('status'=>'danger', 'code'=>'error','msg'=> "Data User dengan Username ". $datum['username']." sudah terdaftar");
	  	  $this->session->set_flashdata('msg', $msg);
	  	  redirect('admin/user');
	  }
		
		if($this->session->userdata('data_login')['access'] == 'root')
		{
			 $msg= array('status'=>'success', 'code'=>'success','msg'=> "Data User ".$datum['level'] ." dengan Username ". $datum['username']." berhasil terdaftar");
	  	  $this->session->set_flashdata('msg', $msg);
	  	  
			$user = array
				(
					"username"   => $datum['username'],
					"password"   => sha1($datum['username']),
					"email"      => $datum['email'],
					"level"      => $datum['level'],
					"prev"       => $datum['level']
				);

			$this->M_admin->add_user($user);
			redirect('admin/user');
		}else{
			$msg= array('status'=>'success', 'code'=>'success','msg'=> "Data User ".$datum['level'] ." dengan Username ". $datum['username']." berhasil terdaftar");
	  	  $this->session->set_flashdata('msg', $msg);
	  	  redirect('admin/user');
			
		}


	}


	 /***
	 * fungsi yang digunakan memasukan revisi skpi mahasiswa oleh admin
	 * */
	function revisi_skpi()
	{
		$data =$this->input->post('data');
		$nim = $this->input->post('nim');

		$this->M_admin->revisi_skpi($data,$nim);
		redirect('admin/skpi');
	}

	 /***
	 * fungsi yang digunakan untuk mengirim email konfirmasi edit profil
	 * */


	 function send_email_confirmation($nim,$status)
    {
        $email = $this->input->post('email');
        $result = $this->M_home->cek_mail($email);

         $data = array
                  (
                    "body"  => "", 
                  );
          $body = $this->load->view('email_view',$data, true);
          
          $cnf = array
                  (
                    "email_to"  => $result[0]['email'],
                    "subject"   => $status + "  SKPI",
                    "message"   => $body,
                    "title"     => $status + "  SKPI",
                  );
            $send = $this->base->send_mail($cnf);
    }

    public function delete_mahasiswa($nim)
	{
		$this->M_admin->delete_mahasiswa($nim);
		$this->M_admin->delete_user($nim);

		redirect('admin/mahasiswa');
	}


}