<?php 

class Hitung {

	protected $ci;
	
	function __construct()
	{
		$this->ci =& get_instance();
	}

	function sum($table, $field)
	{
		$this->ci->db->select_sum($field);
		$query = $this->ci->db->get($table)->row($field);
		return $query;
	}

}

?>