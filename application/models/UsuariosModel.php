<?php
class usuariosModel extends CI_model
{
	public function __construct()
	{
		$this->load->database();
	}	

	public function registrar($usuario,$password,$rol)
	{
		$this->db->where("usuario",$usuario);
		$consulta = $this->db->get('usuarios');
		$error = $this->db->error();
        if ($error['code'] != NULL)
        {
            return array('error'=>true,'mensaje'=>'Error al consultar');
        }else{
        	$check = false;
        	if ($consulta->num_rows() > 0) {
				$check = true;
			}
			if($check)
				return array('error'=>true,'mensaje'=>'Usuario ya existe');
			else
				return array('error'=>$this->db->insert("usuarios",["usuario"=>$usuario,"password"=>$password,"rol"=>$rol]),'mensaje'=>'Usuario guardado con exito');
        }
	}
	function consultar($usuario = '',$password = ''){
		if($usuario != '' || $password != ''){
			$this->db->where("usuario",$usuario);
			$this->db->where("usuario",$password);
		}
		$consulta = $this->db->get('usuarios');
		$error = $this->db->error();
        if ($error['code'] != NULL)
        {
            return array('error'=>true,'mensaje'=>'Error al consultar');
        }else{
        	$check = false;
        	if ($consulta->num_rows() > 0) {
				$check = true;
			}
			if($check)
				return array('error'=>false,'mensaje'=>'Usuario Encontrado','resultado'=>$consulta->result());
			else
				return array('error'=>true,'mensaje'=>'Usuario o password está errado');
        }	
	}
	function consultarId($id){
		if($id != ''){
			$this->db->where("id",$id);
		}
		else{
			return array('error'=>true,'mensaje'=>'debe mandar como parametro el Id');
		}
		$consulta = $this->db->get('usuarios');
		$error = $this->db->error();
        if ($error['code'] != NULL)
        {
            return array('error'=>true,'mensaje'=>'Error al consultar');
        }else{
        	$check = false;
        	if ($consulta->num_rows() > 0) {
				$check = true;
			}
			if($check)
				return array('error'=>false,'mensaje'=>'Usuario Encontrado','resultado'=>$consulta->result());
			else
				return array('error'=>true,'mensaje'=>'Usuario con Id '.$id.' no existe');
        }	
	}
	public function actualizar($id,$datos)
	{
		$this->db->where("id",$id);
		$consulta = $this->db->update('usuarios',$datos);
		$error = $this->db->error();
        if ($error['code'] != NULL)
        {
            return array('error'=>true,'mensaje'=>'Error al actualizar');
        }else{
        	return array('error'=>false,'mensaje'=>'Se actualizó usuario correctamente');
        }
	}
	public function eliminar($id)
	{
		$this->db->where("id",$id);
		$consulta = $this->db->delete('usuarios');
		$error = $this->db->error();
        if ($error['code'] != NULL)
        {
            return array('error'=>true,'mensaje'=>'Error al elimnar');
        }else{
        	return array('error'=>false,'mensaje'=>'Se eliminó usuario correctamente');
        }
	}
}
?>