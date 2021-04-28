<?php
require_once APPPATH.'controllers/administration/BaseCrud.php';

class PageCRUD
{
	private $crud;
	private $showColumns   = ['id_category','title','content','icon','friendly_uri','status'];
	private $createColumns = ['id_category','title','content','icon','friendly_uri','user_created','created_at'];
	private $requireFields = ['title','content','icon','friendly_uri','user_created'];
	private $editColumns   = ['id_category','title','content','icon','friendly_uri','status','user_updated', 'updated_at'];

	private $labels    = array(
							"id_category"  =>"Categoria",
							"title"        =>"Titulo",
							"content"      =>"Contenido",
							"icon"         =>"Icono",
							"friendly_uri" =>"Url-amigable"
						);

	private $table         = 'page';
	private $idField       = "id_page";
	private $subject;
	private $username;

	function __construct($subject, $showDeleteRows = true, $softDelete = true, $id = 0)
	{
		$this->crud = new BaseCrud($subject,$this->table,$this->idField, $showDeleteRows, $softDelete);

		$this->crud->setShowFields($this->createColumns);
		$this->crud->setRequiredFields($this->requireFields);
		$this->crud->setEditFields($this->editColumns);
		$this->crud->setColumns($this->showColumns);

		$this->crud->setAuditFields("#DEINS");
		$this->crud->setDisplayFields($this->labels);
		$this->crud->getCategoriesSelect("category");

	}

	/*===========================================================================*/
	/**   RETURN GROCERY CRUD
	/*===========================================================================*/
	public function getCRUD()
	{
		return $this->crud->getRender();
	}
}