<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Restauranttable extends MX_Controller {
    
    public function __construct()
    {
        parent::__construct();
		$this->db->query('SET SESSION sql_mode = ""');
		$this->load->model(array(
			'restable_model',
			'logs_model'
		));	
    }
 
    public function index($id = null)
    {
        
		$this->permission->method('setting','read')->redirect();
        $data['title']    = display('table_list'); 
        #-------------------------------#       
        #
        #pagination starts
        #
        $config["base_url"] = base_url('setting/restauranttable/index');
        $config["total_rows"]  = $this->restable_model->countlist();
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
        $data["tablelist"] = $this->restable_model->read($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
		
		if(!empty($id)) {
		$data['title'] = display('table_edit');
		$data['intinfo']   = $this->restable_model->findById($id);
	   }
        #
        #pagination ends
        #   
        $data['module'] = "setting";
        $data['page']   = "tablelist";   
        echo Modules::run('template/layout', $data); 
    }
	
	
    public function create($id = null)
    {
	  $data['title'] = display('add_new_table');
	  #-------------------------------#
		$this->form_validation->set_rules('tablename',display('table_name'),'required|max_length[50]');
		$this->form_validation->set_rules('capacity',display('capacity')  ,'required');
		$this->form_validation->set_rules('picture','Table icon'  ,'required');
		$tableid=$this->input->post('tableid');
		/*$this->load->library('fileupload');
		$img = $this->fileupload->do_upload(
			'./application/modules/reservation/assets/images/','picture'
		
		   );*/
		if(!empty($tableid)) {
		$data['title'] = display('table_edit');
		$data['intinfo']   = $this->restable_model->findById($tableid);
		//print_r($data['intinfo']);
		$tableimg=$data['intinfo']->table_icon;
	   }
		$config['upload_path']          = 'assets/img/icons/resttable/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 100000;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if (!$this->upload->do_upload('picture'))
		{
				$error = array('error' => $this->upload->display_errors());
				$icon='';
		}
		else
		{
		/*if(!empty($tableid)) {
				
				if($data['intinfo']->table_icon){
				  unlink($data['intinfo']->table_icon);
			    }
			}*/				
			    $fdata =$this->upload->data();
				$config1=array(
					'source_image' => $fdata['full_path'],
                    'new_image' => $fdata['file_path'],
					'maintain_ratio' => TRUE,
					'create_thumb' => false,
				    'width' => 360,
				    'height' => 233
				);
				$this->load->library('image_lib', $config1);
				$this->image_lib->resize();
				$icon="assets/img/icons/resttable/".$fdata['file_name'];
		}
		if(empty($icon)){
			$icon=$this->input->post('picture',true);
			}
	   $saveid=$this->session->userdata('id');
	   $data['supplier']   = (Object) $postData = [
		   'tableid'  			 => $this->input->post('tableid'),
		   'tablename' 			 => $this->input->post('tablename',true),
		   'person_capicity' 	 => $this->input->post('capacity',true),
		   'table_icon' 	     => $icon,
		   'status' 	 		 => 0,
		  ]; 
		  
	  $data['intinfo']="";
	  if ($this->form_validation->run()) { 
	   if(empty($this->input->post('tableid'))) {
		
		$this->permission->method('setting','create')->redirect();
		
	 $logData = [
	   'action_page'         => "Table List",
	   'action_done'     	 => "Insert Data", 
	   'remarks'             => "New table Created",
	   'user_name'           => $this->session->userdata('fullname'),
	   'entry_date'          => date('Y-m-d H:i:s'),
	  ];
	  $lastid=$this->restable_model->create($postData);
		if($lastid) { 
		$rowdata=[
		'tableid'         => $lastid,
		];
		 $this->restable_model->addrow($rowdata);
		 $this->logs_model->log_recorded($logData);
		 $this->session->set_flashdata('message', display('save_successfully'));
		 redirect('setting/restauranttable/index');
		} else {
		 $this->session->set_flashdata('exception',  display('please_try_again'));
		}
		redirect("setting/restauranttable/index"); 
	
	   } else {
		$this->permission->method('setting','update')->redirect();
		
	  $logData = [
	   'action_page'         => "Table List",
	   'action_done'     	 => "Update Data", 
	   'remarks'             => "Table Updated",
	   'user_name'           => $this->session->userdata('fullname'),
	   'entry_date'          => date('Y-m-d H:i:s'),
	  ];
	 // print_r($postData);
		if ($this->restable_model->update($postData)) {
		 $checkexist= $this->restable_model->ckeckseting($tableid);
		 if(empty($checkexist)){
			 $rowdata=[
			'tableid'         => $tableid,
			];
		 $this->restable_model->addrow($rowdata);
			 }
		 $this->logs_model->log_recorded($logData);
		 $this->session->set_flashdata('message', display('update_successfully'));
		} else {
		$this->session->set_flashdata('exception',  display('please_try_again'));
		}
		redirect("setting/restauranttable/index");  
	   }
	  } else { 
	   $data['module'] = "setting";
	   $data['page']   = "tablelist";   
	   echo Modules::run('template/layout', $data); 
	   }   
 
    }
   public function updateintfrm($id){
	  
		$this->permission->method('setting','update')->redirect();
		$data['title'] = display('table_edit');
		$data['intinfo']   = $this->restable_model->findById($id);
        $data['module'] = "setting";  
        $data['page']   = "tableedit";
		$this->load->view('setting/tableedit', $data);   
       //echo Modules::run('units/unitmeasurement/updateunitfrm', $data); 
	   }
 
    public function delete($id = null)
    {
        $this->permission->module('setting','delete')->redirect();
		$logData = [
	   'action_page'         => "Table List",
	   'action_done'     	 => "Delete Data", 
	   'remarks'             => "Table Deleted",
	   'user_name'           => $this->session->userdata('fullname'),
	   'entry_date'          => date('Y-m-d H:i:s'),
	  ];
	 $retstable= $this->restable_model->findById($id);
		if ($this->restable_model->delete($id)) {
			#Store data to log table.
			 $this->logs_model->log_recorded($logData);
			#set success message
			$this->session->set_flashdata('message',display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));
		}
		redirect('setting/restauranttable/index');
    }
	public function tablesetting(){
		    $data['title'] = display('setting');
		    $data['tablelist']   = $this->restable_model->tablelist();
			$data['module'] = "setting";  
			$data['page']   = "tablesetting";
			echo Modules::run('template/layout', $data);   
		}
	public function updatesetting(){
		 $ids =$this->input->post('ids');
		 $style =$this->input->post('style');
		 $tableexist=$this->db->select("*")->from('table_setting')->where('tableid',$ids)->get()->row();
				if(empty($tableexist)) { 
				$rowdata=array(
				'tableid'         => $ids,
				'iconpos'		  => $style
				);
				//print_r($rowdata);
				 $this->restable_model->addrow($rowdata);
				}
		$sortingdata=array(
			'iconpos'         => $style,
			'tableid'         => $ids,
			);
			 $this->restable_model->sortingtable($sortingdata);
		return;
		}
	public function uploadfile(){
			// Count total files
			  $countfiles = count($_FILES['file_source']['name']);
			  // Looping all files
			  for($i=0;$i<$countfiles;$i++){
				  // Define new $_FILES array - $_FILES['file']
				  $_FILES['file']['name'] = $_FILES['file_source']['name'][$i];
				  $_FILES['file']['type'] = $_FILES['file_source']['type'][$i];
				  $_FILES['file']['tmp_name'] = $_FILES['file_source']['tmp_name'][$i];
				  $_FILES['file']['error'] = $_FILES['file_source']['error'][$i];
				  $_FILES['file']['size'] = $_FILES['file_source']['size'][$i];
		
				$config['upload_path']          = 'assets/img/icons/resttable/';
				$config['allowed_types']        = 'gif|jpg|png|jpeg';
				$config['max_size']             = 100000;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				  // File upload
				  if($this->upload->do_upload('file')){
					$uploadData = $this->upload->data();
					$config['image_library'] = 'gd2';
                    $config['source_image'] = $uploadData['full_path'];
                    //$config['new_image'] = './image_uploads/';
                    $config['maintain_ratio'] = TRUE;
                    $config['width'] = 360;
                    $config['height'] = 233;
				  }
				   $this->load->library('image_lib',$config);
				   $this->image_lib->initialize($config);
                   $this->image_lib->resize();
		        
			  }
			  
			    $data['module'] = "setting";  
				$data['page']   = "alllayout";
				$this->load->view('setting/alllayout', $data);
			  
			  
			  
		}
	public function showfile(){
			    $data['module'] = "setting";  
				$data['page']   = "alllayout";
				$this->load->view('setting/alllayout', $data);
			  
		}
	
 
}
