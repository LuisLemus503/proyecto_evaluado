

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_login extends CI_Model {

    /*Controlador de login donde consulta el usuario y contraseña*/
	public function login($Nombre_user,$contra_user){

		$this->db->where('Nombre_user',$Nombre_user);
		$this->db->where('contra_user',$contra_user);
		$q=$this->db->get('Usuarios');
		if($q->num_rows()>0){
			return true;

		}else{
			return false;
		}

	}



}