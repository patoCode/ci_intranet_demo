<?php
require_once APPPATH.'controllers/administration/BaseCrud.php';

class LocationCRUD
{
	private $crud;
	private $showColumns   = ['location','phone','gmaps'];
	private $createColumns = ['id_company','location','phone','gmaps','code','short_key','user_created','created_at'];
	private $editColumns   = ['location','phone','gmaps','code','status','user_updated', 'updated_at'];
	private $labels    = array("location"=>"Dirección","phone"=>"Telefono","gmaps"=>"GoogleMaps");
	private $table         = 'location';
	private $idField       = "id_location";
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
		/* TODO DEBERIA MOVERSE FILTER BY COMPANY */
		if($id > 0 ){
			$this->crud->inputHiddenCompany($id);
			$this->crud->whereCompany($id);

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