<?php if( !defined("BASEPATH"))exit("No Direct Access Page Allowed");


class Backend extends MX_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->module(array('base','base/logs'));
		$this->load->model(array('M_waiter','M_menu','M_reservation'));
		$this->authentication->is_login('waiter');
	}


    /***
	 * fungsi yang digunakan untuk memperbarui profile user admin
	 * */
	
	function update_profile()
	{
		$data = $this->input->post('datum');
		$username = $data['username'];
		 
		if($this->M_waiter->update_profile($username,$data))
		{
			$this->logs->logs_user('update_profile');
			$msg= array('status'=>'success', 'code'=>'success','msg'=> "success update profile");
       	    $this->session->set_flashdata('msg', $msg);
		}
		else
		{
			$msg= array('status'=>'error', 'code'=>'danger','msg'=> "error update profile");
       	    $this->session->set_flashdata('msg', $msg);
		}

		redirect('waiter/profile');
	}


	function insert_reservation()
	{
		$data = $this->input->post('data');
		$nm_reserv = $this->generate_reservation_number();

		$arr_data = array
					(
						"chair_reserv"       => $data['chair_reserv'],
						"reservation_number" => $nm_reserv,
						"amount_resev"       => $this->count_price($data['price']),
						"status_resev"       => 'booked',
						"id_user"            => $this->session->userdata('data_login')['id'],
						"list_reserv"		 => $this->generate_list($data['menu']),
					);

		$id = $this->M_waiter->insert_reservation($arr_data);

		//$no = 0;
		for($i=0; $i<$data['total_menu']; $i++) {
			$detail_reserv = array
								(
									"id_reservation" => $id,
									"name_menu"      => $data['menu'][$i],
									"id_menu"		 => $data['id_menu'][$i],
									"desc_reserv"    => $data['type_menu'][$i],
									"det_price"      => $data['price'][$i],
									"insert_by"      => $this->session->userdata('data_login')['username'],
								);
			$this->M_waiter->insert_reservation_detail($detail_reserv);
			//$no++;
		}
        
        $this->logs->logs_reservation('insert',$nm_reserv);
		echo json_encode(array("success"=>"true","message" => "success insert reservation number"));
		// echo '<pre>'.print_r($arr_data, true).'</pre>';			
		// echo '<pre>'.print_r($data, true).'</pre>';
		// echo $nm_reserv;
	}

	function generate_reservation_number()
	{
		$number = 'ERP'.date('mdY').'-';
		$last = $this->M_waiter->get_reservation_last($number);
		//echo '<pre>'.print_r($last, true).'</pre>';
		
		if(empty($last))
		{
			$number = "001";
		}
		else
		{
			$nm = explode("-", $last->reservation_number);
			if($nm[1]>99 or $nm[1] == 99)
			{
				$number = $nm[1]+1;
			}elseif($nm[1]>9 and $nm[1]<100)
			{
				$dt     = $nm[1]+1;
				$number = "0".$dt;
			}
			else
			{
				$dt     = $nm[1]+1;
				$number = "00".$dt;
			}
		}
 
		$number = 'ERP'.date('mdY').'-'.$number;

		return $number;
	}


	function count_price($price)
	{
		  $rst = 0;
		  foreach ($price as $val) 
		  {
		  	$rst = $rst + $val;
		  }

		  return $rst;
	}


	function generate_list($menu)
	{
		$list2 = "";
		foreach ($menu as $list) {
			$list2 .= "<li>". $list.'</li>';
		}

		return $list2;
	}


	public function ajax_list_menu()
    {
        $list = $this->M_menu->get_datatables();
        $data = array();
        $url =base_url();
        $no = $_POST['start'];
        foreach ($list as $menu) {

        	if($menu->status_menu == 'true')
        	{
        		$no++;
	            $row = array();
	            $row[] = $menu->name_menu;
	            $row[] = $menu->desc_menu;
	            $row[] = $menu->type_menu;
	            $row[] = $menu->price_menu;
	            $row[] = ($menu->status_menu == 'true' ? "menu aktif" : "menu tidak aktif");
	            $row[] = '<img style="max-height:150px;" src="'. $url. '/'.$menu->img_menu .'";" />';

	            $data[] = $row;
        	}
            
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


    public function ajax_list_reservation()
    {
        $reservation = $this->M_reservation->get_datatables();
        $data = array();
        $url =base_url();
        $no = $_POST['start'];
        foreach ($reservation as $list) {
        
            $no++;
            $row = array();
            $row[] = $list->reservation_number;
            $row[] = $list->chair_reserv;
            $row[] = $list->amount_resev;
            $row[] = '<ol>'.$list->list_reserv.'</ol>';
            $row[] = $this->trans_status_reserv($list->status_resev);
         	  $row[] =  $this->generate_op_reserv($list->id_reservation,$list->status_resev);

            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->M_reservation->count_all(),
                        "recordsFiltered" => $this->M_reservation->count_filtered(),
                        "data" => $data,
                );
        //<img class="img" style="max-height:200px;" src="'. base_url().''.$menu->img_menu."/>
        //output to json format
        echo json_encode($output);
    }

     public function ajax_get_menu($id)
    {
    	$data = $this->M_reservation->get_by_id_menu_view($id);

    	echo json_encode($data);
    }


 private function trans_status_reserv($stat)
    {
    	if($stat === "booked")
    	{
    		return "Aktif/booked";
    	}
    	elseif($stat == "complete")
    	{
    		return "Lunas/complete";
    	}
    	else
    	{
    		return "Non-Aktif/cancleled";
    	}
    }

        private function generate_op_reserv($id,$stat)
    {
    	if($stat == "booked")
    	{
    		$op = '<a class="btn (btn-sm btn-default") href="javascript:void(0)" title="Edit" onclick="detail('."'".$id."'".')"><i class="glyphicon glyphicon-file"></i> detail</a>
            <a class="btn btn-sm btn-primary" href="javascript:void(0)" title="" onclick="edit_menu('."'".$id
            ."'".')"><i class="glyphicon glyphicon-pencil"></i> edit</a> <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="nonaktif('."'".$id
            ."'".')"><i class="glyphicon glyphicon-trash"></i>batalkan pemesanan</a>';
    	}
    	else
    	{
    		$op = '<a class="btn (btn-sm btn-default") href="javascript:void(0)" title="Edit" onclick="detail('."'".$id."'".')"><i class="glyphicon glyphicon-file"></i> detail</a>';
    	}


    	return $op;
    }
 

 	 function update_reservation()
    {
        $data = $this->input->post('data');
        $id   = $this->input->post('id');

        $arr_data = array
                    (
                        "chair_reserv"       => $data['chair_reserv'],
                        "amount_resev"       => $this->count_price($data['price']),
                        "list_reserv"        => $this->generate_list($data['menu']),
                    );

        $this->M_waiter->udapte_reservation($arr_data,$id);

        $this->M_waiter->delete_detail_reserv($id);

       
        //$no = 0;
        for($i=0; $i<$data['total_menu']; $i++) {
            $detail_reserv = array
                                (
                                    "id_reservation" => $id,
                                    "name_menu"      => $data['menu'][$i],
                                    "id_menu"        => $data['id_menu'][$i],
                                    "desc_reserv"    => $data['type_menu'][$i],
                                    "det_price"      => $data['price'][$i],
                                    "insert_by"      => $this->session->userdata('data_login')['username'],
                                );
            $this->M_waiter->insert_reservation_detail($detail_reserv);
            //$no++;
        }
       $this->logs->logs_reservation('update',$id);
        echo json_encode(array("success"=>"true","message" => "success update reservation number"));
        // echo '<pre>'.print_r($arr_data, true).'</pre>';          
        // echo '<pre>'.print_r($data, true).'</pre>';
        // echo $nm_reserv;
    }

}