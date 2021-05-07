<?php
class Intranet extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Master_model', 'compania');
		$this->load->model('Company_model', 'compania');
		$this->load->model('User_model', 'user');
	}

	public function index()
	{

		if(WITH_LOGIN)
			$this->load->view('login');
		else
			$this->load->view('Home');
	}
	public function login()
	{
		$username  = trim($this->input->post('username'));
		$password  = trim($this->input->post('password'));
		$data_user = array();
		$sctions_user = array();

		if( $username != '' && $password != ''){

			$user_valid = $this->user->checkLogin($username, $password);
			if($user_valid != null){
				$data_user['user'] = $user_valid;

				$actions = $this->user->getActions($user_valid->id_user);
				if($actions != null){
					$data_user['actions'] = $actions;
				}
				$this->session->set_userdata($data_user);
				$visibility = $this->visibilityUser($this->user->rolsVisibility($user_valid->id_user));

				if($visibility)
				{
					redirect('Dashboard/home','refresh');
				}
				else
				{
					//$this->load->view('View File', $data, FALSE);//PUBLIC
					echo "PUBLIC";
				}

			}else{
				$this->index();
			}
		}else{
			$this->index();
		}

	}
	/**
	 * [visibilityUser description]
	 * @param  [type] $rols [description]
	 * @return [type]       [description]
	 */
	private function visibilityUser($rols)
	{
		foreach ($rols as $rol) {
			if($rol->visibility == 'private')
				return true;
		}
		return false;
	}

}