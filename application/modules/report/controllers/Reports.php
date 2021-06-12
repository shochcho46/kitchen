<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends MX_Controller {
    
    public function __construct()
    {
        parent::__construct();
		$this->db->query('SET SESSION sql_mode = ""');
		$this->load->model(array(
			'report_model',
			'logs_model'
		));	
    }
 
    public function index($id = null)
    {
        
		$this->permission->method('report','read')->redirect();
        $data['title']    = display('purchase_report'); 
		$first_date = str_replace('/','-',$this->input->post('from_date'));
		$start_date= date('Y-m-d' , strtotime($first_date));
		$second_date = str_replace('/','-',$this->input->post('to_date'));
		$end_date= date('Y-m-d' , strtotime($second_date));
        $data['preport']  = $this->report_model->pruchasereport($start_date,$end_date);
		$settinginfo=$this->report_model->settinginfo();
		$data['setting']=$settinginfo;
		$data['currency']=$this->report_model->currencysetting($settinginfo->currency);
        $data['module'] = "report";
        $data['page']   = "prechasereport";   
        echo Modules::run('template/layout', $data); 
    }
	
	
    public function purchasereport()
    {
	    $this->permission->method('report','read')->redirect();
        $data['title']    = display('purchase_report'); 
		$first_date = str_replace('/','-',$this->input->post('from_date'));
		$start_date= date('Y-m-d' , strtotime($first_date));
		$second_date = str_replace('/','-',$this->input->post('to_date'));
		$end_date= date('Y-m-d' , strtotime($second_date));
        $data['preport']  = $this->report_model->pruchasereport($start_date,$end_date);
		$settinginfo=$this->report_model->settinginfo();
		$data['setting']=$settinginfo;
		$data['currency']=$this->report_model->currencysetting($settinginfo->currency);
        $data['module'] = "report";
        $data['page']   = "getpreport";  
		$this->load->view('report/getpreport', $data);  
 
    }
	
	public function productwise(){
		$this->permission->method('report','read')->redirect();
        $data['title']    = display('purchase_report'); 
		
		$data['allproduct']=$this->report_model->productreportall();
		$settinginfo=$this->report_model->settinginfo();
		$data['setting']=$settinginfo;
		$data['currency']=$this->report_model->currencysetting($settinginfo->currency);
        $data['module'] = "report";
        $data['page']   = "product_wise_report";   
        echo Modules::run('template/layout', $data); 
		}
  public function productwisereport(){
		$this->permission->method('report','read')->redirect();
        $data['title']    = display('purchase_report'); 
		$first_date = str_replace('/','-',$this->input->post('from_date'));
		$start_date= date('Y-m-d' , strtotime($first_date));
		$second_date = str_replace('/','-',$this->input->post('to_date'));
		$end_date= date('Y-m-d' , strtotime($second_date));
		$pid=$this->input->post('productid');
		$data['allproduct']  = $this->report_model->productreport($start_date,$end_date,$pid);
		$settinginfo=$this->report_model->settinginfo();
		$data['setting']=$settinginfo;
		$data['currency']=$this->report_model->currencysetting($settinginfo->currency);
        $data['module'] = "report";
        $data['page']   = "getproreport";  
		$this->load->view('report/getproreport', $data);  
		}
   public function ingredientwise(){
		$this->permission->method('report','read')->redirect();
        $data['title']    = display('purchase_report'); 
		
		$data['allproduct']=$this->report_model->allingredient();
		$settinginfo=$this->report_model->settinginfo();
		$data['setting']=$settinginfo;
		$data['currency']=$this->report_model->currencysetting($settinginfo->currency);
        $data['module'] = "report";
        $data['page']   = "ingredient_wise_report";   
        echo Modules::run('template/layout', $data); 
		}
	public function ingredientwisereport(){
			$this->permission->method('report','read')->redirect();
			$data['title']    = display('purchase_report'); 
			$first_date = str_replace('/','-',$this->input->post('from_date'));
			$start_date= date('Y-m-d' , strtotime($first_date));
			$second_date = str_replace('/','-',$this->input->post('to_date'));
			$end_date= date('Y-m-d' , strtotime($second_date));
			$pid=$this->input->post('productid');
			$data['allproduct']  = $this->report_model->ingredientreport($start_date,$end_date,$pid);
			$settinginfo=$this->report_model->settinginfo();
			$data['setting']=$settinginfo;
			$data['currency']=$this->report_model->currencysetting($settinginfo->currency);
			$data['module'] = "report";
			$data['page']   = "kitchenreport";  
			$this->load->view('report/kitchenreport', $data);  
			}
	public function sellrpt(){
		$this->permission->method('report','read')->redirect();
        $data['title']    = display('sell_report'); 
		$settinginfo=$this->report_model->settinginfo();
		$data['setting']=$settinginfo;
		$data['currency']=$this->report_model->currencysetting($settinginfo->currency);
		$data['paymentmethod']   = $this->report_model->pmethod_dropdown();
        $data['module'] = "report";
        $data['page']   = "salereportfrm";   
        echo Modules::run('template/layout', $data); 
		}
	public function sellrptbydate(){
		$this->permission->method('report','read')->redirect();
        $data['title']    = display('sell_report'); 
		$settinginfo=$this->report_model->settinginfo();
		$data['setting']=$settinginfo;
		$data['currency']=$this->report_model->currencysetting($settinginfo->currency);
        $data['module'] = "report";
        $data['page']   = "salereportbyproduct";   
        echo Modules::run('template/layout', $data); 
		}
	public function salereportbydate()
    {
	    $this->permission->method('report','read')->redirect();
        $data['title']    = display('sell_report'); 
		$first_date = str_replace('/','-',$this->input->post('from_date'));
		$start_date= date('Y-m-d' , strtotime($first_date));
		$second_date = str_replace('/','-',$this->input->post('to_date'));
		$end_date= date('Y-m-d' , strtotime($second_date));
        $data['preport']  = $this->report_model->salereportbydates($start_date,$end_date);
		$settinginfo=$this->report_model->settinginfo();
		$data['setting']=$settinginfo;
		$data['currency']=$this->report_model->currencysetting($settinginfo->currency);
        $data['module'] = "report";
        $data['page']   = "salebydate";  
		$this->load->view('report/salebydate', $data);  
 
    }
	public function salereport()
    {
	      $this->permission->method('report','read')->redirect();
        $data['title']    = display('sell_report');
     
        $pid = $this->input->post('paytype');
        $invoie_no = $this->input->post('invoie_no');
		   
		$first_date = str_replace('/','-',$this->input->post('from_date'));
		$start_date= date('Y-m-d' , strtotime($first_date));
		$second_date = str_replace('/','-',$this->input->post('to_date'));
		$end_date= date('Y-m-d' , strtotime($second_date));
        $data['preport']  = $this->report_model->salereport($start_date,$end_date,$pid,$invoie_no);
		$settinginfo=$this->report_model->settinginfo();
		$data['setting']=$settinginfo;
		$data['currency']=$this->report_model->currencysetting($settinginfo->currency);
        $data['module'] = "report";
        $data['page']   = "ajaxsalereport";  
		$this->load->view('report/ajaxsalereport', $data);    
 
    }
	public function sellrpt2(){
		$this->permission->method('report','read')->redirect();
        $data['title']    = display('sell_report'); 
		$settinginfo=$this->report_model->settinginfo();
		$data['setting']=$settinginfo;
		$data['currency']=$this->report_model->currencysetting($settinginfo->currency);
		$data['ctypeoption']=$this->report_model->ctype_dropdown();
        $data['module'] = "report";
        $data['page']   = "salereportfrm2";   
        echo Modules::run('template/layout', $data); 
		}
	public function generaterpt(){
		$this->permission->method('report','read')->redirect();
		$first_date = str_replace('/','-',$this->input->post('from_date'));
		$start_date= date('Y-m-d' , strtotime($first_date));
		$second_date = str_replace('/','-',$this->input->post('to_date'));
		$end_date= date('Y-m-d' , strtotime($second_date));
        $preport = $this->report_model->salereport($start_date,$end_date);
			if($preport) { 
				foreach($preport as $pitem){
					$existsorder=$this->db->select("*")->from('tbl_generatedreport')->where('order_id',$pitem->order_id)->order_by('order_id','desc')->get()->row();
					if(empty($existsorder)){
					$generaterpt=array(
					'order_id'			    =>	$pitem->order_id,
					'saleinvoice'			=>	$pitem->saleinvoice,
					'customer_id'			=>	$pitem->customer_id,
					'cutomertype'		    =>	$pitem->cutomertype,
					'isthirdparty'	        =>	$pitem->isthirdparty,
					'waiter_id'	        	=>	$pitem->waiter_id,
					'kitchen'	        	=>	$pitem->kitchen,
					'order_date'	        =>	$pitem->order_date,
					'order_time'	        =>	$pitem->order_time,
					'table_no'		    	=>	$pitem->table_no,
					'tokenno'		        =>	$pitem->tokenno,
					'totalamount'		 	=>  $pitem->totalamount,
					'customerpaid'		    =>	$pitem->customerpaid,
					'customer_note'		    =>	$pitem->customer_note,
					'anyreason'		        =>	$pitem->anyreason,
					'order_status'		    =>	$pitem->order_status,
					'nofification'		    =>	$pitem->nofification,
					'orderacceptreject'		=>	$pitem->orderacceptreject,
					'reportDate'		    =>	$start_date
				);
				$this->db->insert('tbl_generatedreport',$generaterpt);
					}
				}
			}
		}
	public function generatedrpt(){
			$this->permission->method('report','read')->redirect();
			$data['title']    = display('sell_report'); 
			$settinginfo=$this->report_model->settinginfo();
			$data['setting']=$settinginfo;
			$data['currency']=$this->report_model->currencysetting($settinginfo->currency);
			$data['ctypeoption']=$this->report_model->ctype_dropdown();
			$data['module'] = "report";
			$data['page']   = "searchgenrpt";   
			echo Modules::run('template/layout', $data); 
		}
	public function allsellrpt(){
		$list = $this->report_model->get_allsalesorder();
		$card=$this->report_model->count_allpayments(1);
		$online=$this->report_model->count_allpayments(0);
		$cash=$this->report_model->count_allpayments(4);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $rowdata){
			$no++;
			$row = array();
			 $thisrpartyid=$rowdata->isthirdparty;
			if($thisrpartyid>0){
				$thirdpartyinfo= $this->db->select('*')->from('tbl_thirdparty_customer')->where('companyId',$thisrpartyid)->get()->row();
				$persent=($thirdpartyinfo->commision*$rowdata->totalamount)/100;
				$delivaricompany=' - '.$thirdpartyinfo->company_name;
				}
			 else{
				 $persent=0;
				 $delivaricompany='';
				 }
			
			$row[] = $rowdata->order_date;
			$row[] = $rowdata->saleinvoice;
			$row[] = $rowdata->customer_name;
			$row[] = $rowdata->first_name.$rowdata->last_name;
			$row[] = $rowdata->customer_type.$delivaricompany;
			$row[] = $rowdata->discount;
			$row[] = $persent;
			$row[] = $rowdata->totalamount;
			$data[] = $row;
		}
		 
		$output = array(
						"draw" => $_POST['draw'],
						"cardpayments"=>$card,
						"Onlinepayment"=>$online,
						"Cashpayment"=>$cash,
						"recordsTotal" => $this->report_model->count_allsalesorder(),
						"recordsFiltered" => $this->report_model->count_filtersalesorder(),
						"data" => $data,
				);
		echo json_encode($output);
		}
	public function allsellgtrpt(){
		$list = $this->report_model->get_allsalesgtorder();
		$card=$this->report_model->count_allpaymentsgt(1);
		$online=$this->report_model->count_allpaymentsgt(0);
		$cash=$this->report_model->count_allpaymentsgt(4);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $rowdata){
			$no++;
			$row = array();
			 $thisrpartyid=$rowdata->isthirdparty;
			if($thisrpartyid>0){
				$thirdpartyinfo= $this->db->select('*')->from('tbl_thirdparty_customer')->where('companyId',$thisrpartyid)->get()->row();
				$persent=($thirdpartyinfo->commision*$rowdata->totalamount)/100;
				$delivaricompany=' - '.$thirdpartyinfo->company_name;
				}
			 else{
				 $persent=0;
				 $delivaricompany='';
				 }
			
			$row[] = $rowdata->order_date;
			$row[] = $rowdata->saleinvoice;
			$row[] = $rowdata->customer_name;
			$row[] = $rowdata->first_name.$rowdata->last_name;
			$row[] = $rowdata->customer_type.$delivaricompany;
			$row[] = $rowdata->discount;
			$row[] = $persent;
			$row[] = $rowdata->totalamount;
			$data[] = $row;
		}
		 
		$output = array(
						"draw" => $_POST['draw'],
						"cardpayments"=>$card,
						"Onlinepayment"=>$online,
						"Cashpayment"=>$cash,
						"recordsTotal" => $this->report_model->count_allsalesgtorder(),
						"recordsFiltered" => $this->report_model->count_filtersalesgtorder(),
						"data" => $data,
				);
		echo json_encode($output);
		}
	/*22-09*/
		public function itemsReport(){
			 $this->permission->method('report','read')->redirect();
        $data['title']    = display('sell_report');
     
		   
		$first_date = str_replace('/','-',$this->input->post('from_date'));
		$start_date= date('Y-m-d' , strtotime($first_date));
		$second_date = str_replace('/','-',$this->input->post('to_date'));
		$end_date= date('Y-m-d' , strtotime($second_date));
        $preports  = $this->report_model->itemsReport($start_date,$end_date);
        $i =0;
        $order_ids = array('');
        foreach ($preports as $preport) {
        	 $order_ids[$i] = $preport->order_id;
        	 $i++;
        }

           $data['items']  = $this->report_model->order_items($order_ids);

        
		$settinginfo=$this->report_model->settinginfo();
		$data['setting']=$settinginfo;
		$data['currency']=$this->report_model->currencysetting($settinginfo->currency);
        $data['module'] = "report";
        $data['name'] = 'Items Name';
        $data['page']   = "ajaxsalereportitems";  
		$this->load->view('report/ajaxsalereportitems', $data);

		}

				/*22-09*/
	public function sellrptItems(){
		$this->permission->method('report','read')->redirect();
        $data['title']    = display('sell_report_items'); 
		$settinginfo=$this->report_model->settinginfo();
		$data['setting']=$settinginfo;
		$data['currency']=$this->report_model->currencysetting($settinginfo->currency);
        $data['module'] = "report";
        $data['view'] = 'itemsReport';
        $data['page']   = "salereportfrmItems";   
        echo Modules::run('template/layout', $data); 
		}

				/*22-09*/
	public function sellrptwaiter(){
		$this->permission->method('report','read')->redirect();
        $data['title']    = display('sell_report_waiter'); 
		$settinginfo=$this->report_model->settinginfo();
		$data['setting']=$settinginfo;
		$data['currency']=$this->report_model->currencysetting($settinginfo->currency);
        $data['module'] = "report";
     
         $data['view'] = 'waitersReport';
        $data['page']   = "salereportfrmItems";   
        echo Modules::run('template/layout', $data); 
		}

	/*22-09*/
		public function waitersReport(){
			 $this->permission->method('report','read')->redirect();
        $data['title']    = display('sell_report');
     
		   
		$first_date = str_replace('/','-',$this->input->post('from_date'));
		$start_date= date('Y-m-d' , strtotime($first_date));
		$second_date = str_replace('/','-',$this->input->post('to_date'));
		$end_date= date('Y-m-d' , strtotime($second_date));
        $data['items']  = $this->report_model->order_waiters($start_date,$end_date);
    
        
		$settinginfo=$this->report_model->settinginfo();
		$data['setting']=$settinginfo;
		$data['currency']=$this->report_model->currencysetting($settinginfo->currency);
        $data['module'] = "report";
        $data['name'] = 'Waiter Name';
        $data['page']   = "ajaxsalereportitems";  
		$this->load->view('report/ajaxsalereportitems', $data);

		}
		public function delviryReport(){
			 $this->permission->method('report','read')->redirect();
        $data['title']    = display('sell_report');
     
		   
		$first_date = str_replace('/','-',$this->input->post('from_date'));
		$start_date= date('Y-m-d' , strtotime($first_date));
		$second_date = str_replace('/','-',$this->input->post('to_date'));
		$end_date= date('Y-m-d' , strtotime($second_date));
        $data['items']  = $this->report_model->order_delviry($start_date,$end_date);
    	
      

		$settinginfo=$this->report_model->settinginfo();
		$data['setting']=$settinginfo;
		$data['currency']=$this->report_model->currencysetting($settinginfo->currency);
        $data['module'] = "report";
        $data['name'] = 'Delivery type';
        $data['page']   = "ajaxsalereportdelivery";  
		$this->load->view('report/ajaxsalereportdelivery', $data);

		}


				/*22-09*/
	public function sellrptdelvirytype(){
		$this->permission->method('report','read')->redirect();
        $data['title']    = display('sell_report_waiter'); 
		$settinginfo=$this->report_model->settinginfo();
		$data['setting']=$settinginfo;
		$data['currency']=$this->report_model->currencysetting($settinginfo->currency);
        $data['module'] = "report";
     
         $data['view'] = 'delviryReport';
        $data['page']   = "salereportfrmItems";   
        echo Modules::run('template/layout', $data); 
		}
				/*22-09*/
	public function sellrptCasher(){
		$this->permission->method('report','read')->redirect();
        $data['title']    = display('sell_report_Casher'); 
		$settinginfo=$this->report_model->settinginfo();
		$data['setting']=$settinginfo;
		$data['currency']=$this->report_model->currencysetting($settinginfo->currency);
        $data['module'] = "report";
     
         $data['view'] = 'casherReport';
        $data['page']   = "salereportfrmItems";   
        echo Modules::run('template/layout', $data); 
		}

		public function casherReport(){
			 $this->permission->method('report','read')->redirect();
        $data['title']    = display('sell_report');
     
		   
		$first_date = str_replace('/','-',$this->input->post('from_date'));
		$start_date= date('Y-m-d' , strtotime($first_date));
		$second_date = str_replace('/','-',$this->input->post('to_date'));
		$end_date= date('Y-m-d' , strtotime($second_date));
        $data['items']  = $this->report_model->order_casher($start_date,$end_date);
    	
      

		$settinginfo=$this->report_model->settinginfo();
		$data['setting']=$settinginfo;
		$data['currency']=$this->report_model->currencysetting($settinginfo->currency);
        $data['module'] = "report";
        $data['name'] = 'Casher name';
        $data['page']   = "ajaxsalereportitems";  
		$this->load->view('report/ajaxsalereportitems', $data);

		}
	/*22-09*/
	public function unpaid_sell(){
		$this->permission->method('report','read')->redirect();
        $data['title']    = display('unpaid_sell'); 
		$settinginfo=$this->report_model->settinginfo();
		$data['setting']=$settinginfo;
		$data['currency']=$this->report_model->currencysetting($settinginfo->currency);
        $data['module'] = "report";
     
         $data['view'] = 'unpaidReport';
        $data['page']   = "salereportfrmunpaid";   
        echo Modules::run('template/layout', $data); 
		}

		public function unpaidReport(){
			 $this->permission->method('report','read')->redirect();
        $data['title']    = display('unpaid_sell');
     
		   
		/*$first_date = str_replace('/','-',$this->input->post('from_date'));
		$start_date= date('Y-m-d' , strtotime($first_date));
		$second_date = str_replace('/','-',$this->input->post('to_date'));
		$end_date= date('Y-m-d' , strtotime($second_date));*/
		$memberid = $this->input->post('memberid');

        $data['items']  = $this->report_model->show_marge_payment($memberid);

    	$data['memberid'] = $memberid;

		$settinginfo=$this->report_model->settinginfo();
		$data['setting']=$settinginfo;
		$data['currency']=$this->report_model->currencysetting($settinginfo->currency);
        $data['module'] = "report";
        $data['name'] = display('ordid');
        $data['page']   = "ajaxsalereportunpaid";  
		$this->load->view('report/ajaxsalereportunpaid', $data);

		}

		/*22-09*/
	public function showpaymentmodal($id){
		$marge = $this->report_model->show_marge_payment_modal($id);
		$data['marge'] = $marge;
		$data['paymentmethod']   = $this->report_model->pmethod_dropdown();
		
		$this->load->view('ordermanage/paymodal',$data); 
	}

				/*22-09*/
	public function kichansrpt(){
		$this->permission->method('report','read')->redirect();
        $data['title']    = display('sell_report_items');
        $data['kitchen'] = $this->report_model->allkitchan(); 
		$settinginfo=$this->report_model->settinginfo();
		$data['setting']=$settinginfo;
		$data['currency']=$this->report_model->currencysetting($settinginfo->currency);
        $data['module'] = "report";
        $data['view'] = 'kichanReport';
        
        $data['page']   = "kicReport";   
        echo Modules::run('template/layout', $data); 
		}

	/*22-09*/
		public function kichanReport(){
			 $this->permission->method('report','read')->redirect();
        $data['title']    = display('sell_report');
     
		   
		$first_date = str_replace('/','-',$this->input->post('from_date'));
		$start_date= date('Y-m-d' , strtotime($first_date));
		$second_date = str_replace('/','-',$this->input->post('to_date'));
		$end_date= date('Y-m-d' , strtotime($second_date));
       // $preports  = $this->report_model->itemsKiReport($start_date,$end_date);

        $i =0;
   		$id = $this->input->post('kitchen_id');
   		$findkicen = $this->report_model->kiread($id);
       $preports  = $this->report_model->itemsKiReport($id,$start_date,$end_date);
	   //print_r($preports);
       $totalamount = 0;
       foreach ($preports as $value) {
       	$countprice  = $this->report_model->kichanOrderInfo($value->order_id,$value->itemid);	
       	$totalamount = $countprice->total+$totalamount;
       	if($countprice->add_on_id !=NULL){
       		$add_on_ids = explode(',', $countprice->add_on_id);
       		$add_on_qtys = explode(',', $countprice->addonsqty);
       		$i=0;
       		foreach ($add_on_ids as $add_on_id) {
       			$add_on_price = $this->report_model->findaddons($add_on_id);
       			$totalamount = $totalamount+($add_on_price->price*$add_on_qtys[$i]);
       			
       			$i++;
       		}//end foreach

       	}//endif
       
       }//end foreach

       	$data['items'] = array('kiname' => $findkicen->kitchen_name,'totalprice'=> $totalamount);  
       	//print_r($data['items']); exit;     
		$settinginfo=$this->report_model->settinginfo();
		$data['setting']=$settinginfo;
		$data['currency']=$this->report_model->currencysetting($settinginfo->currency);
        $data['module'] = "report";
        $data['name'] = 'Kitchen Name';
        $data['page']   = "kicanwiseReport";  
		$this->load->view('report/kicanwiseReport', $data);

		}
		public function servicerpt(){
		$this->permission->method('report','read')->redirect();
        $data['title']    = display('scharge_report');
		$settinginfo=$this->report_model->settinginfo();
		$data['setting']=$settinginfo;
		$data['currency']=$this->report_model->currencysetting($settinginfo->currency);
        $data['module'] = "report";
        $data['view'] = 'schargeReport';
        $data['page']   = "schargeReport";   
        echo Modules::run('template/layout', $data); 
		}


		public function schargeReport(){
			 $this->permission->method('report','read')->redirect();
            $data['title']    = display('sell_report');
     
		   
		$first_date = str_replace('/','-',$this->input->post('from_date'));
		$start_date= date('Y-m-d' , strtotime($first_date));
		$second_date = str_replace('/','-',$this->input->post('to_date'));
		$end_date= date('Y-m-d' , strtotime($second_date));
       // $preports  = $this->report_model->itemsKiReport($start_date,$end_date);

        $i =0;
   		$id = $this->input->post('orderid');
   		$findkicen = $this->report_model->kiread($id);
        $data['allservicecharge']  = $this->report_model->serchargeReport($id,$start_date,$end_date);
       	//print_r($data['items']); exit;     
		$settinginfo=$this->report_model->settinginfo();
		$data['setting']=$settinginfo;
		$data['currency']=$this->report_model->currencysetting($settinginfo->currency);
        $data['module'] = "report";
        $data['name'] = 'Order ID';
        $data['page']   = "servicechargewisereport";  
		$this->load->view('report/servicechargewisereport', $data);

		}
 
}
