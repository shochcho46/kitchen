<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Restable_model extends CI_Model {
	
	private $table = 'rest_table';
 
	public function create($data = array())
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}
	public function addrow($data = array()){
			$this->db->insert('table_setting', $data);
		}
	public function delete($id = null)
	{
		$this->db->where('tableid',$id)
			->delete($this->table);

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	} 
	
	public function deleterow($id = null)
	{
		$this->db->where('tableid',$id)
			->delete('table_setting');

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	} 




	public function update($data = array())
	{
		return $this->db->where('tableid',$data["tableid"])
			->update($this->table, $data);
	}

    public function read($limit = null, $start = null)
	{
	    $this->db->select('*');
        $this->db->from($this->table);
        $this->db->order_by('tableid', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();    
        }
        return false;
	} 

	public function findById($id = null)
	{ 
		return $this->db->select("*")->from($this->table)
			->where('tableid',$id) 
			->get()
			->row();
	} 
	public function ckeckseting($id = null)
		{ 
			return $this->db->select("*")->from('table_setting')
				->where('tableid',$id) 
				->get()
				->row();
		} 
 
public function countlist()
	{
		$this->db->select('*');
        $this->db->from($this->table);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();  
        }
        return false;
	}
public function tablelist(){
		$this->db->select('rest_table.*,table_setting.settingid,table_setting.tableid as settingtable,table_setting.iconpos');
        $this->db->from($this->table);
		$this->db->join('table_setting','table_setting.tableid=rest_table.tableid','left');
        $this->db->order_by('table_setting.settingid', 'asc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();    
        }
        return false;
	}
public function sortingtable($data = array()){
	   
		return $this->db->where('tableid',$data["tableid"])
			->update('table_setting', $data);
	}
    
}
