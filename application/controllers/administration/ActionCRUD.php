<?php
require_once APPPATH.'controllers/administration/BaseCrud.php';

class ActionCRUD
{
	private $crud;
	private $showColumns   = ['name','description','uri','icon','status'];
	private $createColumns = ['name','description','uri','icon','user_created','created_at'];
	private $editColumns   = ['name','description','uri','icon','status','user_updated', 'updated_at'];

	private $labels    = array(
							"descrtiption" =>"Descripción",
							"uri"          =>"Ejecucion",
							"icon"         =>"Icono",
						);

	private $table         = 'action';
	private $idField       = "id_action";
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
		// if($id > 0 ){
		// 	$this->crud->inputHiddenSite($id);
		// 	$this->crud->whereSite($id);

		// }
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