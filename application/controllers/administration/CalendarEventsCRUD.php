<?php
require_once APPPATH.'controllers/administration/BaseCrud.php';

class CalendarEventsCRUD
{
	private $crud;
	private $showColumns   = ['event','description','start_date','end_date','color','objetive_group','notificaion_mail','uri','short_key','status'];
	private $createColumns = ['id_calendar','event','description','start_date','end_date','color','objetive_group','notificaion_mail','uri','short_key','user_created','created_at'];
	private $editColumns   = ['event','description','start_date','end_date','color','objetive_group','notificaion_mail','uri','short_key','status','user_updated', 'updated_at'];
	private $labels    = array(
							"event"             =>"Denominacion",
							"description"       =>"Descripcion",
							"start_date"        =>"Inicio",
							"end_date"          =>"Fin",
							"color"             =>"color",
							"objetive_group"    =>"Grupo objetivo",
							"notification_mail" =>"Enviar Notificaciones",
						);
	private $table   = 'event';
	private $idField = 'id_event';
	private $subject;
	private $username;

	function __construct($subject, $showDeleteRows = true, $softDelete = true, $id = 0)
	{
		$this->crud = new BaseCrud($subject,$this->table,$this->idField, $showDeleteRows, $softDelete);

		$this->crud->setShowFields($this->createColumns);
		$this->crud->setRequiredFields($this->createColumns);
		$this->crud->setEditFields($this->editColumns);
		$this->crud->setColumns($this->showColumns);
		$this->crud->setAuditFields("#DEINS");
		$this->crud->setDisplayFields($this->labels);
		if($id > 0){
			$this->crud->addHiddenInput("id_calendar", $id);
		}

	}

	/*===========================================================================*/
	/**   RETURN GROCERY CRUD
	/*===========================================================================*/
	public function getCRUD()
	{
		return $this->crud->getRender();
	}



}