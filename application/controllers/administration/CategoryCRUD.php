<?php
require_once APPPATH.'controllers/administration/BaseCrud.php';

class CategoryCRUD
{
	private $crud;
	private $showColumns   = ['id_site','category','description','objetive_group', '_order','uri','status'];
	private $requiredFields = ['id_site','description','_order','uri'];
	private $createColumns = ['id_site','category','description','objetive_group', '_order','uri','user_created','created_at'];
	private $editColumns   = ['id_site','category','description','objetive_group', '_order','uri','status','user_updated', 'updated_at'];

	private $labels    = array(
							"id_site"        =>"Sitio",
							"category"       =>"Categoria",
							"description"    =>"Descripción",
							"objetive_group" =>"Grupo Destino",
							"_order"         =>"Orden",
							"uri"            =>"URI"
						);

	private $table   = 'category';
	private $idField = "id_category";
	private $subject;
	private $username;

	function __construct($subject, $showDeleteRows = true, $softDelete = true, $id = 0)
	{
		$this->crud = new BaseCrud($subject,$this->table,$this->idField, $showDeleteRows, $softDelete);

		$this->crud->setShowFields($this->createColumns);
		$this->crud->setRequiredFields($this->requiredFields);
		$this->crud->setEditFields($this->editColumns);
		$this->crud->setColumns($this->showColumns);

		$this->crud->setAuditFields("#DEINS");
		$this->crud->setDisplayFields($this->labels);
		$this->crud->getSiteSelect();
		$this->crud->getGroupSelect();
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