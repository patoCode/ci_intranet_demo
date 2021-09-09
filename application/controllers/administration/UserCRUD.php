<?php
require_once APPPATH.'controllers/administration/BaseCrud.php';

class UserCRUD
{
	private $crud;

	private $showColumns   = ['id_people','id_site','username','password','photo','email','location','ip_phone','work_position','status'];

	private $createColumns = ['id_people','id_site','username','password','photo','email','location','ip_phone','work_position','manager','notifications_active','ldap','status','user_created','created_at'];

	private $editColumns   = ['id_people','id_site','username','password','photo','email','location','ip_phone','work_position','manager','notifications_active','ldap','status','user_updated', 'updated_at'];
	private $labels        = array(
								'id_people'            => 'Persona',
								'id_site'            => 'Sitio',
								'username'             => 'Nombre de usuario',
								'password'             => 'Password',
								'photo'                => 'Fotografia',
								'email'                => 'Email',
								'location'             => 'Ubicacion',
								'ip_phone'             => 'Telf.IP',
								'work_position'        => 'Cargo',
								'manager'              => 'Jefe Inmediato',
								'notifications_active' => 'Activar Notificaciones',
								'ldap'                 => 'LDAP',
							);
	private $table       = 'user';
	private $idField     = 'id_user';
	private $subject;
	private $actionLabel = "";
	private $actionIcon  = "";
	private $username;

	function __construct($subject, $showDeleteRows = true, $softDelete = true)
	{
		$this->crud = new BaseCrud($subject,$this->table,$this->idField, $showDeleteRows, $softDelete);
		$this->crud->setSimpleRelation();
		$this->crud->getSiteSelect();
		$this->crud->setShowFields($this->createColumns);
		$this->crud->setRequiredFields($this->createColumns);
		$this->crud->setEditFields($this->editColumns);
		$this->crud->setColumns($this->showColumns);
		$this->crud->setUploadField('photo', PATH_PHOTOS);
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