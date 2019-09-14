<?php if( !defined("BASEPATH"))exit("No Direct Access Page Allowed");


class Backend extends MX_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->module(array('base','base/logs'));
		$this->load->model(array('M_kasir','M_menu','M_reservation'));
		$this->authentication->is_login('kasir');
	}


    /***
	 * fungsi yang digunakan untuk memperbarui profile user admin
	 * */
	
	function update_profile()
	{
		$data = $this->input->post('datum');
		$username = $data['username'];
		 
		if($this->M_kasir->update_profile($username,$data))
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

		redirect('kasir/profile');
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
            $row[] = $list->pay_amount;
            $row[] = $list->change_amount;
            $row[] = '<ol>'.$list->list_reserv.'</ol>';
            $row[] = $this->trans_status_reserv($list->status_resev);
         	  $row[] = $this->generate_op_reserv($list->id_reservation,$list->status_resev);

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
            <a class="btn btn-sm btn-primary" href="javascript:void(0)" title="" onclick="edit('."'".$id
            ."'".')"><i class="glyphicon glyphicon-pencil"></i> edit</a> <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="nonaktif('."'".$id
            ."'".')"><i class="glyphicon glyphicon-trash"></i>batalkan pemesanan</a>';
    	}
    	else
    	{
    		$op = '<a class="btn (btn-sm btn-default") href="javascript:void(0)" title="Edit" onclick="detail('."'".$id."'".')"><i class="glyphicon glyphicon-file"></i> detail</a>';
    	}


    	return $op;
    }


    public function ajax_detail_reservation()
    {
    	$number = $this->input->post('data');

    	$dt    = $this->M_reservation->get_detail($number);

    	if(count($dt)>0)
    	{
    		$resp = array
    					(
    						"success" => 'true',
    						"message" => "success get data reservation",
    						"data"    => $dt,
    					);
    	}
    	else
    	{
    		$resp = array
    					(
    						"success" => 'false',
    						"message" => "error get data reservation",
    						"data"    => NULL,
    					);
    	}


    	echo json_encode($resp);
    }


    public function ajax_pay_reservation()
    {
    	$id = $this->input->post('id');
    	$data = $this->input->post('data');
    	$data['updated_by'] = $this->session->userdata('data_login')['username'];

    	if($this->M_reservation->pay_reservation($data,$id))
    	{
            $this->logs->logs_reservation('payment',$id);
    		echo json_encode(array('success' => 'true','message'=> 'payment success'));
    	}
    	else
    	{
    		echo json_encode(array('success' => 'false','message'=> 'payment error'));
    	}
    }

    public function ajax_canceled_reservation()
    {
    	$id = $this->input->post('id');
    	$arr_data = array("status_resev"=>"canceled");

    	if($this->M_reservation->update($id,$arr_data))
    	{
    		echo json_encode(array('success' => 'true','message'=> 'canceled success'));
    	}
    	else
    	{
    		echo json_encode(array('success' => 'false','message'=> 'canceled reservation error'));
    	}
    }


    public function detail_reservation($id)
    {
       

        $data = $this->M_reservation->get_detail_by_id($id);
        $detail = $this->M_reservation->get_detail_reservation($id);

        if(count($data)>0)
        {
            echo json_encode(array('success' => 'true','data'=>$data,'detail'=>$detail,'message'=> 'success get detail'));
        }
        else
        {
            echo json_encode(array('success' => 'false','message'=> 'canceled reservation error'));
        }
    }


    public function update_reserv()
    {
        $datum = $this->input->post('list_menu');

        echo '<pre>'.print_r($datum, true).'</pre>';
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

        $this->M_kasir->udapte_reservation($arr_data,$id);

        $this->M_kasir->delete_detail_reserv($id);
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
            $this->M_kasir->insert_reservation_detail($detail_reserv);
            //$no++;
        }

        $this->logs->logs_reservation('update',$id);
        echo json_encode(array("success"=>"true","message" => "success update reservation number"));
        // echo '<pre>'.print_r($arr_data, true).'</pre>';          
        // echo '<pre>'.print_r($data, true).'</pre>';
        // echo $nm_reserv;
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

}