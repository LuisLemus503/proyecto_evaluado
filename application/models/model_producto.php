<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_producto extends CI_Model {

	/*Modelo de Producto*/

	/*INSERTA PRODUCTO*/
     public function insertar_producto($Producto){
		if($this->db->insert('Producto',$Producto))
			return true;
		else
			return false;
	}
	/*MUESTRA PRODUCTO Y FUNCIONA COMO BUSCADOR*/
	public function leer_producto($bus){

		$this->db->or_like('idproducto',$bus);
		$this->db->or_like('NombreProducto',$bus);
		$this->db->or_like('Precioproducto',$bus);
          $this->db->or_like('FechaVencimiento',$bus);
		$query=$this->db->get('Producto');
		return $query->result();
	
	}
	

	/*public function myjoin(){
		$this->db->select('Proveedor.idProveedor');
		$this->db->from('Proveedor');
		$this->db->join('Producto','Proveedor.idProveedor= Producto.idProveedor');
		return $this->db->get();
	}
	*/

	/*TRAE LOS DATOS POR MEDIO DE EL ID*/
	public function traer_producto($idproducto)
	{
	    $this->db->where('idproducto',$idproducto);
		$query=$this->db->get('Producto');
		return $query->row();

	}
	/*ACTUALIZA LOS DATOS*/
	public function actualizar_producto($idproducto,$Producto)
	{
	     $this->db->where('idproducto',$idproducto);
		if($this->db->update('Producto',$Producto))
			return true;
		else
			return false;
	}
	/*ELIMINA LOS DATOS*/
	public function eliminar_producto($idproducto)
	{
		$this->db->where('idproducto',$idproducto);
		if($this->db->delete('Producto'))
			return true;
		else
			return false;
	}

	

}
