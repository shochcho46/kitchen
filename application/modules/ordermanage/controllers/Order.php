<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends MX_Controller {
    
    public function __construct()
    {
        parent::__construct();
		$this->db->query('SET SESSION sql_mode = ""');
		$this->load->library('lsoft_setting');
		$this->load->model(array(
			'order_model',
			'logs_model'
		));	
		$this->load->library('cart');
    }
	
	public function possetting(){
		   $data['title'] = display('pos_setting');
		   $saveid=$this->session->userdata('id');
		   $data['possetting'] =$this->db->select('*')->from('tbl_posetting')->where('possettingid',1)->get()->row();
		   $data['module'] = "ordermanage";
		   $data['page']   = "possetting";   
		   echo Modules::run('template/layout', $data); 
		}
	public function settingenable(){
				$menuid=$this->input->post('menuid');
				$status=$this->input->post('status');
				$updatetready = array(
						$menuid           => $status
				        );
				$this->db->where('possettingid',1);
				$this->db->update('tbl_posetting',$updatetready);
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
		$this->permission->method('ordermanage','create')->redirect();
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
		if ($this->order_model->insert_customer($postData)) { 
		 $this->logs_model->log_recorded($logData);
		 $this->session->set_flashdata('message', display('save_successfully'));
		 redirect('ordermanage/order/pos_invoice');
		} else {
		 $this->session->set_flashdata('exception',  display('please_try_again'));
		}
		redirect("ordermanage/order/pos_invoice"); 
	  } else {
		  redirect("ordermanage/order/pos_invoice"); 
		  }   
 
    }
	public function insert_customerord(){
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
	  
		$this->permission->method('ordermanage','create')->redirect();
		$data['customer']   = (Object) $postData = array(
		'cuntomer_no'     	=> $sino,
	   'customer_name'     	=> $this->input->post('customer_name'), 
	   'customer_email'     =>$this->input->post('email'),
	   'customer_phone'     => $this->input->post('mobile'),
	   'customer_address'   => $this->input->post('address'),
	   'favorite_delivery_address'     =>$this->input->post('favaddress'), 
	   'is_active'        => 1,
	  );
	 $logData = array(
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
		if ($this->order_model->insert_customer($postData)) { 
		 $this->logs_model->log_recorded($logData);
		 $this->session->set_flashdata('message', display('save_successfully'));
		 redirect('ordermanage/order/neworder');
		} else {
		 $this->session->set_flashdata('exception',  display('please_try_again'));
		}
		redirect("ordermanage/order/neworder"); 
	  } else {
		  redirect("ordermanage/order/neworder"); 
		  }   
 
    }
	public function neworder($id = null)
    {
	  $data['title'] = display('add_order');
	  #-------------------------------#
	   $saveid=$this->session->userdata('id');
	   $data['intinfo']="";
	 
	   $data['categorylist']   = $this->order_model->category_dropdown();
	   $data['curtomertype']   = $this->order_model->ctype_dropdown();
	   $data['waiterlist']     = $this->order_model->waiter_dropdown();
	   $data['tablelist']     = $this->order_model->table_dropdown();
	   $data['customerlist']   = $this->order_model->customer_dropdown();
	   $data['paymentmethod']   = $this->order_model->pmethod_dropdown();
	   $settinginfo=$this->order_model->settinginfo();
	   $data['settinginfo']=$settinginfo;
	   $data['currency']=$this->order_model->currencysetting($settinginfo->currency);
	
	   $data['module'] = "ordermanage";
	   $data['page']   = "addorder";   
	   echo Modules::run('template/layout', $data); 
    }
	public function pos_invoice(){
		 if($this->permission->method('ordermanage','create')->access()==FALSE){
			redirect('dashboard/home');
		}
		   //$data['title'] = display('add_order');
		   $data['title']="posinvoiceloading";
		   $saveid=$this->session->userdata('id');
		   $data['categorylist']  = $this->order_model->category_dropdown();
		   $data['customerlist']  = $this->order_model->customer_dropdown();
		   $data['paymentmethod'] = $this->order_model->pmethod_dropdown();
		   $data['curtomertype']  = $this->order_model->ctype_dropdown();
		   $data['thirdpartylist']  = $this->order_model->thirdparty_dropdown();
		   $data['banklist']      = $this->order_model->bank_dropdown();
		   $data['terminalist']   = $this->order_model->allterminal_dropdown();
	   	   $data['waiterlist']    = $this->order_model->waiter_dropdown();
	   	   $data['tablelist']     = $this->order_model->table_dropdown();
		   $data['itemlist']      =  $this->order_model->allfood();
		   $data['ongoingorder']  = $this->order_model->get_ongoingorder();
		   $data['possetting']=$this->order_model->read('*', 'tbl_posetting', array('possettingid' => 1));
		   $settinginfo=$this->order_model->settinginfo();

		   $data['settinginfo']=$settinginfo;
		   $data['currency']=$this->order_model->currencysetting($settinginfo->currency);
		   $data['module'] = "ordermanage";
		   $data['page']   = "posorder";   
		   echo Modules::run('template/layout', $data); 
		}
		public function getongoingorder($id = null){
			if($id == null){
			$data['ongoingorder']  = $this->order_model->get_ongoingorder();
			}
			else{
				$data['ongoingorder']  = $this->order_model->get_unique_ongoingorder_id($id);
			}
			$this->load->view('ongoingorder_ajax', $data);  

		}
		public function kitchenstatus(){
			$data['kitchenorder']  = $this->order_model->get_orderlist();
			$this->load->view('kitchen_ajax', $data);  

		}
		public function itemlist(){
			$orderid=$this->input->post('orderid');
			$data['itemlist']  =$this->order_model->get_itemlist($orderid);
			$this->load->view('item_ajax', $data);
		}
		public function showtodayorder(){
			$this->load->view('todayorder'); 
		}
		public function showonlineorder(){
			$this->load->view('onlineordertable'); 
		}
		public function showqrorder(){
			$this->load->view('qrordertable'); 
		}
		public function ongoingtable_name(){
			$name=$this->input->get('q');
			$tablewiseorderdetails  = $this->order_model->get_unique_ongoingorder($name);
			
			echo json_encode($tablewiseorderdetails); 

		}
	public function getitemlist(){
		
				$this->permission->method('ordermanage','read')->redirect();
				$data['title'] = display('supplier_edit');
				$prod=$this->input->post('product_name');
				$catid=$this->input->post('category_id');
				$getproduct = $this->order_model->searchprod($catid,$prod);
				$settinginfo=$this->order_model->settinginfo();
				$data['settinginfo']=$settinginfo;
	   			$data['currency']=$this->order_model->currencysetting($settinginfo->currency);

				if(!empty($getproduct)){
				$data['itemlist']=$getproduct;
				$data['module'] = "ordermanage";  
				$data['page']   = "getfoodlist";
				$this->load->view('ordermanage/getfoodlist', $data);  
				}
				else{
					echo 420;
					}
		}
	public function getitemlistdroup(){
		
				$this->permission->method('ordermanage','read')->redirect();
				$prod=$this->input->get('q');
				$getproduct = $this->order_model->searchdropdown($prod);
				echo json_encode($getproduct);
		}
	public function getitemdata(){
			$this->permission->method('ordermanage','read')->redirect();
			$data['title'] = display('supplier_edit');
			$prod=$this->input->post('product_id');
			$getproduct  = $this->order_model->productinfo($prod);
		    return json_encode($getproduct);
		}
	public function itemlistselect(){
				$this->permission->method('ordermanage','read')->redirect();
				$data['title'] = display('supplier_edit');
				$id=$this->input->post('id');
				$data['itemlist']   = $this->order_model->findById($id);
				$settinginfo=$this->order_model->settinginfo();
				$data['settinginfo']=$settinginfo;
		        $data['currency']=$this->order_model->currencysetting($settinginfo->currency);

				$data['module'] = "ordermanage";  
				$data['page']   = "foodlist";
				$this->load->view('ordermanage/foodlist', $data);  
		}
	public function addtocart(){
				$this->permission->method('ordermanage','read')->redirect();
				$catid=$this->input->post('catid');
				$pid=$this->input->post('pid');
				$sizeid=$this->input->post('sizeid');
				$myid=$catid.$pid.$sizeid;
				$itemname=$this->input->post('itemname');
				$size=$this->input->post('varientname');
				$qty=$this->input->post('qty');
				$price=$this->input->post('price');
				$addonsid=$this->input->post('addonsid');
				$allprice=$this->input->post('allprice');
				$adonsunitprice=$this->input->post('adonsunitprice');
				$adonsqty=$this->input->post('adonsqty');
				$adonsname=$this->input->post('adonsname');
				
				if(!empty($addonsid)){
					$aids=$addonsid;
					$aqty=$adonsqty;
					$aname=$adonsname;
					$aprice=$adonsunitprice;
					$atprice=$allprice;
					$grandtotal=$price;
				}
				else{
					$grandtotal=$price;
					$aids='';
					$aqty='';
					$aname='';
					$aprice='';
					$atprice='0';
					}
				
				$data_items = array(
				   'id'      	=> $myid,
				   'pid'     	=> $pid,
				   'name'    	=> $itemname,
				   'sizeid'    	=> $sizeid,
				   'size'    	=> $size,
				   'qty'     	=> $qty,
				   'price'   	=> $grandtotal,
				   'addonsid'   => $aids,
				   'addonname'  => $aname,
				   'addonupr'   => $aprice,
				   'addontpr'   => $atprice,
				   'addonsqty'  => $aqty
				);
				//print_r($data_items);

    			$this->cart->insert($data_items);
				
				$settinginfo=$this->order_model->settinginfo();
				$data['settinginfo']=$settinginfo;
		        $data['currency']=$this->order_model->currencysetting($settinginfo->currency);

				$data['module'] = "ordermanage";  
				$data['page']   = "cartlist";
				$this->load->view('ordermanage/cartlist', $data);  
		}
		public function srcposaddcart($pid=null){
			$insert_new = TRUE;
			 $bag = $this->cart->contents();
			 $getproduct = $this->order_model->getuniqeproduct($pid);
			 $this->db->select('*');
									$this->db->from('menu_add_on');
									$this->db->where('menu_id',$pid);
									$query = $this->db->get();

									$getadons="";
									if ($query->num_rows() > 0) {
									$getadons = 1;
									}
									else{
										$getadons =  0;
										} 
			  foreach ($bag as $item) {

        			// check product id in session, if exist update the quantity
        			if ( $item['pid'] == $pid ) { // Set value to your variable
        				if($getadons == 0){
            			$data = array('rowid'=>$item['rowid'],'qty'=>++$item['qty']);
           			 $this->cart->update($data);

            // set $insert_new value to False
           			 $insert_new = FALSE;
           			}
           			else{
           				 echo 'adons';exit;
           			}
           			 break;
        				}

    				}
    		if($insert_new){

			

				$this->permission->method('ordermanage','read')->redirect();
				$pid=$getproduct->ProductsID;
				$catid=$getproduct->CategoryID;
				$sizeid=$getproduct->variantid;;
				$myid=$catid.$pid.$sizeid;
				$itemname=$getproduct->ProductName.'-'.$getproduct->itemnotes;
				$size=$getproduct->variantName;
				$qty=1;
				$price=isset($getproduct->price) ? $getproduct->price : 0;
				
				
				
				if($getadons == 0){
					$grandtotal=$price;
					$aids='';
					$aqty='';
					$aname='';
					$aprice='';
					$atprice='0';
				}
				else{
					
			   echo 'adons';exit;
					}
				
				$data_items = array(
				   'id'      	=> $myid,
				   'pid'     	=> $pid,
				   'name'    	=> $itemname,
				   'sizeid'    	=> $sizeid,
				   'size'    	=> $size,
				   'qty'     	=> $qty,
				   'price'   	=> $grandtotal,
				   'addonsid'   => $aids,
				   'addonname'  => $aname,
				   'addonupr'   => $aprice,
				   'addontpr'   => $atprice,
				   'addonsqty'  => $aqty
				);
				//print_r($data_items);

    			$this->cart->insert($data_items);
    		}
				
				$settinginfo=$this->order_model->settinginfo();
				$data['settinginfo']=$settinginfo;
		        $data['currency']=$this->order_model->currencysetting($settinginfo->currency);

				$data['module'] = "ordermanage";  
				$data['page']   = "cartlist";
				$this->load->view('ordermanage/poscartlist', $data);  
		}
		/*show adons product*/
	 public function adonsproductadd($id =null){
        $getproduct = $this->order_model->getuniqeproduct($id);
        $data['item']         = $this->order_model->findid($getproduct->ProductsID,$getproduct->variantid);
        $data['addonslist']   = $this->order_model->findaddons($getproduct->ProductsID);
       $settinginfo=$this->order_model->settinginfo();
       $data['settinginfo']=$settinginfo;
       $data['currency']=$this->order_model->currencysetting($settinginfo->currency);
        $data['module'] = "ordermanage";  
        $data['page']   = "posaddonsfood";
        $this->load->view('ordermanage/posaddonsfood', $data);  
        }

	public function posaddtocart(){
				$this->permission->method('ordermanage','read')->redirect();
				$catid=$this->input->post('catid');
				$pid=$this->input->post('pid');
				$sizeid=$this->input->post('sizeid');
				$myid=$catid.$pid.$sizeid;
				$itemname=$this->input->post('itemname');
				$size=$this->input->post('varientname');
				$qty=$this->input->post('qty');
				$price=$this->input->post('price');
				$addonsid=$this->input->post('addonsid');
				$allprice=$this->input->post('allprice');
				$adonsunitprice=$this->input->post('adonsunitprice');
				$adonsqty=$this->input->post('adonsqty');
				$adonsname=$this->input->post('adonsname');
				
				if(!empty($addonsid)){
					$aids=$addonsid;
					$aqty=$adonsqty;
					$aname=$adonsname;
					$aprice=$adonsunitprice;
					$atprice=$allprice;
					$grandtotal=$price;
				}
				else{
					$grandtotal=$price;
					$aids='';
					$aqty='';
					$aname='';
					$aprice='';
					$atprice='0';
					}
				
				$data_items = array(
				   'id'      	=> $myid,
				   'pid'     	=> $pid,
				   'name'    	=> $itemname,
				   'sizeid'    	=> $sizeid,
				   'size'    	=> $size,
				   'qty'     	=> $qty,
				   'price'   	=> $grandtotal,
				   'addonsid'   => $aids,
				   'addonname'  => $aname,
				   'addonupr'   => $aprice,
				   'addontpr'   => $atprice,
				   'addonsqty'  => $aqty
				);
				//print_r($data_items);

    			$this->cart->insert($data_items);
			   $settinginfo=$this->order_model->settinginfo();
			   $data['settinginfo']=$settinginfo;
			   $data['currency']=$this->order_model->currencysetting($settinginfo->currency);
				$data['module'] = "ordermanage";  
				$data['page']   = "poscartlist";
				$this->load->view('ordermanage/poscartlist', $data);  
		}
	public function cartupdate(){
				$this->permission->method('ordermanage','read')->redirect();
				$cartID=$this->input->post('CartID');
				$productqty=$this->input->post('qty');
				$Udstatus=$this->input->post('Udstatus');
				if(($Udstatus=="del") && ($productqty>0)){
						$data = array(
						'rowid'=>$cartID,
						'qty'=>$productqty-1
						);
						$this->cart->update($data);
					}
				if($Udstatus=="add"){
					$data = array(
						'rowid'=>$cartID,
						'qty'=>$productqty+1
						);
						$this->cart->update($data);
					}
			   $settinginfo=$this->order_model->settinginfo();
			   $data['settinginfo']=$settinginfo;
			   $data['currency']=$this->order_model->currencysetting($settinginfo->currency);
				$data['module'] = "ordermanage";  
				$data['page']   = "cartlist";
				$this->load->view('ordermanage/cartlist', $data);  
		}
	public function poscartupdate(){
				$this->permission->method('ordermanage','read')->redirect();
				$cartID=$this->input->post('CartID');
				$productqty=$this->input->post('qty');
				$Udstatus=$this->input->post('Udstatus');
				if(($Udstatus=="del") && ($productqty>0)){
						$data = array(
						'rowid'=>$cartID,
						'qty'=>$productqty-1
						);
						$this->cart->update($data);
					}
				if($Udstatus=="add"){
					$data = array(
						'rowid'=>$cartID,
						'qty'=>$productqty+1
						);
						$this->cart->update($data);
					}
			   $settinginfo=$this->order_model->settinginfo();
			   $data['settinginfo']=$settinginfo;
			   $data['currency']=$this->order_model->currencysetting($settinginfo->currency);
				$data['module'] = "ordermanage";  
				$data['page']   = "poscartlist";
		        $this->load->view('ordermanage/poscartlist', $data);   
		}
	public function addonsmenu(){
		$id=$this->input->post('pid');
		$sid=$this->input->post('sid');
		$data['item']   	  = $this->order_model->findid($id,$sid);
		$data['addonslist']   = $this->order_model->findaddons($id);
		$settinginfo=$this->order_model->settinginfo();
		$data['settinginfo']=$settinginfo;
	    $data['currency']=$this->order_model->currencysetting($settinginfo->currency);

		$data['module'] = "ordermanage";  
		$data['page']   = "addonsfood";
		$this->load->view('ordermanage/addonsfood', $data);  
		}
	public function posaddonsmenu(){
		$id=$this->input->post('pid');
		$sid=$this->input->post('sid');
		$data['item']   	  = $this->order_model->findid($id,$sid);
		$data['addonslist']   = $this->order_model->findaddons($id);
	   $settinginfo=$this->order_model->settinginfo();
	   $data['settinginfo']=$settinginfo;
	   $data['currency']=$this->order_model->currencysetting($settinginfo->currency);
		$data['module'] = "ordermanage";  
		$data['page']   = "posaddonsfood";
		$this->load->view('ordermanage/posaddonsfood', $data);  
		}
	
	public function cartclear(){
		$this->cart->destroy();
		redirect('ordermanage/order/neworder');
	}
	public function posclear(){
		$this->cart->destroy();
		redirect('ordermanage/order/pos_invoice');
		}

	public function removetocart(){
		$rowid=$this->input->post('rowid');
		$data = array(
				'rowid'   => $rowid,
				'qty'     => 0
			);
	   $this->cart->update($data);
	   $settinginfo=$this->order_model->settinginfo();
	   $data['settinginfo']=$settinginfo;
	   $data['currency']=$this->order_model->currencysetting($settinginfo->currency);
	   $data['module'] = "ordermanage";
		$data['page']   = "poscartlist";
		$this->load->view('ordermanage/poscartlist', $data);  
		}
	public function placeoreder(){
		$this->form_validation->set_rules('ctypeid','Customer Type','required');
		$this->form_validation->set_rules('waiter','Select Waiter','required');
		$this->form_validation->set_rules('tableid','Select Table','required');
		$this->form_validation->set_rules('customer_name','Customer Name','required');
		$this->form_validation->set_rules('order_date','Order Date'  ,'required');
	    $saveid=$this->session->userdata('id'); 
		$customerid=$this->input->post('customer_name');
		 $paymentsatus=$this->input->post('card_type');
		if ($this->form_validation->run()) { 
		if ($cart = $this->cart->contents()){
		$this->permission->method('ordermanage','create')->redirect();
		 $logData = array(
		   'action_page'         => "Add New Order",
		   'action_done'     	 => "Insert Data", 
		   'remarks'             => "Item New Order Created",
		   'user_name'           => $this->session->userdata('fullname'),
		   'entry_date'          => date('Y-m-d H:i:s'),
		  );
		 /* add New Order*/
		 $purchase_date = str_replace('/','-',$this->input->post('order_date'));
		$newdate= date('Y-m-d' , strtotime($purchase_date));
		$lastid=$this->db->select("*")->from('customer_order')
			->order_by('order_id','desc')
			->get()
			->row();
		$sl=$lastid->order_id;
		if(empty($sl)){
		$sl = 1; 
		}
		else{
		$sl = $sl+1;  
		}

		$si_length = strlen((int)$sl); 
		
		$str = '0000';
		$str2 = '0000';
		$cutstr = substr($str, $si_length); 
		$sino = $cutstr.$sl;
		$data2=array(
			'customer_id'			=>	$this->input->post('customer_name'),
			'saleinvoice'			=>	$sino,
			'cutomertype'		    =>	$this->input->post('ctypeid'),
			'waiter_id'	        	=>	$this->input->post('waiter'),
			'order_date'	        =>	$newdate,
			'order_time'	        =>	date('H:i:s'),
			'totalamount'		 	=>  $this->input->post('grandtotal'),
			'table_no'		    	=>	$this->input->post('tableid'),
			'customer_note'		    =>	$this->input->post('customernote'),
			'order_status'		    =>	1
		);
		$this->db->insert('customer_order',$data2);
		$orderid = $this->db->insert_id();
		 
		if($this->order_model->orderitem($orderid)) { 
		 $this->logs_model->log_recorded($logData);
		 $this->session->set_flashdata('message', display('save_successfully'));
		 $customer=$this->order_model->customerinfo($customerid);
		 //$this->lsoft_setting->send_sms($orderid,$customerid,$type="Neworder");
		// SendSMS($customer->customer_phone, $SMS ="- Thank you for Placeing an Order In our restaurant.We will Served Order As soon As Possible.");
		 $this->cart->destroy();
		
		 if($paymentsatus==5){
			 redirect('ordermanage/order/paymentgateway/'.$orderid.'/'.$paymentsatus);
			 }
		 else if($paymentsatus==3){
			 redirect('ordermanage/order/paymentgateway/'.$orderid.'/'.$paymentsatus);
			 }
		 else if($paymentsatus==2){
			 redirect('ordermanage/order/paymentgateway/'.$orderid.'/'.$paymentsatus);
			 }
		else{
		 redirect('ordermanage/order/neworder');			
		 }
		
		} else {
		 $this->session->set_flashdata('exception',  display('please_try_again'));
		}
		redirect("ordermanage/order/neworder"); 
		}
		else{
			$this->session->set_flashdata('exception',  'Please add Some food!!');
			redirect("ordermanage/order/neworder"); 
			}
		} else { 
	   $data['categorylist']   = $this->order_model->category_dropdown();
	   $data['curtomertype']   = $this->order_model->ctype_dropdown();
	   $data['waiterlist']     = $this->order_model->waiter_dropdown();
	   $data['tablelist']     = $this->order_model->table_dropdown();
	   $data['customerlist']   = $this->order_model->customer_dropdown();
	   $data['paymentmethod']   = $this->order_model->pmethod_dropdown();
	   $data['module'] = "ordermanage";
	   $data['page']   = "addorder";   
	   echo Modules::run('template/layout', $data); 
	   }
		}
	public function pos_order($value=null){
		$this->form_validation->set_rules('ctypeid','Customer Type','required');
		//$this->form_validation->set_rules('waiter','Select Waiter','required');
		//$this->form_validation->set_rules('tableid','Select Table','required');
		$this->form_validation->set_rules('customer_name','Customer Name','required');
	    $saveid=$this->session->userdata('id');
		$paymentsatus=$this->input->post('card_type');
		$isonline=$this->input->post('isonline');
		if ($this->form_validation->run()) { 
		if ($cart = $this->cart->contents()){
		$this->permission->method('ordermanage','create')->redirect();
		 $logData = array(
		   'action_page'         => "Add New Order",
		   'action_done'     	 => "Insert Data", 
		   'remarks'             => "Item New Order Created",
		   'user_name'           => $this->session->userdata('fullname'),
		   'entry_date'          => date('Y-m-d H:i:s'),
		  );
		  /* add New Order*/
		 $purchase_date = str_replace('/','-',$this->input->post('order_date'));
		$newdate= date('Y-m-d' , strtotime($purchase_date));
		$lastid=$this->db->select("*")->from('customer_order')->order_by('order_id','desc')->get()->row();
		$sl=$lastid->order_id;
		if(empty($sl)){
		$sl = 1; 
		}
		else{
		$sl = $sl+1;  
		}

		$si_length = strlen((int)$sl); 
		
		$str = '0000';
		$str2 = '0000';
		$cutstr = substr($str, $si_length); 
		$sino = $cutstr.$sl;
		$todaydate=date('Y-m-d');
		$todaystoken=$this->db->select("*")->from('customer_order')->where('order_date',$todaydate)->order_by('order_id','desc')->get()->row();
		if(empty($todaystoken)){
			$mytoken=1;
		}
		else{
			$mytoken=$todaystoken->tokenno+1;
			}
		$token_length = strlen((int)$mytoken); 
		$tokenstr = '00';
		$newtoken = substr($tokenstr, $token_length); 
		$tokenno = $newtoken.$mytoken;
		$cookedtime=$this->input->post('cookedtime');
		if(empty($cookedtime)){
			$cookedtime="00:15:00";
		}
		$data2=array(
			'customer_id'			=>	$this->input->post('customer_name'),
			'saleinvoice'			=>	$sino,
			'cutomertype'		    =>	$this->input->post('ctypeid'),
			'waiter_id'	        	=>	$this->input->post('waiter'),
			'isthirdparty'	        =>	$this->input->post('delivercom'),
			'order_date'	        =>	$newdate,
			'order_time'	        =>	date('H:i:s'),
			'totalamount'		 	=>  $this->input->post('grandtotal'),
			'table_no'		    	=>	$this->input->post('tableid'),
			'customer_note'		    =>	$this->input->post('customernote'),
			'tokenno'		        =>	$tokenno,
			'cookedtime'		    =>	$cookedtime,
			'order_status'		    =>	1
		);
		//echo date('h:i:s');
		//print_r($data2);
		//exit;
		$this->db->insert('customer_order',$data2);
	    $orderid = $this->db->insert_id();
		if($this->input->post('delivercom')>0){
			/*Push Notification*/
	    $this->db->select('*');
		$this->db->from('user');
		$this->db->where('id',$this->input->post('waiter'));
		$query = $this->db->get();
		$allemployee = $query->row();
		$senderid=array();
			$senderid[]=$allemployee->waiter_kitchenToken;
		define( 'API_ACCESS_KEY', 'AAAAqG0NVRM:APA91bExey2V18zIHoQmCkMX08SN-McqUvI4c3CG3AnvkRHQp8S9wKn-K4Vb9G79Rfca8bQJY9pn-tTcWiXYJiqe2s63K6QHRFqIx4Oaj9MoB1uVqB7U_gNT9fiqckeWge8eVB9P5-rX' );
				$registrationIds = $senderid;
				$msg = array
				(
					'message' 					=> "Orderid:".$orderid.", Amount:".$this->input->post('grandtotal'),
					'title'						=> "New Order Placed",
					'subtitle'					=> "admin",
					'tickerText'				=> "10",
					'vibrate'					=> 1,
					'sound'						=> 1,
					'largeIcon'					=> "TSET",
					'smallIcon'					=> "TSET"
				);
				$fields2 = array
				(
					'registration_ids' 	=> $registrationIds,
					'data'			=> $msg
				);
				 
				$headers2 = array
				(
					'Authorization: key=' . API_ACCESS_KEY,
					'Content-Type: application/json'
				);
				 
				$ch2 = curl_init();
				curl_setopt( $ch2,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
				curl_setopt( $ch2,CURLOPT_POST, true );
				curl_setopt( $ch2,CURLOPT_HTTPHEADER, $headers2 );
				curl_setopt( $ch2,CURLOPT_RETURNTRANSFER, true );
				curl_setopt( $ch2,CURLOPT_SSL_VERIFYPEER, false );
				curl_setopt( $ch2,CURLOPT_POSTFIELDS, json_encode( $fields2 ) );
				$result2 = curl_exec($ch2 );
				curl_close( $ch2 );
				/*End Notification*/
				/*Push Notification*/
	    $condition="user.waiter_kitchenToken!='' AND employee_history.pos_id=1";
		$this->db->select('user.*,employee_history.emp_his_id,employee_history.employee_id,employee_history.pos_id ');
		$this->db->from('user');
		$this->db->join('employee_history', 'employee_history.emp_his_id = user.id', 'left');
		$this->db->where($condition);
		$query = $this->db->get();
		$allkitchen = $query->result();
		$senderid5=array();
		foreach($allkitchen as $mytoken){
			$senderid5[]=$mytoken->waiter_kitchenToken;
			}
		
		define( 'API_ACCESS_KEY', 'AAAAqG0NVRM:APA91bExey2V18zIHoQmCkMX08SN-McqUvI4c3CG3AnvkRHQp8S9wKn-K4Vb9G79Rfca8bQJY9pn-tTcWiXYJiqe2s63K6QHRFqIx4Oaj9MoB1uVqB7U_gNT9fiqckeWge8eVB9P5-rX' );
				$registrationIds5 = $senderid5;
				$msg5 = array
				(
					'message' 					=> "Orderid:".$orderid.", Amount:".$this->input->post('grandtotal'),
					'title'						=> "New Order Placed",
					'subtitle'					=> "TSET",
					'tickerText'				=> "onno",
					'vibrate'					=> 1,
					'sound'						=> 1,
					'largeIcon'					=> "TSET",
					'smallIcon'					=> "TSET"
				);
				$fields5 = array
				(
					'registration_ids' 	=> $registrationIds5,
					'data'			=> $msg5
				);
				 
				$headers5 = array
				(
					'Authorization: key=' . API_ACCESS_KEY,
					'Content-Type: application/json'
				);
				 
				$ch5 = curl_init();
				curl_setopt( $ch5,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
				curl_setopt( $ch5,CURLOPT_POST, true );
				curl_setopt( $ch5,CURLOPT_HTTPHEADER, $headers5 );
				curl_setopt( $ch5,CURLOPT_RETURNTRANSFER, true );
				curl_setopt( $ch5,CURLOPT_SSL_VERIFYPEER, false );
				curl_setopt( $ch5,CURLOPT_POSTFIELDS, json_encode( $fields5 ) );
				$result5 = curl_exec($ch5 );
				curl_close( $ch5 );
		}
		else{
		/*Push Notification*/
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('id',$this->input->post('waiter'));
		$query = $this->db->get();
		$allemployee = $query->row();
		$senderid=array();
			$senderid[]=$allemployee->waiter_kitchenToken;
		define( 'API_ACCESS_KEY', 'AAAAqG0NVRM:APA91bExey2V18zIHoQmCkMX08SN-McqUvI4c3CG3AnvkRHQp8S9wKn-K4Vb9G79Rfca8bQJY9pn-tTcWiXYJiqe2s63K6QHRFqIx4Oaj9MoB1uVqB7U_gNT9fiqckeWge8eVB9P5-rX' );
				$registrationIds = $senderid;
				$msg = array
				(
					'message' 					=> "Orderid:".$orderid.", Amount:".$this->input->post('grandtotal'),
					'title'						=> "New Order Placed",
					'subtitle'					=> "admin",
					'tickerText'				=> "10",
					'vibrate'					=> 1,
					'sound'						=> 1,
					'largeIcon'					=> "TSET",
					'smallIcon'					=> "TSET"
				);
				$fields2 = array
				(
					'registration_ids' 	=> $registrationIds,
					'data'			=> $msg
				);
				 
				$headers2 = array
				(
					'Authorization: key=' . API_ACCESS_KEY,
					'Content-Type: application/json'
				);
				 
				$ch2 = curl_init();
				curl_setopt( $ch2,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
				curl_setopt( $ch2,CURLOPT_POST, true );
				curl_setopt( $ch2,CURLOPT_HTTPHEADER, $headers2 );
				curl_setopt( $ch2,CURLOPT_RETURNTRANSFER, true );
				curl_setopt( $ch2,CURLOPT_SSL_VERIFYPEER, false );
				curl_setopt( $ch2,CURLOPT_POSTFIELDS, json_encode( $fields2 ) );
				$result2 = curl_exec($ch2 );
				curl_close( $ch2 );
				/*End Notification*/
				/*Push Notification*/
	    $condition="user.waiter_kitchenToken!='' AND employee_history.pos_id=1";
		$this->db->select('user.*,employee_history.emp_his_id,employee_history.employee_id,employee_history.pos_id ');
		$this->db->from('user');
		$this->db->join('employee_history', 'employee_history.emp_his_id = user.id', 'left');
		$this->db->where($condition);
		$query = $this->db->get();
		$allkitchen = $query->result();
		$senderid5=array();
		foreach($allkitchen as $mytoken){
			$senderid5[]=$mytoken->waiter_kitchenToken;
			}
		define( 'API_ACCESS_KEY', 'AAAAqG0NVRM:APA91bExey2V18zIHoQmCkMX08SN-McqUvI4c3CG3AnvkRHQp8S9wKn-K4Vb9G79Rfca8bQJY9pn-tTcWiXYJiqe2s63K6QHRFqIx4Oaj9MoB1uVqB7U_gNT9fiqckeWge8eVB9P5-rX');
				$registrationIds5 = $senderid5;
				$msg5 = array
				(
					'message' 					=> "Orderid:".$orderid.", Amount:".$this->input->post('grandtotal'),
					'title'						=> "New Order Placed",
					'subtitle'					=> "TSET",
					'tickerText'				=> "onno",
					'vibrate'					=> 1,
					'sound'						=> 1,
					'largeIcon'					=> "TSET",
					'smallIcon'					=> "TSET"
				);
				$fields5 = array
				(
					'registration_ids' 	=> $registrationIds5,
					'data'			=> $msg5
				);
				 
				$headers5 = array
				(
					'Authorization: key=' . API_ACCESS_KEY,
					'Content-Type: application/json'
				);
				 
				$ch5 = curl_init();
				curl_setopt( $ch5,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
				curl_setopt( $ch5,CURLOPT_POST, true );
				curl_setopt( $ch5,CURLOPT_HTTPHEADER, $headers5 );
				curl_setopt( $ch5,CURLOPT_RETURNTRANSFER, true );
				curl_setopt( $ch5,CURLOPT_SSL_VERIFYPEER, false );
				curl_setopt( $ch5,CURLOPT_POSTFIELDS, json_encode( $fields5 ) );
				$result5 = curl_exec($ch5 );
				curl_close( $ch5 );
		}
		if ($this->order_model->orderitem($orderid)) { 
		 $this->logs_model->log_recorded($logData);
		 //$this->session->set_flashdata('message', display('save_successfully'));
		 $customer=$this->order_model->customerinfo($customerid);
		 //$this->lsoft_setting->send_sms($orderid,$customerid,$type="Neworder");
		 //SendSMS($customer->customer_phone, $SMS ="- Thank you for Placeing an Order In our restaurant.We will Served Order As soon As Possible.");
		 $this->cart->destroy();
		 if($paymentsatus==5){
			 redirect('ordermanage/order/paymentgateway/'.$orderid.'/'.$paymentsatus);
			 }
		 else if($paymentsatus==3){
			 redirect('ordermanage/order/paymentgateway/'.$orderid.'/'.$paymentsatus);
			 }
		 else if($paymentsatus==2){
			 redirect('ordermanage/order/paymentgateway/'.$orderid.'/'.$paymentsatus);
			 }
		else{
			if($isonline==1){
				 $this->session->set_flashdata('message', display('order_successfully'));
		         redirect('ordermanage/order/pos_invoice');
				}
			else{
				if($value ==1){
					echo $orderid;
					exit;
				}
				else{
				$view = $this->postokengenerate($orderid,0);
				echo $view;//work
				exit;
			}
				
				}
		 }
		} else {
			if($isonline==1){
			  $this->session->set_flashdata('exception',  display('please_try_again'));
			  redirect("ordermanage/order/pos_invoice");
			}
			else{
				echo "error";
				}
		 }
		}
		else{
				if($isonline==1){
					$this->session->set_flashdata('exception',  'Please add Some food!!');
					redirect("ordermanage/order/pos_invoice"); 
				}
				else{
						echo "error";
					}
			}
		} else { 
			if($isonline==1){
				   $data['categorylist']   = $this->order_model->category_dropdown();
				   $data['curtomertype']   = $this->order_model->ctype_dropdown();
				   $data['waiterlist']     = $this->order_model->waiter_dropdown();
				   $data['tablelist']     = $this->order_model->table_dropdown();
				   $data['customerlist']   = $this->order_model->customer_dropdown();
				   $settinginfo=$this->order_model->settinginfo();
				   $data['settinginfo']=$settinginfo;
				   $data['currency']=$this->order_model->currencysetting($settinginfo->currency);
					
				   $data['module'] = "ordermanage";
				   $data['page']   = "posorder";   
				   echo Modules::run('template/layout', $data); 
			}
			else{
					echo "error";
				}
	   }
		
		
		}
	public function orderlist(){
		$data['title'] = "Order List";	
		$saveid=$this->session->userdata('id');
		 #-------------------------------#       
        #
        #pagination starts
        #
        $config["base_url"] = base_url('ordermanage/order/orderlist');
        $config["total_rows"]  = $this->order_model->count_order();
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
		$data["iteminfo"] = $this->order_model->orderlist($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
		$data['pagenum']=$page;
        #
        #pagination ends
        # 
	    $settinginfo=$this->order_model->settinginfo();
		$data['settinginfo']=$settinginfo;
	    $data['currency']=$this->order_model->currencysetting($settinginfo->currency);
		$data['module'] = "ordermanage";
		$data['page']   = "orderlist";   
		echo Modules::run('template/layout', $data); 
		
		}
	public function todayallorder(){
		  
		$list = $this->order_model->get_completeorder();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $rowdata) {
			$no++;
			$row = array();
			$update='';
			$details='';
			$print='';
			$posprint='';
			if($this->permission->method('ordermanage','update')->access()):
			$update='<a href="javascript:;" onclick="editposorder('.$rowdata->order_id.',2)" class="btn btn-xs btn-success btn-sm mr-1" data-toggle="tooltip" data-placement="left" title="Update" id="table-today-'.$rowdata->order_id.'"><i class="ti-pencil"></i></a>&nbsp;&nbsp;';
			endif;
			if($this->permission->method('ordermanage','read')->access()):
			$details='&nbsp;<a href="javascript:;" onclick="detailspop('.$rowdata->order_id.')" class="btn btn-xs btn-success btn-sm mr-1" data-toggle="tooltip" data-placement="left" title="" data-original-title="Details"><i class="fa fa-eye"></i></a>&nbsp;';
			$print='<a href="javascript:;" onclick="pos_order_invoice('.$rowdata->order_id.')" class="btn btn-xs btn-success btn-sm mr-1" data-toggle="tooltip" data-placement="left" title="" data-original-title="Invoice"><i class="fa fa-window-restore"></i></a>&nbsp;';
			$posprint='<a href="javascript:;" onclick="pospageprint('.$rowdata->order_id.')" class="btn btn-xs btn-success btn-sm mr-1" data-toggle="tooltip" data-placement="left" title="" data-original-title="Pos Invoice"><i class="fa fa-window-maximize"></i></a>';
			 endif;
			 
			$row[] = $no;
			$row[] = $rowdata->saleinvoice;
			$row[] = $rowdata->customer_name;
			$row[] = $rowdata->customer_type;
			$row[] = $rowdata->first_name.$rowdata->last_name;
			$row[] = $rowdata->tablename;
			$row[] = $rowdata->order_date;
			$row[] = $rowdata->totalamount;
			$row[] =$update.$print.$posprint.$details;
			$data[] = $row;
		}
		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->order_model->count_alltodayorder(),
						"recordsFiltered" => $this->order_model->count_filtertorder(),
						"data" => $data,
				);
		echo json_encode($output);
		
		}
	public function notification(){
			$notify=$this->db->select("*")->from('customer_order')->where('cutomertype',2)->where('nofification',0)->get()->num_rows();
			//echo $this->db->last_query();
			$data = array(
				'unseen_notification'  => $notify
			);
		echo json_encode($data);
		}
	public function notificationqr(){
		$notify=$this->db->select("*")->from('customer_order')->where('cutomertype',99)->where('nofification',0)->get()->num_rows();
		//echo $this->db->last_query();
		$data = array(
			'unseen_notificationqr'  => $notify
		);
	echo json_encode($data);
	}
	public function acceptnotify(){
			$status=$this->input->post('status');
			$orderid=$this->input->post('orderid');
			$acceptreject=$this->input->post('acceptreject');
			$reason=$this->input->post('reason');
			$onprocesstab=$this->input->post('onprocesstab');
			$orderinfo=$this->db->select("*")->from('customer_order')->where('order_id',$orderid)->get()->row();
			$customerinfo=$this->db->select("*")->from('customer_info')->where('customer_id',$orderinfo->customer_id)->get()->row();
			if($acceptreject==1){
				$mymsg="You Order is Accepted";
				$bodymsg="Order ID:".$orderid." Order amount:".$orderinfo->totalamount;
			}
			else{
				$mymsg="You Order is Rejected";
				$bodymsg="Order ID:".$orderid." Rejeceted with due Reason:".$orderinfo->anyreason;
				}
			if($acceptreject==1){
			$updatetData = array('anyreason'=>$reason,'nofification' => $status,'orderacceptreject'=>$acceptreject,'order_status'=>2);
			}
			else{
				$updatetData = array('anyreason'=>$reason,'order_status'=>5,'nofification' => $status,'orderacceptreject'=>0);
				}
		    $this->db->where('order_id',$orderid);
		    $this->db->update('customer_order',$updatetData);
			/*PUSH Notification For Customer*/
			  $icon=base_url('assets/img/applogo.png');
		    $fields3 = array(
    		'to'=>$customerinfo->customer_token,
    		'data'=>array(
    			'title'=>$mymsg,
    			'body'=>$bodymsg,
    			'image'=>$icon,
    			'media_type'=>"image",
    			'message'=>"test",
    			"action"=> "1",
    		),
    		'notification'=>array(
    			'sound'=>"default",
    			'title'=>$mymsg,
    			'body'=>$bodymsg,
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
		  if($onprocesstab==1){
			    $data['ongoingorder']  = $this->order_model->get_ongoingorder();
				 $data['module'] = "ordermanage";
				 $data['page']   = "updateorderlist";   
				 $this->load->view('ordermanage/ongoingorder', $data);
			  }
			
		}
	public function cancelitem(){
		$orderid=$this->input->post('orderid');
		$itemid=$this->input->post('item');
		$varient=$this->input->post('varient');
		$kid=$this->input->post('kid');
		$reason=$this->input->post('reason');
		$orderinfo=$this->db->select("*")->from('customer_order')->where('order_id',$orderid)->get()->row();
		$itemids=explode(',',$itemid);
		$varientids=explode(',',$varient);
		$allfoods="";
				$i=0;
				foreach($itemids as $sitem){
					$vaids=$varientids[$i];
				$foodname=$this->db->select("item_foods.ProductName,variant.variantName")->from('variant')->join('item_foods','item_foods.ProductsID=variant.menuid','left')->where('variant.variantid',$vaids)->get()->row();
				//print_r($foodname);
				$allfoods.=$foodname->ProductName.' Varient: '.$foodname->variantName.",";
					$this->db->where('order_id',$orderid)->where('menu_id',$sitem)->where('varientid',$vaids)->delete('order_menu');
					$i++;
				}
		  	$allfoods=trim($allfoods,',');
			$customerinfo=$this->db->select("*")->from('customer_info')->where('customer_id',$orderinfo->customer_id)->get()->row();
			$mymsg="You Item is Rejected";
			$bodymsg="Order ID: ".$orderid." Item Name: ".$allfoods." Rejeceted with due Reason:".$reason;
			/*PUSH Notification For Customer*/
			$icon=base_url('assets/img/applogo.png');
			$fields3 = array(
    		'to'=>$customerinfo->customer_token,
    		'data'=>array(
    			'title'=>$mymsg,
    			'body'=>$bodymsg,
    			'image'=>$icon,
    			'media_type'=>"image",
    			'message'=>"test",
    			"action"=> "1",
    		),
    		'notification'=>array(
    			'sound'=>"default",
    			'title'=>$mymsg,
    			'body'=>$bodymsg,
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
		
		$afterorderinfo=$this->db->select("*")->from('order_menu')->where('order_id',$orderid)->get()->row();
    		if(empty($afterorderinfo)){
    		    $updatetData = array('anyreason'=>"All item no available",'order_status'=>5,'nofification' => 1,'orderacceptreject'=>0);
    		    $this->db->where('order_id',$orderid);
		        $this->db->update('customer_order',$updatetData);
    		}
			$alliteminfo=$this->order_model->customerorderkitchen($orderid,$kid);
			$singleorderinfo=$this->order_model->kitchen_ajaxorderinfoall($orderid);
			
			$data['orderinfo']=$singleorderinfo;
			$data['kitchenid']=$kid;
			$data['iteminfo']=$alliteminfo;
		   $data['module'] = "ordermanage";
		   $data['page']   = "kitchen_view";   
		   $this->load->view('kitchen_view',$data);
		}
	public function markasdone(){
			$orderid=$this->input->post('orderid');
			$itemid=$this->input->post('item');
			$varient=$this->input->post('varient');
			$kid=$this->input->post('kid');
			$itemids=explode(',',$itemid);
			$varientids=explode(',',$varient);
				$i=0;
				foreach($itemids as $sitem){
				$vaids=$varientids[$i];
				$updatetready = array(
						'food_status'           => 1,
				        'allfoodready'           => 1
				        );
		        $this->db->where('order_id',$orderid);
		        $this->db->where('menu_id',$sitem);
				$this->db->where('varientid',$vaids);
				$this->db->update('order_menu',$updatetready);  
				$i++;
				}
			$updatetData =array('order_status'     => 3);
			$this->db->where('order_id',$orderid);
			$this->db->update('customer_order',$updatetData);
			$alliteminfo=$this->order_model->customerorderkitchen($orderid,$kid);
			$singleorderinfo=$this->order_model->kitchen_ajaxorderinfoall($orderid);
			
			$data['orderinfo']=$singleorderinfo;
			$data['kitchenid']=$kid;
			$data['iteminfo']=$alliteminfo;
		   $data['module'] = "ordermanage";
		   $data['page']   = "kitchen_view";   
		   $this->load->view('kitchen_view',$data);
		}
	public function printtoken(){
			$orderid=$this->input->post('orderid');
			$kid=$this->input->post('kid');
		   $settinginfo=$this->order_model->settinginfo();
		   $data['settinginfo']=$settinginfo;
		   $data['storeinfo']      = $settinginfo;
	       $data['currency']=$this->order_model->currencysetting($settinginfo->currency);
		   $alliteminfo=$this->order_model->customerorderkitchen($orderid,$kid);
			$singleorderinfo=$this->order_model->kitchen_ajaxorderinfoall($orderid);
			
			$data['orderinfo']=$singleorderinfo;
			$data['kitchenid']=$kid;
			$data['iteminfo']=$alliteminfo;

		   $data['module'] = "ordermanage";
		   $data['page']   = "postoken2";   
		   $this->load->view('postoken2',$data);
		   
		}
	public function onlinellorder(){
		$list = $this->order_model->get_completeonlineorder();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $rowdata) {
			if($rowdata->bill_status==1){
			$paymentyst="Paid";
			}
			else{$paymentyst="Unpaid";}
			$no++;
			$row = array();
			$update='';
			$print='';
			$details='';
			$paymentbtn='';
			$cancelbtn='';
			$rejectbtn='';
			$posprint='';
			if($this->permission->method('ordermanage','update')->access()):
			if($rowdata->order_status!=5){
			$update='<a href="javascript:;" onclick="editposorder('.$rowdata->order_id.',3)" class="btn btn-xs btn-success btn-sm mr-1" id="table-today-online-'.$rowdata->order_id.'" data-toggle="tooltip" data-placement="left" title="Update"><i class="ti-pencil"></i></a>&nbsp;&nbsp;';
			}endif;
			if($this->permission->method('ordermanage','read')->access()):
			$details='&nbsp;<a href="javascript:;" onclick="detailspop('.$rowdata->order_id.')" class="btn btn-xs btn-success btn-sm mr-1" data-toggle="tooltip" data-placement="left"  title="" data-original-title="Details"><i class="fa fa-eye"></i></a>&nbsp;';
			$posprint='<a href="javascript:;" onclick="pospageprint('.$rowdata->order_id.')" class="btn btn-xs btn-success btn-sm mr-1" data-toggle="tooltip"  data-placement="left" title="" data-original-title="Pos Invoice"><i class="fa fa-window-maximize"></i></a>';
			endif;
			if($this->permission->method('ordermanage','delete')->access()):
			if($rowdata->order_status!=5){
			$rejectbtn='<a href="javascript:;" id="cancelicon_'.$rowdata->order_id.'" data-id="'.$rowdata->order_id.'" class="btn btn-xs btn-danger btn-sm mr-1 cancelorder" data-toggle="tooltip" data-placement="left" title="" data-original-title="Cancel"><i class="fa fa-trash-o" aria-hidden="true"></i></a>&nbsp;';
			}if($rowdata->orderacceptreject==''){
			$cancelbtn='<a href="javascript:;" id="accepticon_'.$rowdata->order_id.'" data-id="'.$rowdata->order_id.'" class="btn btn-xs btn-danger btn-sm mr-1 aceptorcancel" data-toggle="tooltip" data-placement="left" title="" data-original-title="Accept or Cancel"><i class="fa fa-info-circle" aria-hidden="true"></i></a>&nbsp;';
			}
			if($rowdata->bill_status==0 && $rowdata->orderacceptreject!=0){
			$paymentbtn='<a href="javascript:;" onclick="createMargeorder('.$rowdata->order_id.',1)" class="btn btn-xs btn-success btn-sm mr-1" data-toggle="tooltip" id="table-today-online-accept-'.$rowdata->order_id.'" data-placement="left" title="" data-original-title="Make Payments"><i class="fa fa-window-restore"></i></a>&nbsp;';
			}
			endif; 
			
			
			$row[] = $no;
			$row[] = $rowdata->saleinvoice;
			$row[] = $rowdata->customer_name;
			$row[] = $rowdata->customer_type;
			$row[] = $rowdata->first_name.$rowdata->last_name;
			$row[] = $rowdata->tablename;
			$row[] = $paymentyst;
			$row[] = $rowdata->order_date;
			$row[] = $rowdata->totalamount;
			$row[] =$cancelbtn.$rejectbtn.$paymentbtn.$update.$posprint.$details;
			$data[] = $row;
		}
		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->order_model->count_allonlineorder(),
						"recordsFiltered" => $this->order_model->count_filtertonlineorder(),
						"data" => $data,
				);
		echo json_encode($output);
		
		}
	public function allqrorder(){
		$list = $this->order_model->get_qronlineorder();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $rowdata) {
			if($rowdata->bill_status==1){
			$paymentyst="Paid";
			}
			else{$paymentyst="Unpaid";}
			$no++;
			$row = array();
			$update='';
			$print='';
			$details='';
			$paymentbtn='';
			$cancelbtn='';
			$rejectbtn='';
			$posprint='';
			if($this->permission->method('ordermanage','update')->access()):
			$update='<a href="javascript:;" onclick="editposorder('.$rowdata->order_id.',4)" class="btn btn-xs btn-success btn-sm mr-1" id="table-today-online-'.$rowdata->order_id.'" data-toggle="tooltip" data-placement="left" title="Update"><i class="ti-pencil"></i></a>&nbsp;&nbsp;';
			endif;
			if($this->permission->method('ordermanage','read')->access()):
			$details='&nbsp;<a onclick="detailspop('.$rowdata->order_id.')" class="btn btn-xs btn-success btn-sm mr-1" data-placement="left" title="" data-original-title="Details" data-toggle="modal" data-target="#orderdetailsp" data-dismiss="modal"><i class="fa fa-eye"></i></a>&nbsp;';
			$posprint='<a href="javascript:;" onclick="pospageprint('.$rowdata->order_id.')" class="btn btn-xs btn-success btn-sm mr-1" data-toggle="tooltip"  data-placement="left" title="" data-original-title="Pos Invoice"><i class="fa fa-window-maximize"></i></a>';
			endif;
			if($this->permission->method('ordermanage','delete')->access()):
			if($rowdata->order_status!=5){
			$rejectbtn='<a href="javascript:;" id="cancelicon_'.$rowdata->order_id.'" data-id="'.$rowdata->order_id.'" class="btn btn-xs btn-danger btn-sm mr-1 cancelorder" data-toggle="tooltip" data-placement="left" title="" data-original-title="Cancel"><i class="fa fa-trash-o" aria-hidden="true"></i></a>&nbsp;';
			}if($rowdata->orderacceptreject==''){
			$cancelbtn='<a href="javascript:;" id="accepticon_'.$rowdata->order_id.'" data-id="'.$rowdata->order_id.'" class="btn btn-xs btn-danger btn-sm mr-1 aceptorcancel" data-toggle="tooltip" data-placement="left" title="" data-original-title="Accept or Cancel"><i class="fa fa-info-circle" aria-hidden="true"></i></a>&nbsp;';
			}
			if($rowdata->bill_status==0 && $rowdata->orderacceptreject!=0){
			$paymentbtn='<a href="javascript:;" onclick="createMargeorder('.$rowdata->order_id.',1)" class="btn btn-xs btn-success btn-sm mr-1" data-toggle="tooltip" id="table-today-online-accept-'.$rowdata->order_id.'" data-placement="left" title="" data-original-title="Make Payments"><i class="fa fa-window-restore"></i></a>&nbsp;';
			}
			endif; 
			
			
			$row[] = $no;
			$row[] = $rowdata->saleinvoice;
			$row[] = $rowdata->customer_name;
			$row[] = "QR Customer";
			$row[] = $rowdata->first_name.$rowdata->last_name;
			$row[] = $rowdata->tablename;
			$row[] = $paymentyst;
			$row[] = $rowdata->order_date;
			$row[] = $rowdata->totalamount;
			$row[] =$cancelbtn.$rejectbtn.$paymentbtn.$update.$posprint.$details;
			$row[] = $rowdata->isupdate;
			$data[] = $row;
		}
		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->order_model->count_allqrorder(),
						"recordsFiltered" => $this->order_model->count_filtertqrorder(),
						"data" => $data,
				);
		echo json_encode($output);
		
		}
	public function pendingorder(){
	$data['title'] = display('pending_order');	
	$saveid=$this->session->userdata('id');
	   //$data['customerinfo']  = $this->order_model->read('*', 'customer_info', array('customer_id' => $orderinfo->customer_id));
	   //$data['iteminfo']      =  $this->order_model->read_all('*', 'order_menu', array('order_id' =>$orderinfo->order_id));
	   $status=1;
	   #-------------------------------#       
        #
        #pagination starts
        #
        $config["base_url"] = base_url('ordermanage/order/orderlist');
        $config["total_rows"]  = $this->order_model->count_canorder($status);
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
		$data["iteminfo"] = $this->order_model->pendingorder($config["per_page"], $page,$status);
        $data["links"] = $this->pagination->create_links();
		$data['pagenum']=$page;
        #
        #pagination ends
        # 
	   $settinginfo=$this->order_model->settinginfo();
	   $data['settinginfo']=$settinginfo;
	   $data['currency']=$this->order_model->currencysetting($settinginfo->currency);
	   $data["links"] = '';
	   $data['pagenum']=0;
	   $data['module'] = "ordermanage";
	   $data['page']   = "pendingorder";   
	   echo Modules::run('template/layout', $data); 
		}
	public function processing(){
	$data['title'] = display('processing_order');	
	   $saveid=$this->session->userdata('id');
	   $status=2;
	   $data['iteminfo']      = $this->order_model->pendingorder($status);
	   $settinginfo=$this->order_model->settinginfo();
	   $data['settinginfo']=$settinginfo;
	   $data['currency']=$this->order_model->currencysetting($settinginfo->currency);
	   $data['module'] = "ordermanage";
	   $data['page']   = "processing";   
	   echo Modules::run('template/layout', $data); 
		}
	public function completelist(){
	$data['title'] = display('complete_order');	
	$saveid=$this->session->userdata('id');
	   $status=1;
        $config["base_url"] = base_url('ordermanage/order/completelist');
        $config["total_rows"]  = $this->order_model->count_comorder($status);
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
		$data["iteminfo"] = $this->order_model->completeorder($config["per_page"], $page,$status);
        $data["links"] = $this->pagination->create_links();
		$data['pagenum']=$page;
        #
        #pagination ends
        # 
	   $settinginfo=$this->order_model->settinginfo();
	   $data['settinginfo']=$settinginfo;
	   $data['currency']=$this->order_model->currencysetting($settinginfo->currency);
	   $data['module'] = "ordermanage";
	   $data['page']   = "pendingorder";   
	   echo Modules::run('template/layout', $data); 
		}
	public function cancellist(){
	$data['title'] = "Cancel Order";	
	$saveid=$this->session->userdata('id');
	   //$data['customerinfo']  = $this->order_model->read('*', 'customer_info', array('customer_id' => $orderinfo->customer_id));
	   //$data['iteminfo']      =  $this->order_model->read_all('*', 'order_menu', array('order_id' =>$orderinfo->order_id));
	   $status=5;
	   #-------------------------------#       
        #
        #pagination starts
        #
        $config["base_url"] = base_url('ordermanage/order/orderlist');
        $config["total_rows"]  = $this->order_model->count_canorder($status);
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
		$data["iteminfo"] = $this->order_model->pendingorder($config["per_page"], $page,$status);
        $data["links"] = $this->pagination->create_links();
		$data['pagenum']=$page;
        #
        #pagination ends
        # 
	   $settinginfo=$this->order_model->settinginfo();
	   $data['settinginfo']=$settinginfo;
	   $data['currency']=$this->order_model->currencysetting($settinginfo->currency);

	   $data['module'] = "ordermanage";
	   $data['page']   = "pendingorder";   
	   echo Modules::run('template/layout', $data); 
		}
	public function updateorder($id){
		   $saveid=$this->session->userdata('id');
		   $isadmin=$this->session->userdata('user_type');
		   
		   $updatetData = array('nofification' => 1);
		   $this->db->where('order_id',$id);
		   $this->db->update('customer_order',$updatetData);
		   
		   $customerorder=$this->order_model->read('*', 'customer_order', array('order_id' => $id));
		   //print_r($customerorder);
		   //if($customerorder->waiter_id==$saveid || $isadmin==1){
		   $data['categorylist']   = $this->order_model->category_dropdown();
		    $data['customerlist']  = $this->order_model->customer_dropdown();
		   $data['curtomertype']   = $this->order_model->ctype_dropdown();
		   $data['waiterlist']     = $this->order_model->waiter_dropdown();
		   $data['tablelist']      = $this->order_model->table_dropdown();
		    $data['thirdpartylist']  = $this->order_model->thirdparty_dropdown();
		   $data['banklist']      = $this->order_model->bank_dropdown();
		   $data['terminalist']   = $this->order_model->allterminal_dropdown();
		   $data['paymentmethod']   = $this->order_model->pmethod_dropdown();
		   $data['orderinfo']  	   = $customerorder;
		   $data['customerinfo']   = $this->order_model->read('*', 'customer_info', array('customer_id' => $customerorder->customer_id));
		   $data['iteminfo']       = $this->order_model->customerorder($id);
		   $data['billinfo']	   = $this->order_model->billinfo($id);
		   $data['itemlist']      =  $this->order_model->allfood();
		   $settinginfo=$this->order_model->settinginfo();
		   $data['settinginfo']=$settinginfo;
	       $data['currency']=$this->order_model->currencysetting($settinginfo->currency);
		   $data['possetting']=$this->order_model->read('*', 'tbl_posetting', array('possettingid' => 1));
		  // $data['title']="posinvoiceloading";
		   //$data['module'] = "ordermanage";
		   //$data['page']   = "updateorder"; 
		   $this->load->view('updateorder', $data);   
		   //echo Modules::run('template/layout', $data); 
		  // }
		  /* else{
			   redirect("ordermanage/order/orderlist/"); 
			   }*/
		}
	public function otherupdateorder($id){
		   $saveid=$this->session->userdata('id');
		   $isadmin=$this->session->userdata('user_type');
		   
		   $updatetData = array('nofification' => 1);
		   $this->db->where('order_id',$id);
		   $this->db->update('customer_order',$updatetData);
		   
		   $customerorder=$this->order_model->read('*', 'customer_order', array('order_id' => $id));
		   //print_r($customerorder);
		   //if($customerorder->waiter_id==$saveid || $isadmin==1){
		   $data['categorylist']   = $this->order_model->category_dropdown();
		    $data['customerlist']  = $this->order_model->customer_dropdown();
		   $data['curtomertype']   = $this->order_model->ctype_dropdown();
		   $data['waiterlist']     = $this->order_model->waiter_dropdown();
		   $data['tablelist']      = $this->order_model->table_dropdown();
		    $data['thirdpartylist']  = $this->order_model->thirdparty_dropdown();
		   $data['banklist']      = $this->order_model->bank_dropdown();
		   $data['terminalist']   = $this->order_model->allterminal_dropdown();
		   $data['paymentmethod']   = $this->order_model->pmethod_dropdown();
		   $data['orderinfo']  	   = $customerorder;
		   $data['customerinfo']   = $this->order_model->read('*', 'customer_info', array('customer_id' => $customerorder->customer_id));
		   $data['iteminfo']       = $this->order_model->customerorder($id);
		   $data['billinfo']	   = $this->order_model->billinfo($id);
		   $data['itemlist']      =  $this->order_model->allfood();
		   $settinginfo=$this->order_model->settinginfo();
		   $data['settinginfo']=$settinginfo;
	       $data['currency']=$this->order_model->currencysetting($settinginfo->currency);
		   $data['possetting']=$this->order_model->read('*', 'tbl_posetting', array('possettingid' => 1));
		  $data['title']="posinvoiceloading2";
		   $data['module'] = "ordermanage";
		   $data['page']   = "updateorderother"; 
		   //$this->load->view('updateorderother', $data);   
		   echo Modules::run('template/layout', $data); 
		  // }
		  /* else{
			   redirect("ordermanage/order/orderlist/"); 
			   }*/
		}
	public function modifyoreder(){
		$orderid                 = $this->input->post('updateid');
		$dataup['cutomertype']   = $this->input->post('ctypeid');
		$dataup['waiter_id']     = $this->input->post('waiter');
		$dataup['isthirdparty']  = $this->input->post('delivercom');
		$dataup['table_no']      = $this->input->post('tableid');
		$dataup['order_status']  = $this->input->post('orderstatus');
		$dataup['totalamount']   = $this->input->post('orginattotal');
		//$paymentsatus=$this->input->post('card_type');
		
		//print_r($dataup);
		$updared=$this->order_model->update_info('customer_order', $dataup, 'order_id', $orderid);
		$this->order_model->payment_info($orderid);
		
		 $logData = array(
		   'action_page'         => "Pending Order",
		   'action_done'     	 => "Insert Data", 
		   'remarks'             => "Pending Order is Update",
		   'user_name'           => $this->session->userdata('fullname'),
		   'entry_date'          => date('Y-m-d H:i:s'),
		  );
	     $this->logs_model->log_recorded($logData);
		 //$this->lsoft_setting->send_sms($orderid,$customerid,$type="CompleteOrder");
		 $this->session->set_flashdata('message', display('update_successfully'));
		 /*if($paymentsatus==5){
			 redirect('ordermanage/order/paymentgateway/'.$orderid.'/'.$paymentsatus);
			 }
		 else if($paymentsatus==3){
			 redirect('ordermanage/order/paymentgateway/'.$orderid.'/'.$paymentsatus);
			 }
		 else if($paymentsatus==2){
			 redirect('ordermanage/order/paymentgateway/'.$orderid.'/'.$paymentsatus);
			 }
		else{*/
			$successfull =  array('success' => 'success','msg' => display('update_successfully'),'orderid' => $orderid,'tokenmsg' => display('do_print_token'));
			echo json_encode($successfull);exit;

		 redirect("ordermanage/order/pos_invoice/".$orderid);			
		 //}
		 
		}
	public function ajaxupdateoreder(){
		$orderid                 = $this->input->post('orderid');
		$status                 = $this->input->post('status');
		//print_r($dataup);
		$this->order_model->payment_info($orderid);
		
		 $logData = array(
		   'action_page'         => "Order List",
		   'action_done'     	 => "Insert Data", 
		   'remarks'             => "Order is Update",
		   'user_name'           => $this->session->userdata('fullname'),
		   'entry_date'          => date('Y-m-d H:i:s'),
		  );
	     $this->logs_model->log_recorded($logData);
		 $this->session->set_flashdata('message', display('update_successfully'));
		redirect("ordermanage/order/updateorder/".$orderid); 
		}
	
	
	public function changestatus(){
		$orderid                 = $this->input->post('orderid');
		$status                 = $this->input->post('status');
		$paytype                 = $this->input->post('paytype');
		$cterminal                 = $this->input->post('cterminal');
		$mybank                  = $this->input->post('mybank');
		$mydigit                 = $this->input->post('mydigit');
		$paidamount              =$this->input->post('paid');
		
		//print_r($dataup);
		$orderinfo = $this->order_model->uniqe_order_id($orderid);
		//print_r($orderinfo);exit;
		$duevalue = (round($orderinfo->totalamount)-$orderinfo->customerpaid);
		if($paidamount == $duevalue || $duevalue <  $paidamount ){
			$paidamount  = $paidamount+$orderinfo->customerpaid;
			$status =4;
		}
		else{
			$paidamount  = $paidamount+$orderinfo->customerpaid;

			$status =3;
		}

		     $updatetData = array(
				   'order_status'     => $status,
				  );
		        $this->db->where('order_id',$orderid);
				$this->db->update('customer_order',$updatetData);
				//Update Bill Table
				$updatetbill = array(
				   'bill_status'           => 1,
				   'payment_method_id'     => $paytype,
				  );
		        $this->db->where('order_id',$orderid);
				$this->db->update('bill',$updatetbill);
				$billinfo = $this->db->select('*')->from('bill')->where('order_id',$orderid)->get()->row();
				if(!empty($billinfo)){
					$billid=$billinfo->bill_id;
					if($paidamount>=0){
							$paidData = array(
							   'customerpaid'     =>$paidamount
							  );
		        			$this->db->where('order_id',$orderid);
							$this->db->update('customer_order',$paidData);
					   }
					 else{
						  $paidData = array(
							   'customerpaid'     =>$billinfo->bill_amount
							  );
		        			$this->db->where('order_id',$orderid);
							$this->db->update('customer_order',$paidData);
						  }
					if($paytype==1){
						  $billpayment = $this->db->select('*')->from('bill_card_payment')->where('bill_id',$billid)->get()->row();
						  if(!empty($billpayment)){
							  $updatetcardinfo = array(
							   'card_no'           => $mydigit,
							   'terminal_name'     => $cterminal,
							   'bank_name'         => $mybank
							  );
							 //print_r($updatetcardinfo);
							 //echo "tet";
							$this->db->where('bill_id',$billid);
							$this->db->update('bill_card_payment',$updatetcardinfo);
							  }
							else{
								$cardinfo=array(
									'bill_id'			    =>	$billid,
									'card_no'		        =>	$mydigit,
									'terminal_name'		    =>	$cterminal,
									'bank_name'	            =>	$mybank,
								);
								//print_r($cardinfo);
								//echo "tet2";
								$this->db->insert('bill_card_payment',$cardinfo);
								}
						}
					}
					if($status==4){
						$customerinfo = $this->db->select('*')->from('customer_info')->where('customer_id',$billinfo->customer_id)->get()->row();
						}
				  $orderinfo=$this->db->select('*')->from('customer_order')->where('order_id',$orderid)->get()->row();
				  $cusinfo = $this->db->select('*')->from('customer_info')->where('customer_id',$orderinfo->customer_id)->get()->row();
				  
		  // Income for company
		 $saveid=$this->session->userdata('id');
         $income = array(
		  'VNo'            => $orderinfo->saleinvoice,
		  'Vtype'          => 'Sales Products',
		  'VDate'          =>  $orderinfo->order_date,
		  'COAID'          => 303,
		  'Narration'      => 'Sale Income For '.$cusinfo->cuntomer_no.'-'.$cusinfo->customer_name,
		  'Debit'          => 0,
		  'Credit'         => $orderinfo->totalamount,//purchase price asbe
		  'IsPosted'       => 1,
		  'CreateBy'       => $saveid,
		  'CreateDate'     => $orderinfo->order_date,
		  'IsAppove'       => 1
		); 
		$this->db->insert('acc_transaction',$income);
		 $logData =array(
	   'action_page'         => "Order List",
	   'action_done'     	 => "Insert Data", 
	   'remarks'             => "Order is Update",
	   'user_name'           => $this->session->userdata('fullname'),
	   'entry_date'          => date('Y-m-d H:i:s'),
	  );
	     $this->logs_model->log_recorded($logData);
		 $data['ongoingorder']  = $this->order_model->get_ongoingorder();
		 $data['module'] = "ordermanage";
		 $data['page']   = "updateorderlist"; 
		 $view = $this->posprintdirect($orderid);
				//echo $view;//work//////
		 echo $view;exit;
		 $this->load->view('ordermanage/ongoingorder', $data);//work
		}
	public function posprintview($id){
			$saveid=$this->session->userdata('id');
		    $isadmin=$this->session->userdata('user_type');
		    $customerorder=$this->order_model->read('*', 'customer_order', array('order_id' => $id));
		    $updatetData = array('nofification' => 1);
		    $this->db->where('order_id',$id);
		    $this->db->update('customer_order',$updatetData);
		   //if($customerorder->waiter_id==$saveid || $isadmin==1){
		    $data['orderinfo']  	   = $customerorder;
		   $data['customerinfo']   = $this->order_model->read('*', 'customer_info', array('customer_id' => $customerorder->customer_id));
		   $data['iteminfo']       = $this->order_model->customerorder($id);
		   $data['billinfo']	   = $this->order_model->billinfo($id);
		   $settinginfo=$this->order_model->settinginfo();
		   $data['settinginfo']=$settinginfo;
		   $data['storeinfo']      = $settinginfo;
	       $data['currency']=$this->order_model->currencysetting($settinginfo->currency);

		   $data['module'] = "ordermanage";
		   $data['page']   = "posinvoice";   
		   $this->load->view('posinvoiceview',$data);
		   //echo Modules::run('template/layout', $data); 
		    /*}
		   else{
			   redirect("ordermanage/order/orderlist/"); 
			   }*/
		}
	public function onprocessajax(){
		 $data['ongoingorder']  = $this->order_model->get_ongoingorder();
		 $data['module'] = "ordermanage";
		 $data['page']   = "updateorderlist";   
		 $this->load->view('ordermanage/ongoingorder', $data);
		}
	
	public function deletetocart(){
		$rowid=$this->input->post('mid');
		$orderid=$this->input->post('orderid');
		$this->order_model->cartitem_delete($rowid,$orderid);
		$iteminfo=$this->order_model->customerorder($orderid);
		$data['paymentmethod']   = $this->order_model->pmethod_dropdown();
		 $data['billinfo']	   = $this->order_model->billinfo($orderid);
		$settinginfo=$this->order_model->settinginfo();
		$data['settinginfo']=$settinginfo;
		$i=0; 
		$totalamount=0;
		$subtotal=0;
		foreach ($iteminfo as $item){
			$adonsprice=0;
			$discount=0;
			$itemprice= $item->price*$item->menuqty;
			if(!empty($item->add_on_id)){
				$addons=explode(",",$item->add_on_id);
				$addonsqty=explode(",",$item->addonsqty);
				$x=0;
				foreach($addons as $addonsid){
				$adonsinfo=$this->order_model->read('*', 'add_ons', array('add_on_id' => $addonsid));
				$adonsprice=$adonsprice+$adonsinfo->price*$addonsqty[$x];
				$x++;
				}
				$nittotal=$adonsprice;
				$itemprice=$itemprice+$adonsprice;
			}
			else{
			$nittotal=0;
			}
			$totalamount=$totalamount+$nittotal;
			$subtotal=$subtotal+$item->price*$item->menuqty;
			}
		$itemtotal=$totalamount+$subtotal;
		$calvat=$itemtotal*$settinginfo->vat/100;
		$updatedprice = $calvat+$itemtotal-$discount;
		$postData = array(
	   'order_id'        => $orderid,
	   'totalamount'     => $updatedprice,
	  );
		  $this->order_model->update_order($postData);
		  $data['orderinfo']  	   = $this->order_model->read('*', 'customer_order', array('order_id' => $orderid));
		  $data['iteminfo']       = $this->order_model->customerorder($orderid);
		   $data['currency']=$this->order_model->currencysetting($settinginfo->currency);
		  $data['module'] = "ordermanage";
		  $data['page']   = "updateorderlist";   
		  $this->load->view('ordermanage/updateorderlist', $data);   
		
		}
	public function addtocartupdate(){
			$catid=$this->input->post('catid');
			$pid=$this->input->post('pid');
			$sizeid=$this->input->post('sizeid');
			$itemname=$this->input->post('itemname');
			$size=$this->input->post('varientname');
			$qty=$this->input->post('qty');
			$price=$this->input->post('price');
			$addonsid=$this->input->post('addonsid');
			$allprice=$this->input->post('allprice');
			$adonsunitprice=$this->input->post('adonsunitprice');
			$adonsqty=$this->input->post('adonsqty');
			$adonsname=$this->input->post('adonsname');
			$orderid=$this->input->post('orderid');
			$data['paymentmethod']   = $this->order_model->pmethod_dropdown();
		    $settinginfo=$this->order_model->settinginfo();
		   $data['settinginfo']=$settinginfo;
			
			if(!empty($addonsid)){
				$aids=$addonsid;
				$aqty=$adonsqty;
				$aname=$adonsname;
				$aprice=$adonsunitprice;
				$atprice=$allprice;
				$grandtotal=$price;
			}
			else{
				$grandtotal=$price;
				$aids='';
				$aqty='';
				$aname='';
				$aprice='';
				$atprice='0';
				}
				
			$orderchecked=$this->order_model->check_order($orderid,$pid,$sizeid);	
			if(empty($orderchecked)){
				$postInfo = array(
				   'order_id'      => $orderid,
				   'menu_id'       => $pid,
				   'menuqty'       => $qty,
				   'add_on_id'     => $aids,
				   'addonsqty'     => $aqty,
				   'varientid'     => $sizeid,
				   'isupdate'     => 1,
				  );
			$this->order_model->new_entry($postInfo);
			}
			else{
				$udata = array(
				   'menuqty'       => $qty,
				   'add_on_id'     => $aids,
				   'addonsqty'     => $aqty,
				  );
				
				$this->db->where('order_id',$orderid);
				$this->db->where('menu_id',$pid);
				$this->db->where('varientid',$sizeid);
				$this->db->update('order_menu',$udata);
				$reqqty=$qty-$orderchecked->menuqty;
				if($reqqty>0){
				$data4=array(
						'ordid'				  =>	$orderid,
						'menuid'		        =>	$pid,
						'qty'	        	    =>	$qty-$orderchecked->menuqty,
						'addonsid'	        	=>	$aids,
						'adonsqty'	        	=>	$aqty,
						'varientid'		    	=>	$sizeid,
						'insertdate'		    =>	date('Y-m-d'),
					);
					$this->db->insert('tbl_updateitems',$data4);
				}
				//echo $this->db->last_query();
			//print_r($orderchecked);
			}
			$existingitem =$this->order_model->customerorder($orderid);	
			
			$i=0; 
			$totalamount=0;
			$subtotal=0;
			foreach ($existingitem as $item){
				$adonsprice=0;
				$discount=0;
				$itemprice= $item->price*$item->menuqty;
				if(!empty($item->add_on_id)){
					$addons=explode(",",$item->add_on_id);
					$addonsqty=explode(",",$item->addonsqty);
					$x=0;
					foreach($addons as $addonsid){
					$adonsinfo=$this->order_model->read('*', 'add_ons', array('add_on_id' => $addonsid));
					$adonsprice=$adonsprice+$adonsinfo->price*$addonsqty[$x];
					$x++;
					}
					$nittotal=$adonsprice;
					$itemprice=$itemprice+$adonsprice;
				}
				else{
				$nittotal=0;
				}
				$totalamount=$totalamount+$nittotal;
				$subtotal=$subtotal+$item->price*$item->menuqty;
				}
			
			
			$itemtotal=$totalamount+$subtotal;
			$calvat=$itemtotal*$settinginfo->vat/100;
			$updatedprice = $calvat+$itemtotal-$discount;
			$postData = array(
		   'order_id'        => $orderid,
		   'totalamount'     => $updatedprice,
		  );
		$this->order_model->update_order($postData);	
		
		
		  $data['orderinfo']  	   = $this->order_model->read('*', 'customer_order', array('order_id' => $orderid));
		  $data['iteminfo']       = $this->order_model->customerorder($orderid);
		  $data['billinfo']	   = $this->order_model->billinfo($orderid);
		   $data['currency']=$this->order_model->currencysetting($settinginfo->currency);
		  $data['module'] = "ordermanage";
		  $data['page']   = "updateorderlist";   
		  //print_r($data['iteminfo']);exit;
		  $this->load->view('ordermanage/updateorderlist', $data);  			
		}
		/*update uniqe*/
		public function addtocartupdate_uniqe($pid,$oid){
			$getproduct = $this->order_model->getuniqeproduct($pid);
			 $this->db->select('*');
									$this->db->from('menu_add_on');
									$this->db->where('menu_id',$pid);
									$query = $this->db->get();

									$getadons="";
									if ($query->num_rows() > 0) {
									$getadons = 1;
									}
									else{
										$getadons =  0;
										} 
			
			$catid=$getproduct->CategoryID;
			$sizeid=$getproduct->variantid;
			$itemname=$getproduct->ProductName.'-'.$getproduct->itemnotes;
			$size=$getproduct->variantName;
			$qty=1;
			$price=isset($getproduct->price) ? $getproduct->price : 0;
			$orderid=$oid;
			if($price == 0){
				$sizeid=0;
			}
			$data['paymentmethod']   = $this->order_model->pmethod_dropdown();
		    $settinginfo=$this->order_model->settinginfo();
		   $data['settinginfo']=$settinginfo;
			
			if($getadons == 1){
				 echo 'adons';exit;
			}
			else{
				$grandtotal=$price;
				$aids='';
				$aqty='';
				$aname='';
				$aprice='';
				$atprice='0';
				}
				
			$orderchecked=$this->order_model->check_order($orderid,$pid,$sizeid);
			
			if(empty($orderchecked)){
				
				$postInfo = array(
				   'order_id'      => $orderid,
				   'menu_id'       => $pid,
				   'menuqty'       => $qty,
				   'add_on_id'     => $aids,
				   'addonsqty'     => $aqty,
				   'varientid'     => $sizeid,
				   'isupdate'     => 1,
				  );
			$this->order_model->new_entry($postInfo);
			}
			else{
				$qty = $orderchecked->menuqty+1;
				
				$udata = array(
				   'menuqty'       => $qty,
				   'add_on_id'     => $aids,
				   'addonsqty'     => $aqty,
				  );
				
				$this->db->where('order_id',$orderid);
				$this->db->where('menu_id',$pid);
				$this->db->where('varientid',$sizeid);
				$this->db->update('order_menu',$udata);
				$reqqty=$qty-$orderchecked->menuqty;
				if($reqqty>0){
				$data4=array(
						'ordid'				  =>	$orderid,
						'menuid'		        =>	$pid,
						'qty'	        	    =>	$qty-$orderchecked->menuqty,
						'addonsid'	        	=>	$aids,
						'adonsqty'	        	=>	$aqty,
						'varientid'		    	=>	$sizeid,
						'insertdate'		    =>	date('Y-m-d'),
					);
					$this->db->insert('tbl_updateitems',$data4);
				}
				//echo $this->db->last_query();
			//print_r($orderchecked);
			}
			$existingitem =$this->order_model->customerorder($orderid);	
			
			$i=0; 
			$totalamount=0;
			$subtotal=0;
			foreach ($existingitem as $item){
				$adonsprice=0;
				$discount=0;
				$itemprice= $item->price*$item->menuqty;
				if(!empty($item->add_on_id)){
					$addons=explode(",",$item->add_on_id);
					$addonsqty=explode(",",$item->addonsqty);
					$x=0;
					foreach($addons as $addonsid){
					$adonsinfo=$this->order_model->read('*', 'add_ons', array('add_on_id' => $addonsid));
					$adonsprice=$adonsprice+$adonsinfo->price*$addonsqty[$x];
					$x++;
					}
					$nittotal=$adonsprice;
					$itemprice=$itemprice+$adonsprice;
				}
				else{
				$nittotal=0;
				}
				$totalamount=$totalamount+$nittotal;
				$subtotal=$subtotal+$item->price*$item->menuqty;
				}
			
			
			$itemtotal=$totalamount+$subtotal;
			$calvat=$itemtotal*$settinginfo->vat/100;
			$updatedprice = $calvat+$itemtotal-$discount;
			$postData = array(
		   'order_id'        => $orderid,
		   'totalamount'     => $updatedprice,
		  );
		$this->order_model->update_order($postData);	
		
		
		  $data['orderinfo']  	   = $this->order_model->read('*', 'customer_order', array('order_id' => $orderid));
		  $data['iteminfo']       = $this->order_model->customerorder($orderid);
		  $data['billinfo']	   = $this->order_model->billinfo($orderid);
		   $data['currency']=$this->order_model->currencysetting($settinginfo->currency);
		  $data['module'] = "ordermanage";
		  $data['page']   = "updateorderlist";   
		  //print_r($data['iteminfo']);exit;
		  $this->load->view('ordermanage/updateorderlist', $data);  			
		}	

	public function orderinvoice($id){
			$saveid=$this->session->userdata('id');
		   $isadmin=$this->session->userdata('user_type');
		   $customerorder=$this->order_model->read('*', 'customer_order', array('order_id' => $id));
		    $updatetData = array('nofification' => 1);
		    $this->db->where('order_id',$id);
		    $this->db->update('customer_order',$updatetData);
		   //if($customerorder->waiter_id==$saveid || $isadmin==1){
		   $data['orderinfo']  	   = $customerorder;
		   $data['customerinfo']   = $this->order_model->read('*', 'customer_info', array('customer_id' => $customerorder->customer_id));
		   $data['iteminfo']       = $this->order_model->customerorder($id);
		   $data['billinfo']	   = $this->order_model->billinfo($id);
		   $settinginfo=$this->order_model->settinginfo();
		   $data['storeinfo']      = $settinginfo;
	       $data['currency']=$this->order_model->currencysetting($settinginfo->currency);

		   $data['module'] = "ordermanage";
		   $data['page']   = "invoice";   

		   echo Modules::run('template/layout', $data); 
		   /* }
		   else{
			   redirect("ordermanage/order/orderlist/"); 
			   }*/
		}
	/*order invoice for post*/
		public function pos_order_invoice($id){
			$saveid=$this->session->userdata('id');
		   $isadmin=$this->session->userdata('user_type');
		   $customerorder=$this->order_model->read('*', 'customer_order', array('order_id' => $id));
		    $updatetData = array('nofification' => 1);
		    $this->db->where('order_id',$id);
		    $this->db->update('customer_order',$updatetData);
		   //if($customerorder->waiter_id==$saveid || $isadmin==1){
		   $data['orderinfo']  	   = $customerorder;
		   $data['customerinfo']   = $this->order_model->read('*', 'customer_info', array('customer_id' => $customerorder->customer_id));
		   $data['iteminfo']       = $this->order_model->customerorder($id);
		   $data['billinfo']	   = $this->order_model->billinfo($id);
		   $settinginfo=$this->order_model->settinginfo();
		   $data['storeinfo']      = $settinginfo;
	       $data['currency']=$this->order_model->currencysetting($settinginfo->currency);
 
		   $this->load->view('ordermanage/invoice_pos', $data);  
		   //echo Modules::run('template/layout', $data); 
		   /* }
		   else{
			   redirect("ordermanage/order/orderlist/"); 
			   }*/
		}

	public function orderdetails($id){
			$saveid=$this->session->userdata('id');
		   $isadmin=$this->session->userdata('user_type');
		   $customerorder=$this->order_model->read('*', 'customer_order', array('order_id' => $id));
		    $updatetData = array('nofification' => 1);
		    $this->db->where('order_id',$id);
		    $this->db->update('customer_order',$updatetData);
		   //if($customerorder->waiter_id==$saveid || $isadmin==1){
		   $data['orderinfo']  	   = $customerorder;
		   $data['customerinfo']   = $this->order_model->read('*', 'customer_info', array('customer_id' => $customerorder->customer_id));
		   $data['iteminfo']       = $this->order_model->customerorder($id);
		   $data['billinfo']	   = $this->order_model->billinfo($id);
		   $settinginfo=$this->order_model->settinginfo();
		   $data['storeinfo']      = $settinginfo;
	       $data['currency']=$this->order_model->currencysetting($settinginfo->currency);

		   $data['module'] = "ordermanage";
		   $data['page']   = "details";   
		   echo Modules::run('template/layout', $data); 
		   /* }
		   else{
			   redirect("ordermanage/order/orderlist/"); 
			   }*/
		}
		public function orderdetailspop($id){
			$saveid=$this->session->userdata('id');
		   $isadmin=$this->session->userdata('user_type');
		   $customerorder=$this->order_model->read('*', 'customer_order', array('order_id' => $id));
		    $updatetData = array('nofification' => 1);
		    $this->db->where('order_id',$id);
		    $this->db->update('customer_order',$updatetData);
		   $data['orderinfo']  	   = $customerorder;
		   $data['customerinfo']   = $this->order_model->read('*', 'customer_info', array('customer_id' => $customerorder->customer_id));
		   $data['iteminfo']       = $this->order_model->customerorder($id);
		   $data['billinfo']	   = $this->order_model->billinfo($id);
		   $settinginfo=$this->order_model->settinginfo();
		   $data['storeinfo']      = $settinginfo;
	       $data['currency']=$this->order_model->currencysetting($settinginfo->currency);

		   $data['module'] = "ordermanage";
		   $data['page']   = "details";   
		   $this->load->view('ordermanage/details', $data);
		  
		}
		/*details page for pos*/
		public function orderdetails_post($id){
			$saveid=$this->session->userdata('id');
		   $isadmin=$this->session->userdata('user_type');
		   $customerorder=$this->order_model->read('*', 'customer_order', array('order_id' => $id));
		    $updatetData = array('nofification' => 1);
		    $this->db->where('order_id',$id);
		    $this->db->update('customer_order',$updatetData);
		   //if($customerorder->waiter_id==$saveid || $isadmin==1){
		   $data['orderinfo']  	   = $customerorder;
		   $data['customerinfo']   = $this->order_model->read('*', 'customer_info', array('customer_id' => $customerorder->customer_id));
		   $data['iteminfo']       = $this->order_model->customerorder($id);
		   $data['billinfo']	   = $this->order_model->billinfo($id);
		   $settinginfo=$this->order_model->settinginfo();
		   $data['storeinfo']      = $settinginfo;
	       $data['currency']=$this->order_model->currencysetting($settinginfo->currency);
  
		   $this->load->view('ordermanage/details',$data);
		   //echo Modules::run('template/layout', $data); 
		   /* }
		   else{
			   redirect("ordermanage/order/orderlist/"); 
			   }*/
		}
	public function posorderinvoice($id){
			$saveid=$this->session->userdata('id');
		   $isadmin=$this->session->userdata('user_type');
		   $customerorder=$this->order_model->read('*', 'customer_order', array('order_id' => $id));
		    $updatetData = array('nofification' => 1);
		    $this->db->where('order_id',$id);
		    $this->db->update('customer_order',$updatetData);
		   //if($customerorder->waiter_id==$saveid || $isadmin==1){
		   $data['orderinfo']  	   = $customerorder;
		  $data['customerinfo']   = $this->order_model->read('*', 'customer_info', array('customer_id' => $customerorder->customer_id));
		   $data['iteminfo']       = $this->order_model->customerorder($id);
		   $data['billinfo']	   = $this->order_model->billinfo($id);
		   $settinginfo=$this->order_model->settinginfo();
		   $data['settinginfo']=$settinginfo;
		   $data['storeinfo']      = $settinginfo;
	       $data['currency']=$this->order_model->currencysetting($settinginfo->currency);

		   $data['module'] = "ordermanage";
		   $data['page']   = "posinvoice";   
		   $view = $this->load->view('posinvoice',$data,true);
		   echo $view;exit;
		   //echo Modules::run('template/layout', $data); 
		   /* }
		   else{
			   redirect("ordermanage/order/orderlist/"); 
			   }*/
		}
	public function posprintdirect($id){
			$saveid=$this->session->userdata('id');
		   $isadmin=$this->session->userdata('user_type');
		   $customerorder=$this->order_model->read('*', 'customer_order', array('order_id' => $id));
		    $updatetData = array('nofification' => 1);
		    $this->db->where('order_id',$id);
		    $this->db->update('customer_order',$updatetData);
		   //if($customerorder->waiter_id==$saveid || $isadmin==1){
		   $data['orderinfo']  	   = $customerorder;
		  $data['customerinfo']   = $this->order_model->read('*', 'customer_info', array('customer_id' => $customerorder->customer_id));
		   $data['iteminfo']       = $this->order_model->customerorder($id);
		   $data['billinfo']	   = $this->order_model->billinfo($id);
		   $settinginfo=$this->order_model->settinginfo();
		   $data['settinginfo']=$settinginfo;
		   $data['storeinfo']      = $settinginfo;
	       $data['currency']=$this->order_model->currencysetting($settinginfo->currency);

		   $data['module'] = "ordermanage";
		   $data['page']   = "posinvoice";   
		   //$view = $this->load->view('posinvoicedirectprint',$data,TRUE);

		   //return $view;
		   $view = $this->load->view('posinvoicedirectprint',$data,true);
		   echo $view;exit;
		   //echo Modules::run('template/layout', $data); 
		    /*}
		   else{
			   redirect("ordermanage/order/orderlist/"); 
			   }*/
		}
	public function dueinvoice($id){
		   $saveid=$this->session->userdata('id');
		   $isadmin=$this->session->userdata('user_type');
		   $customerorder=$this->order_model->read('*', 'customer_order', array('order_id' => $id));
		   //if($customerorder->waiter_id==$saveid || $isadmin==1){
		   $data['orderinfo']  	   = $customerorder;
		   $data['customerinfo']   = $this->order_model->read('*', 'customer_info', array('customer_id' => $customerorder->customer_id));
		   $data['iteminfo']       = $this->order_model->customerorder($id);
		   $data['billinfo']	   = $this->order_model->billinfo($id);
		   $settinginfo=$this->order_model->settinginfo();
		   $data['settinginfo']=$settinginfo;
		   $data['storeinfo']      = $settinginfo;
	       $data['currency']=$this->order_model->currencysetting($settinginfo->currency);

		   $data['module'] = "ordermanage";
		   $data['page']   = "posinvoice";   
		   $view = $this->load->view('dueinvoicedirectprint',$data,true);
		   echo $view;exit;
		}
	public function postokengenerate($id,$ordstatus){
			$saveid=$this->session->userdata('id');
		   $isadmin=$this->session->userdata('user_type');
		   $customerorder=$this->order_model->read('*', 'customer_order', array('order_id' => $id));
		   //if($customerorder->waiter_id==$saveid || $isadmin==1){
		   $data['orderinfo']  	   = $customerorder;
		   $data['customerinfo']   = $this->order_model->read('*', 'customer_info', array('customer_id' => $customerorder->customer_id));
		   if(!empty($customerorder->table_no)){
		   $data['tableinfo']      = $this->order_model->read('*', 'rest_table', array('tableid' => $customerorder->table_no));
		   }
		   else{
			    $data['tableinfo']='';
			   }
		   $data['iteminfo']       = $this->order_model->customerorder($id,$ordstatus);
		   $data['billinfo']	   = $this->order_model->billinfo($id);
		   $settinginfo=$this->order_model->settinginfo();
		   $data['settinginfo']=$settinginfo;
		   $data['storeinfo']      = $settinginfo;
	       $data['currency']=$this->order_model->currencysetting($settinginfo->currency);

		   $data['module'] = "ordermanage";
		   $data['page']   = "posinvoice";   
		   
		   $view = $this->load->view('postoken', $data,true);

		   return $view;
		   //echo Modules::run('template/layout', $data); 
		   
		}
	public function postokengenerateupdate($id,$ordstatus){
			$saveid=$this->session->userdata('id');
		   $isadmin=$this->session->userdata('user_type');
		   $customerorder=$this->order_model->read('*', 'customer_order', array('order_id' => $id));
		   //if($customerorder->waiter_id==$saveid || $isadmin==1){
		   $data['orderinfo']  	   = $customerorder;
		   $data['customerinfo']   = $this->order_model->read('*', 'customer_info', array('customer_id' => $customerorder->customer_id));
		   if(!empty($customerorder->table_no)){
		   $data['tableinfo']      = $this->order_model->read('*', 'rest_table', array('tableid' => $customerorder->table_no));
		   }
		   else{
			    $data['tableinfo']='';
			   }
		   $data['exitsitem']      = $this->order_model->customerorder($id);
		   $data['iteminfo']       = $this->order_model->customerorder($id,$ordstatus);
		   $data['billinfo']	   = $this->order_model->billinfo($id);
		   $settinginfo=$this->order_model->settinginfo();
		   $data['settinginfo']=$settinginfo;
		   $data['storeinfo']      = $settinginfo;
	       $data['currency']=$this->order_model->currencysetting($settinginfo->currency);

		   $data['module'] = "ordermanage";
		   $data['page']   = "posinvoice";   
		   
		   $view = $this->load->view('postoken', $data);
		   echo $view;
		   $this->db->where('ordid',$id)->delete('tbl_updateitems');
            $updatetData = array(
				   'isupdate' =>NULL,
				  );
		        $this->db->where('order_id',$id);
				$this->db->update('order_menu',$updatetData);
		}
	public function tokenupdate($id){
			$this->db->where('ordid',$id)->delete('tbl_updateitems');
            $updatetData = array(
				   'isupdate' =>NULL,
				  );
		        $this->db->where('order_id',$id);
				$this->db->update('order_menu',$updatetData);
		}
	public function postokengeneratesame($id,$ordstatus){
			$saveid=$this->session->userdata('id');
		   $isadmin=$this->session->userdata('user_type');
		   $customerorder=$this->order_model->read('*', 'customer_order', array('order_id' => $id));
		   $data['orderinfo']  	   = $customerorder;
		   $data['customerinfo']   = $this->order_model->read('*', 'customer_info', array('customer_id' => $customerorder->customer_id));
		   if(!empty($customerorder->table_no)){
		   $data['tableinfo']      = $this->order_model->read('*', 'rest_table', array('tableid' => $customerorder->table_no));
		   }
		   else{
			    $data['tableinfo']='';
			   }
		   $data['iteminfo']       = $this->order_model->customerorder($id,$ordstatus);
		   $data['billinfo']	   = $this->order_model->billinfo($id);
		   $settinginfo=$this->order_model->settinginfo();
		   $data['settinginfo']=$settinginfo;
		   $data['storeinfo']      = $settinginfo;
	       $data['currency']=$this->order_model->currencysetting($settinginfo->currency);

		   $data['module'] = "ordermanage";
		   $data['page']   = "posinvoice";   
		   $this->load->view('postoken2',$data);
		}
	public function paymentgateway($orderid,$paymentid){
		  $data['orderinfo']  	       = $this->order_model->read('*', 'customer_order', array('order_id' => $orderid));
		  $data['paymentinfo']  	   = $this->order_model->read('*', 'paymentsetup', array('paymentid' => $paymentid));
		  $paymentinfo=$this->order_model->read('*', 'paymentsetup', array('paymentid' => $paymentid));
		  $data['customerinfo']  	   = $this->order_model->read('*', 'customer_info', array('customer_id' => $data['orderinfo']->customer_id));
		  $customer=$this->order_model->read('*', 'customer_info', array('customer_id' => $data['orderinfo']->customer_id));
		  $bill  	   = $this->order_model->read('*', 'bill', array('order_id' => $orderid));
		  $data['billinfo']  	   = $this->order_model->read('*', 'bill_card_payment', array('bill_id' => $bill->bill_id));
		  
		   $data['iteminfo']       = $this->order_model->customerorder($orderid);
		   $data['mybill']	   = $this->order_model->billinfo($orderid);
		   $settinginfo=$this->order_model->settinginfo();
		   $data['storeinfo']      = $settinginfo;
	       $data['currency']=$this->order_model->currencysetting($settinginfo->currency);
		  
		  
		  $data['module'] = "ordermanage";
		  //print_r($data['orderinfo']);
		  if($paymentid==5){
			  
				 
			$full_name = $customer->customer_name;
			$email = $customer->customer_email;
			$phone = $customer->customer_phone;
			$amount =  $bill->bill_amount;
			$transactionid = $orderid;
			$address = $customer->customer_address;
			
			$post_data = array();
			$post_data['store_id'] = SSLCZ_STORE_ID;
			$post_data['store_passwd'] = SSLCZ_STORE_PASSWD;
			$post_data['total_amount'] =  $bill->bill_amount;
			$post_data['currency'] = $paymentinfo->currency;
			$post_data['tran_id'] = $orderid;
			$post_data['success_url'] =  base_url()."ordermanage/order/successful/".$orderid;
			$post_data['fail_url'] = base_url()."ordermanage/order/fail/".$orderid;
			$post_data['cancel_url'] = base_url()."ordermanage/order/cancilorder/".$orderid;
			# $post_data['multi_card_name'] = "mastercard,visacard,amexcard";  # DISABLE TO DISPLAY ALL AVAILABLE

			# EMI INFO
			# $post_data['emi_option'] = "0"; 	if "1" then remove comment emi_max_inst_option and emi_selected_inst
			# $post_data['emi_max_inst_option'] = "9";
			# $post_data['emi_selected_inst'] = "9";

			# CUSTOMER INFORMATION
			$post_data['cus_name'] = $customer->customer_name;
			$post_data['cus_email'] = $customer->customer_email;
			$post_data['cus_add1'] = $customer->customer_address;
			$post_data['cus_add2'] = "";
			$post_data['cus_city'] = "";
			$post_data['cus_state'] = "";
			$post_data['cus_postcode'] = "";
			$post_data['cus_country'] = "";
			$post_data['cus_phone'] = $customer->customer_phone;
			$post_data['cus_fax'] = "";

			# SHIPMENT INFORMATION
			$post_data['ship_name'] = "";
			$post_data['ship_add1 '] = "";
			$post_data['ship_add2'] = "";
			$post_data['ship_city'] = "";
			$post_data['ship_state'] = "";
			$post_data['ship_postcode'] = "";
			$post_data['ship_country'] = "";

			# OPTIONAL PARAMETERS
			$post_data['value_a'] = "";
			$post_data['value_b '] = "";
			$post_data['value_c'] = "";
			$post_data['value_d'] = "";

			$this->load->library('session');
			$session = array(
				'tran_id' => $post_data['tran_id'],
				'amount' => $post_data['total_amount'],
				'currency' => $post_data['currency']
			);
			$this->session->set_userdata('tarndata', $session);
			$this->load->library('sslcommerz');
			echo "<h3>Wait...SSLCOMMERZ Payment Processing....</h3>";
			//print_r($post_data);
			if($this->sslcommerz->RequestToSSLC($post_data, false))
			{
		        //$this->load->view('android/fails');
				redirect('ordermanage/order/fail/'.$orderid);
			}
		 $data['page']   = "checkout";   
		 //$this->load->view('ordermanage/checkout', $data); 
		  }
		  else if($paymentid==3){
			   $data['page']   = "paypal";   
		       $this->load->view('ordermanage/paypal', $data);
			  }
		 else if($paymentid==2){
			   $data['page']   = "2checkout"; 
			    echo Modules::run('template/layout', $data);   
		       //$this->load->view('ordermanage/2checkout', $data);
			  }
		}
	public function successful($orderid){
		   $billinfo = $this->order_model->read('*', 'bill', array('order_id' => $orderid));
		   $orderinfo  	       = $this->order_model->read('*', 'customer_order', array('order_id' => $orderid));
		   $customerid 	   = $orderinfo->customer_id;
		   $updatetData =array('bill_status'     => 1);
			$this->db->where('order_id',$orderid);
			$this->db->update('bill',$updatetData);
			
			$updatetDataord = array('order_status'     => 4);
		    $this->db->where('order_id',$orderid);
			$this->db->update('customer_order',$updatetDataord);
		   $this->session->set_flashdata('message', display('order_successfully'));
		   //$this->lsoft_setting->send_sms($orderid,$customerid,$type="CompleteOrder");
			redirect('ordermanage/order/pos_invoice/'.$orderid);	
		}	
	public function successful2(){
		$orderid=$this->input->post('li_0_name');
		
		   $billinfo = $this->order_model->read('*', 'bill', array('order_id' => $orderid));
		   $orderinfo  	       = $this->order_model->read('*', 'customer_order', array('order_id' => $orderid));
		   $customerid 	   = $orderinfo->customer_id;
		   $updatetData = array('bill_status'     => 1);
		$this->db->where('order_id',$orderid);
		$this->db->update('bill',$updatetData);
		
		$updatetDataord = array('order_status'     => 4);
		    $this->db->where('order_id',$orderid);
			$this->db->update('customer_order',$updatetDataord);
		$this->session->set_flashdata('message', display('order_successfully'));
		//$this->lsoft_setting->send_sms($orderid,$customerid,$type="CompleteOrder");
			if(empty($this->session->userdata('id'))){
				redirect('hungry/orderdelevered/001');	
				}
			else{
			redirect('ordermanage/order/pos_invoice/'.$orderid);	
			}
		}		
	public function fail($orderid){
		$this->session->set_flashdata('message', display('order_fail'));
		redirect('ordermanage/order/pos_invoice');			
		}	
	public function cancilorder($orderid){
		  $this->session->set_flashdata('message', display('order_fail'));
		  redirect('ordermanage/order/pos_invoice');
		}
	public function allkitchen(){
		if($this->permission->method('ordermanage','read')->access()==FALSE){
			redirect('dashboard/auth/logout');
		}
		   $uid=$this->session->userdata('id');
			$assignketchen=$this->db->select('user.id,tbl_assign_kitchen.kitchen_id,tbl_assign_kitchen.userid,tbl_kitchen.kitchen_name')->from('tbl_assign_kitchen')->join('user','user.id=tbl_assign_kitchen.userid','left')->join('tbl_kitchen','tbl_kitchen.kitchenid=tbl_assign_kitchen.kitchen_id')->where('tbl_assign_kitchen.userid',$uid)->get()->result();
			if(!empty($assignketchen)){
			$data['kitchenlist']=$assignketchen;
			foreach($assignketchen as $kitchen){
				  $data['kitcheninfo'][$i]['kitchenid']=$kitchen->kitchen_id;
				  $orderinfo=$this->order_model->kitchen_ongoingorder($kitchen->kitchen_id);
				  
				  if(!empty($orderinfo)){
				  $m=0;
				  foreach($orderinfo as $orderlist){
					  $billtotal=round($onprocess->totalamount);
					  if(($onprocess->orderacceptreject==0 || empty($onprocess->orderacceptreject)) && ($onprocess->cutomertype==2)){}
					  else{
						  $data['kitcheninfo'][$i]['orderlist'][$m]=$orderlist;
						 $data['kitcheninfo'][$i]['iteminfo'][$m]= $this->order_model->customerorderkitchen($orderlist->order_id,$kitchen->kitchen_id);
				  		  $m++;
					  }
				  }
			  	  }
				  $i++;
				  }
			}
			else{
			  $kitchenlist=$this->db->select('kitchenid as kitchen_id,kitchen_name')->from('tbl_kitchen')->order_by('kitchen_name','Asc')->get()->result();
			   $output=array();
			  $i=0;
			  foreach($kitchenlist as $kitchen){
				  $data['kitcheninfo'][$i]['kitchenid']=$kitchen->kitchen_id;
				  $orderinfo=$this->order_model->kitchen_ongoingorder($kitchen->kitchen_id);
				  
				  if(!empty($orderinfo)){
				  $m=0;
				  foreach($orderinfo as $orderlist){
					  $billtotal=round($onprocess->totalamount);
					  if(($onprocess->orderacceptreject==0 || empty($onprocess->orderacceptreject)) && ($onprocess->cutomertype==2)){}
					  else{
						  $data['kitcheninfo'][$i]['orderlist'][$m]=$orderlist;
						 $data['kitcheninfo'][$i]['iteminfo'][$m]= $this->order_model->customerorderkitchen($orderlist->order_id,$kitchen->kitchen_id);
				  		  $m++;
					  }
				  }
			  	  }
				  $i++;
				  }
				$data['kitchenlist']=$kitchenlist;
				}
		   $data['title']="Counter Dashboard";
		   $data['module'] = "ordermanage";
		   $data['page']   = "allkitchen";   
		   echo Modules::run('template/layout', $data); 
		}
	public function kitchen($kitchenid=null){
		if($this->permission->method('ordermanage','read')->access()==FALSE){
			redirect('dashboard/auth/logout');
		}
		   //$data['title'] = display('add_order');
		   $data['title']="Kitchen Dashboard";
		   $data['ongoingorder']  = $this->order_model->kitchen_ongoingorder($kitchenid);
		   $settinginfo=$this->order_model->settinginfo();
		   $data['settinginfo']=$settinginfo;
		   $data['kitchenid']=$kitchenid;
		   $data['currency']=$this->order_model->currencysetting($settinginfo->currency);
		   $data['module'] = "ordermanage";
		   $data['page']   = "kitchen";   
		   echo Modules::run('template/layout', $data); 
		}
		public function checkorder(){
		if($this->permission->method('ordermanage','read')->access()==FALSE){
			redirect('dashboard/auth/logout');
		}
		   $orderid=$this->input->post('orderid');
		   $kid=$this->input->post('kid');
		   $data['title']="Kitchen Dashboard";
		   $data['kitchenid']=$kid;
		   $data['orderinfo']= $this->order_model->read('*', 'customer_order', array('order_id' => $orderid));
		   $data['itemlist']= $this->order_model->customerorderkitchen($orderid,$kid);
		   $data['module'] = "ordermanage";
		   $data['page']   = "kitchen_view";   
		   $this->load->view('ordermanage/kitchen_view', $data); 
		}
		public function itemacepted(){
			if($this->permission->method('ordermanage','read')->access()==FALSE){
			redirect('dashboard/auth/logout');
			}
		   		$orderid=$this->input->post('orderid');
		   		$kitid=$this->input->post('kitid');
				$itemid=$this->input->post('itemid');
				$varient=$this->input->post('varient');
				
				$itemids=explode(',',$itemid);
				$varientids=explode(',',$varient);
				$i=0;
				foreach($itemids as $sitem){
					$vaids=$varientids[$i];
					$isexit=$this->db->select('tbl_kitchen_order.*')->from('tbl_kitchen_order')->where('orderid',$orderid)->where('kitchenid',$kitid)->where('itemid',$sitem)->where('varient',$vaids)->get()->num_rows();
					if($isexit>0){}
					else{
						$kitchenorder = array(
						'kitchenid' => $kitid,
						'orderid'     => $orderid,
						'itemid'     => $sitem,
						'varient'     => $vaids
					  );
					 $this->db->insert('tbl_kitchen_order',$kitchenorder);
					}
					$i++;
				}
				$alliteminfo=$this->order_model->customerorderkitchen($orderid,$kitid);
					$allchecked="";
					foreach($alliteminfo as $single){
						$allisexit=$this->db->select('tbl_kitchen_order.*')->from('tbl_kitchen_order')->where('orderid',$orderid)->where('kitchenid',$kitid)->where('itemid',$single->menu_id)->where('varient',$single->variantid)->get()->num_rows();
						//echo $this->db->last_query();
						if($allisexit>0){
						$allchecked.="1,";
						}
					else{
						$allchecked.="0,";
						}
					}
					
				if( strpos($allchecked, '0') !== false ) {
					       echo 0;
				            }
        				 else{
        					 echo 1;
        					 }
		}
		public function itemisready(){
		if($this->permission->method('ordermanage','read')->access()==FALSE){
			redirect('dashboard/auth/logout');
		}
		    $orderid=$this->input->post('orderid');
		    $menuid=$this->input->post('menuid');
			$varient=$this->input->post('varient');
		    $status=$this->input->post('status');
		    $updatetData =array('food_status'     => $status);
			$this->db->where('order_id',$orderid);
			$this->db->where('menu_id',$menuid);
			$this->db->where('varientid',$varient);
			$this->db->update('order_menu',$updatetData);
			
    		 $updatetData2 = array('order_status'     => 2);
    		 $this->db->where('order_id',$orderid);
    		 $this->db->update('customer_order',$updatetData2);
			$orderinformation= $this->order_model->read('*', 'customer_order', array('order_id' => $orderid));
			$allemployee =$this->db->select('*')->from('user')->where('id',$orderinformation->waiter_id)->get()->row();
			$item= $this->order_model->read('*', 'item_foods', array('ProductsID'=>$menuid));
			if($status==1){
			       $ready="Food Is Ready";
					 //push 
            		$senderid[]=$allemployee->waiter_kitchenToken;
            		define( 'API_ACCESS_KEY', 'AAAAvWuiU2I:APA91bGGr8XSrxX1A_XkpbFkKu8KjT-UU0wgCjar1mHKVkT575rgq5cVUcqj2-2p-eEzHV-GtEH04d75yAccgoyZ3DM5YZPfp6OxYSMs-c_9nTVQLNOMksM9rWRv5zmBUpDqnPgLFj-E');
				$registrationIds = $senderid;
				$msg = array
				(
					'message' 					=> "Orderid: ".$orderid.", Item Name: ".$item->ProductName." Amount:".$orderinformation->totalamount,
					'title'						=> "Food Is Ready.",
					'subtitle'					=> $orderid,
					'tickerText'				=> "TSET",
					'vibrate'					=> 1,
					'sound'						=> 1,
					'largeIcon'					=> "TSET",
					'smallIcon'					=> "TSET"
				);
				$fields2 = array
				(
					'registration_ids' 	=> $registrationIds,
					'data'			=> $msg
				);
				 
				$headers2 = array
				(
					'Authorization: key=' . API_ACCESS_KEY,
					'Content-Type: application/json'
				);
				 
				$ch2 = curl_init();
				curl_setopt( $ch2,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
				curl_setopt( $ch2,CURLOPT_POST, true );
				curl_setopt( $ch2,CURLOPT_HTTPHEADER, $headers2 );
				curl_setopt( $ch2,CURLOPT_RETURNTRANSFER, true );
				curl_setopt( $ch2,CURLOPT_SSL_VERIFYPEER, false );
				curl_setopt( $ch2,CURLOPT_POSTFIELDS, json_encode( $fields2 ) );
				$result2 = curl_exec($ch2 );
				curl_close( $ch2 );
			}
			else{
					 $ready="Food Is Cooking";
					 //push 
            		$senderid[]=$allemployee->waiter_kitchenToken;
            		define( 'API_ACCESS_KEY', 'AAAAvWuiU2I:APA91bGGr8XSrxX1A_XkpbFkKu8KjT-UU0wgCjar1mHKVkT575rgq5cVUcqj2-2p-eEzHV-GtEH04d75yAccgoyZ3DM5YZPfp6OxYSMs-c_9nTVQLNOMksM9rWRv5zmBUpDqnPgLFj-E');
				$registrationIds = $senderid;
				$msg = array
				(
					'message' 					=> "Orderid: ".$orderid.", Item Name: ".$item->ProductName." Amount:".$orderinformation->totalamount,
					'title'						=> "Processing",
					'subtitle'					=> $orderid,
					'tickerText'				=> "TSET",
					'vibrate'					=> 1,
					'sound'						=> 1,
					'largeIcon'					=> "TSET",
					'smallIcon'					=> "TSET"
				);
				$fields2 = array
				(
					'registration_ids' 	=> $registrationIds,
					'data'			=> $msg
				);
				 
				$headers2 = array
				(
					'Authorization: key=' . API_ACCESS_KEY,
					'Content-Type: application/json'
				);
				 
				$ch2 = curl_init();
				curl_setopt( $ch2,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
				curl_setopt( $ch2,CURLOPT_POST, true );
				curl_setopt( $ch2,CURLOPT_HTTPHEADER, $headers2 );
				curl_setopt( $ch2,CURLOPT_RETURNTRANSFER, true );
				curl_setopt( $ch2,CURLOPT_SSL_VERIFYPEER, false );
				curl_setopt( $ch2,CURLOPT_POSTFIELDS, json_encode( $fields2 ) );
				$result2 = curl_exec($ch2 );
				curl_close( $ch2 );
				/*End Notification*/
				 }
			echo $status;
		   
		}
		public function orderisready(){
		if($this->permission->method('ordermanage','read')->access()==FALSE){
			redirect('dashboard/auth/logout');
		}
		    $orderid=$this->input->post('orderid');
			$allfood=$this->input->post('itemid');
			$kid=$this->input->post('kid');
			 $allfood_id=explode(",",$allfood);
				   foreach($allfood_id as $foodid){
				     $updatetready = array(
				        'allfoodready'           => 1
				        );
		        $this->db->where('order_id',$orderid);
		        $this->db->where('menu_id',$foodid);
				$this->db->update('order_menu',$updatetready);
				//echo $this->db->last_query();
				   }
		    $data['ongoingorder']  = $this->order_model->kitchen_ongoingorder($kid);
			$data['page']   = "kitchen_load";   
		    $this->load->view('ordermanage/kitchen_load', $data); 
		   
		}
	public function counterboard(){
			if($this->permission->method('ordermanage','read')->access()==FALSE){
			  redirect('dashboard/auth/logout');
		    }
		   $data['title']="Counter Dashboard";
		   $data['counterorder']  = $this->order_model->counter_ongoingorder();
		   $settinginfo=$this->order_model->settinginfo();
		   $data['settinginfo']=$settinginfo;
		   $data['currency']=$this->order_model->currencysetting($settinginfo->currency);
		   $data['module'] = "ordermanage";
		   $data['page']   = "counter";   
		   echo Modules::run('template/layout', $data); 
		}

	/*22-09*/
	public function showpaymentmodal($id,$type=null){
		
		$array_id  = array('order_id' => $id);
		$order_info = $this->order_model->read('*','customer_order',$array_id);

		$data['order_info'] = $order_info;
		$data['ismerge'] = 0;
		$data['paymentmethod']   = $this->order_model->pmethod_dropdown();
		   $data['banklist']      = $this->order_model->bank_dropdown();
		   $data['terminalist']   = $this->order_model->allterminal_dropdown();
		if($type == null){
		$this->load->view('ordermanage/paymodal',$data); 
		}
		else{
			$this->load->view('ordermanage/newpaymentveiw',$data); 
		}
	}
	
	public function mergemodal(){
		$orderids=$this->input->post('orderid');
		$allorder=trim($orderids,',');
		$data['order_info'] = $this->order_model->selectmerge($allorder);
		//print_r($data['order_info']);
		$data['ismerge'] = 1;
		$data['paymentmethod']   = $this->order_model->pmethod_dropdown();
		$data['banklist']      = $this->order_model->bank_dropdown();
		$data['terminalist']   = $this->order_model->allterminal_dropdown();
		$this->load->view('ordermanage/paymodal',$data); 
	}

	public function paymultiple(){
		$postdata=$this->input->post();
		$orderid                 = $this->input->post('orderid');
		$paytype                 = $this->input->post('paytype');
		$cterminal                 = $this->input->post('card_terminal');
		$mybank                  = $this->input->post('bank');
		$mydigit                 = $this->input->post('last4digit');
		$payamonts              =$this->input->post('paidamount');
		$paidamount =0;
		$i=0;
		$billinfo = $this->db->select('*')->from('bill')->where('order_id',$orderid)->get()->row();
		foreach ($payamonts  as $payamont) {
			$paidamount = $paidamount+$payamont;
			$data_pay = array('paytype' => $paytype[$i],'cterminal' => $cterminal[$i],
				'mybank' => $mybank[$i],'mydigit' => $mydigit[$i],'payamont' => $payamont);
			$this->add_multipay($orderid,$billinfo->bill_id,$data_pay);
			$i++;
		}
		
		//print_r($dataup);
		$orderinfo = $this->order_model->uniqe_order_id($orderid);
		//print_r($orderinfo);exit;
		$duevalue = ($orderinfo->totalamount-$orderinfo->customerpaid);
		if($paidamount == $duevalue || $duevalue <  $paidamount ){
			$paidamount  = $paidamount+$orderinfo->customerpaid;
			$status =4;
		}
		else{
			$paidamount  = $paidamount+$orderinfo->customerpaid;

			$status =3;
		}
		//echo $paidamount; echo $status;
			$saveid=$this->session->userdata('id');
		     $updatetData = array(
				   'order_status'     => $status,
				  );
		        $this->db->where('order_id',$orderid);
				$this->db->update('customer_order',$updatetData);
				//Update Bill Table
				if($status == 4){
				$updatetbill = array(
				   'bill_status'           => 1,
				   'payment_method_id'     => $paytype[0],
				   'create_by'     		   => $saveid,
				  );
		        $this->db->where('order_id',$orderid);
				$this->db->update('bill',$updatetbill);
				}
				
				if(!empty($billinfo)){
					$billid=$billinfo->bill_id;
					if($paidamount>=0){
							$paidData = array(
							   'customerpaid'     =>$paidamount
							  );
		        			$this->db->where('order_id',$orderid);
							$this->db->update('customer_order',$paidData);
					   }
					 else{
						  $paidData = array(
							   'customerpaid'     =>$billinfo->bill_amount
							  );
		        			$this->db->where('order_id',$orderid);
							$this->db->update('customer_order',$paidData);
						  }
					
					}
					if($status==4){
						$orderinfo=$this->db->select('*')->from('customer_order')->where('order_id',$orderid)->get()->row();
				  		$cusinfo = $this->db->select('*')->from('customer_info')->where('customer_id',$orderinfo->customer_id)->get()->row();
						  // Income for company
							 $saveid=$this->session->userdata('id');
					         $income = array(
							  'VNo'            => "Sale".$orderinfo->saleinvoice,
							  'Vtype'          => 'Sales Products',
							  'VDate'          =>  $orderinfo->order_date,
							  'COAID'          => 303,
							  'Narration'      => 'Sale Income For '.$cusinfo->cuntomer_no.'-'.$cusinfo->customer_name,
							  'Debit'          => 0,
							  'Credit'         => $orderinfo->totalamount,//purchase price asbe
							  'IsPosted'       => 1,
							  'CreateBy'       => $saveid,
							  'CreateDate'     => $orderinfo->order_date,
							  'IsAppove'       => 1
							);
					         $this->db->insert('acc_transaction',$income);
							 
							
							 
						}
				  
				  
		 
		
		 $logData =array(
	   'action_page'         => "Order List",
	   'action_done'     	 => "Insert Data", 
	   'remarks'             => "Order is Update",
	   'user_name'           => $this->session->userdata('fullname'),
	   'entry_date'          => date('Y-m-d H:i:s'),
	  );
	     $this->logs_model->log_recorded($logData);
		 $this->savekitchenitem($orderid);
		 $data['ongoingorder']  = $this->order_model->get_ongoingorder();
		 $data['module'] = "ordermanage";
		 $data['page']   = "updateorderlist"; 
		 $view = $this->posprintdirect($orderid);
				//echo $view;//work//////
		 echo $view;exit;
	}
	public function savekitchenitem($orderid){
		$this->db->select('order_menu.*,item_foods.kitchenid');
        $this->db->from('order_menu');		
		$this->db->join('item_foods','order_menu.menu_id=item_foods.ProductsID','Left');
		$this->db->where('order_menu.order_id',$orderid);
		$query = $this->db->get();
		$result=$query->result();
		
		foreach($result as $single){
				$isexist=$this->db->select('*')->from('tbl_kitchen_order')->where('kitchenid',$single->kitchenid)->where('orderid',$single->order_id)->where('itemid',$single->menu_id)->where('varient',$single->varientid)->get()->row();
				if(empty($isexist)){
						$inserekit=array(
							'kitchenid'			=>	$single->kitchenid,
							'orderid'			=>	$single->order_id,
							'itemid'		    =>	$single->menu_id,
							'varient'		    =>	$single->varientid,
							);
						$this->db->insert('tbl_kitchen_order',$inserekit);
					}
				$updatetmenu = array(
				   'food_status'           => 1,
				   'allfoodready'     	   => 1
				  );
		        $this->db->where('order_id',$orderid);
				$this->db->update('order_menu',$updatetmenu);
			}
		} 
	public function add_multipay($orderid,$billid,$array_post){

		$multipay=array(
							'order_id'			=>	$orderid,
							'payment_type_id'	=>	$array_post['paytype'],
							'amount'		    =>	$array_post['payamont'],
							);

		$this->db->insert('multipay_bill',$multipay);
		 $multipay_id = $this->db->insert_id();
		 $orderinfo=$this->db->select('*')->from('customer_order')->where('order_id',$orderid)->get()->row();
		 $cusinfo = $this->db->select('*')->from('customer_info')->where('customer_id',$orderinfo->customer_id)->get()->row();
		 if($array_post['paytype']!=1){
		 if($array_post['paytype']==4){
			 $headcode=1020101;
			 }
		  else{
			  $paytype=$this->db->select('payment_method')->from('payment_method')->where('payment_method_id',$array_post['paytype'])->get()->row();
			  $coainfo=$this->db->select('HeadCode')->from('acc_coa')->where('HeadName',$paytype->payment_method)->get()->row();
			  $headcode=$coainfo->HeadCode;
			  }
			  				// Income for company
							 $income3 = array(
							  'VNo'            => "Sale".$orderinfo->saleinvoice,
							  'Vtype'          => 'Sales Products',
							  'VDate'          =>  $orderinfo->order_date,
							  'COAID'          => $headcode,
							  'Narration'      => 'Sale Income For Online payment'.$cusinfo->cuntomer_no.'-'.$cusinfo->customer_name,
							  'Debit'          => $array_post['payamont'],
							  'Credit'         => 0,
							  'IsPosted'       => 1,
							  'CreateBy'       => $saveid,
							  'CreateDate'     => $orderinfo->order_date,
							  'IsAppove'       => 1
							);
					         $this->db->insert('acc_transaction',$income3);
			  
		 }
		  
		if($array_post['paytype']==1){
						$cardinfo=array(
							'bill_id'			    =>	$billid,
							'multipay_id'			=>	$multipay_id,
							'card_no'		        =>	$array_post['mydigit'],
							'terminal_name'		    =>	$array_post['cterminal'],
							'bank_name'	            =>	$array_post['mybank'],
							);
								
						$this->db->insert('bill_card_payment',$cardinfo);
						$bankinfo=$this->db->select('bank_name')->from('tbl_bank')->where('bankid',$array_post['mybank'])->get()->row();
						$coainfo=$this->db->select('HeadCode')->from('acc_coa')->where('HeadName',$bankinfo->bank_name)->get()->row();
						
						$saveid=$this->session->userdata('id');
					         $income2 = array(
							  'VNo'            => "Sale".$orderinfo->saleinvoice,
							  'Vtype'          => 'Sales Products',
							  'VDate'          =>  $orderinfo->order_date,
							  'COAID'          => $coainfo->HeadCode,
							  'Narration'      => 'Sale Income For '.$cusinfo->cuntomer_no.'-'.$cusinfo->customer_name,
							  'Debit'          => $array_post['payamont'],
							  'Credit'         => 0,
							  'IsPosted'       => 1,
							  'CreateBy'       => $saveid,
							  'CreateDate'     => $orderinfo->order_date,
							  'IsAppove'       => 1
							);
					         $this->db->insert('acc_transaction',$income2);
							 
							  
						}
				}
				
	public function changeMargeorder(){
		
		$data['orderamount'] = $this->input->post('paidamount');
		
		$data['rendom_number'] = generateRandomStr();
		$data['multipay'] = $this->input->post('paytype');
		$data['allcard'] = $this->input->post('card_terminal');
		$data['allbank'] = $this->input->post('bank');
		$data['alldigity'] = $this->input->post('last4digit');
		$i=0;
		foreach ($this->input->post('order') as $order_id) {
			$paytype=$this->input->post('paytype');
			$myterminal=$this->input->post('card_terminal');
			$mibank=$this->input->post('bank');
			$midigit=$this->input->post('last4digit');
			$orderinfo = $this->order_model->uniqe_order_id($order_id);
			$data['orderid'] = $order_id;
			$data['status'] = 4;
			$data['paytype'] = $paytype[$i];
			$data['cterminal'] = $myterminal[$i];
			$data['mybank'] = $mibank[$i];
			$data['mydigit'] = $midigit[$i];
			$data['customer_id'] = $orderinfo->customer_id;
			$data['paid'] = $orderinfo->totalamount;			
			$this->changestatusOrder($data);
			//$totalpaidamount = $totalpaidamount-$orderinfo->totalamount; 
			$i++;
		}
		$marge_order_id = date('Y-m-d')._.$data['rendom_number'];
		$mydata['margeid']=$marge_order_id;
		$allorderinfo=$this->order_model->margeview($marge_order_id);
		$allorderid='';
		$totalamount=0;
		$m=0;
		foreach($allorderinfo as $ordersingle){
			$mydata['billorder'][$m]=$ordersingle->order_id;
			$allorderid.=$ordersingle->order_id.',';
			$totalamount=$totalamount+$ordersingle->totalamount;
			$m++;
			}
		$mydata['billinfo']=$this->order_model->margebill($marge_order_id);
		$mydata['iteminfo']=$allorderinfo;
		$mydata['grandtotalamount']=$totalamount;
		$settinginfo=$this->order_model->settinginfo();
	   $mydata['settinginfo']=$settinginfo;
	   $mydata['storeinfo']      = $settinginfo;
	   $mydata['currency']=$this->order_model->currencysetting($settinginfo->currency);
	   echo $viewprint=$this->load->view('posmargeprint',$mydata,true); 

	}
	public function checkprint($marge_order_id){
		$mydata['margeid']=$marge_order_id;
		$allorderinfo=$this->order_model->margeview($marge_order_id);
		$allorderid='';
		$totalamount=0;
		$m=0;
		foreach($allorderinfo as $ordersingle){
			$mydata['billorder'][$m]=$ordersingle->order_id;
			$allorderid.=$ordersingle->order_id.',';
			$totalamount=$totalamount+$ordersingle->totalamount;
			
			$m++;
			}
		$mydata['billinfo']=$this->order_model->margebill($marge_order_id);
		$mydata['iteminfo']=$allorderinfo;
		$mydata['grandtotalamount']=$totalamount;
		$settinginfo=$this->order_model->settinginfo();
	    $mydata['settinginfo']=$settinginfo;
	    $mydata['storeinfo']      = $settinginfo;
	    $mydata['currency']=$this->order_model->currencysetting($settinginfo->currency);
		echo $viewprint=$this->load->view('posmargeprint',$mydata,true); 
		}
	public function changestatusOrder($value){
		$saveid=$this->session->userdata('id');
		$orderid                 = $value['orderid'];
		$status                 = $value['status'];
		$paytype                 = $value['paytype'];
		$cterminal                 = $value['cterminal'];
		$mybank                  = $value['mybank'];
		$mydigit                 = $value['mydigit'];
		$paidamount              =$value['paid'];
		$multipayment               =$value['multipay'];
		$multipayid               =$value['rendom_number'];
		$orderamount			=$value['orderamount'];
		$allcard				=$value['allcard'];
		$allbank				=$value['allbank'];
		$alldigity			=$value['alldigity'];
		
		$orderinfo=$this->db->select('*')->from('customer_order')->where('order_id',$orderid)->get()->row();
		$cusinfo = $this->db->select('*')->from('customer_info')->where('customer_id',$orderinfo->customer_id)->get()->row();
		//print_r($dataup);
			$marge_order_id = date('Y-m-d')._.$value['rendom_number'];
		     $updatetData = array(
		     		'marge_order_id' => $marge_order_id,
				    'order_status'     => $status,
				  );
		        $this->db->where('order_id',$orderid);
				$this->db->update('customer_order',$updatetData);
				//Update Bill Table
				$updatetbill = array(
				   'bill_status'           => 1,
				   'payment_method_id'     => $paytype,
				   'create_by'			   => $saveid
				  );
		        $this->db->where('order_id',$orderid);
				$this->db->update('bill',$updatetbill);
				$billinfo = $this->db->select('*')->from('bill')->where('order_id',$orderid)->get()->row();
				if(!empty($billinfo)){
					$billid=$billinfo->bill_id;
					if($paidamount>0){
							$paidData = array(
							   'customerpaid'     =>$paidamount
							  );
		        			$this->db->where('order_id',$orderid);
							$this->db->update('customer_order',$paidData);
					   }
					 else{
						  $paidData = array(
							   'customerpaid'     =>$billinfo->bill_amount
							  );
		        			$this->db->where('order_id',$orderid);
							$this->db->update('customer_order',$paidData);
						  }
					$checkmultipay = $this->db->select('*')->from('multipay_bill')->where('multipayid',$marge_order_id)->get()->row();
					$payid='';
					if(empty($checkmultipay)){
							$k=0;
							foreach($multipayment as $ptype){
									$multipay=array(
									'order_id'			=>	$orderid,
									'payment_type_id'	=>	$ptype,
									'multipayid'		=>	$marge_order_id,
									'amount'		    =>	$orderamount[$k],
									);
									$this->db->insert('multipay_bill',$multipay);
		 							$multipay_id = $this->db->insert_id();
									
									if($ptype!=1){
									 if($ptype==4){
										 $headcode=1020101;
										 }
									  else{
										  $paytype=$this->db->select('payment_method')->from('payment_method')->where('payment_method_id',$ptype)->get()->row();
										  $coainfo=$this->db->select('HeadCode')->from('acc_coa')->where('HeadName',$paytype->payment_method)->get()->row();
										  $headcode=$coainfo->HeadCode;
										  }
										  // Income for company
														 $income3 = array(
														  'VNo'            => "Sale".$orderinfo->saleinvoice,
														  'Vtype'          => 'Sales Products',
														  'VDate'          =>  $orderinfo->order_date,
														  'COAID'          => $headcode,
														  'Narration'      => 'Sale Income For Online payment'.$cusinfo->cuntomer_no.'-'.$cusinfo->customer_name,
														  'Debit'          => $orderamount[$k],
														  'Credit'         => 0,
														  'IsPosted'       => 1,
														  'CreateBy'       => $saveid,
														  'CreateDate'     => $orderinfo->order_date,
														  'IsAppove'       => 1
														);
														 $this->db->insert('acc_transaction',$income3);
										  
									 }
									
									if($ptype==1){
										$cardinfo=array(
											'bill_id'			    =>	$billid,
											'card_no'		        =>	$alldigity[$k],
											'terminal_name'		    =>	$allcard[$k],
											'multipay_id'	   		=>	$multipay_id,
											'bank_name'	            =>	$allbank[$k],
										);
										$this->db->insert('bill_card_payment',$cardinfo);
										
										$bankinfo=$this->db->select('bank_name')->from('tbl_bank')->where('bankid',$allbank[$k])->get()->row();
										$coainfo=$this->db->select('HeadCode')->from('acc_coa')->where('HeadName',$bankinfo->bank_name)->get()->row();
						
										$saveid=$this->session->userdata('id');
										 $income2 = array(
										  'VNo'            => "Sale".$orderinfo->saleinvoice,
										  'Vtype'          => 'Sales Products',
										  'VDate'          =>  $orderinfo->order_date,
										  'COAID'          => $coainfo->HeadCode,
										  'Narration'      => 'Sale Income For Bank debit'.$cusinfo->cuntomer_no.'-'.$cusinfo->customer_name,
										  'Debit'          => $orderamount[$k],
										  'Credit'         => 0,
										  'IsPosted'       => 1,
										  'CreateBy'       => $saveid,
										  'CreateDate'     => $orderinfo->order_date,
										  'IsAppove'       => 1
										);
										 $this->db->insert('acc_transaction',$income2);
										}
									$k++;
								}
							
						}	  
					}
					if($status==4){
						$customerinfo = $this->db->select('*')->from('customer_info')->where('customer_id',$billinfo->customer_id)->get()->row();
						}
				  $orderinfo=$this->db->select('*')->from('customer_order')->where('order_id',$orderid)->get()->row();
				  $cusinfo = $this->db->select('*')->from('customer_info')->where('customer_id',$orderinfo->customer_id)->get()->row();
			$this->savekitchenitem($orderid);	  
		  // Income for company
		 $saveid=$this->session->userdata('id');
         $income = array(
		  'VNo'            => "Sale".$orderinfo->saleinvoice,
		  'Vtype'          => 'Sales Products',
		  'VDate'          =>  $orderinfo->order_date,
		  'COAID'          => 303,
		  'Narration'      => 'Sale Income For '.$cusinfo->cuntomer_no.'-'.$cusinfo->customer_name,
		  'Debit'          => 0,
		  'Credit'         => $orderinfo->totalamount,//purchase price asbe
		  'IsPosted'       => 1,
		  'CreateBy'       => $saveid,
		  'CreateDate'     => $orderinfo->order_date,
		  'IsAppove'       => 1
		); 
		$this->db->insert('acc_transaction',$income);
		
		
		
		 $logData =array(
	   'action_page'         => "Order List",
	   'action_done'     	 => "Insert Data", 
	   'remarks'             => "Order is Update",
	   'user_name'           => $this->session->userdata('fullname'),
	   'entry_date'          => date('Y-m-d H:i:s'),
	  );
	     $this->logs_model->log_recorded($logData);
	}

	public function showljslang(){
		 $settinginfo=$this->order_model->settinginfo();
		    $data['language'] = $this->order_model->settinginfolanguge($settinginfo->language);
		
		    header('Content-Type: text/javascript');
    echo('window.lang = ' . json_encode($data['language']) . ';');
    exit();
	}
}
