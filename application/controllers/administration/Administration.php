<?php
/**
 *
 */
class Administration //extends CI_Controller
{
	function __construct()
	{
	}

	public function companyCRUD()
	{
		try{
			$crud = new grocery_CRUD();
			$crud->set_table('company');
				 ->set_subject('COMPANÑIA')
				 ->columns(
				 	''
				 );

			$crud->


			$output = $crud->render();
			return $output;

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
}