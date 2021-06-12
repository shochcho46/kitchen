<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Language_model extends CI_Model {
	
    private $table  = "language";
    private $phrase = "phrase";
	private function get_alllanguage_query($language,$phase)
	{
			$column_order = array(null, $phase,$language); 
			$column_search = array($phase,$language); 
			$order = array($phase => 'asc');
		
		$cdate=date('Y-m-d');
		$this->db->select('*');
        $this->db->from('language');
		$this->db->order_by($phase,'asc');
		$i = 0;
	
		foreach ($column_search as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); 
					$this->db->like('phrase', $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like("'$language'", $_POST['search']['value']);
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
	public function get_alllanguage($language,$phase)
	{
		$this->get_alllanguage_query($language,$phase);
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}
	public function count_filtertonlineorder()
	{
		$this->get_alllanguage_query($language,$phase);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_allonlineorder()
	{
		$cdate=date('Y-m-d');
		$this->db->select('*');
        $this->db->from('language');
		return $this->db->count_all_results();
	} 
 
	
	
}