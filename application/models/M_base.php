<?php if(!defined("BASEPATH"))exit("No direct Access Page Allowed");

class M_base extends CI_Model
{
	function add_log($arr_data)
	{
		$this->db->insert('logs', $arr_data);
	}


	function get_reservation($type,$id='')
	{
		if($type == 'col')
		{
			$this->db->where('id_user',$id);
			return $this->db->get('reservation')->result();
		}
		else
		{
			return $this->db->get('reservation')->result();
		}
	}
}