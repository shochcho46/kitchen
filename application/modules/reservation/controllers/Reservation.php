<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservation extends MX_Controller {
    
    public function __construct()
    {
        parent::__construct();
		$this->db->query('SET SESSION sql_mode = ""');
		$this->load->model(array(
			'reservation_model',
			'logs_model'
		));	
    }
 
    public function index($id = null)
    {
        
		$this->permission->method('reservation','read')->redirect();
        $data['title']    = display('reservation'); 
        #-------------------------------#       
        #
        #pagination starts
        #
        $config["base_url"] = base_url('reservation/reservation/index');
        $config["total_rows"]  = $this->reservation_model->count_reservation();
        $config["per_page"]    = 25;
        $config["uri_segment"] = 4;
        $config["last_link"] = "Last"; 
        $config["first_link"] = "First"; 
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';  
        $config['full_tag_open'] = "<ul class='pagination col-xs pull-right'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data["reserve"] = $this->reservation_model->read_reservation($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
		$data['pagenum']=$page;
		if(!empty($id)) {
		$data['title'] = display('update');
		$data['intinfo']   = $this->reservation_model->findById($id);
	   }
	   $data['tablelist']     = $this->reservation_model->table_dropdown();
	   $data['customerlist']   = $this->reservation_model->customer_dropdown();
        #
        #pagination ends
        #   
        $data['module'] = "reservation";
        $data['page']   = "reservationlist";   
        echo Modules::run('template/layout', $data); 
    }
	
	public function tablebooking(){
		$data['title'] = display('take_reservation');
		$data["tableinfo"] = $this->reservation_model->read_gettable();
	   $data['module'] = "reservation";
	   $data['page']   = "bookingatable";   
	   echo Modules::run('template/layout', $data);
		}
	public function reservationform(){
		$this->permission->method('reservation','update')->redirect();
		$data['title'] = display('update');
		$id=$this->input->post('id');
		$startdate= $this->input->post('sltime');
		$endate=date( "H:i:s", strtotime($startdate)+(60*30));
		$data['tableno']=$this->input->post('id');
		$data['newdate']=$this->input->post('sdate');
		$data['gettime']=$this->input->post('sltime');
		$data['endtime']=$endate;
		$data['nopeople']=$this->input->post('people');
		$data['formdtable']=$this->reservation_model->checktable($id);
	    $data['customerlist']   = $this->reservation_model->customer_dropdown();
        $data['module'] = "reservation";  
        $data['page']   = "reservationfrm";
		$this->load->view('reservation/reservationfrm', $data);
		}
    public function create($id = null)
    {
	  $data['title'] = display('take_reservation');
	  #-------------------------------#
		$this->form_validation->set_rules('customer_name',"Customer Name",'required');
		$this->form_validation->set_rules('tableid',"Table No"  ,'required');
		$this->form_validation->set_rules('tablicapacity', "No. of Person" ,'required');
		$this->form_validation->set_rules('bookfromtime', display('s_time')  ,'required');
		$this->form_validation->set_rules('bookendtime', display('e_time')  ,'required');
		$this->form_validation->set_rules('bookdate', display('date')  ,'required');
		$this->form_validation->set_rules('status', display('status')  ,'required');
	    $id=$this->input->post('reserveid');
	   	$bookdate = str_replace('/','-',$this->input->post('bookdate'));
		$newdate= date('Y-m-d' , strtotime($bookdate));
		$tableid=$this->input->post('tableid');
		$status=$this->input->post('status');
		$bookstatus="";
		if($status==1){
			$bookstatus=0;
			}
		if($status==2){
			$bookstatus=1;
			}
		
	  $data['intinfo']="";
	  
	  $udata = array('status'       => $bookstatus);
	  if ($this->form_validation->run()) { 
	   if (empty($this->input->post('reserveid'))) {
		$this->permission->method('reservation','create')->redirect();
		
	 $logData = array(
	   'action_page'         => "Reservation List",
	   'action_done'     	 => "Insert Data", 
	   'remarks'             => "New Reservation Created",
	   'user_name'           => $this->session->userdata('fullname'),
	   'entry_date'          => date('Y-m-d H:i:s'),
	 );
	  $customerData = array(
	   'customer_name'       => $this->input->post('customer_name',true),
	   'customer_email'      => $this->input->post('email',true), 
	   'customer_address'    => "t",
	   'customer_phone'      => $this->input->post('mobile',true), 
	   'favorite_delivery_address'      => "t",
	   'is_active'          => 1,
	  );
	  $mobile=$this->input->post('mobile',true);
	  $rerturnid=$this->reservation_model->insertcustomer($customerData,$mobile);
	  $data['units']   = (Object) $postData = array(
	   'reserveid'     		 => $this->input->post('reserveid'),
	   'cid' 	 			 => $rerturnid,
	   'tableid' 	 		 => $this->input->post('tableid',true),
	   'person_capicity' 	 => $this->input->post('tablicapacity',true),
	   'formtime' 	 		 => $this->input->post('bookfromtime',true),
	   'totime' 	 		 => $this->input->post('bookendtime',true),
	   'reserveday' 	 	 => $newdate,
	   'status' 	 	     => $this->input->post('status',true),
	  );
		if ($this->reservation_model->create($postData)) { 
		 $this->logs_model->log_recorded($logData);
		 
		 $this->db->where('tableid',$tableid);
		 $this->db->update('rest_table',$udata);
		 $this->session->set_flashdata('message', display('save_successfully'));
		 redirect('reservation/reservation/index');
		} else {
		 $this->session->set_flashdata('exception',  display('please_try_again'));
		}
		redirect("reservation/reservation/index"); 
	
	   } else {
		$this->permission->method('reservation','update')->redirect();
		
		  $logData = array(
		   'action_page'         => "Reservation List",
		   'action_done'     	 => "Update Data", 
		   'remarks'             => "Reservation Updated",
		   'user_name'           => $this->session->userdata('fullname'),
		   'entry_date'          => date('Y-m-d H:i:s'),
		  );
	  if(!empty($id)) {
		$data['reserveinfo']   = $this->reservation_model->findById($id);
	   }
	  $data['units']   = (Object) $postData = array(
	   'reserveid'     		 => $this->input->post('reserveid'),
	   'cid' 	 			 => $data['reserveinfo']->cid,
	   'tableid' 	 		 => $this->input->post('tableid',true),
	   'person_capicity' 	 => $this->input->post('tablicapacity',true),
	   'formtime' 	 		 => $this->input->post('bookfromtime',true),
	   'totime' 	 		 => $this->input->post('bookendtime',true),
	   'reserveday' 	 	 => $newdate,
	   'status' 	 	     => $this->input->post('status',true),
	  );
	  
	   $userdata = array(
				   'customer_name'        => $this->input->post('customer_name',true),
				   'customer_email'       => $this->input->post('email',true),
				   'customer_phone'       => $this->input->post('mobile',true),
				  );
	  $customerinfo=$this->db->select("*")->from('customer_info')->where('customer_id',$data['reserveinfo']->cid)->get()->row();
	  
	  //print_r($postData);
		if ($this->reservation_model->update($postData)) { 
		  if($this->input->post('status')==2){
		/*PUSH Notification For Customer*/
	    $icon=base_url('assets/img/applogo.png');
	    $icon=base_url('assets/img/applogo.png');
		    $fields3 = array(
    		'to'=>$customerinfo->customer_token,
    		'data'=>array(
    			'title'=>"New Reservation",
    			'body'=>"Dear Sir/Madam ".$customerinfo->customer_name." Table:".$reservationinfo->tablename." is Reserved On ".$newdate." ".$this->input->post('bookfromtime',true),
    			'image'=>$icon,
    			'media_type'=>"image",
    			'message'=>"test",
    			"action"=> "2",
    		),
    		'notification'=>array(
    			'sound'=>"default",
    			'title'=>"New Reservation",
    			'body'=>"Dear Sir/Madam ".$customerinfo->customer_name." Table:".$reservationinfo->tablename." is Reserved On ".$newdate." ".$this->input->post('bookfromtime',true),
    			'image'=>$icon,
    		)
    	);
	$post_data3 = json_encode($fields3);
	$url = "https://fcm.googleapis.com/fcm/send";
	$ch3  = curl_init($url); 
	curl_setopt($ch3, CURLOPT_FAILONERROR, TRUE); 
	curl_setopt($ch3, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($ch3, CURLOPT_SSL_VERIFYPEER, 0); 
	curl_setopt($ch3, CURLOPT_POSTFIELDS, $post_data3);
	curl_setopt($ch3, CURLOPT_HTTPHEADER, array('Authorization: Key=AAAAmN4ekRg:APA91bHDg_gr99QlnGtHD_exg-QuhRc_45Xluti4dmaNGSD0jfuXi3-3M_wv01TihrHlUAWUDI-dlJqr-_wEHeYigIXSjEbsXJfxI4J9x7ugZDOBv07FhAlWIdDvl8zWcKoeeqqPT9Gw',
	    'Content-Type: application/json')
	);
	$result3 = curl_exec($ch3);
	curl_close($ch3);
	  
	  
	  
		  }
	  
		 $this->logs_model->log_recorded($logData);
		 $this->db->where('tableid',$tableid);
		 $this->db->update('rest_table',$udata);
		 $this->db->where('customer_id',$data['reserveinfo']->cid);
		 $this->db->update('customer_info',$userdata);
		 $this->session->set_flashdata('message', display('update_successfully'));
		} else {
		$this->session->set_flashdata('exception',  display('please_try_again'));
		}
		redirect("reservation/reservation/index");  
	   }
	  } else { 
	   if(!empty($id)) {
		$data['title'] = display('update');
		$data['intinfo']   = $this->reservation_model->findById($id);
		$data['customerinfo']   = $this->reservation_model->findByCusId($data['reserveinfo']->cid);
		$data['tableinfo']   = $this->reservation_model->findBytableId($data['reserveinfo']->tableid);
	   }
	   
	   $data['module'] = "reservation";
	   $data['page']   = "reservationlist";   
	   echo Modules::run('template/layout', $data); 
	   }   
 
    }
   public function updateintfrm($id){
		$this->permission->method('reservation','update')->redirect();
		$data['title'] = display('update');
		$data['intinfo']   = $this->reservation_model->findById($id);
		$data['customerinfo']   = $this->reservation_model->findByCusId($data['intinfo']->cid);
		$data['tableinfo']   = $this->reservation_model->findBytableId($data['intinfo']->tableid);
		$updatetData = array('notif' =>1);
		$this->db->where('reserveid',$id);
		$this->db->update('tblreservation',$updatetData);
        $data['module'] = "reservation";  
        $data['page']   = "reservationedit";
		$this->load->view('reservation/reservationedit', $data);   
       //echo Modules::run('units/unitmeasurement/updateunitfrm', $data); 
	   }
 
    public function delete($category = null)
    {
        $this->permission->module('reservation','delete')->redirect();
		$logData = array(
	   'action_page'         => "reservation List",
	   'action_done'     	 => "Delete Data", 
	   'remarks'             => "reservation Deleted",
	   'user_name'           => $this->session->userdata('fullname'),
	   'entry_date'          => date('Y-m-d H:i:s'),
	  );
		if ($this->reservation_model->delete($category)) {
			#Store data to log table.
			 $this->logs_model->log_recorded($logData);
			#set success message
			$this->session->set_flashdata('message',display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));
		}
		redirect('reservation/reservation/index');
    }
	
	public function checkavailablity(){
		$numofpeople=$this->input->post('people');
		$bookdate = str_replace('/','-',$this->input->post('getdate'));
		$newdate = date('Y-m-d' , strtotime($bookdate));
			$gettable=$this->reservation_model->checkavailtable();
			$data['tableinfo']=$this->reservation_model->checkfree($gettable,$numofpeople);
			$data['newdate']= $newdate;
			$data['gettime']=$this->input->post('time');
			$data['nopeople']=$numofpeople;
			$data['module'] = "reservation";  
			$data['page']   = "checkavail";
			$this->load->view('reservation/checkavail', $data);
		}
 public function chart(){
	        $data['category']=$this->reservation_model->getproduct();
			$data['quantity']=$this->reservation_model->getquantity();
		    $data['module'] = "reservation";  
			$data['page']   = "chart";
			echo Modules::run('template/layout', $data); 
		}
public function notification(){
			$notify=$this->db->select("*")->from('tblreservation')->where('notif',0)->get()->num_rows();
			//echo $this->db->last_query();
			$data = array(
				'unseen_reservation'  => $notify
			);
		echo json_encode($data);
		}
}
