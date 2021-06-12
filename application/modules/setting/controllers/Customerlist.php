<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customerlist extends MX_Controller {
    
    public function __construct()
    {
        parent::__construct();
		$this->db->query('SET SESSION sql_mode = ""');
		$this->load->model(array(
		    'supplier_model',
			'logs_model',
			'ordermanage/order_model'
		));	
    }
 
    public function index($id = null)
    {
        
		$this->permission->method('setting','read')->redirect();
        $data['title']    = display('supplier_list'); 
        #-------------------------------#       
        #
        #pagination starts
        #
        $config["base_url"] = base_url('setting/customerlist/index');
        $config["total_rows"]  = $this->supplier_model->countcustomerlist();
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
        $data["customerlist"] = $this->supplier_model->customerlist($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        #
        #pagination ends
        #   
        $data['module'] = "setting";
        $data['page']   = "customerlist";   
        echo Modules::run('template/layout', $data); 
    }
	public function insert_customer(){
	  $this->form_validation->set_rules('customer_name', 'Customer Name'  ,'required|max_length[100]');
	  $this->form_validation->set_rules('email', display('email')  ,'required');
	  $this->form_validation->set_rules('mobile', display('mobile')  ,'required');
	  $savedid=$this->session->userdata('id');
	   
	  $coa = $this->order_model->headcode();
        if($coa->HeadCode!=NULL){
            $headcode=$coa->HeadCode+1;
        }
        else{
            $headcode="102030101";
        }
	    $lastid=$this->db->select("*")->from('customer_info')
			->order_by('cuntomer_no','desc')
			->get()
			->row();
		$sl=$lastid->cuntomer_no;
		if(empty($sl)){
		$sl = "cus-0001"; 
		}
		else{
		$sl = $sl;  
		}
		$supno=explode('-',$sl);
		$nextno=$supno[1]+1;
		$si_length = strlen((int)$nextno); 
		
		$str = '0000';
		$cutstr = substr($str, $si_length); 
		$sino = $supno[0]."-".$cutstr.$nextno; 
		
	  
	  if ($this->form_validation->run()) { 
		$this->permission->method('setting','create')->redirect();
		$data['customer']   = (Object) $postData = array(
	   'cuntomer_no'     	=> $sino,
	   'customer_name'     	=> $this->input->post('customer_name'),  
	   'customer_email'     =>$this->input->post('email'),
	   'customer_phone'     => $this->input->post('mobile'),
	   'customer_address'   => $this->input->post('address'),
	   'favorite_delivery_address'     =>$this->input->post('favaddress'), 
	   'is_active'        => 1,
	  );
	 $logData =array(
	   'action_page'         => "Add Customer",
	   'action_done'     	 => "Insert Data", 
	   'remarks'             => "Customer is Created",
	   'user_name'           => $this->session->userdata('fullname'),
	   'entry_date'          => date('Y-m-d H:i:s'),
	  );
	   $c_name = $this->input->post('customer_name');
       $c_acc=$sino.'-'.$c_name;
		$createdate=date('Y-m-d H:i:s');
	    $data['aco']  = (Object) $postData1 = array(
             'HeadCode'         => $headcode,
             'HeadName'         => $c_acc,
             'PHeadName'        => 'Customer Receivable',
             'HeadLevel'        => '4',
             'IsActive'         => '1',
             'IsTransaction'    => '1',
             'IsGL'             => '0',
             'HeadType'         => 'A',
             'IsBudget'         => '0',
             'IsDepreciation'   => '0',
             'DepreciationRate' => '0',
             'CreateBy'         => $savedid,
             'CreateDate'       => $createdate,
        );
		$this->order_model->create_coa($postData1);
		if($totalnum>0){
			$this->session->set_flashdata('exception',  display('memberid_exist'));
		}
		else{
		if ($this->order_model->insert_customer($postData)) { 
		 $this->logs_model->log_recorded($logData);
		 $this->session->set_flashdata('message', display('save_successfully'));
		 redirect('setting/customerlist/index');
		} else {
		 $this->session->set_flashdata('exception',  display('please_try_again'));
		}
		}
		redirect("setting/customerlist/index"); 
	  } else {
		  redirect("setting/customerlist/index"); 
		  }   
 
    }
	public function updateintfrm($id){
	  
		$this->permission->method('setting','update')->redirect();
		$data['title'] = display('update_member');
		$data['intinfo']   = $this->supplier_model->findByIdmember($id);
		//print_r($data['intinfo']);
        $data['module'] = "setting";  
        $data['page']   = "customeredit";
		$this->load->view('setting/customeredit', $data);   
       //echo Modules::run('units/unitmeasurement/updateunitfrm', $data); 
	   }
   public function customerupdate(){
	   $this->form_validation->set_rules('customer_name', 'Customer Name'  ,'required|max_length[100]');
	  $this->form_validation->set_rules('mobile', display('mobile')  ,'required');
	  $savedid=$this->session->userdata('id');
	  if ($this->form_validation->run()) { 
	  $this->permission->method('setting','update')->redirect();
	  $sino=$this->input->post('memcode');
	  $c_name = $this->input->post('customer_name');
      $c_acc=$sino.'-'.$c_name;
	  $data['customer']   = (Object) $postData = array(
	   'customer_id'     	=> $this->input->post('custid'),
	   'customer_name'     	=> $this->input->post('customer_name'),  
	   'customer_phone'     => $this->input->post('mobile'),
	   'is_active'     => $this->input->post('status'),
	  );
	  $logData = array(
	   'action_page'         => "Customer List",
	   'action_done'     	 => "Update Data", 
	   'remarks'             => "Customer Updated",
	   'user_name'           => $this->session->userdata('fullname'),
	   'entry_date'          => date('Y-m-d H:i:s'),
	  );
	  $c_accup = $this->input->post('oldname');
	  $getheadid=$this->db->select("HeadCode")->from('acc_coa')
	  		->where('HeadName',$c_accup)
			->get()
			->row();
	  if(!empty($getheadid)){
		  $upheadcode=$getheadid->HeadCode;
		  $acc=array(
		   'HeadName'         => $c_acc,
		   'UpdateBy'         => $saveid,
		   'UpdateDate'       => date('Y-m-d H:i:s')
		  );
		    $this->db->where('HeadCode',$upheadcode);
	        $this->db->update('acc_coa',$acc);

		  }
	  	if ($this->supplier_model->updatemem($postData)) { 
		 $this->logs_model->log_recorded($logData);
		 $this->session->set_flashdata('message', display('update_successfully'));
		} 
		else {$this->session->set_flashdata('exception',  display('please_try_again'));}
		redirect("setting/customerlist/index");
	  }
	  else{
		  $this->session->set_flashdata('exception',  display('please_try_again'));
		  redirect("setting/customerlist/index");
		  }
	   }
 
}
