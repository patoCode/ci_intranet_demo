<?php

class Master_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	function delete($id, $table, $idField, $username)
	{
		return $this->db->update($table,array('status'=>'inactivo','is_delete' => 'borrado','updated_at' => date("Y-m-d H:i:s"),'user_updated' => $username),array($idField => $id));
	}
}