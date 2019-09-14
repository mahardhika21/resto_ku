<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_reservation extends CI_Model {

	var $table = 'reservation';
	var $column = array('reservation_number','chair_reserv','amount_resev','status_resev','list_reserv');
	var $order = array('id_reservation' => 'desc');

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		    $this->search = '';

	}

	private function _get_datatables_query()
	{
		
		$this->db->from($this->table);

		$i = 0;
	
		foreach ($this->column as $item) 
		{
			if($_POST['search']['value'])
				($i===0) ? $this->db->like($item, $_POST['search']['value']) : $this->db->or_like($item, $_POST['search']['value']);
			$column[$i] = $item;
			$i++;
		}
		
		if(isset($_POST['order']))
		{
			$this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables()
	{
		


		if($this->cek_where() == "all")
		{

				$this->_get_datatables_query();
				if($_POST['length'] != -1)
				$this->db->limit($_POST['length'], $_POST['start']);
				$query = $this->db->get();
				return $query->result();
		}
		else
		{

			$this->_get_datatables_query();
			if($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
		    $this->db->where('id_user', $this->cek_where());
			$query = $this->db->get();
			return $query->result();
			
			
		}
	}

	function count_filtered()
	{
		if($this->cek_where() == "all")
		{

			$this->_get_datatables_query();
			$query = $this->db->get();
			return $query->num_rows();
		}
		else
		{
			
			$this->_get_datatables_query();
			$this->db->where('id_user', $this->cek_where());
			$query = $this->db->get();
			return $query->num_rows();
		}
		
	}

	public function count_all()
	{
		if($this->cek_where() == "all")
		{

			$this->db->from($this->table);
			return $this->db->count_all_results();
		}
		else
		{
		$this->db->where('id_user', $this->cek_where());	
		$this->db->from($this->table);
		return $this->db->count_all_results();
		}
	}

	function cek_where()
	{
		if($this->session->userdata('data_login')['level'] == 'waiter')
		{
			return $this->session->userdata('data_login')['id'];
		}
		else
		{
			return "all";
		}
	}

	function get_detail($id)
	{
		$this->db->where('reservation_number', $id);
		return $this->db->get('reservation')->result();
	}


	function get_detail_by_id($id)
	{
		$this->db->where('id_reservation', $id);
		return $this->db->get('reservation')->result();
	}


	function pay_reservation($data, $id)
	{
		$this->db->where('id_reservation',$id);
		return $this->db->update('reservation', $data);
	}


	function update($id,$data)
	{	
		$this->db->where('id_reservation', $id);
		return $this->db->update($this->table,$data);
	}


	function get_detail_reservation($id)
	{
		$this->db->where('id_reservation', $id);
		return $this->db->get('detail_reservation')->result();
	}


}
