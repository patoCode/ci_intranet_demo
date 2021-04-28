<?php
require_once APPPATH.'controllers/administration/BaseCrud.php';

class SiteCRUD
{
	private $crud;
	private $showColumns   = ['id_company','name','slogan','main_logo','code','short_key','status'];
	private $createColumns = ['id_company','name','slogan','main_logo','code','short_key','user_created','created_at'];
	private $editColumns   = ['id_company','name','slogan','main_logo','code','status','user_updated', 'updated_at'];
	private $labels    = array("id_company"=>"Empresa","namme"=>"Sitio","slogan"=>"Frase","main_logo"=>"Logo");
	private $table         = 'site';
	private $idField       = "id_site";
	private $subject;
	private $username;

	function __construct($subject, $showDeleteRows = true, $softDelete = true)
	{
		$this->crud = new BaseCrud($subject,$this->table,$this->idField, $showDeleteRows, $softDelete);
		$this->crud->setShowFields($this->createColumns);
		$this->crud->setRequiredFields($this->createColumns);
		$this->crud->setEditFields($this->editColumns);
		$this->crud->setColumns($this->showColumns);
		$this->crud->setUploadField('main_logo', 'assets/uploads/files');
		$this->crud->setAuditFields("#DEINS");
		$this->crud->setDisplayFields($this->labels);
		$this->crud->getCompanySelect();
		$this->crud->addAction("Config",'welcome/config', '',true);

	}

	/*===========================================================================*/
	/**   RETURN GROCERY CRUD
	/*===========================================================================*/
	public function getCRUD()
	{
		return $this->crud->getRender();
	}
}