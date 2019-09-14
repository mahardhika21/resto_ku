<?php if( !defined("BASEPATH"))exit("No Direct Access Page Allowed");


class Backend extends MX_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->module(array('base','base/logs'));
		$this->load->model(array('M_admin','M_menu'));
		$this->authentication->is_login('admin');
		header('Access-Control-Allow-Origin: *');
	}


    /***
	 * fungsi yang digunakan untuk memperbarui profile user admin
	 * */
	
	function update_profile()
	{
		$data = $this->input->post('datum');
		$email = $this->input->post('email');
		$username = $data['username'];
        $this->M_admin->update_profile($username,$data);
        $this->logs->logs_user('update_profile');
        redirect('admin/profile');
		
	}



	 /***
	 * fungsi yang digunakan untuk menghapus  user oleh admin
	 * */
	function delete_user($id)
	{
		
		if($this->session->userdata('data_login')['level'] == 'admin')
		{
			
			$this->M_admin->delete_user($id);
            $this->logs->log_register('delete','','',$id);
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

		$whereUser =array('username' => $datum['username']);
		  if(count($this->M_admin->cek_user('user', $whereUser)))
	     {
	  	  $msg= array('status'=>'danger', 'code'=>'error','msg'=> "Data User dengan Username ". $datum['username']." sudah terdaftar");
	  	  $this->session->set_flashdata('msg', $msg);
	  	  redirect('admin/user');
	  }
		
		if($this->session->userdata('data_login')['level'] == 'admin')
		{
			 $msg= array('status'=>'success', 'code'=>'success','msg'=> "Data User ".$datum['level'] ." dengan Username ". $datum['username']." berhasil terdaftar");
	  	  $this->session->set_flashdata('msg', $msg);
	  	  
			$user = array
				(
					"username"   => $datum['username'],
					"password"   => sha1($datum['username']),
					"level"      => $datum['level']
				);
		   $this->logs->log_register($datum['username'],$datum['level'],'register');

			$this->M_admin->add_user($user);
			redirect('admin/user');
		}else{
			$msg= array('status'=>'false', 'code'=>'danger','msg'=> "Data Gagal ditambahkan level harus admin");
	  	  $this->session->set_flashdata('msg', $msg);
	  	  redirect('admin/user');
			
		}


	}


   public function up_status_user($id,$stat)
   {
   	  
       if($this->session->userdata('data_login')['level'] == 'admin')
       {
       		$msg= array('status'=>'success', 'code'=>'success','msg'=> "Data status user berhasil perbarui");
       		$arr_data['status_user'] = $stat;
       		// $this->logs->log_register($id, $stat);
       		$this->M_admin->update_user($id,$arr_data);
       		$this->session->set_flashdata('msg', $msg);
       		redirect('admin/user');	
       }
       else
       {
       		$msg= array('status'=>'false', 'code'=>'danger','msg'=> "Data Gagal ditambahkan level harus admin");
	  	    $this->session->set_flashdata('msg', $msg);
	  	    redirect('admin/user');
       }
   }


    public function ajax_list_menu()
    {
        $list = $this->M_menu->get_datatables();
        $data = array();
        $url =base_url();
        $no = $_POST['start'];
        foreach ($list as $menu) {
            $no++;
            $row = array();
            $row[] = $menu->name_menu;
            $row[] = $menu->desc_menu;
            $row[] = $menu->type_menu;
            $row[] = $menu->price_menu;
            $row[] = ($menu->status_menu == 'true' ? "menu aktif" : "menu tidak aktif");
            $row[] = '<img style="max-height:150px;" src="'. $url. '/'.$menu->img_menu .'";" />';
        
        $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_menu('."'".$menu->id_menu."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
            <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_menu('."'".$menu->id_menu."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->M_menu->count_all(),
                        "recordsFiltered" => $this->M_menu->count_filtered(),
                        "data" => $data,
                );
        //<img class="img" style="max-height:200px;" src="'. base_url().''.$menu->img_menu."/>
        //output to json format
        echo json_encode($output);
    }


    public function insert_data_menu()
    {
    	$stat = $this->input->post('status_img');
    	$datum = $this->input->post('datum');
    	
    	if($stat == 'true')
    	{
    		$config['upload_path']          = './assets/img/menu/';
            $config['allowed_types']        = 'jpg|png|JPG|PNG';
            $config['max_size']             = 1024;
            $config['max_width']            = 1024;
		    $config['max_height']           = 800;
           
    
            $this->load->library('upload', $config);
    
            if ( ! $this->upload->do_upload('imgInp'))
            {
                    $error = array('status'=>'error','code'=>'danger','msg' => $this->upload->display_errors());
                  
                    $this->session->set_flashdata('msg', $error);
                    redirect('admin/menu');
            }
            else
            {
                    $data = $this->upload->data();
                    $arr_data = array
                    				(
                    					"name_menu"  => $datum['name_menu'],
                    					"desc_menu"  => $datum['desc_menu'],
                    					"type_menu"  => $datum['type_menu'],
                    					"price_menu" => $datum['price_menu'],
                    					"img_menu"   => '/assets/img/menu/'.$data['file_name'],
                    					"status_menu" => "true",
                    					"insert_by"  => $this->session->userdata('data_login')['username'],
                    				);
                    
            }
    	}else
    	{
    				$arr_data = array
                    				(
                    					"name_menu"  => $datum['name_menu'],
                    					"desc_menu"  => $datum['desc_menu'],
                    					"type_menu"  => $datum['type_menu'],
                    					"price_menu" => $datum['price_menu'],
                    					"img_menu"   => '',
                    					"status_menu" => "true",
                    					"insert_by"  => $this->session->userdata('data_login')['username'],
                    				);
    	}

    	$this->M_menu->save($arr_data);
    	$this->logs->logs_menu_admin('insert', $arr_data['name_menu']);
    	 $msg = array('status'=>'success','code'=>'success','msg' => "success insert data");

    	 redirect('admin/menu');
    }

     public function update_data_menu()
    {
    	$stat = $this->input->post('status_img2');
    	$datum = $this->input->post('datum');
    	$id    = $this->input->post('id_menu');
    	
    	if($stat == 'true')
    	{
    		$config['upload_path']          = './assets/img/menu/';
            $config['allowed_types']        = 'jpg|png|JPG|PNG';
            $config['max_size']             = 1024;
            $config['max_width']            = 1024;
		    $config['max_height']           = 800;
            
    
            $this->load->library('upload', $config);
             
    
            if ( ! $this->upload->do_upload('imgInp2'))
            {
                    $error = array('status'=>'error','code'=>'danger','msg' => $this->upload->display_errors());
                  
                    $this->session->set_flashdata('msg', $error);
                    redirect('admin/menu');
            }
            else
            {
                    $data = $this->upload->data();
                    $arr_data = array
                    				(
                    					"name_menu"  => $datum['name_menu'],
                    					"desc_menu"  => $datum['desc_menu'],
                    					"type_menu"  => $datum['type_menu'],
                    					"price_menu" => $datum['price_menu'],
                    					"img_menu"   => '/assets/img/menu/'.$data['file_name'],
                    					"status_menu" => $datum['status_menu'],
                    					"updated_at"  => date('Y-m-d H:i:s'),
                    					"updated_by"  => $this->session->userdata('data_login')['username'],
                    				);
                    unlink($datum['img_old']); 
                    
            }
    	}else
    	{
    				$arr_data = array
                    				(
                    					"name_menu"  => $datum['name_menu'],
                    					"desc_menu"  => $datum['desc_menu'],
                    					"type_menu"  => $datum['type_menu'],
                    					"price_menu" => $datum['price_menu'],
                    					"status_menu" => $datum['status_menu'],
                    					"updated_at"  => date('Y-m-d H:i:s'),
                    					"updated_by"  => $this->session->userdata('data_login')['username'],
                    				);
    	}

    	$this->M_menu->update($id,$arr_data);
    	$this->logs->logs_menu_admin('update', $arr_data['name_menu']);
    	 $msg = array('status'=>'success','code'=>'success','msg' => "success update data");

    	 redirect('admin/menu');
    }

    public function ajax_delete_menu($id)
    {

    	$this->M_menu->delete_by_id_menu($id);
    	$this->logs->logs_menu_admin('delete', $id);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_get_menu($id)
    {
    	$data = $this->M_menu->get_by_id_menu_view($id);

    	echo json_encode($data);
    }


}