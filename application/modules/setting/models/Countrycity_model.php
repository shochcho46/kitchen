<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Countrycity_model extends CI_Model {
	
	private $table = 'tbl_country';
	private $state = 'tbl_state';
 
	public function create($data = array())
	{
		return $this->db->insert($this->table, $data);
	}
	public function delete($id = null)
	{
		$this->db->where('countryid',$id)
			->delete($this->table);

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	} 




	public function update($data = array())
	{
		return $this->db->where('countryid',$data["countryid"])
			->update($this->table, $data);
	}

    public function read($limit = null, $start = null)
	{
	   $this->db->select('*');
        $this->db->from($this->table);
        $this->db->order_by('countryid', 'desc');
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
			->where('countryid',$id) 
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
public function allcountry()
	{
		$this->db->select('*');
        $this->db->from($this->table);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();  
        }
        return false;
	}
   //State section
   
   public function createstate($data = array())
	{
		return $this->db->insert($this->state, $data);
	}
	public function deletestate($id = null)
	{
		$this->db->where('stateid',$id)
			->delete($this->state);

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	} 
   public function updatestate($data = array())
	{
		return $this->db->where('stateid',$data["stateid"])
			->update($this->state, $data);
	}
   public function readstate($limit = null, $start = null)
	{
	   $this->db->select('*,tbl_country.countryname');
        $this->db->from($this->state);
		$this->db->join('tbl_country','tbl_country.countryid=tbl_state.countryid','left');
        $this->db->order_by('stateid', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();    
        }
        return false;
	} 
   public function findByIdstate($id = null)
	{ 
		return $this->db->select("*")->from($this->state)
			->where('stateid',$id) 
			->get()
			->row();
	} 
   public function countstatelist()
	{
		$this->db->select('*');
        $this->db->from($this->state);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();  
        }
        return false;
	}
}
