<?php if(!defined("BASEPATH"))exit("No direct Access Page Allowed");

class M_admin extends CI_Model
{
	function get_profile($username)
	{
		$this->db->where('username',$username);
		return $this->db->get('user')->result_array();
	}

	function update_profile($username,$data)
	{
		$this->db->where('username',$username);
		return $this->db->update('user',$data);
	}

	function update_user($username, $val)
	{
		$this->db->where('id_user',$username);
		return $this->db->update('user',$val);
	}

	function add_mahasiswa($datum)
	{
		return $this->db->insert('mahasiswa',$datum);
	}

	function add_user($val)
	{
		return $this->db->insert('user',$val);
	}




	function get_user()
	{
		$this->db->where('level !=','mahasiswa');
		return $this->db->get('user')->result_array();
	}

	function delete_user($id)
	{
		$this->db->where('username',$id);
		$this->db->delete('user');
	}

	function add_user2($val,$user,$level)
	{
		$this->db->where('user',$user);
		$this->db->insert($level,$val);
	}


	function cek_user($tb, $val)
	{
		return $this->db->get_where($tb, $val)->result_array();
	}



}