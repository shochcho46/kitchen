$months='';
		$salesamount='';
		$salesamountonline='';
		$totalorderonline='';
		$salesamountoffline='';
		$totalorderoffline='';
		$totalorder='';
		 $year=date('Y');
		 $numbery=date('y');
		 $prevyear=$numbery-1;
		 $prevyearformat=$year-1;
		 $syear='';
		 $syearformat='';
		for($k = 1; $k < 13; $k++){
		 $month=date('m', strtotime("+$k month")); 
		 $gety= date('y', strtotime("+$k month")); 
		 if($gety==$numbery){
			 $syear= $prevyear;
			 $syearformat= $prevyearformat;
			 }
		 else{
			  $syear=$numbery;
			  $syearformat= $year;
			 }
		 $monthly=$this->home_model->monthlysaleamount($syearformat,$month);
		
		 $salesamount.=$monthly.', ';
		 $totalorder.=$odernum.', ';
		 
		 $salesamountonline.=$monthlyonline.', ';
		
		 $months.=  '"'.date('F-'.$syear, strtotime("+$k month")).'", '; 
		}
		$data["monthlysaleamount"] =trim($salesamount,',');
        
        
        
        
        
        
        public function monthlysaleamount($year,$month)
		{
			$groupby="GROUP BY YEAR(order_date), MONTH(order_date)";
			$amount='';
			$wherequery = "YEAR(order_date)='$year' AND month(order_date)='$month' AND order_status!=5 GROUP BY YEAR(order_date), MONTH(order_date)";
			$this->db->select('SUM(totalamount) as amount');
			$this->db->from('customer_order');
			$this->db->where($wherequery, NULL, FALSE);
			//$this->db->group_by($groupby, NULL, FALSE); 
			$query = $this->db->get();
			if ($query->num_rows() > 0) {
				$result=$query->result(); 
				foreach($result as $row){
					$amount.=$row->amount.", ";
					}
				return trim($amount,', ');
			}
			return 0;
		}