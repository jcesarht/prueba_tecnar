<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('usuariosModel');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$info['mensaje'] = '';
		$this->load->view('login/login',$info);
	}

	public function logear(){
		$usuario = $this->input->post("usuario");
		$password = $this->input->post("password");
		$resultado = Array();
		if($usuario != '' || $password != '')
		{
			$resultado = $this->usuariosModel->consultar($usuario,$password);	
			if($resultado['error'] == false)
			{
				redirect('usuario/dashboard');
			}else
			{
				$info['mensaje'] = $resultado['mensaje'];
			}
		}
		else
		{
			$info['mensaje'] = 'Debe llenar el formulario';
		}
		$this->load->view('login/login',$info);
		//var_dump($resultado);die;
		
	}
}
