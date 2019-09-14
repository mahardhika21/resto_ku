<?php
require APPPATH . '/libraries/CreatorJwt.php';

class Api extends CI_Controller
{
    private $data;
    public function __construct()
    {
        
        parent::__construct();
        $this->load->model(array('M_home','M_menu','M_base'));
        $this->objOfJwt = new CreatorJwt();
        header('Content-Type: application/json');
        $this->data = json_decode($this->input->raw_input_stream, TRUE);
        date_default_timezone_set("Asia/Jakarta");
    }


   


    public function LoginToken()
    {
        $username = $this->data['username'];
        $password = sha1($this->data['password']);

        $datum  = array('username' => $username,'password' => $password);
        $result = $this->M_home->get_user($datum);

        if(count($result)>0)
        {
            
             $tokenData['user_id'] = $result[0]['id_user'];
             $tokenData['role'] = $result[0]['level'];
             $tokenData['timeStamp'] = Date('Y-m-d h:i:s');
             $tokenData['experied_time']= $this->generate_experied_token();
             $jwtToken = $this->objOfJwt->GenerateToken($tokenData);
             $data_log = array("title_logs" => "login api","desc_logs" => " user ".$result[0]['level']." login ","url_logs" => "/api/LoginToken","id_user" => $result[0]['id_user']);
             $this->M_base->add_log($data_log);

             $this->M_home->save_token($jwtToken, $result[0]['id_user']);
            echo json_encode(array('success'=>'true','token'=>$jwtToken,'message'=>'login success'));
        }
        else
        {
            echo json_encode(array('success'=>'false','token'=> NULL,'message'=>'login galat,'));
        }

    }


    private function generate_experied_token()
    {
         $time = strtotime(date('Y-m-d H:i:s'));
         $add_time = 3 * 60 * 60;
         $exp      = $time + $add_time;

         return date('Y-m-d H:i:s', $exp);
    }


    public function menu_makanan()
    {
         $token = $this->data['token'];

         $result = $this->is_valid_token($token);

        if($result['success'] == true)
        {
             $data_log = array("title_logs" => "access api detail menu","desc_logs" =>  $result['data']['role']." access detail menu","url_logs" => "/api/detail","id_user"=> $result['data']['user_id']);
             $this->M_base->add_log($data_log);
             $menu = $this->M_menu->get_all_menu();
             echo json_encode(array('success'=>'true','data'=> $menu,'message'=>'success get data'));
        }
        else
        {
            echo json_encode(array('success'=>'false','message'=>$result['message']));   
        }

    }

    public function detail_menu()
    {
        $token = $this->data['token'];
        $id    = $this->data['id'];

        $result = $this->is_valid_token($token);

        if($result['success'] == true)
        {
             $data_log = array("title_logs" => "access api detail menu","desc_logs" =>  $result['data']['role']." access detail menu","url_logs" => "/api/detail","id_user"=> $result['data']['user_id']);
             $this->M_base->add_log($data_log);
             $menu = $this->M_menu->get_by_id_menu_view($id);
             echo json_encode(array('success'=>'true','data'=> $menu,'message'=>'success get detail data'));
        }
        else
        {
            echo json_encode(array('success'=>'false','message'=>$result['message']));   
        }

    }



   private function is_valid_token($token)
   {
       try
       {
            $jwtData = $this->objOfJwt->DecodeToken($token);

            if(strtotime(date($jwtData['experied_time']))>strtotime(date('Y-m-d H:i:s')))
            {
                $resp = array("success" => true, "message" => "token flid","data" => $jwtData);
            }
            else
            {
                $resp = array("success" => false, "message" => "token experied");
            }    
       }
       catch(Exception $e)
       {
            $resp = array("success" => false, "message" => $e->getMessage);
            
       }

       return $resp;
   }
     
   /*************Use for token then fetch the data**************/
         
    public function encode_token()
    {
   // $received_Token = $this->input->request_headers('Authorization');
        $token = $this->data['token'];
        try
        {
            $jwtData = $this->objOfJwt->DecodeToken($token);
            echo '<pre>'.print_r($jwtData, true).'</pre>';
            echo json_encode($jwtData);
        }
        catch (Exception $e)
            {
            http_response_code('401');
            echo json_encode(array( "status" => false, "message" => $e->getMessage()));exit;
        }
    }


     
}
        