<?php if(!defined("BASEPATH"))exit("No Direct Acess Allowed");

class Logs extends MX_COntroller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("M_base");
	}

    function log_login()
    {
    	$data = $this->session->userdata('data_login');
    	$arr_data = array
    					(
    						"title_logs" => "login user",
    						"desc_logs"  => "user ". $data['level'] ." login system",
    						"url_logs"   => "/admin/backend/login",
    						"id_user"    => $data['id'],
    					);

    	$this->M_base->add_log($arr_data);
    }


    function log_register($type,$usename,$level,$id='')
    {

    	$data = $this->session->userdata('data_login');
    	if($type === "register")
    	{
    	    $arr_data = array
    					(
    						"title_logs" => "register user",
    						"desc_logs"  => "admin ". $data['username'] ." mendaftarkan user ".$level .' dengan username '.$username,
    						"url_logs"   => "/admin/backend/register_user",
    						"id_user"    => $data['id'],
    					);

    	
    	}
    	elseif($type === "delete")
    	{
    		 $arr_data = array
    					(
    						"title_logs" => "deleter user",
    						"desc_logs"  => "admin ". $data['username'] ." menghapus user dengan id".$id,
    						"url_logs"   => "/admin/backend/register_user",
    						"id_user"    => $data['id'],
    					);
    	}
    	elseif($type == "update")
    	{
    		 $arr_data = array
    					(
    						"title_logs" => "update data user",
    						"desc_logs"  => "admin ". $data['username'] ." memperbarui user ".$level .' dengan username '.$username,
    						"url_logs"   => "/admin/backend/register_user",
    						"id_user"    => $data['id'],
    					);
    	}

    	$this->M_base->add_log($arr_data);
    	
    }


    function logs_user($type)
    {
    	$data = $this->session->userdata('data_login');
    	if($type == 'reset_password')
    	{
    		$arr_data = array
    					(
    						"title_logs" => "reset password",
    						"desc_logs"  => "user level ". $data['level'].' dengan username '. $data['username'] ." melakukan reset password",
    						"url_logs"   => "/home/backend/reset_password",
    						"id_user"    => $data['id'],
    					);
    	}
    	elseif($type == 'update_profile')
    	{
    		$arr_data = array
    					(
    						"title_logs" => "update data profile",
    						"desc_logs"  => "user level ". $data['level'].' dengan username '. $data['username'] ." melakukan memperbarui profile",
    						"url_logs"   => "/admin/backend/update_data_menu",
    						"id_user"    => $data['id'],
    					);
    	}

    	$this->M_base->add_log($arr_data);
    }
    
    function see_log()
    {
    	echo "aim logs";
    }


    function logs_menu_admin($type, $menu ='')
    {


    	$data = $this->session->userdata('data_login');
    	if($type == 'insert')
    	{
    		$arr_data = array
    					(
    						"title_logs" => "insert data menu",
    						"desc_logs"  => "admin ". $data['username'] ." memasukan data menu ". $menu,
    						"url_logs"   => "/admin/backend/insert_data_menu",
    						"id_user"    => $data['id'],
    					);
    	}
    	elseif($type == 'update')
    	{
    		$arr_data = array
    					(
    						"title_logs" => "update data menu",
    						"desc_logs"  => "admin ". $data['username'] ." meperbarui data menu ". $menu,
    						"url_logs"   => "/admin/backend/update_data_menu",
    						"id_user"    => $data['id'],
    					);
    	}elseif ($type == 'delete') 
    	{
    		$arr_data = array
    					(
    						"title_logs" => "delete data menu",
    						"desc_logs"  => "admin ". $data['username'] ." menghapus ". $menu,
    						"url_logs"   => "/admin/backend/ajax_delete_menu",
    						"id_user"    => $data['id'],
    					);	
    	}

    	$this->M_base->add_log($arr_data);

    }


    function logs_reservation($type, $nomor ='')
    {

    
    	$data = $this->session->userdata('data_login');
    	if($type == 'insert')
    	{
    		$arr_data = array
    					(
    						"title_logs" => "insert data reservation",
    						"desc_logs"  => "user ".$data['level'].' '. $data['username'] ." memasukan data reservation dengan nomor". $nomor,
    						"url_logs"   => "/waiter/backend/insert_reservation",
    						"id_user"    => $data['id'],
    					);
    	}
    	elseif($type == 'update')
    	{
    		$arr_data = array
    					(
    						"title_logs" => "update data reservation",
    						"desc_logs"  => "admin ". $data['username'] ." meperbarui data pemesanan dengan id". $nomor,
    						"url_logs"   => "/admin/backend/update_data_menu",
    						"id_user"    => $data['id'],
    					);
    	}elseif ($type == 'cancel') 
    	{
    		$arr_data = array
    					(
    						"title_logs" => "cancel data reservation",
    						"desc_logs"  => "user ". $data['username'] ." membatalkan pesanan dengan id pesanan ". $nomor,
    						"url_logs"   => "/backend/ajax_canceled_reservation",
    						"id_user"    => $data['id'],
    					);	
    	}elseif($type == 'payment') 
        {
            $arr_data = array
                        (
                            "title_logs" => "paymen data",
                            "desc_logs"  => "kasir ". $data['username'] ." melakukan proses pembayaran pesanan dengan id pemesanan ".$nomor,
                            "url_logs"   => "/kasir/backend/ajax_payment",
                            "id_user"    => $data['id'],
                        );  
        }

    	$this->M_base->add_log($arr_data);

    }
}