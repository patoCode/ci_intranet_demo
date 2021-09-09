<?php
require_once APPPATH.'controllers/administration/BaseCrud.php';

class PeopleCRUD
{
	private $crud;

	private $showColumns   = ['name','pat_surename','mat_surename','ci','birthday','phone','mobile','personal_email','status'];

	private $createColumns = ['name','pat_surename','mat_surename','ci','birthday','phone','mobile','personal_email','user_created','created_at'];

	private $editColumns   = ['name','pat_surename','mat_surename','ci','birthday','phone','mobile','personal_email','status','user_updated', 'updated_at'];
	private $labels        = array(
								'name'           => 'Nombre(s)',
								'pat_surename'   => 'Apellido Pat.',
								'mat_surename'   => 'Apellido Mat.',
								'ci'             => 'C.I.',
								'birthday'       => 'Cumpleaños',
								'phone'          => 'Telefono',
								'mobile'         => 'Celular',
								'personal_email' => 'Email'
							);
	private $table       = 'people';
	private $idField     = 'id_people';
	private $subject;
	private $actionLabel = "";
	private $actionIcon  = "";
	private $username;

	function __construct($subject, $showDeleteRows = true, $softDelete = true)
	{
		$this->crud = new BaseCrud($subject,$this->table,$this->idField, $showDeleteRows, $softDelete);
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
