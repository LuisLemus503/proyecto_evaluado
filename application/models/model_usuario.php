<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_usuario extends CI_Model {

	/*MODELO USUARIO*/

	/*INSERTA DATOS*/
     public function insertar_usuario($Usuarios){
		if($this->db->insert('Usuarios',$Usuarios))
			return true;
		else
			return false;
	}

	/*MUESTRA LOS DATOS Y FUNCIONA EL BUSCADOR*/
	public function leer_usuario($bus){
		$this->db->or_like('idusuario',$bus);
		$this->db->or_like('Nombre_user',$bus);
		$this->db->or_like('CodEmpleado',$bus);
          $this->db->or_like('contra_user',$bus);
		$this->db->or_like('Rol',$bus);
		$query=$this->db->get('Usuarios');
		return $query->result();
	}

	/*TRAE LOS DATOS*/
	public function traer_usuario($idusuario)
	{
	    $this->db->where('idusuario',$idusuario);
		$query=$this->db->get('Usuarios');
		return $query->row();

	}

	/*ACTUALIZA DATOS*/
	public function actualizar_usuario($idusuario,$Usuarios)
	{
	     $this->db->where('idusuario',$idusuario);
		if($this->db->update('Usuarios',$Usuarios))
			return true;
		else
			return false;
	}

	/*ELIMINA LOS DATOS*/
	public function eliminar_usuario($idusuario)
	{
		$this->db->where('idusuario',$idusuario);
		if($this->db->delete('Usuarios'))
			return true;
		else
			return false;
	}

	

}
