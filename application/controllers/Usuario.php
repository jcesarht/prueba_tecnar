<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('usuariosModel');
	}
	public function formularioRegistrar()
	{
		$info['error'] = '';
		$this->load->view('usuario/registrar',$info);
	}
	public function registrar()
	{
		$usuario = $this->input->post("usuario");
		$password = $this->input->post("password");
		$rol = $this->input->post("rol");
		$resultado = $this->usuariosModel->registrar($usuario,$password,$rol);
		
		if($resultado['error'] == false)
		{
			redirect('usuario/confirmado');
		}else
		{
			$info['error'] = $resultado['mensaje'];
			$this->load->view('usuario/registrar',$info);
		}
	}

	public function confirmado(){
		$info['titulo'] = 'Registrar usuario';
		$info['mensaje'] = 'Usuario registrado exitosamente';
		$resultado = $this->usuariosModel->consultar();
		$this->load->view('usuario/confirmado',$info);

	}

	public function dashboard(){
		$info['titulo'] = 'Usuarios';
		$info['resultado'] = '';	
		$resultado = $this->usuariosModel->consultar();
		//var_dump($resultado);die;
		if(!$resultado['error'])
		{
			
			$info['resultado'] = $resultado['resultado'];	
		}else
		{
			$info['resultado'] = $resultado->mensaje;	
		}
		
		$this->load->view('usuario/dashboard',$info);
	}
	public function modificar($id_usuario)
	{
		$resultado = $this->usuariosModel->consultarId($id_usuario);
		if($resultado['error'] == true){
			$info['error'] = $resultado['mensaje'];
		}else{
			$info['error'] = '';
			foreach ($resultado['resultado'] as $value) {
				$info['usuario'] = $value->usuario;
				$info['rol'] = $value->rol;
				$info['estado'] = $value->estado;
				$info['id'] = $id_usuario;
			}
			
		}
		
		$info['titulo'] = 'Modificar Usuario';	
		$this->load->view('usuario/modificar',$info);	
	}

	public function actualizar(){
		$usuario = $this->input->post("usuario");
		$password = $this->input->post("password");
		$rol = $this->input->post("rol");
		$estado = $this->input->post("estado");
		$id = $this->input->post("id");
		if($password == ''){
			$datos = array('usuario'=>$usuario,'rol'=>$rol,'estado'=>$estado,'fecha_actualizacion'=>date('Y-m-d H:i:s'));
		}else{
			$datos = array('usuario'=>$usuario,'password'=>$password,'rol'=>$rol,'estado'=>$estado,'fecha_actualizacion'=>date('Y-m-d H:i:s'));	
		}
		$resultado = $this->usuariosModel->actualizar($id,$datos);
		
		if($resultado['error'] == false)
		{
			redirect('usuario/dashboard');
		}else
		{
			$info['error'] = $resultado['mensaje'];
			$this->load->view('usuario/modificar/'.$id,$info);
		}
	}
	public function eliminar($id_usuario){
		$resultado = $this->usuariosModel->eliminar($id_usuario);
		
		if($resultado['error'] == false)
		{
			redirect('usuario/dashboard');
		}else
		{
			$info['error'] = $resultado['mensaje'];
			$this->load->view('usuario/dashboard',$info);
		}	
	}
}
