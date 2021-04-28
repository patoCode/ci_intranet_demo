<?php
require_once APPPATH.'controllers/administration/BaseCrud.php';

class GenericCRUD
{
	private BaseCrud $crud;

	function __construct($subject, $table, $idField, $showDeleteRows = true, $softDelete = true, $id = 0)
	{
		$this->crud = new BaseCrud($subject,$table,$idField, $showDeleteRows, $softDelete);

		$this->crud->setShowFields($this->createColumns);
		$this->crud->setRequiredFields($this->createColumns);
		$this->crud->setEditFields($this->editColumns);
		$this->crud->setColumns($this->showColumns);

		$this->crud->setAuditFields("#DEINS");
		$this->crud->setDisplayFields($this->labels);
		//$this->crud->getSiteSelect();
		//$this->crud->getGroupSelect();
	}
	public function addCompanyFields($id = 0)
	{
		if($id != 0){
			$this->crud->whereCompany($id);
			$this->crud->inputHiddenCompany($id);
		}
	}
	public function addSiteFields($id = 0)
	{
		if($id != 0){
			$this->crud->whereSite($id);
			$this->crud->inputHiddenSite($id);
		}
	}
	public function addCompanySelect($show = "")
	{
		$this->crud->getCompanySelect($show);
	}
	public function addSiteSelect($show = "")
	{
		$this->crud->getSiteSelect($show);
	}
	public function addGroupSelect($show = "")
	{
		$this->crud->getGroupSelect($show);
	}
	/*===========================================================================*/
	/**   RETURN GROCERY CRUD
	/*===========================================================================*/
	public function getCRUD()
	{
		return $this->crud->getRender();
	}
}