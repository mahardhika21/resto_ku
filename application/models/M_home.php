<?php if(!defined("BASEPATH"))exit("No direct Access Page Allowed");

class M_home extends CI_Model
{

	function get_user($val)
	{
		return $this->db->get_where('user',$val)->result_array();
	}

	function update_password($data)
	{
		$val = array("username"=>$data['username'],"password"=> sha1($data['old_password']));
		$query = $this->db->get_where('user',$val);
		if(count($query->result_array())>0)
		{
			$val = array
					(
						"password" => sha1($data['new_password']),
					);
			$this->db->where('username',$data['username']);
			$query = $this->db->update('user',$val);
			if($query == true)
			{
				return "success";
			}else{
				return "failed";
			}
		}else{
			return "password cannot match";
		}
	}


	function cek_mail($email)
	{
			$this->db->where('email',$email);
			return $this->db->get('user')->result_array();
	}


	function up_key($key,$email)
	{
			$val = array("key_unix" => $key);
			$this->db->where('email',$email);
			return $this->db->update('user',$val);
	}

	function get_profile($username)
	{
		$this->db->where('username',$username);
		return $this->db->get('admin')->result_array();
	}

	function get_key($type,$key,$password='')
	{
		if($type === 'get')
		{
			$this->db->where('key_unix',$key);
			return $this->db->get('user')->result_array();
		}elseif($type === 'reset')
		{
			$val = array
					(
						"password" => sha1($password),
					);
			$this->db->where('key_unix',$key);
			return $this->db->update('user',$val);
		}
	}


	 function save_token($token,$id)
     {
         $time = strtotime(date('Y-m-d H:i:s'));
         $add_time = 3 * 60 * 60;
         $exp      = $time + $add_time;
         $arr_data = array
                      (
                        "id_user"       => $id,
                        "token"         => $token,
                        "experied_time" => date('Y-m-d H:i:s', $exp),
                        "status_token"  => "true", 
                      );

          $this->db->insert('api_token', $arr_data);
     }


     function cek_token($token)
     {
     	 $this->db->where('token', $token);
     	 return $this->db->get('api_token')->result();
     }

     function update_token($token, $data)
     {
     	 $this->db->where('token',$token);
     	 return $this->db->update('api_token', $token);
     }


     function get_menu()
     {
     	return $this->db->get('menu')->result();
     }


}