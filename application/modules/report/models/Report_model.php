<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_model extends CI_Model {
	public function pruchasereport($start_date,$end_date)
	{
		$dateRange = "a.purchasedate BETWEEN '$start_date%' AND '$end_date%'";
		$this->db->select("a.*,b.supid,b.supName");
		$this->db->from('purchaseitem a');
		$this->db->join('supplier b','b.supid = a.suplierID');
		$this->db->where($dateRange, NULL, FALSE); 	
		$this->db->order_by('a.purchasedate','desc');
		$query = $this->db->get();
		return $query->result();
	} 
	public function productreportall(){
		$this->db->select("a.*,SUM(a.itemquantity) as totalqty, b.ProductsID,b.ProductName");
		$this->db->from('production a');
		$this->db->join('item_foods b','b.ProductsID = a.itemid');
		$this->db->group_by('a.itemid');
		$this->db->order_by('a.saveddate','desc');
		$query = $this->db->get();
		$producreport=$query->result();
		$myarray=array();
		$i=0;
		foreach($producreport as $result){
			$i++;
			$dateRange2 = "a.menu_id='$result->itemid' AND b.order_status!=5";
			$this->db->select("SUM(a.menuqty) as totalsaleqty,b.order_date");
			$this->db->from('order_menu a');
			$this->db->join('customer_order b','b.order_id = a.order_id');
			$this->db->where($dateRange2, NULL, FALSE); 	
			$this->db->order_by('b.order_date','desc');
			$query = $this->db->get();
			$salereport=$query->row();
			$myArray[$i]['ProductName']=$result->ProductName;
			$myArray[$i]['In_Qnty']=$result->totalqty;
			$myArray[$i]['Out_Qnty']=$salereport->totalsaleqty;
			$myArray[$i]['Stock']=$result->totalqty-$salereport->totalsaleqty;
			}
			return $myArray;
		}
		
	public function productreport($start_date,$end_date,$pid){
		$myarray=array();
		$dateRange = "a.itemid='$pid' AND a.saveddate BETWEEN '$start_date%' AND '$end_date%'";
		$this->db->select("a.*,SUM(a.itemquantity) as totalqty, b.ProductsID,b.ProductName");
		$this->db->from('production a');
		$this->db->join('item_foods b','b.ProductsID = a.itemid');
		$this->db->where($dateRange, NULL, FALSE); 	
		$this->db->order_by('a.saveddate','desc');
		$query = $this->db->get();
		$producreport=$query->row();
		
		$dateRange2 = "a.menu_id='$pid' AND b.order_date BETWEEN '$start_date%' AND '$end_date%' AND b.order_status!=5";
		$this->db->select("SUM(a.menuqty) as totalsaleqty,b.order_date");
		$this->db->from('order_menu a');
		$this->db->join('customer_order b','b.order_id = a.order_id');
		$this->db->where($dateRange2, NULL, FALSE); 	
		$this->db->order_by('b.order_date','desc');
		$query = $this->db->get();
		$salereport=$query->row();
		$myArray[0]['ProductName']=$producreport->ProductName;
		$myArray[0]['In_Qnty']=$producreport->totalqty;
		$myArray[0]['Out_Qnty']=$salereport->totalsaleqty;
		$myArray[0]['Stock']=$producreport->totalqty-$salereport->totalsaleqty;
		return $myArray;
		}
	public function allingredient(){
		$this->db->select("a.*,SUM(a.quantity) as totalqty, b.id,b.ingredient_name,c.uom_short_code");
		$this->db->from('purchase_details a');
		$this->db->join('ingredients b','b.id = a.indredientid','left');
		$this->db->join('unit_of_measurement c','c.id = b.uom_id','inner');
		$this->db->group_by('a.indredientid');
		$this->db->order_by('a.purchasedate','desc');
		$query = $this->db->get();
		$producreport=$query->result();
		$myarray=array();
		$i=0;
		foreach($producreport as $result){
			$i++;
			$inqty= $this->production($result->indredientid);
			if($inqty==0){
				$saleqty=0;
				}
			else{
				$saleqty=$inqty;
				}
			$myArray[$i]['ProductName']=$result->ingredient_name;
			$myArray[$i]['In_Qnty']=$result->totalqty.' '.$result->uom_short_code;
			$myArray[$i]['Out_Qnty']=$saleqty.' '.$result->uom_short_code;
			$myArray[$i]['Stock']=$result->totalqty-$saleqty.' '.$result->uom_short_code;
			}
			return $myArray;
		}
	public function production($id){
		    $foodwise=$this->db->select("production_details.foodid,production_details.ingredientid,production_details.qty,SUM(production.itemquantity*production_details.qty) as foodqty")->from('production_details')->join('production','production.itemid=production_details.foodid','Left')->where('production_details.ingredientid',$id)->group_by('production_details.foodid')->get()->result();
		    $lastqty=0;
			foreach($foodwise as $gettotal){
				$lastqty=$lastqty+$gettotal->foodqty;
				}
				return $lastqty;
		}
	public function ingredientreport($start_date,$end_date,$pid){
		$myarray=array();
		$dateRange = "a.indredientid='$pid' AND a.purchasedate BETWEEN '$start_date%' AND '$end_date%'";
		$this->db->select("a.*,SUM(a.quantity) as totalqty, b.id,b.ingredient_name,c.uom_short_code");
		$this->db->from('purchase_details a');
		$this->db->join('ingredients b','b.id = a.indredientid','left');
		$this->db->join('unit_of_measurement c','c.id = b.uom_id','inner');
		$this->db->where($dateRange, NULL, FALSE); 	
		$this->db->order_by('a.purchasedate','desc');
		$query = $this->db->get();
		//echo $this->db->last_query();
		$producreport=$query->row();
		$inqty= $this->ingredientreportbyid($start_date,$end_date,$pid);
		if($inqty==0){
				$saleqty=0;
				}
			else{
				$saleqty=$inqty;
				}
		$myArray[0]['ProductName']=$producreport->ingredient_name;
		$myArray[0]['In_Qnty']=$producreport->totalqty.' '.$producreport->uom_short_code;
		$myArray[0]['Out_Qnty']=$saleqty.' '.$producreport->uom_short_code;
		$myArray[0]['Stock']=$producreport->totalqty-$saleqty.' '.$producreport->uom_short_code;
		return $myArray;
		}
	public function ingredientreportbyid($start_date,$end_date,$id){
		    $dateRange = "saveddate BETWEEN '$start_date%' AND '$end_date%'";
		    $this->db->select("itemid,itemquantity");
			$this->db->from('production');
			$this->db->where($dateRange, NULL, FALSE); 
			$query2 = $this->db->get();
			$produceqty=$query2->result();
			$i=0;
			foreach($produceqty as $pro){
					$i++;
				$dateRange2 = "a.ingredientid='$id' AND a.foodid=$pro->itemid";
				$this->db->select("SUM(a.qty) as totalsaleqty,a.foodid,a.created_date");
				$this->db->from('production_details a');
				$this->db->where($dateRange2, NULL, FALSE); 	
				$this->db->order_by('a.created_date','desc');
				$query = $this->db->get();
				$salereport=$query->row();
				if(empty($salereport->totalsaleqty)){
					$saleqty=0;
					}
				else{
					$saleqty=$salereport->totalsaleqty*$pro->itemquantity;
					return $saleqty;
					}
				}
		}
	public function salereportbydates($start_date,$end_date)
	{
		$dateRange = "customer_order.order_date BETWEEN '$start_date%' AND '$end_date%' AND customer_order.order_status=4";
		$this->db->select("order_menu.*,SUM(menuqty) as qty,customer_order.order_date,item_foods.ProductName,,variant.variantName,variant.price");
		$this->db->from('order_menu');
		$this->db->join('customer_order','customer_order.order_id=order_menu.order_id','left');
		$this->db->join('item_foods','item_foods.ProductsID=order_menu.menu_id','left');
		$this->db->join('variant','variant.variantid=order_menu.varientid','inner');
		$this->db->where($dateRange, NULL, FALSE); 	
		$this->db->group_by('order_menu.menu_id,order_menu.varientid');
		$query = $this->db->get();
		return $query->result();
	} 
	/*22-09*/
	public function salereport($start_date,$end_date,$pid=null,$invoice_id = null)
	{
		$dateRange = "a.order_date BETWEEN '$start_date%' AND '$end_date%' AND a.order_status=4";
		if($pid != null && $invoice_id == null ){
			$dateRange = "a.order_date BETWEEN '$start_date%' AND '$end_date%' AND a.order_status=4 AND c.payment_method_id=$pid";
		}
		if($invoice_id != null){
			$dateRange = "a.order_status=4 AND a.saleinvoice=$invoice_id";
		}
		$this->db->select("a.*,b.customer_id,b.customer_name,b.customer_id,c.*,p.*");
		$this->db->from('customer_order a');
		$this->db->join('customer_info b','b.customer_id = a.customer_id');
		$this->db->join('bill c','a.order_id=c.order_id');
		$this->db->join('payment_method p','c.payment_method_id=p.payment_method_id');
		$this->db->where($dateRange, NULL, FALSE); 	
		$this->db->order_by('a.order_date','desc');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
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
	private function get_allsalesorder_query()
	{
		$column_order = array(null, 'customer_order.order_date','customer_order.saleinvoice','customer_info.customer_name','employee_history.first_name','customer_type.customer_type','bill.discount','tbl_thirdparty_customer.company_name','customer_order.totalamount'); //set column field database for datatable orderable
		$column_search = array('customer_order.order_date','customer_order.saleinvoice','customer_info.customer_name','employee_history.first_name','customer_type.customer_type','bill.discount','tbl_thirdparty_customer.company_name','customer_order.totalamount'); //set column field database for datatable searchable 
		$order = array('customer_order.order_id' => 'asc');
		
		$cdate=date('Y-m-d');
		//add custom filter here
		if($this->input->post('ctypeoption'))
		{
			$this->db->like('customer_order.cutomertype', $this->input->post('ctypeoption'));
		}
		if($this->input->post('status'))
		{
			$this->db->like('bill.bill_status', $this->input->post('status'));
		}
		if($this->input->post('date_fr'))
		{
			$first_date = str_replace('/','-',$this->input->post('date_fr'));
			$startdate= date('Y-m-d' , strtotime($first_date));
			$second_date = str_replace('/','-',$this->input->post('date_to'));
			$enddate= date('Y-m-d' , strtotime($second_date));
			$condi = "customer_order.order_date BETWEEN '".$startdate."' AND '".$enddate."'";
			$this->db->where($condi);
		}
		
		$this->db->select('customer_order.*,customer_info.customer_name,customer_type.customer_type,employee_history.first_name,employee_history.last_name,rest_table.tablename,bill.discount,tbl_thirdparty_customer.company_name');
        $this->db->from('customer_order');
		$this->db->join('customer_info','customer_order.customer_id=customer_info.customer_id','left');
		$this->db->join('customer_type','customer_order.cutomertype=customer_type.customer_type_id','left');
		$this->db->join('employee_history','customer_order.waiter_id=employee_history.emp_his_id','left');
		$this->db->join('rest_table','customer_order.table_no=rest_table.tableid','left');
		$this->db->join('bill','customer_order.order_id=bill.order_id','left');
		$this->db->join('tbl_thirdparty_customer','customer_order.isthirdparty=tbl_thirdparty_customer.companyId','left');
		$this->db->where('customer_order.order_status',4);
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
	public function get_allsalesorder()
	{
		$this->get_allsalesorder_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}
	public function count_filtersalesorder()
	{
		$this->get_allsalesorder_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_allsalesorder()
	{
		$cdate=date('Y-m-d');
		$this->db->select('customer_order.*,customer_info.customer_name,customer_type.customer_type,employee_history.first_name,employee_history.last_name,rest_table.tablename,bill.discount,tbl_thirdparty_customer.company_name');
        $this->db->from('customer_order');
		$this->db->join('customer_info','customer_order.customer_id=customer_info.customer_id','left');
		$this->db->join('customer_type','customer_order.cutomertype=customer_type.customer_type_id','left');
		$this->db->join('employee_history','customer_order.waiter_id=employee_history.emp_his_id','left');
		$this->db->join('rest_table','customer_order.table_no=rest_table.tableid','left');
		$this->db->join('bill','customer_order.order_id=bill.order_id','left');
		$this->db->join('tbl_thirdparty_customer','customer_order.isthirdparty=tbl_thirdparty_customer.companyId','left');
		$this->db->where('customer_order.order_status',4);
		return $this->db->count_all_results();
	} 
	private function get_allsalespayment_query($payid)
	{
		$column_order = array(null, 'customer_order.order_date','customer_order.saleinvoice','customer_info.customer_name','employee_history.first_name','customer_type.customer_type','bill.discount','tbl_thirdparty_customer.company_name','customer_order.totalamount'); //set column field database for datatable orderable
		$column_search = array('customer_order.order_date','customer_order.saleinvoice','customer_info.customer_name','employee_history.first_name','customer_type.customer_type','bill.discount','tbl_thirdparty_customer.company_name','customer_order.totalamount'); //set column field database for datatable searchable 
		$order = array('customer_order.order_id' => 'asc');
		
		$cdate=date('Y-m-d');
		//add custom filter here
		if($this->input->post('ctypeoption'))
		{
			$this->db->like('customer_order.cutomertype', $this->input->post('ctypeoption'));
		}
		if($this->input->post('status'))
		{
			$this->db->like('bill.bill_status', $this->input->post('status'));
		}
		if($this->input->post('date_fr'))
		{
			$first_date = str_replace('/','-',$this->input->post('date_fr'));
			$startdate= date('Y-m-d' , strtotime($first_date));
			$second_date = str_replace('/','-',$this->input->post('date_to'));
			$enddate= date('Y-m-d' , strtotime($second_date));
			$condi = "customer_order.order_date BETWEEN '".$startdate."' AND '".$enddate."'";
			$this->db->where($condi);
		}
		if($payid==0){
			$mypaycondition="bill.payment_method_id !=1 AND bill.payment_method_id !=4";
			}
		else{
			$mypaycondition="bill.payment_method_id =$payid";
			}
		$this->db->select('SUM(bill.bill_amount) as totalpayment');
        $this->db->from('customer_order');
		$this->db->join('customer_info','customer_order.customer_id=customer_info.customer_id','left');
		$this->db->join('customer_type','customer_order.cutomertype=customer_type.customer_type_id','left');
		$this->db->join('employee_history','customer_order.waiter_id=employee_history.emp_his_id','left');
		$this->db->join('rest_table','customer_order.table_no=rest_table.tableid','left');
		$this->db->join('bill','customer_order.order_id=bill.order_id','left');
		$this->db->join('tbl_thirdparty_customer','customer_order.isthirdparty=tbl_thirdparty_customer.companyId','left');
		$this->db->where($mypaycondition);
		$this->db->where('customer_order.order_status',4);
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
			//$this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($order))
		{
			//$order = $order;
			//$this->db->order_by(key($order), $order[key($order)]);
		}
	}
	public function count_allpayments($payid){
		$this->get_allsalespayment_query($payid);
		if($_POST['length'] != -1)
		//$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		//echo $this->db->last_query();
		$totalamount=$query->row();
		if(!empty($totalamount)){
		return $totalamount->totalpayment;
		}
		else{
			return 0;
			}
		}
		/*============Generated Report*/
	private function get_allsalesgtorder_query(){
		$column_order = array(null, 'tbl_generatedreport.order_date','tbl_generatedreport.saleinvoice','customer_info.customer_name','employee_history.first_name','customer_type.customer_type','bill.discount','tbl_thirdparty_customer.company_name','tbl_generatedreport.totalamount'); //set column field database for datatable orderable
		$column_search = array('tbl_generatedreport.order_date','tbl_generatedreport.saleinvoice','customer_info.customer_name','employee_history.first_name','customer_type.customer_type','bill.discount','tbl_thirdparty_customer.company_name','tbl_generatedreport.totalamount'); //set column field database for datatable searchable 
		$order = array('tbl_generatedreport.order_id' => 'asc');
		
		$cdate=date('Y-m-d');
		//add custom filter here
		if($this->input->post('ctypeoption'))
		{
			$this->db->like('tbl_generatedreport.cutomertype', $this->input->post('ctypeoption'));
		}
		if($this->input->post('status'))
		{
			$this->db->like('bill.bill_status', $this->input->post('status'));
		}
		if($this->input->post('date_fr'))
		{
			$first_date = str_replace('/','-',$this->input->post('date_fr'));
			$startdate= date('Y-m-d' , strtotime($first_date));
			$second_date = str_replace('/','-',$this->input->post('date_to'));
			$enddate= date('Y-m-d' , strtotime($second_date));
			$condi = "tbl_generatedreport.reportDate BETWEEN '".$startdate."' AND '".$enddate."'";
			$this->db->where($condi);
		}
		
		$this->db->select('tbl_generatedreport.*,customer_info.customer_name,customer_type.customer_type,employee_history.first_name,employee_history.last_name,rest_table.tablename,bill.discount,tbl_thirdparty_customer.company_name');
        $this->db->from('tbl_generatedreport');
		$this->db->join('customer_info','tbl_generatedreport.customer_id=customer_info.customer_id','left');
		$this->db->join('customer_type','tbl_generatedreport.cutomertype=customer_type.customer_type_id','left');
		$this->db->join('employee_history','tbl_generatedreport.waiter_id=employee_history.emp_his_id','left');
		$this->db->join('rest_table','tbl_generatedreport.table_no=rest_table.tableid','left');
		$this->db->join('bill','tbl_generatedreport.order_id=bill.order_id','left');
		$this->db->join('tbl_thirdparty_customer','tbl_generatedreport.isthirdparty=tbl_thirdparty_customer.companyId','left');
		//$this->db->where('customer_order.order_status',4);
		$this->db->order_by('tbl_generatedreport.order_id','desc');
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
	public function get_allsalesgtorder()
	{
		$this->get_allsalesgtorder_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}
	public function count_filtersalesgtorder()
	{
		$this->get_allsalesgtorder_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_allsalesgtorder()
	{
		$cdate=date('Y-m-d');
		$this->db->select('tbl_generatedreport.*,customer_info.customer_name,customer_type.customer_type,employee_history.first_name,employee_history.last_name,rest_table.tablename,bill.discount,tbl_thirdparty_customer.company_name');
        $this->db->from('tbl_generatedreport');
		$this->db->join('customer_info','tbl_generatedreport.customer_id=customer_info.customer_id','left');
		$this->db->join('customer_type','tbl_generatedreport.cutomertype=customer_type.customer_type_id','left');
		$this->db->join('employee_history','tbl_generatedreport.waiter_id=employee_history.emp_his_id','left');
		$this->db->join('rest_table','tbl_generatedreport.table_no=rest_table.tableid','left');
		$this->db->join('bill','tbl_generatedreport.order_id=bill.order_id','left');
		$this->db->join('tbl_thirdparty_customer','tbl_generatedreport.isthirdparty=tbl_thirdparty_customer.companyId','left');
		/*$this->db->where('customer_order.cutomertype',2);
		*/
		//$this->db->where('customer_order.order_status',4);
		return $this->db->count_all_results();
	} 
	private function get_allsalespaymentgt_query($payid)
	{
		$column_order = array(null, 'tbl_generatedreport.order_date','tbl_generatedreport.saleinvoice','customer_info.customer_name','employee_history.first_name','customer_type.customer_type','bill.discount','tbl_thirdparty_customer.company_name','tbl_generatedreport.totalamount'); //set column field database for datatable orderable
		$column_search = array('tbl_generatedreport.order_date','tbl_generatedreport.saleinvoice','customer_info.customer_name','employee_history.first_name','customer_type.customer_type','bill.discount','tbl_thirdparty_customer.company_name','tbl_generatedreport.totalamount'); //set column field database for datatable searchable 
		$order = array('tbl_generatedreport.order_id' => 'asc');
		
		$cdate=date('Y-m-d');
		//add custom filter here
		if($this->input->post('ctypeoption'))
		{
			$this->db->like('tbl_generatedreport.cutomertype', $this->input->post('ctypeoption'));
		}
		if($this->input->post('status'))
		{
			$this->db->like('bill.bill_status', $this->input->post('status'));
		}
		if($this->input->post('date_fr'))
		{
			$first_date = str_replace('/','-',$this->input->post('date_fr'));
			$startdate= date('Y-m-d' , strtotime($first_date));
			$second_date = str_replace('/','-',$this->input->post('date_to'));
			$enddate= date('Y-m-d' , strtotime($second_date));
			$condi = "tbl_generatedreport.reportDate BETWEEN '".$startdate."' AND '".$enddate."'";
			$this->db->where($condi);
		}
		if($payid==0){
			$mypaycondition="bill.payment_method_id !=1 AND bill.payment_method_id !=4";

			}
		else{
			$mypaycondition="bill.payment_method_id =$payid";
			}
		$this->db->select('SUM(bill.bill_amount) as totalpayment');
        $this->db->from('tbl_generatedreport');
		$this->db->join('customer_info','tbl_generatedreport.customer_id=customer_info.customer_id','left');
		$this->db->join('customer_type','tbl_generatedreport.cutomertype=customer_type.customer_type_id','left');
		$this->db->join('employee_history','tbl_generatedreport.waiter_id=employee_history.emp_his_id','left');
		$this->db->join('rest_table','tbl_generatedreport.table_no=rest_table.tableid','left');
		$this->db->join('bill','tbl_generatedreport.order_id=bill.order_id','left');
		$this->db->join('tbl_thirdparty_customer','tbl_generatedreport.isthirdparty=tbl_thirdparty_customer.companyId','left');
		$this->db->where($mypaycondition);
		//$this->db->where('customer_order.order_status',4);
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
			//$this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($order))
		{
			//$order = $order;
			//$this->db->order_by(key($order), $order[key($order)]);
		}
	}
	public function count_allpaymentsgt($payid){
		$this->get_allsalespaymentgt_query($payid);
		if($_POST['length'] != -1)
		//$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		//echo $this->db->last_query();
		$totalamount=$query->row();
		if(!empty($totalamount)){
		return $totalamount->totalpayment;
		}
		else{
			return 0;
			}
		}
/*22-09*/
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

	 /*22-09*/
	public function itemsReport($start_date,$end_date)
	{
		
		$dateRange = "a.order_date BETWEEN '$start_date%' AND '$end_date%' AND a.order_status=4";
		
		$this->db->select("a.order_id");
		$this->db->from('customer_order a');
		$this->db->where($dateRange, NULL, FALSE); 	
		$this->db->order_by('a.order_date','desc');
		$query = $this->db->get();
		return $query->result();
	} 
	public function order_items($ids){
		$this->db->select('SUM(order_menu.menuqty) as totalqty,item_foods.ProductName,variant.price');
        $this->db->from('order_menu');
		$this->db->join('item_foods','order_menu.menu_id=item_foods.ProductsID','left');
		$this->db->join('variant','order_menu.varientid=variant.variantid','left');

		$this->db->where_in('order_menu.order_id',$ids);
		$this->db->group_by('order_menu.menu_id');
		$query = $this->db->get();
		$orderinfo=$query->result();
	    return $orderinfo;
	}
	public function order_waiters($start_date,$end_date){
		$dateRange = "a.order_date BETWEEN '$start_date%' AND '$end_date%' AND a.order_status=4";
		
		$this->db->select("SUM(a.totalamount) as totalamount,CONCAT(w.first_name, ' ', w.last_name) as ProductName ");
		$this->db->from('customer_order a');
		$this->db->join('employee_history w','a.waiter_id=w.emp_his_id','left');
		$this->db->where($dateRange, NULL, FALSE);
		$this->db->group_by('a.waiter_id'); 	
		
		$query = $this->db->get();
		return $query->result();
	}

		public function order_delviry($start_date,$end_date){
		$dateRange = "a.order_date BETWEEN '$start_date%' AND '$end_date%' AND a.order_status=4 ";
		
		$this->db->select("SUM(c.total_amount) as totalamount,shipping_type as ProductName");
		$this->db->from('customer_order a');
		$this->db->join('bill c','a.order_id=c.order_id');
		$this->db->where($dateRange, NULL, FALSE);
		$this->db->group_by('c.shipping_type'); 	
		
		$query = $this->db->get();

		
		
	
		return $query->result();
	}

	public function order_casher($start_date,$end_date){
		$dateRange = "a.order_date BETWEEN '$start_date%' AND '$end_date%' AND a.order_status=4";
		
		$this->db->select("SUM(a.totalamount) as totalamount,CONCAT(w.firstname, ' ', w.lastname) as ProductName ");
		$this->db->from('customer_order a');
		$this->db->join('bill c','a.order_id=c.order_id');
		$this->db->join(' user w','c.create_by=w.id','left');
		$this->db->where($dateRange, NULL, FALSE);
		$this->db->group_by('c.create_by'); 	
		
		$query = $this->db->get();
		return $query->result();
	}

		/*22-09*/
	public function show_marge_payment($id=null){
		//$customer_id = $this->db->select("customer_id")->from('customer_info')->where('memberid',$id)->get()->row();
		if(!empty($id)){
		$where="order_status = 1 OR order_status = 2 OR order_status = 3 AND order_id='".$id."'";
		}
		else{
			$where=" order_status = 1 OR order_status = 2 OR order_status = 3";
			}
		
		$marge=$this->db->select("customer_id,order_id,SUM(totalamount) as totalamount")->from('customer_order')->where($where)->group_by('order_id')->get();
		$orderdetails=$marge->result();
		//print_r($orderdetails);
		//echo $this->db->last_query(); 
	    return $orderdetails;
		
	}

			/*22-09*/
	public function show_marge_payment_modal($id){
		
		$where="(order_status = 1 OR order_status = 2 OR order_status = 3)";
		$marge=$this->db->select("*")->from('customer_order')->where('order_id',$id)->where($where)->get();
		$orderdetails=$marge->result();
	    return $orderdetails;
		
	}

	public function kichan_items($ids){
		$this->db->select('sum(order_menu.menuqty*variant.price) as totalamount,order_menu.menuqty,order_menu.menuqty,tbl_kitchen.kitchen_name as ProductName');
        $this->db->from('tbl_kitchen_order');

		$this->db->join('order_menu','tbl_kitchen_order.orderid=order_menu.order_id AND tbl_kitchen_order.itemid=order_menu.menu_id ','left');
		 $this->db->join('item_foods','order_menu.menu_id=item_foods.ProductsID','left');
		$this->db->join('variant','order_menu.varientid=variant.variantid','left');
		
		$this->db->join('tbl_kitchen','tbl_kitchen.kitchenid=tbl_kitchen_order.kitchenid','left');
		$this->db->where_in('tbl_kitchen_order.orderid',$ids);
		$this->db->group_by('tbl_kitchen_order.kitchenid');
		$query = $this->db->get();
		$orderinfo=$query->result();
	    return $orderinfo;
	}


	 /*22-09*/
	public function itemsKiReport($id,$start_date,$end_date)
	{
		
		$dateRange = "a.order_date BETWEEN '$start_date%' AND '$end_date%' AND a.order_status=4 AND k.kitchenid=$id";
		
		$this->db->select("a.order_id,k.itemid");
		$this->db->from('customer_order a');
		$this->db->join('tbl_kitchen_order k','a.order_id=k.orderid');
		$this->db->where($dateRange, NULL, FALSE); 	
		
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}
	public function kichanOrderInfo($orderid,$itemid){
		$dateRange = "m.order_id=$orderid AND m.menu_id=$itemid";
		$this->db->select("(m.menuqty*v.price) as total, add_on_id,addonsqty");
		$this->db->from('order_menu m');
		$this->db->join('variant v','m.varientid=v.variantid','left');
		$this->db->where($dateRange, NULL, FALSE); 	
		
		$query = $this->db->get()->row();
		//echo $this->db->last_query();
		return $query;

	}

    public function serchargeReport($id=null,$start_date,$end_date)
	{
		
		$dateRange = "customer_order.order_date BETWEEN '$start_date%' AND '$end_date%'";
		$this->db->select("bill.order_id,bill.service_charge,customer_order.order_date,customer_order.order_id as orderid");
		$this->db->from('customer_order');
		$this->db->join('bill','bill.order_id=customer_order.order_id','left');
		if(!empty($id)){
		$this->db->where('customer_order.order_id', $id);		
		}
		$this->db->where($dateRange, NULL, FALSE);	
		$this->db->where('customer_order.order_status', 4);	
		$this->db->where('bill.service_charge>0');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}
	   public function findaddons($id = null)
	{ 
		$this->db->select('price');
        $this->db->from('add_ons');
		$this->db->where('add_on_id',$id);
		$query = $this->db->get()->row();
		
	    return $query;
	}
	public function kiread($id)
	{
		$this->db->select('kitchen_name');
		$this->db->from('tbl_kitchen');
		$this->db->where('kitchenid',$id);
		$query = $this->db->get()->row();
		
	    return $query;

	}
	public function allkitchan(){
		$this->db->select('*');
		$this->db->from('tbl_kitchen');
		$this->db->where('status',1);
		$data = $this->db->get()->result();
	
		$list[''] = 'Select Kitchan';
		if (!empty($data)) {
			foreach($data as $value)
				$list[$value->kitchenid] = $value->kitchen_name;
			return $list;
		} else {
			return false; 
		}
		
	}
	
}
