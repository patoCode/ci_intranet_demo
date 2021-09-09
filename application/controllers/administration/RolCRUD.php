<?php
require_once APPPATH.'controllers/administration/BaseCrud.php';

class RolCRUD
{
	private $crud;
	private $showColumns   = ['name','description','visibility','status','acciones'];
	private $createColumns = ['name','description','acciones','visibility','user_created','created_at'];
	private $editColumns   = ['name','description','acciones','visibility','status','user_updated', 'updated_at'];
	private $labels        = array(
								'acciones'    =>'Permisos',
								"name"        =>"Rol",
								"description" =>"Descripcion",
								"visibility"  =>"Visible",
							);
	private $table       = 'rol';
	private $idField     = 'id_rol';
	private $subject;
	private $actionLabel = "";
	private $actionIcon  = "";
	private $username;

	function __construct($subject, $showDeleteRows = true, $softDelete = true)
	{
		$this->crud = new BaseCrud($subject,$this->table,$this->idField, $showDeleteRows, $softDelete);
		$this->crud->setRelationN_toN('acciones','rol_action','action','id_rol','id_action','name');
		$this->crud->setShowFields($this->createColumns);
		$this->crud->setRequiredFields($this->createColumns);
		$this->crud->setEditFields($this->editColumns);
		$this->crud->setColumns($this->showColumns);
		$this->crud->setAuditFields("user");
		$this->crud->setDisplayFields($this->labels);
	}
	public function setActionStyle($label = "", $icon = "")
	{
		$this->actionLabel = $label;
		$this->actionIcon = $icon;
		$this->addAction();
	}
	private function addAction(){
		$this->crud->addAction($this->actionLabel, 'dashboard/actions', $this->actionIcon,true);
	}

	/*===========================================================================*/
	/**   RETURN GROCERY CRUD
	/*===========================================================================*/
	public function getCRUD()
	{
		return $this->crud->getRender();
	}



}