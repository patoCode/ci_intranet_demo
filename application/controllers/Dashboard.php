<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*IMPORT CLASS CRUD */
require_once APPPATH.'controllers/administration/PageCRUD.php';
require_once APPPATH.'controllers/administration/CompanyCRUD.php';
require_once APPPATH.'controllers/administration/SiteCRUD.php';
require_once APPPATH.'controllers/administration/LocationCRUD.php';
require_once APPPATH.'controllers/administration/ConfigurationCRUD.php';
require_once APPPATH.'controllers/administration/CategoryCRUD.php';
require_once APPPATH.'controllers/administration/GroupCRUD.php';
require_once APPPATH.'controllers/administration/CalendarCRUD.php';
require_once APPPATH.'controllers/administration/CalendarEventsCRUD.php';
require_once APPPATH.'controllers/administration/RolCRUD.php';
require_once APPPATH.'controllers/administration/ActionCRUD.php';
require_once APPPATH.'controllers/administration/UserCRUD.php';
require_once APPPATH.'controllers/administration/PeopleCRUD.php';


class Dashboard extends CI_Controller {

	private $admin_template_route = 'Administration/base';

	function __construct(){
		parent::__construct();
		$this->load->model('');
	}

	public function home()
	{
		redirect('Dashboard/company','refresh');
	}
	/**
	 * @return [type]
	 */
	public function company()
	{
		$company = new CompanyCRUD("Empresa",true);
		try {
			$company->setActionStyle("Direcciones");
			$_output = $company->getCRUD();

			$this->_render_view($_output);

		} catch (Exception $e) {
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	/**
	 * @param  [type]
	 * @return [type]
	 */
	public function location($id)
	{
		$location = new LocationCRUD("Configuración",false, true, $id);
		try {

			$_output = $location->getCRUD();
			$this->_render_view($_output);

		} catch (Exception $e) {
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	/**
	 * @return [type]
	 */
	public function site()
	{
		$site = new SiteCRUD("Sitio",false);
		try {
			$site->setActionStyle("[+] CONFIG");
			$_output = $site->getCRUD();
			$this->_render_view($_output);

		} catch (Exception $e) {
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	/**
	 * @param  [type]
	 * @return [type]
	 */
	public function configuration($id)
	{
		$configuration = new ConfigurationCRUD("Direcciones",false, true, $id);
		try {
			$_output = $configuration->getCRUD();
			$this->_render_view($_output);
		} catch (Exception $e) {
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	/**
	 * @return [type]
	 */
	public function category()
	{
		$category = new CategoryCRUD("Categorias",false, true);
		try {

			$_output = $category->getCRUD();
			$this->_render_view($_output);

		} catch (Exception $e) {
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	/**
	 * @return [type]
	 */
	public function page()
	{
		$page = new PageCRUD("Paginas",false, true);
		try {

			$_output = $page->getCRUD();
			$this->_render_view($_output);

		} catch (Exception $e) {
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	/**
	 * @return [type]
	 */
	public function group()
	{
		$group = new GroupCRUD("Grupos",false, true);
		try {
			$_output = $group->getCRUD();
			$this->_render_view($_output);
		} catch (Exception $e) {
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	public function rols()
	{
		$rol = new RolCRUD("Roles",false, true);
		try {
			$_output = $rol->getCRUD();
			$this->_render_view($_output);
		} catch (Exception $e) {
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	public function actions()
	{
		$action = new ActionCRUD("Acciones",false, true);
		try {
			$_output = $action->getCRUD();
			$this->_render_view($_output);
		} catch (Exception $e) {
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	public function user()
	{
		$user = new UserCRUD("Usuarios",false, true);
		try {
			$_output = $user->getCRUD();
			$this->_render_view($_output);
		} catch (Exception $e) {
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	public function people()
	{
		$people = new PeopleCRUD("Personas",false, true);
		try {
			$_output = $people->getCRUD();
			$this->_render_view($_output);
		} catch (Exception $e) {
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	/**
	 * @param  [type]
	 * @param  [type]
	 * @return [type]
	 */
	private function _render_view($output = null, $view = null)
	{
		if($view == null){
			$this->load->view($this->admin_template_route,(array)$output);
		}else{
			$data['view'] = $view;
			$this->load->view($this->admin_template_route,$data);
		}
	}
}