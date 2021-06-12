<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Welcome_model
 *
 * @author linktech
 */
class Hungry_model extends CI_Model{
    //put your code here
	public function allmenu_dropdown(){

        $this->db->select('*');
        $this->db->from('top_menu');
        $this->db->where('parentid', 0);
		$this->db->where('isactive', 1);
        $parent = $this->db->get();
        $menulist = $parent->result();
        $i=0;
        foreach($menulist as $sub_menu){
			//print_r($p_cat);
            $menulist[$i]->sub = $this->sub_menu($sub_menu->menuid);
			
            $i++;
        }
        return $menulist;
    }

    public function sub_menu($id){

        $this->db->select('*');
        $this->db->from('top_menu');
        $this->db->where('parentid', $id);
        $this->db->where('isactive', 1);
        $child = $this->db->get();
        $menulist = $child->result();
        $i=0;
        foreach($menulist as $sub_menu){
            $menulist[$i]->sub = $this->sub_menu($sub_menu->menuid);
            $i++;
        }
        return $menulist;       
    }
	
	public function insert_data($table, $data)
		{
			$this->db->insert($table, $data);
			return $this->db->insert_id();
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
		 public function update_date($table, $data, $field_name, $field_value)
			{
				$this->db->where($field_name, $field_value);
				$this->db->update($table, $data);
				return $this->db->affected_rows();
			}
		 public function read($select_items, $table, $where_array)
			{
			   
				$this->db->select($select_items);
				$this->db->from($table);
				foreach ($where_array as $field => $value) {
					$this->db->where($field, $value);
					
				}
				return $this->db->get()->row();
			}
		 public function read2($select_items, $table, $orderby, $where_array)
			{
			   
				$this->db->select($select_items);
				$this->db->from($table);
				foreach ($where_array as $field => $value) {
					$this->db->where($field, $value);
					
				}
				$this->db->order_by($orderby,'DESC');
				return $this->db->get()->row();
			}
		public function read_all($select_items, $table, $orderby,$delitem="",$stype="",$val="")
		{
			$this->db->select($select_items);
			$this->db->from($table);
			if($delitem!=""){
			$this->db->where($delitem,0);
			}
			if($stype!=""){
			$this->db->where($stype,$val);
			}
			$this->db->order_by($orderby,'DESC');
			return $this->db->get()->result();
		}
		public function read_all_slider($select_items, $table, $orderby,$delitem="",$stype="",$val="")
		{
			$this->db->select($select_items);
			$this->db->from($table);
			if($delitem!=""){
			$this->db->where($delitem,0);
			}
			if($stype!=""){
			$this->db->where($stype,$val);
			}
			$this->db->where('status',1);
			$this->db->order_by($orderby,'DESC');
			return $this->db->get()->result();
		}
	public function headcode(){
        $query=$this->db->query("SELECT MAX(HeadCode) as HeadCode FROM acc_coa WHERE HeadLevel='4' And HeadCode LIKE '102030%'");
        return $query->row();
    }
	public function ourteam(){
		$this->db->select('employee_history.emp_his_id,employee_history.employee_id,employee_history.first_name,employee_history.last_name,employee_history.picture,custom_table.custom_field,custom_table.custom_data');
        $this->db->from('employee_history');
		$this->db->join('custom_table','custom_table.employee_id=employee_history.employee_id','left');
		$this->db->where('employee_history.pos_id',1);
		$query = $this->db->get();
		$itemlist=$query->result();
	    return $itemlist;
		}
	public function todaydeals(){
		$today=date('Y-m-d');
		$this->db->select('item_foods.*,variant.variantid,variant.variantName,variant.price,count(order_menu.menu_id) as cnt');
        $this->db->from('item_foods');
		$this->db->join('variant','item_foods.ProductsID=variant.menuid','left');
		$this->db->join('order_menu','order_menu.menu_id=item_foods.ProductsID','left');
		$this->db->join('customer_order','customer_order.order_id=order_menu.order_id','inner');
		$this->db->where('customer_order.order_date',$today);
		$this->db->group_by('order_menu.menu_id');
		$this->db->order_by('cnt','DESC');
		$this->db->limit('1');
		$query = $this->db->get();
		$itemlist=$query->row();
	    return $itemlist;
		}
	public function bestseller(){
		$this->db->select('item_foods.*,variant.variantid,variant.variantName,variant.price');
        $this->db->from('item_foods');
		$this->db->join('variant','item_foods.ProductsID=variant.menuid','left');
		$this->db->where('item_foods.ProductsIsActive',1);
		$this->db->where('item_foods.OffersRate>0');
		$this->db->limit('15');
		$query = $this->db->get();
		$itemlist=$query->result();
	    return $itemlist;
		}
	public function relateditem($catid,$proid,$vid){
		$this->db->select('item_foods.*,variant.variantid,variant.variantName,variant.price');
        $this->db->from('item_foods');
		$this->db->join('variant','item_foods.ProductsID=variant.menuid','left');
		$this->db->where('ProductsIsActive',1);
		$this->db->where('item_foods.CategoryID',$catid);
		$this->db->where('variant.variantid!=',$vid);
		$query = $this->db->get();
		$itemlist=$query->result();
	    return $itemlist;
		}
	public function specialmenu(){
		$this->db->select('item_foods.*,variant.variantid,variant.variantName,variant.price');
        $this->db->from('item_foods');
		$this->db->join('variant','item_foods.ProductsID=variant.menuid','left');
		$this->db->where('item_foods.ProductsIsActive',1);
		$this->db->where('item_foods.special',1);
		$this->db->limit('10');
		$query = $this->db->get();
		$itemlist=$query->result();
	    return $itemlist;
		}
	public function searchinfo($product=null,$category=null,$limit = null, $start = null){
		$this->db->select('item_foods.*,variant.variantid,variant.variantName,variant.price');
        $this->db->from('item_foods');
		$this->db->join('variant','item_foods.ProductsID=variant.menuid','left');
		if((!empty($product)) && (!empty($category))){
		$this->db->where('item_foods.CategoryID',$category);
		$this->db->where('item_foods.ProductsID',$product);
		}
		elseif((empty($product)) && (!empty($category))){
		 $this->db->where('item_foods.CategoryID',$category);  
		}
		elseif((!empty($product)) && (empty($category))){
		 $this->db->where('item_foods.ProductsID',$product);  
		}		
		$this->db->where('item_foods.ProductsIsActive',1);
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		$itemlist=$query->result();
	    return $itemlist;
		}
	public function qrmenue($category=null){
		$this->db->select('item_foods.*,variant.variantid,variant.variantName,variant.price');
        $this->db->from('item_foods');
		$this->db->join('variant','item_foods.ProductsID=variant.menuid','left');
		$this->db->where($category);
		$this->db->where('item_foods.ProductsIsActive',1);
		$query = $this->db->get();
		$itemlist=$query->result();
		//echo $this->db->last_query();
	    return $itemlist;
		}
	public function categories(){
		 $this->db->select('*');
        $this->db->from('item_category');
        $this->db->where('parentid', 0);
		$this->db->where('CategoryIsActive',1);
        $parent = $this->db->get();
        $categories = $parent->result();
        $i=0;
        foreach($categories as $p_cat){
			//print_r($p_cat);
            $categories[$i]->sub = $this->sub_categories($p_cat->CategoryID);
			
            $i++;
        }
        return $categories;
		}
	 public function sub_categories($id){

        $this->db->select('*');
        $this->db->from('item_category');
        $this->db->where('parentid', $id);
        $this->db->where('CategoryIsActive',1);
        $child = $this->db->get();
        $categories = $child->result();
        $i=0;
        foreach($categories as $p_cat){
            $categories[$i]->sub = $this->sub_categories($p_cat->CategoryID);
            $i++;
        }
        return $categories;       
    }
	public function detailsinfo($pid,$vid){
		$this->db->select('item_foods.*,variant.variantid,variant.variantName,variant.price');
        $this->db->from('item_foods');
		$this->db->join('variant','item_foods.ProductsID=variant.menuid','left');
		$this->db->where('item_foods.ProductsIsActive',1);
		$this->db->where('item_foods.ProductsID',$pid);
		$this->db->where('variant.variantid',$vid);
		$this->db->where('item_foods.ProductsIsActive',1);
		$query = $this->db->get();
		$itemlist=$query->row();
	    return $itemlist;
		}
	public function finditem($id = null,$sid = null)
	{ 
		$this->db->select('item_foods.*,variant.variantid,variant.variantName,variant.price');
        $this->db->from('item_foods');
		$this->db->join('variant','item_foods.ProductsID=variant.menuid','left');
		$this->db->where('menuid',$id);
		$this->db->where('variantid',$sid);
		$this->db->where('item_foods.ProductsIsActive',1);
		$query = $this->db->get();
		$itemlist=$query->row();
	    return $itemlist;
		
	}
 public function getiteminfo($id = null)
	{ 
		$this->db->select('*');
        $this->db->from('item_foods');
		$this->db->where('ProductsID',$id);
		$this->db->where('ProductsIsActive',1);
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
	public function count_totalitem($product=null,$category=null){
		$this->db->select('item_foods.*,variant.variantid,variant.variantName,variant.price');
        $this->db->from('item_foods');
		$this->db->join('variant','item_foods.ProductsID=variant.menuid','left');
		if((!empty($product)) && (!empty($category))){
		$this->db->where('item_foods.CategoryID',$category);
		$this->db->where('item_foods.ProductsID',$product);
		}
		elseif((empty($product)) && (!empty($category))){
		 $this->db->where('item_foods.CategoryID',$category);  
		}
		elseif((!empty($product)) && (empty($category))){
		 $this->db->where('item_foods.ProductsID',$product);  
		}
		$this->db->where('item_foods.ProductsIsActive',1);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
            return $query->num_rows();  
        }
        return false;
		} 
	public function checkavailtable(){
		$newdate= $this->input->post('getdate');
		$gettime=$this->input->post('time');
		$nopeople=$this->input->post('people');
		$dateRange = "reserveday='$newdate' AND formtime<='$gettime' AND totime>='$gettime' AND person_capicity='$nopeople' AND status=2";
		$this->db->select('*');
        $this->db->from('tblreservation');
		$this->db->where($dateRange, NULL, FALSE); 
		$query = $this->db->get();
		$totalid='';
		 if ($query->num_rows() > 0) {
           $gettable=$query->result(); 
		   foreach($gettable as $selectedtable){
			   $totalid.=$selectedtable->tableid.",";
			   } 
			return $totalid=trim($totalid,',');    
        }
        return false;
		}
	public function checkfree($invalue,$person){
		$this->db->select('*');
        $this->db->from('rest_table');
		$this->db->where_not_in('tableid', $invalue);
		$this->db->where('person_capicity', $person); 
		$query = $this->db->get();
		 if ($query->num_rows() > 0) {
            return $query->result();    
        }
        return false;
		} 
	public function checktable($id){
		$this->db->select('tableid');
        $this->db->from('rest_table');
        $this->db->where('tableid', $id);
		$this->db->where('status', 1);
		$query = $this->db->get();
		 if ($query->num_rows() > 0) {
            return $query->row();    
        }
        return false;
		}
	public function insertcustomer($data = array(),$mobile){
		$islogin=$this->session->userdata('CusUserID');
        if (!empty($islogin)) {
		  return $returnid =   $islogin;
        } 
		else{
		$this->db->insert('customer_info', $data);
		return $returnid = $this->db->insert_id();
		}
		}
	public function read_rating($table,$field1,$field2,$field2value) {
		
        $this->db->select('count('.$field1.') as totalrate');
		$this->db->where( $field2, $field2value );
		$this->db->where($field1.'!=', '');
		$this->db->where('status', 1 );
		$query = $this->db->get($table);
        $total_active_events = $query->num_rows();
		$allrows = $query->row();
        if( $total_active_events > 0 ) {
            return $allrows;
        }
        return false;
		
    }
	public function read_average($table,$field1,$field2,$field2value) {
		
        $this->db->select('AVG('.$field1.') as averagerating');
		$this->db->where( $field2, $field2value );
		$this->db->where('status', 1 );
		$query = $this->db->get($table);
        $total_active_events = $query->num_rows();
		$allrows = $query->row();
        if( $total_active_events > 0 ) {
            return $allrows;
        }
        return false;
		
    }
	public function read_review($table,$field2,$field2value) {
		
        $this->db->select('*');
		$this->db->where( $field2, $field2value );
		$this->db->where('reviewtxt !=', '');
		$this->db->where('rating >', '4.4');
		$this->db->where('status', 1 );
		$this->db->order_by('rating','DESC');
		$this->db->limit('5');
		$query = $this->db->get($table);
        $total_active_events = $query->num_rows();
		$allrows = $query->result();
        if( $total_active_events > 0 ) {
            return $allrows;
        }
        return false;
		
    }
	public function orderitem($orderid,$customerid){
		$saveid=$customerid;
		$bill=1;
		$cid=$customerid;
		$newdate= date('Y-m-d');
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
				}
			}
		
		if($bill==1){
			$payment= $this->input->post('card_type');
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
		$billstatus=0;			
					if($payment==5){
						$billstatus=0;
						}
					else if($payment==6){
						$billstatus=0;
						}
					else if($payment==7){
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
			'total_amount'	        =>	$this->input->post('orggrandTotal'),
			'discount'	            =>	$this->input->post('invoice_discount'),
			'service_charge'	    =>	$this->input->post('service_charge'),
			'VAT'		 	        =>  $this->input->post('vat'),
			'bill_amount'		    =>	$this->input->post('grandtotal'),
			'bill_date'		        =>	$newdate,
			'bill_time'		        =>	date('H:i:s'),
			'bill_status'		    =>	$billstatus,
			'payment_method_id'		=>	$this->input->post('card_type'),
			'create_by'		        =>	$saveid,
			'create_date'		    =>	date('Y-m-d')
		);
		$this->db->insert('bill',$billinfo);
		$billid = $this->db->insert_id();
		
				$updatetData =array('order_status'     => 1);
		        $this->db->where('order_id',$orderid);
				$this->db->update('customer_order',$updatetData);
				
				// Find the acc COAID for the Transaction
				$cusifo = $this->db->select('*')->from('customer_info')->where('customer_id',$customerid)->get()->row();
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
			}
		return $orderid;
		}
	public function customerorder($id){
		$this->db->select('order_menu.*,item_foods.ProductName,variant.variantid,variant.variantName,variant.price');
        $this->db->from('order_menu');
		$this->db->join('item_foods','order_menu.menu_id=item_foods.ProductsID','left');
		$this->db->join('variant','order_menu.varientid=variant.variantid','left');
		$this->db->where('order_menu.order_id',$id);
		$query = $this->db->get();
		$orderinfo=$query->result();
	    return $orderinfo;
		}
	public function update_order($data = array())
	{
		return $this->db->where('order_id',$data["order_id"])->update('customer_order', $data);
	}
	public function billinfo($id = null){
		$this->db->select('*');
        $this->db->from('bill');
		$this->db->where('order_id',$id);
		$query = $this->db->get();
		$billinfo=$query->row();
		return $billinfo;
		}
	public function loginUser($username, $password)
        {
            $val=0;
			$this->db->select('*');
            $this->db->where('customer_email', $username);
			$this->db->where('password', $password);
			$query = $this->db->get('customer_info');
			$rows=$query->result(); 
			//print_r($rows);
			foreach ($rows as $row){
				$val=$row->customer_id;
				$customername=$row->customer_name;
				$customernumber=$row->cuntomer_no;
				$customeremail=$row->customer_email;
			}
			if($val > 0){ 
			//echo $vlcheck;
			$sessiondata = array(
				'CusUserID' =>$val,
				'cusfname' =>$customername,
				'customerno' =>$cuntomer_no,
				'CustomerEmail' =>$customeremail
			);
			//print_r($sessiondata);
			$this->session->set_userdata($sessiondata);
		 }
             return $val;
        }
	public function bookedtable($data = array())
	{
		return $this->db->insert('tblreservation', $data);
	}
	public function checkEmailOrPhoneIsRegistered($table, $data)
    {
        $this->db->select('*');
		$this->db->where('customer_email', $data['customer_email']);
        $query = $this->db->get($table)->row();
        $num_rows = $this->db->count_all_results();

        if ($num_rows > 0)
        {
            return $query;
        }
        else
        {
            return FALSE;
        }
    } 

	public function myorderlist($id){
		    $this->db->select('customer_order.*,customer_info.customer_name,customer_type.customer_type,employee_history.first_name,employee_history.last_name,rest_table.tablename');
			$this->db->from('customer_order');
			$this->db->join('customer_info','customer_order.customer_id=customer_info.customer_id','left');
			$this->db->join('customer_type','customer_order.cutomertype=customer_type.customer_type_id','left');
			$this->db->join('employee_history','customer_order.waiter_id=employee_history.emp_his_id','left');
			$this->db->join('rest_table','customer_order.table_no=rest_table.tableid','left');
			$this->db->order_by('customer_order.order_id', 'DESC');
			$this->db->where('customer_order.customer_id',$id);
			$query = $this->db->get();
			$orderdetails=$query->result();
			return $orderdetails;
		} 
	public function customerreservation($id){
		$this->db->select('tblreservation.*,customer_info.customer_name,customer_info.customer_phone,customer_info.customer_email,');
        $this->db->from('tblreservation');
		$this->db->join('customer_info','tblreservation.cid=customer_info.customer_id','left');
		$this->db->where('tblreservation.cid',$id);
		$query = $this->db->get();
		$orderinfo=$query->result();
	    return $orderinfo;
		}
	public function payment_info($id = null,$vat=null,$scharge=null,$discount=null,$subtotal,$gtotal){
	    
			$this->db->select('*');
			$this->db->from('customer_order');
			$this->db->where('order_id',$id);
			$query = $this->db->get();
			$orderinfo=$query->row();
			//echo $this->db->last_query();
			
			$this->db->select('*');
			$this->db->from('bill');
			$this->db->where('order_id',$id);
			$query1 = $this->db->get();
			
				$paymentinfo=$query1->row();
				$payment=$paymentinfo->payment_method_id;
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
			$saveid=$this->session->userdata('CusUserID');	
			$billinfo=array(
			'total_amount'	        =>	$subtotal,
			'discount'	            =>	$discount,
			'service_charge'	    =>	$scharge,
			'VAT'		 	        =>  $vat,
			'bill_amount'		    =>	$gtotal,
			'create_by'		        =>	$saveid
			);
			$this->db->where('order_id',$id);
			$this->db->update('bill',$billinfo);
			//print_r($billinfo);
			
			$this->db->select('*');
			$this->db->from('customer_info');
			$this->db->where('customer_id',$orderinfo->customer_id);
			$cquery = $this->db->get();
			$customerd=$cquery->row();
			
			// Find the acc COAID for the Transaction
				$custmercode= $customerd->cuntomer_no;
			    $custmername= $customerd->customer_name;
				$invoice_no= $orderinfo->saleinvoice;
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
				  'Debit'          =>  $gtotal,
				  'CreateBy'       => $saveid,
				  'CreateDate'     => $saveddate
				); 
				$this->db->where('ID',$detransac->ID);
			    $this->db->update('acc_transaction',$cosdr);
				 //Store credit for Product Value
				  $sc =array(
				  'Credit'         =>  $gtotal,
				  'CreateBy'       => $saveid,
				  'CreateDate'     => $saveddate,
				);  
				$this->db->where('ID',$storetransac->ID);
			    $this->db->update('acc_transaction',$sc);
				 
				 // Customer Credit for paid amount.
				  $cc =array(
				  'Credit'         =>  $gtotal,
				  'CreateBy'       => $saveid,
				  'CreateDate'     => $saveddate
				);  
				$this->db->where('ID',$crtransac->ID);
			    $this->db->update('acc_transaction',$cc);
				
				 //Cash In hand Debit for paid value
				 $cdv = array(
				  'Debit'          =>  $gtotal,
				  'CreateBy'       => $saveid,
				  'CreateDate'     => $saveddate
				); 
				 $this->db->where('ID',$cashtransac->ID);
			    $this->db->update('acc_transaction',$cdv);
		}
	
}
