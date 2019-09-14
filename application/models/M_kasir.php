<?php if(!defined("BASEPATH"))exit("No direct Access Page Allowed");

class M_Kasir extends CI_Model
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

	function insert_reservation_detail($data)
	{
		$this->db->insert('detail_reservation', $data);
	}

	function udapte_reservation($data,$id)
	{
		$this->db->where('id_reservation',$id);
		$this->db->update('reservation', $data);
		

	}


	function delete_detail_reserv($id)
	{
		$this->db->where('id_reservation',$id);
		$this->db->delete('detail_reservation');

	}

}