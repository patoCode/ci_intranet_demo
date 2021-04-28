<?php
require_once APPPATH.'controllers/administration/BaseCrud.php';

class CalendarCRUD
{
	private $crud;
	private $showColumns   = ['id_site', 'name', 'description', 'color','short_key','mail_notification','status'];
	private $createColumns = ['id_site', 'name', 'description', 'color','short_key','mail_notification','user_created','created_at'];
	private $editColumns   = ['id_site', 'name', 'description', 'color','short_key','mail_notification','status','user_updated', 'updated_at'];
	private $labels    = array(
							"name"              =>"Denominacion",
							"description"       =>"Descripcion",
							"short_key"         =>"KEY",
							"mail_notification" =>"Enviar Notificaiones",
							"color"             =>"color",
							"id_site"             =>"Sitio"
						);
	private $table   = 'calendar';
	private $idField = 'id_calendar';
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
		$this->crud->getSiteSelect();
		$this->crud->addAction("Ver Eventos",'welcome/calendarEvents', '',true);
	}

	/*===========================================================================*/
	/**   RETURN GROCERY CRUD
	/*===========================================================================*/
	public function getCRUD()
	{
		return $this->crud->getRender();
	}



}