<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Model_proveedor extends CI_Model {

	/*MODELO DE PROVEEDOR*/

	/*INSERTAR DATOS*/
 public function insertar_proveedor($Proveedor){
		if($this->db->insert('Proveedor',$Proveedor))
			return true;
		else
			return false;
	}

	/*MUESTRA LOS DATOS */
	public function leer_proveedor($bus){
		$this->db->or_like('idProveedor',$bus);
		$this->db->or_like('NombreProveedor',$bus);
		$query=$this->db->get('Proveedor');
		return $query->result();
	}

	/*TRAE LOS DATOS POR MEDIO DE EL ID*/
	public function traer_proveedor($idProveedor)
	{
	    $this->db->where('idProveedor',$idProveedor);
		$query=$this->db->get('Proveedor');
		return $query->row();

	}
	/*ACTUALIZA DATOS*/
	public function actualizar_proveedor($idProveedor,$Proveedor)
	{
	     $this->db->where('idProveedor',$idProveedor);
		if($this->db->update('Proveedor',$Proveedor))
			return true;
		else
			return false;
	}

	/*ELIMINA LOS DATOS*/
	public function eliminar_proveedor($idProveedor)
	{
		$this->db->where('idProveedor',$idProveedor);
		if($this->db->delete('Proveedor'))
			return true;
		else
			return false;
	}



}



?>