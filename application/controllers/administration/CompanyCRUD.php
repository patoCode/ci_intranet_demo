<?php
require_once APPPATH.'controllers/administration/BaseCrud.php';

class CompanyCRUD
{
	private $crud;
	private $showColumns   = ['name','initials','description', 'company_logo','code','short_key','status'];
	private $createColumns = ['name','initials','description', 'company_logo','code','short_key','user_created','created_at'];
	private $editColumns   = ['name','initials','description', 'company_logo','code', 'status','user_updated', 'updated_at'];
	private $labels    = array("name"=>"Sitio","initials"=>"Abr.","description"=>"Descripcion","company_logo"=>"Logo","code"=>"CODE","short_key"=>"KEY","status"=>"Estado");
	private $table         = 'company';
	private $idField       = "id_company";
	private $subject;
	private $actionLabel = "";
	private $actionIcon = "";
	private $username;

	function __construct($subject, $showDeleteRows = true, $softDelete = true)
	{
		$this->crud = new BaseCrud($subject,$this->table,$this->idField, $showDeleteRows, $softDelete);
		$this->crud->setShowFields($this->createColumns);
		$this->crud->setRequiredFields($this->createColumns);
		$this->crud->setEditFields($this->editColumns);
		$this->crud->setColumns($this->showColumns);
		$this->crud->setUploadField('company_logo', PATH_LOGO);
		$this->crud->setAuditFields("#DEINS");
		$this->crud->setDisplayFields($this->labels);

	}
	public function setActionStyle($label = "", $icon = "")
	{
		$this->actionLabel = $label;
		$this->actionIcon = $icon;
		$this->addAction();
	}
	private function addAction(){
		$this->crud->addAction($this->actionLabel, 'dashboard/location', $this->actionIcon,true);
	}

	/*===========================================================================*/
	/**   RETURN GROCERY CRUD
	/*===========================================================================*/
	public function getCRUD()
	{
		$this->addAction();
		return $this->crud->getRender();
	}



}