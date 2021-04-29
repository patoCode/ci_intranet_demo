<?php


defined('BASEPATH') OR exit('No direct script access allowed');


require_once APPPATH.'controllers/administration/PageCRUD.php';
require_once APPPATH.'controllers/administration/CompanyCRUD.php';
require_once APPPATH.'controllers/administration/SiteCRUD.php';
require_once APPPATH.'controllers/administration/LocationCRUD.php';
require_once APPPATH.'controllers/administration/ConfigurationCRUD.php';
require_once APPPATH.'controllers/administration/CategoryCRUD.php';
require_once APPPATH.'controllers/administration/GroupCRUD.php';
require_once APPPATH.'controllers/administration/CalendarCRUD.php';
require_once APPPATH.'controllers/administration/CalendarEventsCRUD.php';



class Welcome extends CI_Controller {


	function __construct()
	{
		parent::__construct();
		$this->company = new CompanyCRUD("Empresa",true);
		$this->site = new SiteCRUD("Sitio",false);

	}

	public function company()
	{
		try {

			$_output = $this->company->getCRUD();
			$this->_render_view($_output);

		} catch (Exception $e) {
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	public function site()
	{
		try {

			$_output = $this->site->getCRUD();
			$this->_render_view($_output);

		} catch (Exception $e) {
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	public function location($id)
	{
		$this->location = new LocationCRUD("Configuración",false, true, $id);
		try {

			$_output = $this->location->getCRUD();
			$this->_render_view($_output);

		} catch (Exception $e) {
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	public function config($id)
	{
		$this->configuration = new ConfigurationCRUD("Direcciones",false, true, $id);
		try {

			$_output = $this->configuration->getCRUD();
			$this->_render_view($_output);

		} catch (Exception $e) {
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	public function category()
	{
		$this->category = new CategoryCRUD("Categorias",false, true);
		try {

			$_output = $this->category->getCRUD();
			$this->_render_view($_output);

		} catch (Exception $e) {
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	public function page()
	{
		$this->page = new PageCRUD("Paginas",false, true);
		try {

			$_output = $this->page->getCRUD();
			$this->_render_view($_output);

		} catch (Exception $e) {
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	public function group()
	{
		$this->group = new GroupCRUD("Grupos",false, true);
		try {

			$_output = $this->group->getCRUD();
			$this->_render_view($_output);

		} catch (Exception $e) {
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	public function calendar()
	{
		$this->calendar = new CalendarCRUD("Calendario",false, true);
		try {

			$_output = $this->calendar->getCRUD();
			$this->_render_view($_output);

		} catch (Exception $e) {
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	public function calendarEvents($id)
	{
		$this->calendar = new CalendarEventsCRUD("Eventos",false, true, $id);
		try {

			$_output = $this->calendar->getCRUD();
			$this->_render_view($_output);

		} catch (Exception $e) {
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	private function _render_view($output = null)
	{
		$this->load->view('Administration/base',(array)$output);
	}

}
