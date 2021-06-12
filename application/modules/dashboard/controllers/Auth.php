<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MX_Controller {
 	
 	public function __construct()
 	{
 		parent::__construct();

 		$this->load->model(array(
 			'auth_model' 
 		));
		$this->db->query('SET SESSION sql_mode = ""');
		$this->load->helper('captcha');
 	}
 

	public function index()
	{  
	//echo "Bla Bla";
	//echo $this->session->userdata('captcha');
		if($this->session->userdata('isLogIn'))
			redirect('ordermanage/order/pos_invoice');
		$data['title']    = display('login'); 
		#-------------------------------------#
		//echo $this->input->post('captcha');exit;
		$this->form_validation->set_rules('email', display('email'), 'required|valid_email|max_length[100]|trim');
		$this->form_validation->set_rules('password', display('password'), 'required|max_length[32]|md5|trim');
		$this->form_validation->set_rules('captcha', display('captcha'),  array('matches[captcha]', function($captcha){ 
		        	$oldCaptcha = $this->session->userdata('captcha');
		        	if ($captcha == $oldCaptcha) {
		        		return true;
		        	}
		        }
		    )
		);
		
		#-------------------------------------#
		$data['user'] = (object)$userData = array(
			'email' 	 => $this->input->post('email'),
			'password'   => $this->input->post('password'),
		);
		#-------------------------------------#
		if ( $this->form_validation->run())
		{
			$this->session->unset_userdata('captcha');

			$user = $this->auth_model->checkUser($userData);

			if($user->num_rows() > 0) {
            $chef = $this->db->select('emp_his_id,pos_id')->where('emp_his_id',$user->row()->id)->where('pos_id',1)->get('employee_history')->row();
			$chefid='';
			if(!empty($chef)) {
			$chefid=$chef->emp_his_id;
			}
			
			$checkPermission = $this->auth_model->userPermission2($user->row()->id);
			if($checkPermission!=NULL){
				$permission = array();
				$permission1 = array();
				if(!empty($checkPermission)){
					foreach ($checkPermission as $value) {
						$permission[$value->module] = array( 
							'create' => $value->create,
							'read'   => $value->read,
							'update' => $value->update,
							'delete' => $value->delete
						);

						$permission1[$value->menu_title] = array( 
							'create' => $value->create,
							'read'   => $value->read,
							'update' => $value->update,
							'delete' => $value->delete
						);
						//print_r($checkPermission);exit;
					}
				} 
			}

//print_r($checkPermission);
			//exit;

			if($user->row()->is_admin == 2){
				$row = $this->db->select('client_id,client_email')->where('client_email',$user->row()->email)->get('setup_client_tbl')->row();
			}

				     $sData = array(
					'isLogIn' 	  => true,
					'isAdmin' 	  => (($user->row()->is_admin == 1)?true:false),
					'user_type'   => $user->row()->is_admin,
					'id' 		  => $user->row()->id,
					'client_id'   => @$row->client_id,
					'fullname'	  => $user->row()->fullname,
					'user_level'  => $user->row()->user_level,
					'email' 	  => $user->row()->email,
					'image' 	  => $user->row()->image,
					'last_login'  => $user->row()->last_login,
					'last_logout' => $user->row()->last_logout,
					'ip_address'  => $user->row()->ip_address,
					'permission'  => json_encode(@$permission), 
					'label_permission'  => json_encode(@$permission1) 
					);	
					//store date to session 
					$this->session->set_userdata($sData);
					//update database status
					$this->auth_model->last_login();
					//welcome message
					$this->session->set_flashdata('message', display('welcome_back').' '.$user->row()->fullname);
					if(!empty($chefid)){
					redirect('ordermanage/order/allkitchen');
					}
					else if($user->row()->counter==1){
						redirect('ordermanage/order/counterboard');
						}
					else{
					redirect('ordermanage/order/pos_invoice');
					}

			} else {
				$this->session->set_flashdata('exception', display('incorrect_email_or_password'));
				redirect('login');
			} 

		} else {

			$captcha = create_captcha(array(
			    'img_path'      => './assets/img/captcha/',
			    'img_url'       => base_url('assets/img/captcha/'),
			    'font_path'     => './assets/fonts/captcha.ttf',
			    'img_width'     => '328',
			    'img_height'    => 64,
			    'expiration'    => 600, //5 min
			    'word_length'   => 4,
			    'font_size'     => 32,
			    'img_id'        => 'Imageid',
			    'pool'          => '23456789abcdefghijkmnpqrstuvwxyz',

			    // White background and border, black text and red grid
			    'colors'        => array(
			            'background' => array(255, 255, 255),
			            'border' => array(228, 229, 231),
			            'text' => array(49, 141, 1),
			            'grid' => array(241, 243, 246)
			    )
			));
			$data['captcha_word'] = $captcha['word'];
			$data['captcha_image'] = $captcha['image'];
			$this->session->set_userdata('captcha', $captcha['word']);

			echo Modules::run('template/login', $data);
		}
	}
  
	public function logout()
	{ 
		//update database status
		$this->auth_model->last_logout();
		//destroy session
		$this->session->sess_destroy();
		redirect('login');
	}

}
