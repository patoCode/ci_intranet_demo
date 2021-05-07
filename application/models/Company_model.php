<?php

class Company_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	public function getCompany($id = null)
	{
		$this->db->from('company');
		$this->db->where('_default', 'y');
		$query = $this->db->get();
		if($query->num_rows() > 0 && $query->num_rows() < 2)
			return $query->row();
		else
			return null;
	}
}