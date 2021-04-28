<?php
class BaseCrud
{
	private $crud;
	private $table;
	private $idField;
	private $showColumns   = [];
	private $createColumns = [];
	private $editColumns   = [];
	private $labels        = [];
	private $username;

	function __construct($subject = "Sin Titulo", $table = "", $idField = "", $showDeleteRows = true, $softDelete = true){
		$this->table   = $table;
		$this->idField = $idField;

		$this->crud    = new grocery_CRUD();
		$this->crud->set_subject($subject);
		$this->crud->set_table($table);
		if(!$showDeleteRows)
			$this->crud->where($table.'.is_delete','vigente');

		if($softDelete)
			$this->crud->callback_delete(array($this,'_delete'));
	}
	public function setAuditFields($username)
	{
		$this->username = $username;
		$now            = date("Y-m-d H:i:s");
		$this->crud->field_type('user_created', 'hidden', $username);
		$this->crud->field_type('created_at', 'hidden', $now);
		$this->crud->field_type('user_updated', 'hidden', $username);
		$this->crud->field_type('updated_at', 'hidden', $now);

	}
	public function setTable($table)
	{
		$this->crud->set_table($table);
	}
	public function setShowFields($fields)
	{
		$this->crud->fields($fields);
	}
	public function setRequiredFields($fields)
	{
		$this->crud->required_fields($fields);
	}
	public function setEditFields($fields)
	{
		$this->crud->edit_fields($fields);
	}
	public function setColumns($fields)
	{
		$this->crud->columns($fields);
	}
	public function setUploadField($field, $path)
	{
		$this->crud->set_field_upload($field,$path);
	}
	public function _delete($primary_key)
	{
		$ci = & get_instance();
		$ci->load->model('Master_model','master');
		$ci->master->delete($primary_key, $this->table, $this->idField, $this->username);
	}
	public function setDisplayFields($labels)
	{
		foreach ($labels as $key => $value) {
			$this->crud->display_as($key, $value);
		}
		$this->crud->display_as("status", "Estado");
		$this->crud->display_as("user_updated", "Usr. Reg.");
		$this->crud->display_as("user_created", "Usr.Act.");
		$this->crud->display_as("created_at", "Creado");
		$this->crud->display_as("updated_at", "Actualizado");
		$this->crud->display_as("actions", "Acciones");
		$this->crud->display_as("short_key", "KEY");
		$this->crud->display_as("code", "Code");
		$this->crud->display_as("id_delete", "Registro");
	}

	public function getCompanySelect($show = 'name')
	{
		$this->crud->set_relation('id_company','company',$show, array('company.status' => 'activo','company.is_delete' => 'vigente'));
	}
	public function getSiteSelect($show = 'name')
	{
		$this->crud->set_relation('id_site','site',$show, array('site.status' => 'activo','site.is_delete' => 'vigente'));
	}
	public function getGroupSelect($show = 'name')
	{
		$this->crud->set_relation('objetive_group','group_',$show, array('group_.status' => 'activo','group_.is_delete' => 'vigente'));
	}
	public function getCategoriesSelect($show = 'name')
	{
		$this->crud->set_relation('id_category','category',$show, array('category.status' => 'activo','category.is_delete' => 'vigente'));
	}
	public function addAction($label = "Default Text", $route = "", $icon= "",$showText = false){
		if($showText)
			$this->crud->add_action($label, $label, $route, $icon);
		else
			$this->crud->add_action($label, '', $route, $icon);
	}
	// TODO Refactorizar estos metodos
	public function whereCompany($id)
	{
		$this->crud->where('id_company',$id);
	}
	public function inputHiddenCompany($value)
	{
		$this->crud->field_type("id_company", 'hidden', $value);
	}
	public function whereSite($id)
	{
		$this->crud->where('id_site',$id);
	}
	public function inputHiddenSite($value)
	{
		$this->crud->field_type("id_site", 'hidden', $value);
	}
	//
	public function getCrud()
	{
		return $this->crud;
	}
	public function getRender()
	{
		return $this->crud->render();
	}
}
