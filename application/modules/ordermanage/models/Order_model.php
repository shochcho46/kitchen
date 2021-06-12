<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model {
	
	private $table = 'purchaseitem';
 
	public function create()
	{
		$saveid=$this->session->userdata('id');
		$p_id = $this->input->post('product_id');
		$purchase_date = str_replace('/','-',$this->input->post('purchase_date'));
		$newdate= date('Y-m-d' , strtotime($purchase_date));
		$data=array(
			'invoiceid'				=>	$this->input->post('invoice_no'),
			'suplierID'			    =>	$this->input->post('suplierid'),
			'total_price'	        =>	$this->input->post('grand_total_price'),
			'details'	            =>	$this->input->post('purchase_details'),
			'purchasedate'		    =>	$newdate,
			'savedby'			    =>	$saveid
		);
		 $this->db->insert($this->table,$data);
		$returnid = $this->db->insert_id();
		
		$rate = $this->input->post('product_rate');
		$quantity = $this->input->post('product_quantity');
		$t_price = $this->input->post('total_price');
		
		for ($i=0, $n=count($p_id); $i < $n; $i++) {
			$product_quantity = $quantity[$i];
			$product_rate = $rate[$i];
			$product_id = $p_id[$i];
			$total_price = $t_price[$i];
			
			$data1 = array(
				'purchaseid'		=>	$returnid,
				'indredientid'		=>	$product_id,
				'quantity'			=>	$product_quantity,
				'price'				=>	$product_rate,
				'totalprice'		=>	$total_price,
				'purchaseby'		=>	$saveid,
				'purchasedate'		=>	$newdate
			);

			if(!empty($quantity))
			{
				$this->db->insert('purchase_details',$data1);
			}
		}
		return true;
	
	}
	public function allfood(){
		$this->db->select('item_foods.*,variant.variantid,variant.variantName,variant.price');
        $this->db->from('item_foods');
		$this->db->join('variant','item_foods.ProductsID=variant.menuid','left');
		$this->db->where('ProductsIsActive',1);
		$query = $this->db->get();
		$itemlist=$query->result();
	    return $itemlist;
		}
	public function headcode(){
        $query=$this->db->query("SELECT MAX(HeadCode) as HeadCode FROM acc_coa WHERE HeadLevel='4' And HeadCode LIKE '102030%'");
        return $query->row();
    }
	public function insert_customer($data = array()){
		return $this->db->insert('customer_info', $data);
		}
	 public function create_coa($data = array())
    {
        $this->db->insert('acc_coa',$data);
        return true;
    }
	public function orderitem($orderid){
		
		$saveid=$this->session->userdata('id');
		//$bill=$this->input->post('bill_info');
		$cid=$this->input->post('customer_name');
		$purchase_date = str_replace('/','-',$this->input->post('order_date'));
		$newdate= date('Y-m-d' , strtotime($purchase_date));
		
		$lastid=$this->db->select("*")->from('customer_order')->where('order_id',$orderid)->order_by('order_id','desc')->get()->row();
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
		$sino = $lastid->saleinvoice;
		$orderid = $orderid;
		if ($cart = $this->cart->contents()){
			foreach ($cart as $item){
					$total=$this->cart->total();
					//$calvat=$total*15/100;
					$itemprice= $item['price']*$item['qty'];
					$discount=0;
					if(!empty($item['addonsid'])){
						$nittotal=$total+$item['addontpr'];
						$itemprice=$itemprice+$item['addontpr'];
						}
					else{
						$nittotal=$total;
						}
					
					$data3=array(
						'order_id'				=>	$orderid,
						'menu_id'		        =>	$item['pid'],
						'menuqty'	        	=>	$item['qty'],
						'add_on_id'	        	=>	$item['addonsid'],
						'addonsqty'	        	=>	$item['addonsqty'],
						'varientid'		    	=>	$item['sizeid'],
					);
					$this->db->insert('order_menu',$data3);
					
					/*$newdate=date('Y-m-d');
					$exdate=date('Y-m-d');
					$data=array(
						'itemid'				  =>	$item['pid'],
						'itemquantity'			  =>	$item['qty'],
						'savedby'	     		  =>	$saveid,
						'saveddate'	              =>	$newdate,
						'productionexpiredate'	  =>	$exdate
					);
					 $this->db->insert('production',$data);*/
				}
			}
		
		//if($bill==1){
			$payment= $this->input->post('card_type');
			if(!empty($payment)){
				$settinginfo=$this->db->select("*")->from('setting')->get()->row();
				$discount=$this->input->post('invoice_discount');
				
				$scharge=$this->input->post('service_charge');
				$vat=$this->input->post('vat');
				if($vat==''){
					$vat=0;
					}
				if($discount==''){
					$discount=0;
					}
			  if($scharge==''){
					$scharge=0;
					}
					
				if($settinginfo->discount_type==1){
					$subtotal=$this->input->post('subtotal');
					$discount=$subtotal*$discount/100;
				}
				if($settinginfo->service_chargeType==1){
					$subtotal=$this->input->post('subtotal');
					$scharge=$subtotal*$scharge/100;
				}
				
		$billstatus=0;			
					if($payment==5){
						$billstatus=0;
						}
					else if($payment==3){
						$billstatus=0;
						}
					else if($payment==2){
						$billstatus=0;
						}
				
		$billinfo=array(
			'customer_id'			=>	$cid,
			'order_id'		        =>	$orderid,
			'total_amount'	        =>	$this->input->post('subtotal'),
			'discount'	            =>	$discount,
			'service_charge'	    =>	$scharge,
			'VAT'		 	        =>  $this->input->post('vat'),
			'bill_amount'		    =>	$this->input->post('grandtotal'),
			'bill_date'		        =>	$newdate,
			'bill_time'		        =>	date('H:i:s'),
			'bill_status'		    =>	$billstatus,
			'payment_method_id'		=>	$this->input->post('card_type'),
			'create_by'		        =>	$saveid,
			'create_date'		    =>	date('Y-m-d')
		);
		//print_r($billinfo);
		$this->db->insert('bill',$billinfo);
		$billid = $this->db->insert_id();
		/*$cardinfo=array(
			'bill_id'			    =>	$billid,
			'card_no'		        =>	$this->input->post('card_no'),
			'issuer_name'	        =>	$this->input->post('card_holdername')
		);
		$this->db->insert('bill_card_payment',$cardinfo);
				$updatetData = array('order_status'     => 4);
		        $this->db->where('order_id',$orderid);
				$this->db->update('customer_order',$updatetData);*/
				
				// Find the acc COAID for the Transaction
				$cusifo = $this->db->select('*')->from('customer_info')->where('customer_id',$this->input->post('customer_name'))->get()->row();
				$headn = $cusifo->cuntomer_no.'-'.$cusifo->customer_name;
				$coainfo = $this->db->select('*')->from('acc_coa')->where('HeadName',$headn)->get()->row();
				$customer_headcode = $coainfo->HeadCode;
				
				//Customer debit for Product Value
				$invoice_no=$sino;
				 $cosdr = array(
				  'VNo'            =>  $invoice_no,
				  'Vtype'          =>  'CIV',
				  'VDate'          =>  $newdate,
				  'COAID'          =>  $customer_headcode,
				  'Narration'      =>  'Customer debit for Product Invoice#'.$invoice_no,
				  'Debit'          =>  $this->input->post('grandtotal'),
				  'Credit'         =>  0,
				  'StoreID'        =>  0,
				  'IsPosted'       => 1,
				  'CreateBy'       => $saveid,
				  'CreateDate'     => $newdate,
				  'IsAppove'       => 1
				); 
				 $this->db->insert('acc_transaction',$cosdr);
				 //Store credit for Product Value
				  $sc =array(
				  'VNo'            =>  $invoice_no,
				  'Vtype'          =>  'CIV',
				  'VDate'          =>  $newdate,
				  'COAID'          =>  10107,
				  'Narration'      =>  'Inventory Credit for Product Invoice#'.$invoice_no,
				  'Debit'          =>  0,
				  'Credit'         =>  $this->input->post('grandtotal'),
				  'StoreID'        =>  0,
				  'IsPosted'       => 1,
				  'CreateBy'       => $saveid,
				  'CreateDate'     => $newdate,
				  'IsAppove'       => 1
				);  
				 $this->db->insert('acc_transaction',$sc);
				 
				 // Customer Credit for paid amount.
				  $cc =array(
				  'VNo'            =>  $invoice_no,
				  'Vtype'          =>  'CIV',
				  'VDate'          =>  $newdate,
				  'COAID'          =>  $customer_headcode,
				  'Narration'      =>  'Customer Credit for Product Invoice#'.$invoice_no,
				  'Debit'          =>  0,
				  'Credit'         =>  $this->input->post('grandtotal'),
				  'StoreID'        =>  0,
				  'IsPosted'       => 1,
				  'CreateBy'       => $saveid,
				  'CreateDate'     => $newdate,
				  'IsAppove'       => 1
				);  
				 $this->db->insert('acc_transaction',$cc);
				
				 //Cash In hand Debit for paid value
				 $cdv = array(
				  'VNo'            =>  $invoice_no,
				  'Vtype'          =>  'CIV',
				  'VDate'          =>  $newdate,
				  'COAID'          =>  1020101,
				  'Narration'      =>  'Cash in hand Debit For Invoice#'.$invoice_no,
				  'Debit'          =>  $this->input->post('grandtotal'),
				  'Credit'         =>  0,
				  'StoreID'        =>  0,
				  'IsPosted'       =>  1,
				  'CreateBy'       => $saveid,
				  'CreateDate'     => $newdate,
				  'IsAppove'       => 1
				); 
				 $this->db->insert('acc_transaction',$cdv);
				}
			//}
		return $orderid;
		}
	public function payment_info($id = null){
			$this->db->select('*');
			$this->db->from('customer_order');
			$this->db->where('order_id',$id);
			$query = $this->db->get();
			$orderinfo=$query->row();
			
			$this->db->select('*');
			$this->db->from('bill');
			$this->db->where('order_id',$id);
			$query1 = $this->db->get();
			
			if ($query->num_rows() > 0) {
				$paymentinfo=$query1->row();
				$payment=$paymentinfo->payment_method_id;
				$discount=$this->input->post('invoice_discount');
				$scharge=$this->input->post('service_charge');
				$vat=$this->input->post('vat');
				if($vat==''){
					$vat=0;
					}
				if($discount==''){
					$discount=0;
					}
			  if($scharge==''){
					$scharge=0;
					}
			$billstatus=0;			
			if($payment==5){
				$billstatus=0;
				}
			else if($payment==3){
				$billstatus=0;
				}
			else if($payment==2){
				$billstatus=0;
				}
			$saveid=$this->session->userdata('id');	
			$settinginfo=$this->db->select("*")->from('setting')->get()->row();
			if($settinginfo->discount_type==1){
					$subtotal=$this->input->post('subtotal');
					$discount=$subtotal*$discount/100;
				}
			if($settinginfo->service_chargeType==1){
					$subtotal=$this->input->post('subtotal');
					$scharge=$subtotal*$scharge/100;
				}
			$billinfo=array(
			'total_amount'	        =>	$this->input->post('subtotal'),
			'discount'	            =>	$discount,
			'service_charge'	    =>	$scharge,
			'VAT'		 	        =>  $vat,
			'bill_amount'		    =>	$this->input->post('grandtotal'),
			'create_by'		        =>	$saveid
			);
			$this->db->where('order_id',$id);
			$this->db->update('bill',$billinfo);
			/*$billinfo=$this->db->select('*')->from('bill')->where('order_id',$id)->get()->row();
			$cardinfo=array(
			'card_no'		        =>	$this->input->post('card_no'),
			'issuer_name'	        =>	$this->input->post('card_holdername')
			);
			$this->db->where('bill_id',$billinfo->order_id);
			$this->db->update('bill_card_payment',$cardinfo);*/
			/*$updatetData = array('order_status'     => $this->input->post('status') );
			$this->db->where('order_id',$id);
			$this->db->update('customer_order',$updatetData);*/
			
			// Find the acc COAID for the Transaction
				$custmercode= $this->input->post('custmercode');
			    $custmername= $this->input->post('custmername');
				$invoice_no= $this->input->post('saleinvoice');
				$headn = $custmercode.'-'.$custmername;
				$coainfo = $this->db->select('*')->from('acc_coa')->where('HeadName',$headn)->get()->row();
				$customer_headcode = $coainfo->HeadCode;
				$invoice_no=$invoice_no;
				$saveid=$this->session->userdata('id');
			    $saveddate=date('Y-m-d H:i:s');	
				
		$crtransac = $this->db->select('*')->from('acc_transaction')->where('COAID',$customer_headcode)->where('VNo',$invoice_no)->where('Credit>',0)->get()->row();
		$detransac = $this->db->select('*')->from('acc_transaction')->where('COAID',$customer_headcode)->where('VNo',$invoice_no)->where('Debit>',0)->get()->row();
		$storetransac = $this->db->select('*')->from('acc_transaction')->where('COAID','10107')->where('VNo',$invoice_no)->get()->row();
		$cashtransac = $this->db->select('*')->from('acc_transaction')->where('COAID','1020101')->where('VNo',$invoice_no)->get()->row();
			//Customer debit for Product Value
				
				 $cosdr = array(
				  'Debit'          =>  $this->input->post('grandtotal'),
				  'CreateBy'       => $saveid,
				  'CreateDate'     => $saveddate
				); 
				$this->db->where('ID',$detransac->ID);
			    $this->db->update('acc_transaction',$cosdr);
				 //Store credit for Product Value
				  $sc =array(
				  'Credit'         =>  $this->input->post('grandtotal'),
				  'CreateBy'       => $saveid,
				  'CreateDate'     => $saveddate,
				);  
				$this->db->where('ID',$storetransac->ID);
			    $this->db->update('acc_transaction',$sc);
				 
				 // Customer Credit for paid amount.
				  $cc =array(
				  'Credit'         =>  $this->input->post('grandtotal'),
				  'CreateBy'       => $saveid,
				  'CreateDate'     => $saveddate
				);  
				$this->db->where('ID',$crtransac->ID);
			    $this->db->update('acc_transaction',$cc);
				
				 //Cash In hand Debit for paid value
				 $cdv = array(
				  'Debit'          =>  $this->input->post('grandtotal'),
				  'CreateBy'       => $saveid,
				  'CreateDate'     => $saveddate
				); 
				 $this->db->where('ID',$cashtransac->ID);
			    $this->db->update('acc_transaction',$cdv);
			
			//return false;	
			}
			else{
			//$payment= $this->input->post('card_type');
			$saveid=$this->session->userdata('id');
			$saveddate=date('Y-m-d H:i:s');
			if(!empty($payment)){
				$discount=$this->input->post('invoice_discount');
				$scharge=$this->input->post('service_charge');
				$vat=$this->input->post('vat');
				if($vat==''){
					$vat=0;
					}
				if($discount==''){
					$discount=0;
					}
			  if($scharge==''){
					$scharge=0;
					}
	/*	$billstatus=1;			
					if($payment==5){
						$billstatus=0;
						}
					else if($payment==3){
						$billstatus=0;
						}
					else if($payment==2){
						$billstatus=0;
						}*/	
				
			$billinfo=array(
			'customer_id'			=>	$orderinfo->customer_id,
			'order_id'		        =>	$id,
			'total_amount'	        =>	$this->input->post('subtotal'),
			'discount'	            =>	$discount,
			'service_charge'	    =>	$scharge,
			'VAT'		 	        =>  $vat,
			'bill_amount'		    =>	$this->input->post('grandtotal'),
			'bill_date'		        =>	date('Y-m-d'),
			'bill_time'		        =>	date('H:i:s'),
			'bill_status'		    =>	$this->input->post('bill_info'),
			'payment_method_id'		=>	$this->input->post('card_type'),
			'create_by'		        =>	$saveid,
			'create_date'		    =>	date('Y-m-d')
		);
		$this->db->insert('bill',$billinfo);
		$billid = $this->db->insert_id();
		/*$cardinfo=array(
			'bill_id'			    =>	$billid,
			'card_no'		        =>	$this->input->post('card_no'),
			'issuer_name'	        =>	$this->input->post('card_holdername')
		);
		$this->db->insert('bill_card_payment',$cardinfo);*/
				/*$updatetData =array('order_status'=> 4);
		        $this->db->where('order_id',$id);
				$this->db->update('customer_order',$updatetData);*/
				// Find the acc COAID for the Transaction
				$custmercode= $this->input->post('custmercode');
			    $custmername= $this->input->post('custmername');
				$invoice_no= $this->input->post('saleinvoice');
				$headn = $custmercode.'-'.$custmername;
				$coainfo = $this->db->select('*')->from('acc_coa')->where('HeadName',$headn)->get()->row();
				$customer_headcode = $coainfo->HeadCode;
				$trans_coa = $this->db->select('*')->from('acc_transaction')->where('VNo',$invoice_no)->where('COAID',$customer_headcode)->get()->row();
			    $updateid=$trans_coa->ID;
				$sell_coa= $this->db->select('*')->from('acc_transaction')->where('VNo',$invoice_no)->where('COAID','1020101')->get()->row();	
		        $updatesellid=$sell_coa->ID;
				$store_coa= $this->db->select('*')->from('acc_transaction')->where('VNo',$invoice_no)->where('COAID','10107')->get()->row();	
		        $updatestoreid=$store_coa->ID;
				
				
				//Customer debit for Product Value
				$invoice_no=$invoice_no;
				 $cosdr = array(
				  'VNo'            =>  $invoice_no,
				  'Vtype'          =>  'CIV',
				  'VDate'          =>  $saveddate,
				  'COAID'          =>  $customer_headcode,
				  'Narration'      =>  'Customer debit for Product Invoice#'.$invoice_no,
				  'Debit'          =>  $this->input->post('grandtotal'),
				  'Credit'         =>  0,
				  'StoreID'        =>  0,
				  'IsPosted'       => 1,
				  'CreateBy'       => $saveid,
				  'CreateDate'     => $saveddate,
				  'IsAppove'       => 1
				); 
				 $this->db->insert('acc_transaction',$cosdr);
				 //Store credit for Product Value
				  $sc =array(
				  'VNo'            =>  $invoice_no,
				  'Vtype'          =>  'CIV',
				  'VDate'          =>  $saveddate,
				  'COAID'          =>  10107,
				  'Narration'      =>  'Inventory Credit for Product Invoice#'.$invoice_no,
				  'Debit'          =>  0,
				  'Credit'         =>  $this->input->post('grandtotal'),
				  'StoreID'        =>  0,
				  'IsPosted'       => 1,
				  'CreateBy'       => $saveid,
				  'CreateDate'     => $saveddate,
				  'IsAppove'       => 1
				);  
				 $this->db->insert('acc_transaction',$sc);
				 
				 // Customer Credit for paid amount.
				  $cc =array(
				  'VNo'            =>  $invoice_no,
				  'Vtype'          =>  'CIV',
				  'VDate'          =>  $saveddate,
				  'COAID'          =>  $customer_headcode,
				  'Narration'      =>  'Customer Credit for Product Invoice#'.$invoice_no,
				  'Debit'          =>  0,
				  'Credit'         =>  $this->input->post('grandtotal'),
				  'StoreID'        =>  0,
				  'IsPosted'       => 1,
				  'CreateBy'       => $saveid,
				  'CreateDate'     => $saveddate,
				  'IsAppove'       => 1
				);  
				 $this->db->insert('acc_transaction',$cc);
				
				 //Cash In hand Debit for paid value
				 $cdv = array(
				  'VNo'            =>  $invoice_no,
				  'Vtype'          =>  'CIV',
				  'VDate'          =>  $saveddate,
				  'COAID'          =>  1020101,
				  'Narration'      =>  'Cash in hand Debit For Invoice#'.$invoice_no,
				  'Debit'          =>  $this->input->post('grandtotal'),
				  'Credit'         =>  0,
				  'StoreID'        =>  0,
				  'IsPosted'       =>  1,
				  'CreateBy'       => $saveid,
				  'CreateDate'     => $saveddate,
				  'IsAppove'       => 1
				); 
				 $this->db->insert('acc_transaction',$cdv);
				}	
			}
		    
			
		}
	public function payment_update($id = null){
			$this->db->select('*');
			$this->db->from('customer_order');
			$this->db->where('order_id',$id);
			$query = $this->db->get();
			$orderinfo=$query->row();
			
			$this->db->select('*');
			$this->db->from('bill');
			$this->db->where('order_id',$id);
			$query = $this->db->get();
			
			if ($query->num_rows() > 0) {
			return false;	
			}
			else{
			$saveid=$this->session->userdata('id');
			$saveddate=date('Y-m-d H:i:s');
			$billinfo=array(
			'customer_id'			=>	$orderinfo->customer_id,
			'order_id'		        =>	$id,
			'total_amount'	        =>	$this->input->post('subtotal'),
			'discount'	            =>	$this->input->post('discount'),
			'service_charge'	    =>	$this->input->post('scharge'),
			'VAT'		 	        =>  $this->input->post('tax'),
			'bill_amount'		    =>	$this->input->post('grandtotal'),
			'bill_date'		        =>	date('Y-m-d'),
			'bill_time'		        =>	date('H:i:s'),
			'bill_status'		    =>	1,
			'payment_method_id'		=>	$this->input->post('card_type'),
			'create_by'		        =>	$saveid,
			'create_date'		    =>	date('Y-m-d')
		);
		$this->db->insert('bill',$billinfo);
		$billid = $this->db->insert_id();
		$cardinfo=array(
			'bill_id'			    =>	$billid,
			'card_no'		        =>	$this->input->post('card_no'),
			'issuer_name'	        =>	$this->input->post('card_holdername')
		);
		$this->db->insert('bill_card_payment',$cardinfo);
				$updatetData = array(
				   'order_status'     => 4,
				  );
		        $this->db->where('order_id',$id);
				$this->db->update('customer_order',$updatetData);
				// Find the acc COAID for the Transaction
				$custmercode= $this->input->post('custmercode');
			    $custmername= $this->input->post('custmername');
				$invoice_no= $this->input->post('saleinvoice');
				$headn = $custmercode.'-'.$custmername;
				$coainfo = $this->db->select('*')->from('acc_coa')->where('HeadName',$headn)->get()->row();
				$customer_headcode = $coainfo->HeadCode;
				$trans_coa = $this->db->select('*')->from('acc_transaction')->where('VNo',$invoice_no)->where('COAID',$customer_headcode)->get()->row();
			    $updateid=$trans_coa->ID;
				$sell_coa= $this->db->select('*')->from('acc_transaction')->where('VNo',$invoice_no)->where('COAID','1020101')->get()->row();	
		        $updatesellid=$sell_coa->ID;
				//Customer debit for Product Value
				$invoice_no=$sino;
				 $cosdr = array(
				  'Vtype'          =>  'CIV',
				  'VDate'          =>  $saveddate,
				  'Debit'          =>  $this->input->post('grandtotal'),
				  'UpdateBy'       => $saveid,
				  'UpdateDate'     => $saveddate
				); 
		    $this->db->where('ID',$updateid);
	        $this->db->update('acc_transaction',$cosdr);
				 
				 //Sell Credit for Cash In hand
				 $cdv = array(
				  'Vtype'          =>  'CIV',
				  'VDate'          =>  $saveddate,
				  'Credit'         =>  $this->input->post('grandtotal'),
				  'UpdateBy'       => $saveid,
				  'UpdateDate'     => $saveddate
				); 
				$this->db->where('ID',$updatesellid);
                $this->db->update('acc_transaction',$cdv);	
				
			}
		    
			
		}
	public function billinfo($id = null){
		$this->db->select('*');
        $this->db->from('bill');
		$this->db->where('order_id',$id);
		$query = $this->db->get();
		$billinfo=$query->row();
		return $billinfo;
		}
	public function customerinfo($id = null){
		$this->db->select('*');
        $this->db->from('customer_info');
		$this->db->where('customer_id',$id);
		$query = $this->db->get();
		$customer=$query->row();
		return $customer;
		}
	public function findById($id = null)
	{ 
		$this->db->select('item_foods.*,variant.variantid,variant.variantName,variant.price');
        $this->db->from('item_foods');
		$this->db->join('variant','item_foods.ProductsID=variant.menuid','left');
		$this->db->where('CategoryID',$id);
		$query = $this->db->get();
		$itemlist=$query->result();
	    return $itemlist;
	}
	
	public function getiteminfo($id = null)
	{ 
		$this->db->select('*');
        $this->db->from('item_foods');
		$this->db->where('ProductsID',$id);
		$query = $this->db->get();
		$itemlist=$query->row();
	    return $itemlist;
	}
	
	public function searchprod($cid = null,$pname= null)
	{ 
		$this->db->select('item_foods.*,variant.variantid,variant.variantName,variant.price');
        $this->db->from('item_foods');
		$this->db->join('variant','item_foods.ProductsID=variant.menuid','left');
		if(!empty($cid)){
		$this->db->like('CategoryID',$cid);
		}
		$this->db->like('ProductName',$pname);
		$this->db->where('ProductsIsActive',1);
		$query = $this->db->get();
		$itemlist=$query->result();
	    return $itemlist;
	}
	public function getuniqeproduct($pid= null)
	{ 
		$this->db->select('item_foods.*,variant.variantid,variant.variantName,variant.price');
        $this->db->from('item_foods');
		$this->db->join('variant','item_foods.ProductsID=variant.menuid','left');
		$this->db->where('ProductsID',$pid);
		$query = $this->db->get();
		$item=$query->row();
	    return $item;
	}
	public function searchdropdown($pname= null){
		$this->db->select('item_foods.ProductsID as id,item_foods.ProductName as text');
        $this->db->from('item_foods');
      	$this->db->like('ProductName',$pname);
		$this->db->where('ProductsIsActive',1);
		$query = $this->db->get();
		$itemlist=$query->result();
	    return $itemlist;

	}
	public function productinfo($id){
		$this->db->select('item_foods.*,variant.variantid,variant.variantName,variant.price');
        $this->db->from('item_foods');
		$this->db->join('variant','item_foods.ProductsID=variant.menuid','left');
		$this->db->where('ProductsID',$id);
		$query = $this->db->get();
		$itemlist=$query->row();
	    return $itemlist;
		}
	public function findid($id = null,$sid = null)
	{ 
		$this->db->select('item_foods.*,variant.variantid,variant.variantName,variant.price');
        $this->db->from('item_foods');
		$this->db->join('variant','item_foods.ProductsID=variant.menuid','left');
		$this->db->where('menuid',$id);
		$this->db->where('variantid',$sid);
		$query = $this->db->get();
		$itemlist=$query->row();
	    return $itemlist;
		
	}
 
 
   public function findaddons($id = null)
	{ 
		$this->db->select('add_ons.*');
        $this->db->from('menu_add_on');
		$this->db->join('add_ons','menu_add_on.add_on_id = add_ons.add_on_id','left');
		$this->db->where('menu_id',$id);
		$query = $this->db->get();
		$addons=$query->result();
	    return $addons;
	}
	 
	public function finditem($product_name)
		{ 
		$this->db->select('*');
		$this->db->from('ingredients');
		$this->db->where('is_active',1);
		$this->db->like('ingredient_name', $product_name);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();	
		}
		return false;
		}
	
//category Dropdown
 public function category_dropdown()
	{
		$data = $this->db->select("*")
			->from('item_category')
			->get()
			->result();

		$list[''] = 'Select Food Category';
		if (!empty($data)) {
			foreach($data as $value)
				$list[$value->CategoryID] = $value->Name;
			return $list;
		} else {
			return false; 
		}
	}
public function customer_dropdown()
	{
		$data = $this->db->select("*")
			->from('customer_info')
			->get()
			->result();

		$list[''] = 'Select Customer';
		if (!empty($data)) {
			foreach($data as $value)
				$list[$value->customer_id] = $value->customer_name;
			return $list;
		} else {
			return false; 
		}
	}
 public function ctype_dropdown()
	{
		$data = $this->db->select("*")
			->from('customer_type')
			->get()
			->result();

		$list[''] = 'Select Customer Type';
		if (!empty($data)) {
			foreach($data as $value)
				$list[$value->customer_type_id] = $value->customer_type;
			return $list;
		} else {
			return false; 
		}
	}
  public function thirdparty_dropdown()
	{
		$data = $this->db->select("*")
			->from('tbl_thirdparty_customer')
			->get()
			->result();

		$list[''] = 'Select Delivary Company';
		if (!empty($data)) {
			foreach($data as $value)
				$list[$value->companyId] = $value->company_name;
			return $list;
		} else {
			return false; 
		}
	}
  public function bank_dropdown()
	{
		$data = $this->db->select("*")
			->from('tbl_bank')
			->get()
			->result();

		$list[''] = 'Select Bank';
		if (!empty($data)) {
			foreach($data as $value)
				$list[$value->bankid] = $value->bank_name;
			return $list;
		} else {
			return false; 
		}
	}
 public function allterminal_dropdown()
	{
		$data = $this->db->select("*")
			->from('tbl_card_terminal')
			->get()
			->result();

		$list[''] = 'Select Card Terminal';
		if (!empty($data)) {
			foreach($data as $value)
				$list[$value->card_terminalid] = $value->terminal_name;
			return $list;
		} else {
			return false; 
		}
	}
 public function waiter_dropdown()
	{
		$data = $this->db->select("emp_his_id,first_name,last_name")
			->from('employee_history')
			->where('pos_id',6)
			->get()
			->result();

		$list[''] = 'Select Waiter';
		if (!empty($data)) {
			foreach($data as $value)
				$list[$value->emp_his_id] = $value->first_name." ".$value->last_name;
			return $list;
		} else {
			return false; 
		}
	}
	public function table_dropdown()
	{
		$data = $this->db->select("*")
			->from('rest_table')
			->get()
			->result();

		$list[''] = 'Select Table';
		if (!empty($data)) {
			foreach($data as $value)
				$list[$value->tableid] = $value->tablename;
			return $list;
		} else {
			return false; 
		}
	}
 public function pmethod_dropdown(){
	 	$data = $this->db->select("*")
			->from('payment_method')
			->where('is_active',1)
			->get()
			->result();

		$list[''] = 'Select Method';
		if (!empty($data)) {
			foreach($data as $value)
				$list[$value->payment_method_id] = $value->payment_method;
			return $list;
		} else {
			return false; 
		}
	 }
   //Pending Order
  public function read($select_items, $table, $where_array)
    {
	    $this->db->select($select_items);
        $this->db->from($table);
        foreach ($where_array as $field => $value) {
            $this->db->where($field, $value);
        }
        return $this->db->get()->row();
    }
	public function read_all($select_items, $table, $where_array, $order_by_name = NULL, $order_by = NULL)
    {
        $this->db->select($select_items);
        $this->db->from($table);
        foreach ($where_array as $field => $value) {
            $this->db->where($field, $value);
        }
        if ($order_by_name != NULL && $order_by != NULL)
        {
            $this->db->order_by($order_by_name, $order_by);
        }
        return $this->db->get()->result();
    }
	public function readupdate($select_items, $table, $where_array)
    {
	    $this->db->select($select_items);
        $this->db->from($table);
        foreach ($where_array as $field => $value) {
            $this->db->where($field, $value);
        }
        $this->db->order_by('updateid', 'DESC');
        $this->db->limit(1);
        //echo $this->db->last_query();
        return $this->db->get()->row();
    }
    public function read_allgroup($select_items, $table, $where_array)
    {
        $this->db->select($select_items);
        $this->db->from($table);
        foreach ($where_array as $field => $value) {
            $this->db->where($field, $value);
        }
        $this->db->order_by('ordid', 'Asc');
      
        return $this->db->get()->result();
    }
	
	public function orderlist($limit = null, $start = null){
			$this->db->select('customer_order.*,customer_info.customer_name,customer_type.customer_type,employee_history.first_name,employee_history.last_name,rest_table.tablename');
			$this->db->from('customer_order');
			$this->db->join('customer_info','customer_order.customer_id=customer_info.customer_id','left');
			$this->db->join('customer_type','customer_order.cutomertype=customer_type.customer_type_id','left');
			$this->db->join('employee_history','customer_order.waiter_id=employee_history.emp_his_id','left');
			$this->db->join('rest_table','customer_order.table_no=rest_table.tableid','left');
			$this->db->order_by('customer_order.order_id', 'DESC');
			//$this->db->group_by('customer_order.order_id');
			$this->db->limit($limit, $start);
			$query = $this->db->get();
			$orderdetails=$query->result();
			return $orderdetails;
		}
	public function count_order()
	{
		$this->db->select('customer_order.*,customer_info.customer_name,customer_type.customer_type,employee_history.first_name,employee_history.last_name,rest_table.tablename');
		$this->db->from('customer_order');
		$this->db->join('customer_info','customer_order.customer_id=customer_info.customer_id','left');
		$this->db->join('customer_type','customer_order.cutomertype=customer_type.customer_type_id','left');
		$this->db->join('employee_history','customer_order.waiter_id=employee_history.emp_his_id','left');
		$this->db->join('rest_table','customer_order.table_no=rest_table.tableid','left');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();  
        }
        return false;
	}
    public function pendingorder($limit = null, $start = null, $status= null){
	   	$this->db->select('customer_order.*,customer_info.customer_name,customer_type.customer_type,employee_history.first_name,employee_history.last_name,rest_table.tablename');
        $this->db->from('customer_order');
		$this->db->join('customer_info','customer_order.customer_id=customer_info.customer_id','left');
		$this->db->join('customer_type','customer_order.cutomertype=customer_type.customer_type_id','left');
		$this->db->join('employee_history','customer_order.waiter_id=employee_history.emp_his_id','left');
		$this->db->join('rest_table','customer_order.table_no=rest_table.tableid','left');
		$this->db->where('customer_order.order_status',$status);
		$this->db->limit($limit, $start);
		//$this->db->group_by('customer_order.order_id');
		$query = $this->db->get();
		$orderdetails=$query->result();
	    return $orderdetails;
	   }
	public function count_canorder($status= null)
	{
		$this->db->select('customer_order.*,customer_info.customer_name,customer_type.customer_type,employee_history.first_name,employee_history.last_name,rest_table.tablename');
        $this->db->from('customer_order');
		$this->db->join('customer_info','customer_order.customer_id=customer_info.customer_id','left');
		$this->db->join('customer_type','customer_order.cutomertype=customer_type.customer_type_id','left');
		$this->db->join('employee_history','customer_order.waiter_id=employee_history.emp_his_id','left');
		$this->db->join('rest_table','customer_order.table_no=rest_table.tableid','left');
		$this->db->where('customer_order.order_status',$status);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();  
        }
        return false;
	}
	public function completeorder($limit = null, $start = null, $status= null){
	   	$this->db->select('customer_order.*,customer_info.customer_name,customer_type.customer_type,employee_history.first_name,employee_history.last_name,rest_table.tablename');
        $this->db->from('customer_order');
		$this->db->join('customer_info','customer_order.customer_id=customer_info.customer_id','left');
		$this->db->join('customer_type','customer_order.cutomertype=customer_type.customer_type_id','left');
		$this->db->join('employee_history','customer_order.waiter_id=employee_history.emp_his_id','left');
		$this->db->join('rest_table','customer_order.table_no=rest_table.tableid','left');
		$this->db->join('bill','customer_order.order_id=bill.order_id','left');
		$this->db->where('bill.bill_status',$status);
		$this->db->limit($limit, $start);
		//$this->db->group_by('customer_order.order_id');
		$query = $this->db->get();
		$orderdetails=$query->result();
	    return $orderdetails;
	   }
	 public function count_comorder($status)
	{
		$this->db->select('customer_order.*,customer_info.customer_name,customer_type.customer_type,employee_history.first_name,employee_history.last_name,rest_table.tablename');
        $this->db->from('customer_order');
		$this->db->join('customer_info','customer_order.customer_id=customer_info.customer_id','left');
		$this->db->join('customer_type','customer_order.cutomertype=customer_type.customer_type_id','left');
		$this->db->join('employee_history','customer_order.waiter_id=employee_history.emp_his_id','left');
		$this->db->join('rest_table','customer_order.table_no=rest_table.tableid','left');
		$this->db->join('bill','customer_order.order_id=bill.order_id','left');
		$this->db->where('bill.bill_status',$status);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();  
        }
        return false;
	}  
	public function customerorder($id,$nststus=null){
		$this->db->select('order_menu.*,item_foods.ProductName,variant.variantid,variant.variantName,variant.price');
        $this->db->from('order_menu');
		$this->db->join('item_foods','order_menu.menu_id=item_foods.ProductsID','left');
		$this->db->join('variant','order_menu.varientid=variant.variantid','left');
		$this->db->where('order_menu.order_id',$id);
		if($nststus==1){
		$this->db->where('order_menu.isupdate',$nststus);
		}
		$query = $this->db->get();
		$orderinfo=$query->result();
	    return $orderinfo;
		}
	public function customerorderkitchen($id,$kitchen){
		$this->db->select('order_menu.*,item_foods.ProductName,item_foods.kitchenid,item_foods.cookedtime,variant.variantid,variant.variantName,variant.price');
        $this->db->from('order_menu');
		$this->db->join('item_foods','order_menu.menu_id=item_foods.ProductsID','left');
		$this->db->join('variant','order_menu.varientid=variant.variantid','left');
		$this->db->where('order_menu.order_id',$id);
		$this->db->where('item_foods.kitchenid',$kitchen);
		$query = $this->db->get();
		$orderinfo=$query->result();
		//echo $this->db->last_query();
	    return $orderinfo;
		}
	public function kitchen_ajaxorderinfoall($id){
		$this->db->select('customer_order.*,customer_info.customer_name,customer_type.customer_type,employee_history.first_name,employee_history.last_name,rest_table.tablename');
        $this->db->from('customer_order');
		$this->db->join('customer_info','customer_order.customer_id=customer_info.customer_id','left');
		$this->db->join('customer_type','customer_order.cutomertype=customer_type.customer_type_id','left');
		$this->db->join('employee_history','customer_order.waiter_id=employee_history.emp_his_id','left');
		$this->db->join('rest_table','customer_order.table_no=rest_table.tableid','left');
		$this->db->where('customer_order.order_id',$id);
		$this->db->group_by('customer_order.order_id');
		$query = $this->db->get();
		//echo $this->db->last_query();
		$orderdetails=$query->row();
	    return $orderdetails;
		
		}
	public function kitchen_ajaxorderinfo($id){
		$this->db->select('customer_order.*,customer_info.customer_name,customer_info.memberid,customer_type.customer_type,employee_history.first_name,employee_history.last_name,rest_table.tablename');
        $this->db->from('customer_order');
		$this->db->join('customer_info','customer_order.customer_id=customer_info.memberid','left');
		$this->db->join('customer_type','customer_order.cutomertype=customer_type.customer_type_id','left');
		$this->db->join('employee_history','customer_order.waiter_id=employee_history.emp_his_id','left');
		$this->db->join('rest_table','customer_order.table_no=rest_table.tableid','left');
		$this->db->where('customer_order.order_id',$orderid);
		$this->db->group_by('customer_order.order_id');
		$query = $this->db->get();
		//echo $this->db->last_query();
		$orderdetails=$query->result();
	    return $orderdetails;
		
		}
	public function update_order($data = array())
	{
		return $this->db->where('order_id',$data["order_id"])->update('customer_order', $data);
	}
	public function cartitem_delete($id = null,$orderid=null)
	{
		$this->db->where('row_id',$id)->delete('order_menu');

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	} 
	public function show_marge_payment($id){
		$customer_id = $this->db->select("customer_id")->from('customer_order')->where('order_id',$id)->get()->row();
		$where="(order_status = 1 OR order_status = 2 OR order_status = 3)";
		$marge=$this->db->select("*")->from('customer_order')->where('customer_id',$customer_id->customer_id)->where($where)->get();
		$orderdetails=$marge->result();
	    return $orderdetails;
		
	}
	public function uniqe_order_id($id){
		$this->db->select('*');
        $this->db->from('customer_order');
		$this->db->where('order_id',$id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->row();	
		}
		return false;
		}
	public function margeview($id){
		$this->db->select('customer_order.*,order_menu.*,item_foods.ProductName,variant.variantid,variant.variantName,variant.price');
        $this->db->from('customer_order');		
		$this->db->join('order_menu','customer_order.order_id=order_menu.order_id','left');
		$this->db->join('item_foods','order_menu.menu_id=item_foods.ProductsID','Inner');
		$this->db->join('variant','order_menu.varientid=variant.variantid','Inner');
		$this->db->where('customer_order.marge_order_id',$id);
		$query = $this->db->get();
		//echo $this->db->last_query();
		if ($query->num_rows() > 0) {
			return $query->result();	
		}
		return false;
		}
	public function margebill($id){
		$this->db->select('customer_order.*,bill.bill_status,bill.service_charge,bill.discount,bill.VAT');
        $this->db->from('customer_order');		
		$this->db->join('bill','customer_order.order_id=bill.order_id','left');
		$this->db->where('customer_order.marge_order_id',$id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();	
		}
		return false;
		}
	public function customerorderMarge($id,$nststus=null){
		$this->db->select('order_menu.*,item_foods.ProductName,variant.variantid,variant.variantName,variant.price');
        $this->db->from('order_menu');
		$this->db->join('item_foods','order_menu.menu_id=item_foods.ProductsID','left');
		$this->db->join('variant','order_menu.varientid=variant.variantid','left');
		$this->db->where_in('order_menu.order_id',$id);
		if($nststus==1){
		$this->db->where('order_menu.isupdate',$nststus);
		}
		$query = $this->db->get();
		$orderinfo=$query->result();
	    return $orderinfo;
		}
	
	public function check_order($orderid,$pid,$vid){
		$this->db->select('*');
        $this->db->from('order_menu');
		$this->db->where('order_id',$orderid);
		$this->db->where('menu_id',$pid);
		$this->db->where('varientid',$vid);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->row();	
		}
		return false;
		}
   public function new_entry($data = array())
	{
		return $this->db->insert('order_menu', $data);
	} 
	public function update_info($table, $data, $field_name, $field_value)
    {
        $this->db->where($field_name, $field_value);
        $this->db->update($table, $data);
        return $this->db->affected_rows();
    }
	public function settinginfo()
	{ 
		return $this->db->select("*")->from('setting')
			->get()
			->row();
	}
	public function currencysetting($id = null)
	{ 
		return $this->db->select("*")->from('currency')
			->where('currencyid',$id) 
			->get()
			->row();
	}
	public function get_ongoingorder(){
		$cdate=date('Y-m-d');
		$where="customer_order.order_date = '".$cdate."' AND ((customer_order.order_status = 1 OR customer_order.order_status = 2 OR customer_order.order_status = 3) AND ((customer_order.cutomertype = 99 AND customer_order.orderacceptreject = 1) || (customer_order.cutomertype = 1 || customer_order.orderacceptreject != 1)))";
		$this->db->select('customer_order.*,customer_info.customer_name,customer_type.customer_type,employee_history.first_name,employee_history.last_name,rest_table.tablename');
        $this->db->from('customer_order');
		$this->db->join('customer_info','customer_order.customer_id=customer_info.customer_id','left');
		$this->db->join('customer_type','customer_order.cutomertype=customer_type.customer_type_id','left');
		$this->db->join('employee_history','customer_order.waiter_id=employee_history.emp_his_id','left');
		$this->db->join('rest_table','customer_order.table_no=rest_table.tableid','left');
		$this->db->where($where);
		$this->db->order_by('customer_order.order_id','desc');
		$query = $this->db->get();
		//echo $this->db->last_query();
		$orderdetails=$query->result();
	    return $orderdetails;
		}
		public function get_unique_ongoingorder_id($id){
		
		$where="customer_order.order_id = '".$id."'";
		$this->db->select('customer_order.*,customer_info.customer_name,customer_type.customer_type,employee_history.first_name,employee_history.last_name,rest_table.tablename');
        $this->db->from('customer_order');
		$this->db->join('customer_info','customer_order.customer_id=customer_info.customer_id','left');
		$this->db->join('customer_type','customer_order.cutomertype=customer_type.customer_type_id','left');
		$this->db->join('employee_history','customer_order.waiter_id=employee_history.emp_his_id','left');
		$this->db->join('rest_table','customer_order.table_no=rest_table.tableid','left');
		$this->db->where($where);
		$this->db->order_by('customer_order.order_id','desc');
		$query = $this->db->get();
		//echo $this->db->last_query();
		$orderdetails=$query->result();
	    return $orderdetails;
		}

	public function get_unique_ongoingorder($name){
		$cdate=date('Y-m-d');
		$where="customer_order.order_date = '".$cdate."' AND customer_order.cutomertype !=2 AND (customer_order.order_status = 1 OR customer_order.order_status = 2 OR customer_order.order_status = 3)";
		$this->db->select('customer_order.order_id as id,CONCAT(rest_table.tablename, "(", customer_order.order_id,")") as text');
        $this->db->from('customer_order');
		$this->db->join('customer_info','customer_order.customer_id=customer_info.customer_id','left');
		$this->db->join('customer_type','customer_order.cutomertype=customer_type.customer_type_id','left');
		$this->db->join('employee_history','customer_order.waiter_id=employee_history.emp_his_id','left');
		$this->db->join('rest_table','customer_order.table_no=rest_table.tableid','left');
		$this->db->like('customer_order.order_id',$name);
		$this->db->where($where);
		$query = $this->db->get();
		//echo $this->db->last_query();
		$tablewiseorderdetails=$query->result();
	    return $tablewiseorderdetails;
	}	

	public function kitchen_ongoingorder($id){
		$cdate=date('Y-m-d');
		$where="customer_order.order_date = '".$cdate."' AND order_menu.allfoodready IS NULL AND ((customer_order.order_status = 1 OR customer_order.order_status = 2) AND ((customer_order.cutomertype = 2 AND customer_order.orderacceptreject = 1) || (customer_order.cutomertype = 99 AND customer_order.orderacceptreject = 1) || (customer_order.cutomertype = 1 || customer_order.orderacceptreject != 1)))";
		$this->db->select('customer_order.*,item_foods.kitchenid,order_menu.menu_id,customer_info.customer_name,customer_type.customer_type,employee_history.first_name,employee_history.last_name,rest_table.tablename');
        $this->db->from('customer_order');
		$this->db->join('customer_info','customer_order.customer_id=customer_info.customer_id','left');
		$this->db->join('customer_type','customer_order.cutomertype=customer_type.customer_type_id','left');
		$this->db->join('employee_history','customer_order.waiter_id=employee_history.emp_his_id','left');
		$this->db->join('rest_table','customer_order.table_no=rest_table.tableid','left');
		$this->db->join('order_menu','order_menu.order_id=customer_order.order_id','left');
		$this->db->join('item_foods','item_foods.ProductsID=order_menu.menu_id','Inner');
		$this->db->where($where);
		$this->db->where('item_foods.kitchenid',$id);
		$this->db->group_by('customer_order.order_id');
		$query = $this->db->get();
		//echo $this->db->last_query();
		$orderdetails=$query->result();
	    return $orderdetails;
		}
	public function kitchen_ongoingorderall(){
		$cdate=date('Y-m-d');
		$where="customer_order.order_date = '".$cdate."' AND ((customer_order.order_status = 1 OR customer_order.order_status = 2) AND ((customer_order.cutomertype = 2 AND customer_order.orderacceptreject = 1) || (customer_order.cutomertype = 99 AND customer_order.orderacceptreject = 1) || (customer_order.cutomertype = 1 || customer_order.orderacceptreject != 1)))";
		$this->db->select('customer_order.*,customer_info.customer_name,customer_type.customer_type,employee_history.first_name,employee_history.last_name,rest_table.tablename');
        $this->db->from('customer_order');
		$this->db->join('customer_info','customer_order.customer_id=customer_info.customer_id','left');
		$this->db->join('customer_type','customer_order.cutomertype=customer_type.customer_type_id','left');
		$this->db->join('employee_history','customer_order.waiter_id=employee_history.emp_his_id','left');
		$this->db->join('rest_table','customer_order.table_no=rest_table.tableid','left');
		$this->db->where($where);
		$query = $this->db->get();
		$orderdetails=$query->result();
	    return $orderdetails;
		}
	public function counter_ongoingorder(){
		$cdate=date('Y-m-d');
		$where="customer_order.order_date = '".$cdate."' AND (customer_order.order_status = 1 OR customer_order.order_status = 2 OR customer_order.order_status = 3)";
		$this->db->select('customer_order.*,customer_info.customer_name,customer_type.customer_type,employee_history.first_name,employee_history.last_name,rest_table.tablename');
        $this->db->from('customer_order');
		$this->db->join('customer_info','customer_order.customer_id=customer_info.customer_id','left');
		$this->db->join('customer_type','customer_order.cutomertype=customer_type.customer_type_id','left');
		$this->db->join('employee_history','customer_order.waiter_id=employee_history.emp_his_id','left');
		$this->db->join('rest_table','customer_order.table_no=rest_table.tableid','left');
		$this->db->where($where);
		$query = $this->db->get();
		//echo $this->db->last_query();
		$orderdetails=$query->result();
	    return $orderdetails;
		}
	public function counter_ongoingorderlimit($limit=null,$start=null){
		$cdate=date('Y-m-d');
		$where="customer_order.order_date = '".$cdate."' AND (customer_order.order_status = 1 OR customer_order.order_status = 2 OR customer_order.order_status = 3)";
		$this->db->select('customer_order.*,customer_info.customer_name,customer_type.customer_type,employee_history.first_name,employee_history.last_name,rest_table.tablename');
        $this->db->from('customer_order');
		$this->db->join('customer_info','customer_order.customer_id=customer_info.customer_id','left');
		$this->db->join('customer_type','customer_order.cutomertype=customer_type.customer_type_id','left');
		$this->db->join('employee_history','customer_order.waiter_id=employee_history.emp_his_id','left');
		$this->db->join('rest_table','customer_order.table_no=rest_table.tableid','left');
		$this->db->where($where);
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		//echo $this->db->last_query();
		$orderdetails=$query->result();
	    return $orderdetails;
		}
	private function get_alltodayorder_query()
	{
			$column_order = array(null, 'customer_order.saleinvoice','customer_info.customer_name','customer_type.customer_type','employee_history.first_name','employee_history.last_name','rest_table.tablename','customer_order.order_date','customer_order.totalamount'); //set column field database for datatable orderable
			$column_search = array('customer_order.saleinvoice','customer_info.customer_name','customer_type.customer_type','employee_history.first_name','employee_history.last_name','rest_table.tablename','customer_order.order_date','customer_order.totalamount'); //set column field database for datatable searchable 
			$order = array('customer_order.order_id' => 'asc');
		
		$cdate=date('Y-m-d');
		$this->db->select('customer_order.*,customer_info.customer_name,customer_type.customer_type,employee_history.first_name,employee_history.last_name,rest_table.tablename,bill.bill_status');
        $this->db->from('customer_order');
		$this->db->join('customer_info','customer_order.customer_id=customer_info.customer_id','left');
		$this->db->join('customer_type','customer_order.cutomertype=customer_type.customer_type_id','left');
		$this->db->join('employee_history','customer_order.waiter_id=employee_history.emp_his_id','left');
		$this->db->join('rest_table','customer_order.table_no=rest_table.tableid','left');
		$this->db->join('bill','customer_order.order_id=bill.order_id','left');
		$this->db->where('customer_order.order_date',$cdate);
		$this->db->where('bill.bill_status',1);
		$this->db->order_by('customer_order.order_id','desc');
		$i = 0;
	
		foreach ($column_search as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); 
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($order))
		{
			$order = $order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}
	public function get_completeorder()
	{
		$this->get_alltodayorder_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}
	public function count_filtertorder()
	{
		$this->get_alltodayorder_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_alltodayorder()
	{
		$cdate=date('Y-m-d');
		$this->db->select('customer_order.*,customer_info.customer_name,customer_type.customer_type,employee_history.first_name,employee_history.last_name,rest_table.tablename,bill.bill_status');
        $this->db->from('customer_order');
		$this->db->join('customer_info','customer_order.customer_id=customer_info.customer_id','left');
		$this->db->join('customer_type','customer_order.cutomertype=customer_type.customer_type_id','left');
		$this->db->join('employee_history','customer_order.waiter_id=employee_history.emp_his_id','left');
		$this->db->join('rest_table','customer_order.table_no=rest_table.tableid','left');
		$this->db->join('bill','customer_order.order_id=bill.order_id','left');
		$this->db->where('customer_order.order_date',$cdate);
		$this->db->where('bill.bill_status',1);
		return $this->db->count_all_results();
	}
	
	private function get_completeonlineorder_query()
	{
			$column_order = array(null, 'customer_order.saleinvoice','customer_info.customer_name','customer_type.customer_type','employee_history.first_name','employee_history.last_name','rest_table.tablename','customer_order.order_date','customer_order.totalamount'); //set column field database for datatable orderable
			$column_search = array('customer_order.saleinvoice','customer_info.customer_name','customer_type.customer_type','employee_history.first_name','employee_history.last_name','rest_table.tablename','customer_order.order_date','customer_order.totalamount'); //set column field database for datatable searchable 
			$order = array('customer_order.order_id' => 'asc');
		
		$cdate=date('Y-m-d');
		$previousday = date('Y-m-d', strtotime($cdate. ' -2 days'));
		$condi = "customer_order.order_date BETWEEN '".$previousday."' AND '".$cdate."'";

		$this->db->select('customer_order.*,customer_info.customer_name,customer_type.customer_type,employee_history.first_name,employee_history.last_name,rest_table.tablename,bill.bill_status');
        $this->db->from('customer_order');
		$this->db->join('customer_info','customer_order.customer_id=customer_info.customer_id','left');
		$this->db->join('customer_type','customer_order.cutomertype=customer_type.customer_type_id','left');
		$this->db->join('employee_history','customer_order.waiter_id=employee_history.emp_his_id','left');
		$this->db->join('rest_table','customer_order.table_no=rest_table.tableid','left');
		$this->db->join('bill','customer_order.order_id=bill.order_id','left');
		$this->db->where($condi);
		$this->db->where('customer_order.cutomertype',2);
		$this->db->order_by('customer_order.order_id','desc');
		$i = 0;
	
		foreach ($column_search as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); 
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($order))
		{
			$order = $order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}
	public function get_completeonlineorder()
	{
		$this->get_completeonlineorder_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}
	public function count_filtertonlineorder()
	{
		$this->get_completeonlineorder_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_allonlineorder()
	{
		$cdate=date('Y-m-d');
		$previousday = date('Y-m-d', strtotime($cdate. ' -2 days'));
		$condi = "customer_order.order_date BETWEEN '".$previousday."' AND '".$cdate."'";
		$this->db->select('customer_order.*,customer_info.customer_name,customer_type.customer_type,employee_history.first_name,employee_history.last_name,rest_table.tablename,bill.bill_status');
        $this->db->from('customer_order');
		$this->db->join('customer_info','customer_order.customer_id=customer_info.customer_id','left');
		$this->db->join('customer_type','customer_order.cutomertype=customer_type.customer_type_id','left');
		$this->db->join('employee_history','customer_order.waiter_id=employee_history.emp_his_id','left');
		$this->db->join('rest_table','customer_order.table_no=rest_table.tableid','left');
		$this->db->join('bill','customer_order.order_id=bill.order_id','left');
		$this->db->where($condi);
		$this->db->where('customer_order.cutomertype',2);
		$this->db->where('bill.bill_status',1);
		return $this->db->count_all_results();
	}
private function get_qronlineorder_query()
	{
			$column_order = array(null, 'customer_order.saleinvoice','customer_info.customer_name','customer_type.customer_type','employee_history.first_name','employee_history.last_name','rest_table.tablename','customer_order.order_date','customer_order.totalamount'); //set column field database for datatable orderable
			$column_search = array('customer_order.saleinvoice','customer_info.customer_name','customer_type.customer_type','employee_history.first_name','employee_history.last_name','rest_table.tablename','customer_order.order_date','customer_order.totalamount'); //set column field database for datatable searchable 
			$order = array('customer_order.order_id' => 'asc');
		
		$cdate=date('Y-m-d');
		$previousday = date('Y-m-d', strtotime($cdate. ' -2 days'));
		$condi = "customer_order.order_date BETWEEN '".$previousday."' AND '".$cdate."'";
		$this->db->select('customer_order.*,customer_info.customer_name,customer_type.customer_type,employee_history.first_name,employee_history.last_name,rest_table.tablename,bill.bill_status');
        $this->db->from('customer_order');
		$this->db->join('customer_info','customer_order.customer_id=customer_info.customer_id','left');
		$this->db->join('customer_type','customer_order.cutomertype=customer_type.customer_type_id','left');
		$this->db->join('employee_history','customer_order.waiter_id=employee_history.emp_his_id','left');
		$this->db->join('rest_table','customer_order.table_no=rest_table.tableid','left');
		$this->db->join('bill','customer_order.order_id=bill.order_id','left');
		$this->db->where($condi);
		$this->db->where('customer_order.cutomertype',99);
		$this->db->order_by('customer_order.order_id','desc');
		$i = 0;
	
		foreach ($column_search as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); 
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($order))
		{
			$order = $order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}
	public function get_qronlineorder()
	{
		$this->get_qronlineorder_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}
	public function count_filtertqrorder()
	{
		$this->get_qronlineorder_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_allqrorder()
	{
		$cdate=date('Y-m-d');
		$previousday = date('Y-m-d', strtotime($cdate. ' -2 days'));
		$condi = "customer_order.order_date BETWEEN '".$previousday."' AND '".$cdate."'";
		$this->db->select('customer_order.*,customer_info.customer_name,customer_type.customer_type,employee_history.first_name,employee_history.last_name,rest_table.tablename,bill.bill_status');
        $this->db->from('customer_order');
		$this->db->join('customer_info','customer_order.customer_id=customer_info.customer_id','left');
		$this->db->join('customer_type','customer_order.cutomertype=customer_type.customer_type_id','left');
		$this->db->join('employee_history','customer_order.waiter_id=employee_history.emp_his_id','left');
		$this->db->join('rest_table','customer_order.table_no=rest_table.tableid','left');
		$this->db->join('bill','customer_order.order_id=bill.order_id','left');
		$this->db->where($condi);
		$this->db->where('customer_order.cutomertype',99);
		$this->db->where('bill.bill_status',1);
		return $this->db->count_all_results();
	}
public function selectmerge($orders){
		$cond="order_id IN($orders)";
		$this->db->select('*');
		$this->db->from('customer_order');
		$this->db->where($cond);
		$query = $this->db->get();
		return $query->result();
	}

 
public function settinginfolanguge($lang)
	{ 
		$values =  $this->db->select("phrase,$lang")->from('language')
			->get()->result();
			$strings =array();
			 foreach ($values as $file) {
          
            $strings[$file->phrase] = $file->$lang;
        }
			
			return $strings;
			
	}
public function get_orderlist(){
		$cdate=date('Y-m-d');
		$where="customer_order.order_date = '".$cdate."' AND ((customer_order.order_status = 1 OR customer_order.order_status = 2 OR customer_order.order_status = 3) AND ((customer_order.cutomertype = 2 AND customer_order.orderacceptreject = 1) || (customer_order.cutomertype = 99 AND customer_order.orderacceptreject = 1) || (customer_order.cutomertype = 1 || customer_order.orderacceptreject != 1)))";
		$this->db->select('customer_order.*,customer_info.customer_name,customer_type.customer_type,employee_history.first_name,employee_history.last_name,rest_table.tablename');
        $this->db->from('customer_order');
		$this->db->join('customer_info','customer_order.customer_id=customer_info.customer_id','left');
		$this->db->join('customer_type','customer_order.cutomertype=customer_type.customer_type_id','left');
		$this->db->join('employee_history','customer_order.waiter_id=employee_history.emp_his_id','left');
		$this->db->join('rest_table','customer_order.table_no=rest_table.tableid','left');
		$this->db->where($where);
		$this->db->group_by('customer_order.order_id');
		$this->db->order_by('customer_order.order_status','desc');
		$query = $this->db->get();
		//echo $this->db->last_query();
		$orderdetails=$query->result();
	    return $orderdetails;
		}
	public function get_itemlist($id){
			$this->db->select('order_menu.*,item_foods.ProductName,variant.variantid,variant.variantName,variant.price');
			$this->db->from('order_menu');
			$this->db->join('item_foods','order_menu.menu_id=item_foods.ProductsID','left');
			$this->db->join('variant','order_menu.varientid=variant.variantid','left');
			$this->db->where('order_menu.order_id',$id);
			$query = $this->db->get();
			$orderinfo=$query->result();
			//echo $this->db->last_query();
			return $orderinfo;
		}
}
