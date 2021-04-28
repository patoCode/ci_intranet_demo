<?php
require_once APPPATH.'controllers/administration/BaseCrud.php';

class ConfigurationCRUD
{
	private $crud;
	private $showColumns   = ['id_site','code','descrtiption','_path', 'server_type','ip', 'user', 'password','port','status'];
	private $createColumns = ['id_site','code','descrtiption','_path', 'server_type','ip', 'user', 'password','port','user_created','created_at'];
	private $editColumns   = ['code','descrtiption','_path', 'server_type','ip', 'user', 'password','port','status','user_updated', 'updated_at'];

	private $labels    = array("descrtiption"=>"Descripción","_path"=>"Upload Archivos","server_type"=>"Nombre Servidor","ip"=>"IP", "user"=>"usuario","password"=>"Password","port"=>"Puerto");

	private $table         = 'configuration';
	private $idField       = "id_configuration";
	private $subject;
	private $username;

	function __construct($subject, $showDeleteRows = true, $softDelete = true, $id = 0)
	{
		$this->crud = new BaseCrud($subject,$this->table,$this->idField, $showDeleteRows, $softDelete);

		$this->crud->setShowFields($this->createColumns);
		$this->crud->setRequiredFields($this->createColumns);
		$this->crud->setEditFields($this->editColumns);
		$this->crud->setColumns($this->showColumns);

		$this->crud->setAuditFields("#DEINS");
		$this->crud->setDisplayFields($this->labels);
		/* TODO DEBERIA MOVERSE FILTER BY SITE */
		if($id > 0 ){
			$this->crud->inputHiddenSite($id);
			$this->crud->whereSite($id);

		}
		/* FILTER BY COMPANY */
	}

	/*===========================================================================*/
	/**   RETURN GROCERY CRUD
	/*===========================================================================*/
	public function getCRUD()
	{
		return $this->crud->getRender();
	}
}