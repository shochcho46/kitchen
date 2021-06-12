<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fooditem_model extends CI_Model {
	private $table = 'item_foods';

	public function fooditem_create($data = array())
	{
		return $this->db->insert($this->table, $data);
	}
	public function addsupplier($data = array())
	{
		return $this->db->insert('supplier', $data);
	}
   
	public function fooditem_delete($id = null)
	{
		$this->db->where('ProductsID',$id)
			->delete($this->table);

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	} 

	public function update_fooditem($data = array())
	{
		return $this->db->where('ProductsID',$data["ProductsID"])
			->update($this->table, $data);
	}

    public function read_fooditem($limit = null, $start = null)
	{
	    $this->db->select('item_foods.*,item_category.Name');
        $this->db->from($this->table);
		$this->db->join('item_category','item_foods.CategoryID = item_category.CategoryID','left');
        $this->db->order_by('ProductsID', 'desc');
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
			->where('ProductsID',$id) 
    		->limit($limit, $start)
			->get()
			->row();
	} 
 
// Category Dropdown
	public function category_dropdown()
	{
		$data = $this->db->select("*")
			->from($this->table)
			->get()
			->result();

		$list[''] = display('category_name');
		if (!empty($data)) {
			foreach($data as $value)
				$list[$value->CategoryID] = $value->Name;
			return $list;
		} else {
			return false; 
		}
	}
// Parent Category Dropdown
	public function parentcategory_dropdown($parent = null)
	{
		return $this->db->select("*")
			->from('item_category')
			->where('parentid',$parent) 
			->get()
			->result();

		
	}

 public function fooditem_dropdown()
	{
		$data = $this->db->select("*")
			->from($this->table)
			->get()
			->result();

		$list[''] = 'Select '.display('item_name');
		if (!empty($data)) {
			foreach($data as $value)
				$list[$value->ProductsID] = $value->ProductName;
			return $list;
		} else {
			return false; 
		}
	}

public function count_fooditem()
	{
		$this->db->select('item_foods.*,item_category.Name');
        $this->db->from($this->table);
		$this->db->join('item_category','item_foods.CategoryID = item_category.CategoryID','left');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();  
        }
        return false;
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
	public function allkitchen(){
		$data = $this->db->select("*")
			->from('tbl_kitchen')
			->where('status',1)
			->get()
			->result();
			return $data;
		/*$list[''] = display('kitchen_name');
			if (!empty($data)) {
			foreach($data as $value)
				$list[$value->kitchenid] = $value->kitchen_name;
				return $list;
			} else {
				return false; 
			}*/
		}
}
