<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class V3 extends MY_Controller {

    protected $FILE_PATH;
    
    public function __construct()
    {
            parent::__construct();
			$this->load->library('lsoft_setting');
            $this->load->model('Api_kitchen_model');
            
            $this->FILE_PATH = base_url('upload/');
    }

    public function index()
    {
            redirect('myurl');
    }

    public function sign_in()
    {
            // TO DO / Email or Phone only one required
            $this->load->library('form_validation');
            $this->form_validation->set_rules('email', 'Email', 'required|xss_clean|trim|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required|xss_clean|trim');
            $this->form_validation->set_rules('token', 'token', 'required|xss_clean|trim');

            if ($this->form_validation->run() == FALSE)
            {
                $errors = $this->form_validation->error_array();
                return $this->respondWithValidationError($errors);
            }
            else
            {
                $data['email']      = $this->input->post('email', TRUE);
                $data['password']   = $this->input->post('password', TRUE);

                $IsReg = $this->Api_kitchen_model->checkEmailOrPhoneIsRegistered('user', $data);

                if(!$IsReg) {
                    return $this->respondUserNotReg('This email or phone number has not been registered yet.');
                }
                $result = $this->Api_kitchen_model->authenticate_user('user', $data);
				$updatetData['waiter_kitchenToken']    			= $this->input->post('token', TRUE);
				$this->Api_kitchen_model->update_date('user', $updatetData, 'id', $result->id);
				$webseting =$this->Api_kitchen_model->read('powerbytxt,currency', 'setting', array('id' => 2));
				$currencyinfo = $this->Api_kitchen_model->read('currencyname,curr_icon', 'currency', array('currencyid' => $webseting->currency));
				
                
                if ($result != FALSE) {
					$str = substr($result->picture, 2);
					$result->{"UserPictureURL"}=base_url().$str;
					$result->{"PowerBy"}=$webseting->powerbytxt;
					$result->{"currencycode"}=$currencyinfo->currencyname;
					$result->{"currencysign"}=$currencyinfo->curr_icon;
                    return $this->respondWithSuccess('You have successfully logged in.', $result);
                } else {
                    return $this->respondWithError('The email and password you entered don\'t match.',$result);
                }
            }
    }
	
	
	 
	public function orderlist(){
			$this->form_validation->set_rules('id', 'id', 'required|xss_clean|trim');
			 if ($this->form_validation->run() == FALSE){
					$errors = $this->form_validation->error_array();
					return $this->respondWithValidationError($errors);
				}
				else{
					 $waiterid=$this->input->post('id', TRUE);
					 $orderlist = $this->Api_kitchen_model->orderlist();
					 $output = $categoryIDs = array();
					if ($orderlist != FALSE) {
						$i=0;
						 foreach($orderlist as $order){
							 $output['orderinfo'][$i]['order_id']        = $order->order_id;
							 $output['orderinfo'][$i]['CustomerName']    = $order->customer_name;
							 $output['orderinfo'][$i]['TableName']       = $order->tablename;
							 $output['orderinfo'][$i]['OrderDate']       = $order->order_date;
							 $output['orderinfo'][$i]['TotalAmount']     = $order->totalamount;
							 $orderdetails=$this->db->select('order_menu.*,item_foods.ProductsID,item_foods.ProductName,variant.variantid,variant.variantName,variant.price')->from('order_menu')->join('customer_order','order_menu.order_id=customer_order.order_id','left')->join('item_foods','order_menu.menu_id=item_foods.ProductsID','left')->join('variant','order_menu.varientid=variant.variantid','left')->where('order_menu.order_id',$order->order_id)->order_by('customer_order.order_id','desc')->get()->result();
							 if(!empty($orderdetails)){
								 $k=0;
								 foreach($orderdetails as $item){
									 $output['orderinfo'][$i]['iteminfo'][$k]['order_id']        = $order->order_id;
									 $output['orderinfo'][$i]['iteminfo'][$k]['ProductsID']     =$item->ProductsID;
									 $output['orderinfo'][$i]['iteminfo'][$k]['ProductName']    =$item->ProductName;
									 $output['orderinfo'][$i]['iteminfo'][$k]['price']    	   =$item->price;
									 $output['orderinfo'][$i]['iteminfo'][$k]['Varientname']    =$item->variantName;
									 $output['orderinfo'][$i]['iteminfo'][$k]['Varientid']      =$item->variantid;
									 $output['orderinfo'][$i]['iteminfo'][$k]['Itemqty']        =$item->menuqty;
									 $output['orderinfo'][$i]['iteminfo'][$k]['food_status']    =$item->food_status;
									 $output['orderinfo'][$i]['iteminfo'][$k]['Itemtotal']      =$item->menuqty*$item->price;
									 if(!empty($item->add_on_id)){
									  $output['orderinfo'][$i]['iteminfo'][$k]['addons']        =1;
										 $addons=explode(",",$item->add_on_id);
										 $addonsqty=explode(",",$item->addonsqty);
										 $x=0;
										foreach($addons as $addonsid){
												$adonsinfo=$this->Api_kitchen_model->read('*', 'add_ons', array('add_on_id' => $addonsid));
												$output['orderinfo'][$i]['iteminfo'][$k]['addonsinfo'][$x]['addonsName']     =$adonsinfo->add_on_name;
												$output['orderinfo'][$i]['iteminfo'][$k]['addonsinfo'][$x]['add_on_id']      =$adonsinfo->add_on_id;
												$output['orderinfo'][$i]['iteminfo'][$k]['addonsinfo'][$x]['price']      	=$adonsinfo->price;
												$output['orderinfo'][$i]['iteminfo'][$k]['addonsinfo'][$x]['add_on_qty']     =$addonsqty[$x];
												$x++;
											}
									}
									 else{ $output['orderinfo'][$i]['iteminfo'][$k]['addons']        =0;}
									 
									 $k++;
									 }  
								 } 
								else{
									 $output['orderinfo'][$i]['iteminfo']=[];
									}
							 $i++;
						 }
					
						return $this->respondWithSuccess('Pending Order List.', $output);
					} else {
						return $this->respondWithError('Order Not Found.!!!',$output);
					}
			}
		}
	public function completeorcancel(){
		$this->form_validation->set_rules('Orderid', 'Orderid', 'required|xss_clean|trim');
		 	if ($this->form_validation->run() == FALSE){
					$errors = $this->form_validation->error_array();
					return $this->respondWithValidationError($errors);
				}
			else{
		 $updatetData = array('order_status'     => 2);
		 $this->db->where('order_id',$orderid);
		 $this->db->update('customer_order',$updatetData);
		 $orderid=$this->input->post('Orderid', TRUE);
		 $output = $categoryIDs = array();
		 $customerorder=$this->Api_kitchen_model->read('*', 'customer_order', array('order_id' => $orderid));
		 
		 $customerinfo=$this->Api_kitchen_model->read('*', 'customer_info', array('customer_id' => $customerorder->customer_id));
		 $tableinfo=$this->Api_kitchen_model->read('*', 'rest_table', array('tableid' => $customerorder->table_no));
		 $typeinfo=$this->Api_kitchen_model->read('*', 'customer_type', array('customer_type_id' => $customerorder->cutomertype));
		
		  $orderdetails=$this->db->select('order_menu.*,item_foods.ProductsID,item_foods.ProductName,variant.variantid,variant.variantName,variant.price')->from('order_menu')->join('customer_order','order_menu.order_id=customer_order.order_id','left')->join('item_foods','order_menu.menu_id=item_foods.ProductsID','left')->join('variant','order_menu.varientid=variant.variantid','left')->where('order_menu.order_id',$orderid)->order_by('customer_order.order_id','desc')->get()->result();
		   //
		 $billinfo=$this->Api_kitchen_model->read('*', 'bill', array('order_id' => $orderid));
		
		 if(!empty($orderdetails)){
			 $output['CustomerName']=$customerinfo->customer_name;  
			 $output['CustomerPhone']=$customerinfo->customer_phone;
			 $output['CustomerEmail']=$customerinfo->customer_email;
			 $output['CustomerType']=$typeinfo->customer_type;
			 $output['TableName']=$tableinfo->tablename;
			 $i=0;
			  
			 foreach($orderdetails as $item){
				 $output['iteminfo'][$i]['ProductsID']     =$item->ProductsID;
				 $output['iteminfo'][$i]['ProductName']    =$item->ProductName;
				 $output['iteminfo'][$i]['price']    	   =$item->price;
				 $output['iteminfo'][$i]['Varientname']    =$item->variantName;
				 $output['iteminfo'][$i]['Varientid']      =$item->variantid;
				 $output['iteminfo'][$i]['Itemqty']        =$item->menuqty;
				 $output['iteminfo'][$i]['Itemtotal']      =$item->menuqty*$item->price;
				 if(!empty($item->add_on_id)){
				  $output['iteminfo'][$i]['addons']        =1;
					 $addons=explode(",",$item->add_on_id);
					 $addonsqty=explode(",",$item->addonsqty);
					 $x=0;
					foreach($addons as $addonsid){
							$adonsinfo=$this->Api_kitchen_model->read('*', 'add_ons', array('add_on_id' => $addonsid));
							$output['iteminfo'][$i]['addonsinfo'][$x]['addonsName']     =$adonsinfo->add_on_name;
							$output['iteminfo'][$i]['addonsinfo'][$x]['add_on_id']      =$adonsinfo->add_on_id;
							$output['iteminfo'][$i]['addonsinfo'][$x]['price']      	=$adonsinfo->price;
							$output['iteminfo'][$i]['addonsinfo'][$x]['add_on_qty']     =$addonsqty[$x];
							$x++;
						}
				}
			     else{ $output['iteminfo'][$i]['addons']        =0;}
				 
				 $i++;
				 }   
			 $output['Subtotal']              =$billinfo->total_amount;
			 $output['discount']              =$billinfo->discount;
			 $output['service_charge']        =$billinfo->service_charge;
			 $output['VAT']        			  =$billinfo->VAT;
			 $output['order_total']           =$billinfo->bill_amount;
			 $output['orderdate']             =$billinfo->bill_date;
			 
			return $this->respondWithSuccess('Order Details', $output);
		 }
		 else{
			return $this->respondWithError('Order Not Found.!!!',$output); 
			 }
		 }
		}
	public function foodisready(){
		$this->form_validation->set_rules('Orderid', 'Orderid', 'required|xss_clean|trim');
		$this->form_validation->set_rules('foodata', 'foodata', 'required|xss_clean|trim');
		$this->form_validation->set_rules('isready', 'isready', 'required|xss_clean|trim');
		 	if ($this->form_validation->run() == FALSE){
					$errors = $this->form_validation->error_array();
					return $this->respondWithValidationError($errors);
				}
			else{
		$json = $this->input->post('foodata', TRUE);
		$fisready= $this->input->post('isready', TRUE);
		$cartArray = json_decode($json);
		$output = $categoryIDs = array();
		 $output['isready']        =$fisready;
		 $orderid=$this->input->post('Orderid', TRUE);
		 $updatetData = array('order_status'     => 2);
		 $this->db->where('order_id',$orderid);
		 $this->db->update('customer_order',$updatetData);
		 foreach($cartArray as $cart){
			 //print_r($cart);
			   $ProductsID=$cart->ProductsID;
			   $variantid=$cart->variantid;
			   $updatetfood = array('food_status'=> $fisready);
		       $this->db->where('order_id',$orderid);
			   $this->db->where('menu_id',$ProductsID);
			   $this->db->where('varientid',$variantid);
		       $this->db->update('order_menu',$updatetfood);
		      // echo $this->db->last_query();
			 }
		 
		 $customerorder=$this->Api_kitchen_model->read('*', 'customer_order', array('order_id' => $orderid));
		 
		 $customerinfo=$this->Api_kitchen_model->read('*', 'customer_info', array('customer_id' => $customerorder->customer_id));
		 $tableinfo=$this->Api_kitchen_model->read('*', 'rest_table', array('tableid' => $customerorder->table_no));
		 $typeinfo=$this->Api_kitchen_model->read('*', 'customer_type', array('customer_type_id' => $customerorder->cutomertype));
		
		  $orderdetails=$this->db->select('order_menu.*,item_foods.ProductsID,item_foods.ProductName,variant.variantid,variant.variantName,variant.price')->from('order_menu')->join('customer_order','order_menu.order_id=customer_order.order_id','left')->join('item_foods','order_menu.menu_id=item_foods.ProductsID','left')->join('variant','order_menu.varientid=variant.variantid','left')->where('order_menu.order_id',$orderid)->order_by('customer_order.order_id','desc')->get()->result();
		   //
		 $billinfo=$this->Api_kitchen_model->read('*', 'bill', array('order_id' => $orderid));
	
		 if(!empty($orderdetails)){
			/* $output['CustomerName']=$customerinfo->customer_name;  
			 $output['CustomerPhone']=$customerinfo->customer_phone;
			 $output['CustomerEmail']=$customerinfo->customer_email;
			 $output['CustomerType']=$typeinfo->customer_type;
			 $output['TableName']=$tableinfo->tablename;*/
			 $i=0;
			  
			 foreach($orderdetails as $item){
				 if($item->food_status==1){
					 $ready="Food Is Ready";
					 //push 
					$waiteridp=$customerorder->waiter_id;
            		$this->db->select('*');
            		$this->db->from('user');
            		$this->db->where('id',$waiteridp);
            		$query = $this->db->get();
            		$allemployee = $query->row();
            		$senderid[]=$allemployee->waiter_kitchenToken;
            		define( 'API_ACCESS_KEY', 'AAAAqG0NVRM:APA91bExey2V18zIHoQmCkMX08SN-McqUvI4c3CG3AnvkRHQp8S9wKn-K4Vb9G79Rfca8bQJY9pn-tTcWiXYJiqe2s63K6QHRFqIx4Oaj9MoB1uVqB7U_gNT9fiqckeWge8eVB9P5-rX');
				$registrationIds = $senderid;
				$msg = array
				(
					'message' 					=> "Orderid:".$orderid.", Amount:".$customerorder->totalamount,
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
				/*End Notification*/
				 }
				 else{
					 $ready="Food Is Cooking";
					 //push 
					$waiteridp=$customerorder->waiter_id;
            		$this->db->select('*');
            		$this->db->from('user');
            		$this->db->where('id',$waiteridp);
            		$query = $this->db->get();
            		$allemployee = $query->row();
            		$senderid[]=$allemployee->waiter_kitchenToken;
            		define( 'API_ACCESS_KEY', 'AAAAqG0NVRM:APA91bExey2V18zIHoQmCkMX08SN-McqUvI4c3CG3AnvkRHQp8S9wKn-K4Vb9G79Rfca8bQJY9pn-tTcWiXYJiqe2s63K6QHRFqIx4Oaj9MoB1uVqB7U_gNT9fiqckeWge8eVB9P5-rX');
				$registrationIds = $senderid;
				$msg = array
				(
					'message' 					=> "Orderid:".$orderid.", Amount:".$customerorder->totalamount,
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
				 /*$output['iteminfo'][$i]['ProductsID']     =$item->ProductsID;
				 $output['iteminfo'][$i]['ProductName']    =$item->ProductName;
				 $output['iteminfo'][$i]['price']    	   =$item->price;
				 $output['iteminfo'][$i]['Varientname']    =$item->variantName;
				 $output['iteminfo'][$i]['Varientid']      =$item->variantid;
				 $output['iteminfo'][$i]['Itemqty']        =$item->menuqty;
				 $output['iteminfo'][$i]['Itemtotal']      =$item->menuqty*$item->price;
				 $output['iteminfo'][$i]['foodstatus']        =$ready;
				 $output['iteminfo'][$i]['isready']        =$fisready;*/
				 if(!empty($item->add_on_id)){
				  //$output['iteminfo'][$i]['addons']        =1;
					 $addons=explode(",",$item->add_on_id);
					 $addonsqty=explode(",",$item->addonsqty);
					 $x=0;
					foreach($addons as $addonsid){
							$adonsinfo=$this->Api_kitchen_model->read('*', 'add_ons', array('add_on_id' => $addonsid));
							/*$output['iteminfo'][$i]['addonsinfo'][$x]['addonsName']     =$adonsinfo->add_on_name;
							$output['iteminfo'][$i]['addonsinfo'][$x]['add_on_id']      =$adonsinfo->add_on_id;
							$output['iteminfo'][$i]['addonsinfo'][$x]['price']      	=$adonsinfo->price;
							$output['iteminfo'][$i]['addonsinfo'][$x]['add_on_qty']     =$addonsqty[$x];*/
							$x++;
						}
				}
			     else{ //$output['iteminfo'][$i]['addons']        =0;
				 }
				 
				 $i++;
				 }   
			 /*$output['Subtotal']              =$billinfo->total_amount;
			 $output['discount']              =$billinfo->discount;
			 $output['service_charge']        =$billinfo->service_charge;
			 $output['VAT']        			  =$billinfo->VAT;
			 $output['order_total']           =$billinfo->bill_amount;
			 $output['orderdate']             =$billinfo->bill_date;*/
			 
			return $this->respondWithSuccess('Order Details', $output);
		 }
		 else{
			return $this->respondWithError('Order Not Found.!!!',$output); 
			 }
		 }
		}
	
	public function allonlineorder(){
			 $this->form_validation->set_rules('id', 'id', 'required|xss_clean|trim');
			 if ($this->form_validation->run() == FALSE){
					$errors = $this->form_validation->error_array();
					return $this->respondWithValidationError($errors);
				}
				else{
					 $output = $categoryIDs = array();
					 $waiterid=$this->input->post('id', TRUE);
					 $orderlist = $this->Api_kitchen_model->allincomminglist();
					 if(!empty($orderlist)){
						 $i=0;
						 foreach($orderlist as $order){
							 $output['orderinfo'][$i]['orderid']=$order->order_id;
							 $output['orderinfo'][$i]['customer']=$order->customer_name;
							 $output['orderinfo'][$i]['amount']=$order->totalamount;
							 $i++;
							 }
						  return $this->respondWithSuccess('Incomming Order List', $output);
						 }
					 else{
						  return $this->respondWithError('No Incomming Order Found!!!',$output);
						 }
					
				}
		}
	public function acceptorder(){
			 $this->form_validation->set_rules('id', 'id', 'required|xss_clean|trim');
			 $this->form_validation->set_rules('order_id', 'Order ID', 'required|xss_clean|trim');
			 if ($this->form_validation->run() == FALSE){
					$errors = $this->form_validation->error_array();
					return $this->respondWithValidationError($errors);
				}
				else{
					 $output = $categoryIDs = array();
					 $kitchen=$this->input->post('id', TRUE);
					 $orderid=$this->input->post('order_id', TRUE);
					 $orderinfo= $this->db->select('*')->from('customer_order')->where('order_id',$orderid)->get()->row();
					 if($orderinfo->order_status==5){
                        return $this->respondWithError('This Order is Cancel By Admin.Please Try Another!!!',$output);
					 }
					 else if(!empty($orderinfo->kitchen)){
                        return $this->respondWithError('This Order Already Assign.Please Try Another!!!',$output);
					 }
					 else{
					 $updatetData['kitchen']    			= $kitchen;
				     $this->Api_kitchen_model->update_date('customer_order', $updatetData, 'order_id', $orderid);
					
					 return $this->respondWithSuccess('Order Assign to Kitchen', $output);
					 }
				}
		}
	public function completeorder(){
			$this->form_validation->set_rules('id', 'id', 'required|xss_clean|trim');
			$this->form_validation->set_rules('start', 'start', 'required|xss_clean|trim');
			 if ($this->form_validation->run() == FALSE){
					$errors = $this->form_validation->error_array();
					return $this->respondWithValidationError($errors);
				}
				else{
					 $waiterid=$this->input->post('id', TRUE);
					 $start=$this->input->post('start', TRUE);
					 if($start==0){
					 $orderlist = $this->Api_kitchen_model->allorderlist2($waiterid,$status=4,$limit=20);
					 }
					 else{
						$orderlist = $this->Api_kitchen_model->allorderlist2($waiterid,$status=4,$start,$limit=20); 
						 }
					 $totalorder = $this->Api_kitchen_model->count_comorder2($waiterid,$status=4);
					 $output = $categoryIDs = array();
					if ($orderlist != FALSE) {
						 $output['totalorder']        = $totalorder;
						$i=0;
						 foreach($orderlist as $order){
							 $output['orderinfo'][$i]['order_id']        = $order->order_id;
							 $output['orderinfo'][$i]['CustomerName']    = $order->customer_name;
							 $output['orderinfo'][$i]['TableName']       = $order->tablename;
							 $output['orderinfo'][$i]['OrderDate']       = $order->order_date;
							 $output['orderinfo'][$i]['TotalAmount']     = $order->totalamount;
							 $i++;
						 }
					
						return $this->respondWithSuccess('Complete Order List.', $output);
					} else {
						return $this->respondWithError('Order Not Found.!!!',$output);
					}
			}

		}	
		
}