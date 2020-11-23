<?php 
class Common_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function insert_data($table_name,$data)
	{
		return $this->db->insert($table_name,$data);
	}
	public function select_data($table_name,$field,$warr='')
	{
		if($warr!='')
		{
			$this->db->where($warr);
		}
		$resp=$this->db->select($field)->from($table_name)->get();
		return $resp->result_array();
	}
	public function delete_data($table_name,$warr)
	{
		$this->db->where($warr);
		return $this->db->delete($table_name);
	}
	public function update_data($table_name,$data,$wdata)
	{
		$this->db->where($wdata);
		return $this->db->update($table_name,$data);
	}
}

?>