<?php
require_once APPPATH.'controllers/administration/BaseCrud.php';

class GroupCRUD
{
	private $crud;
	private $showColumns   = ['name','description','code','icon','color','status'];
	private $createColumns = ['name','description','code','icon','color','user_created','created_at'];
	private $editColumns   = ['name','description','code','icon','color','status','user_updated', 'updated_at'];
	private $labels    = array(
							"name"        =>"Nombre de Grupo",
							"description" =>"Descripcion",
							"code"        =>"CODE",
							"icon"        =>"Icono",
							"color"       =>"color"
						);
	private $table   = 'group_';
	private $idField = 'id_group';
	private $subject;
	private $username;

	function __construct($subject, $showDeleteRows = true, $softDelete = true)
	{
		$this->crud = new BaseCrud($subject,$this->table,$this->idField, $showDeleteRows, $softDelete);

		$this->crud->setShowFields($this->createColumns);
		$this->crud->setRequiredFields($this->createColumns);
		$this->crud->setEditFields($this->editColumns);
		$this->crud->setColumns($this->showColumns);
		$this->crud->setAuditFields("#DEINS");
		$this->crud->setDisplayFields($this->labels);
	}

	/*===========================================================================*/
	/**   RETURN GROCERY CRUD
	/*===========================================================================*/
	public function getCRUD()
	{
		return $this->crud->getRender();
	}



}