<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller {

	/*METODO PRINCIPAL*/
	public function index()
	{
		$data['titulo']='productos';
		$data['vista']='Productos';

		$this->load->view('contenedor',$data);

	}

    /***************************************Usuarios***************************************************/
	/*Carga la vista usuarios*/
	public function Usuarios(){


		$this->load->model('model_usuario');

		if($_POST){
			$Buscar=$this->input->post('busqueda');

		}else{
			$Buscar='';
		}
		$data['titulo']='Usuarios';
		$data['vista']='procesos/usuarios';
		$data['Usuarios']=$this->model_usuario->leer_usuario($Buscar);


	    if($this->uri->segment(3)!='')
	    {
	    	$idusuario=$this->uri->segment(3);
	    	$data['usuario_actualizar']=$this->model_usuario->traer_usuario($idusuario);
	    }
	    $this->load->view('contenedor',$data);

	}

	/*Inserta Usuarios*/
	public function insertarUsuario(){


		$Usuarios=array(
			'Nombre_user'=>$this->input->post('Nombre_user'),
			'CodEmpleado'=>$this->input->post('CodEmpleado'),
			'contra_user'=>$this->input->post('contra_user'),
			'Rol'=>$this->input->post('Rol')

		);
		$this->load->model('model_usuario');

		if($this->model_usuario->insertar_usuario($Usuarios))
			redirect('principal/Usuarios');
		
	}

	/*Actualiza Usuarios*/
	public function actualizarUsuario()
	{
		$Usuarios=array(
			'Nombre_user'=>$this->input->post('Nombre_user'),
			'CodEmpleado'=>$this->input->post('CodEmpleado'),
			'contra_user'=>$this->input->post('contra_user'),
			'Rol'=>$this->input->post('Rol')

		);
		$idusuario=$this->input->post('idusuario');

		$this->load->model('model_usuario');

		if($this->model_usuario->actualizar_usuario($idusuario,$Usuarios))
			redirect('principal/Usuarios');
	}

	/*Elimina Usuarios*/
	public function EliminarUsuario()
	{
		$idusuario=$this->uri->segment(3);
		$this->load->model('model_usuario');

		if($this->model_usuario->eliminar_usuario($idusuario))
			redirect('principal/Usuarios');

	}

	/***************************************Productos***************************************************/

	/*Carga vista Productos*/
	public function Productos(){
		$data['titulo']='productos';
		$data['vista']='procesos/productos';
		$this->load->model('model_producto');
		if($_POST){
			$Buscar=$this->input->post('busqueda');

		}else{
			$Buscar='';
		}
		
		$data['Producto']=$this->model_producto->leer_producto($Buscar);
	    if($this->uri->segment(3)!='')
	    {
	    	$idproducto=$this->uri->segment(3);
	    	$data['producto_actualizar']=$this->model_producto->traer_producto($idproducto);
	    }

		$this->load->view('contenedor',$data);
	}

     /*METODO PARA INSERTAR*/
	public function insertarProducto(){


		$Producto=array(
			'NombreProducto'=>$this->input->post('NombreProducto'),
			'Precioproducto'=>$this->input->post('Precioproducto'),
			'FechaVencimiento'=>$this->input->post('FechaVencimiento'),
		);
		
		$this->load->model('model_producto');

		if($this->model_producto->insertar_producto($Producto));
			redirect('principal/Productos');
		    	
	}

	/*METODO PARA ACTUALIZAR*/
	public function actualizarProducto(){

		$Producto=array(
			'NombreProducto'=>$this->input->post('NombreProducto'),
			'Precioproducto'=>$this->input->post('Precioproducto'),
			'FechaVencimiento'=>$this->input->post('FechaVencimiento'),
		);
		$idproducto=$this->input->post('idproducto');

		$this->load->model('model_producto');

		if($this->model_producto->actualizar_producto($idproducto,$Producto))
			redirect('principal/Productos');

	}
	/*METODO PARA ELIMINAR*/
	public function EliminarProducto()
	{
		$idproducto=$this->uri->segment(3);
		$this->load->model('model_producto');

		if($this->model_producto->eliminar_producto($idproducto))
			redirect('principal/Productos');

	}

     /***************************************PROVEEDORES***************************************************/
	/*METODO DONDE CARGA VISTA PROVEEDORES*/
	public function Proveedores(){
		$data['titulo']='Inicio';
		$data['vista']='procesos/proveedores';
		$this->load->model('model_proveedor');
		if($_POST){
			$Buscar=$this->input->post('busqueda');

		}else{
			$Buscar='';
		}
		$data['Proveedor']=$this->model_proveedor->leer_proveedor($Buscar);

	    if($this->uri->segment(3)!='')
	    {
	    	$idProveedor=$this->uri->segment(3);
	    	$data['proveedor_actualizar']=$this->model_proveedor->traer_proveedor($idProveedor);
	    }

		$this->load->view('contenedor',$data);
	}
	/*METODO DONDE INSERTA*/
	public function insertarProveedor(){


		$Proveedor=array(
			'NombreProveedor'=>$this->input->post('NombreProveedor')

		);
		$this->load->model('model_proveedor');

		if($this->model_proveedor->insertar_proveedor($Proveedor))
			redirect('principal/Proveedores');
		
	}
	/*METODO DONDE ACTUALIZA*/
	public function actualizarProveedor()
	{
		$Proveedor=array(
			'NombreProveedor'=>$this->input->post('NombreProveedor')
		);
		$idProveedor=$this->input->post('idProveedor');

		$this->load->model('model_proveedor');

		if($this->model_proveedor->actualizar_proveedor($idProveedor,$Proveedor))
			redirect('principal/Proveedores');
	}
	/*METODO DONDE ELIMINA*/
	public function EliminarProveedor()
	{
		$idProveedor=$this->uri->segment(3);
		$this->load->model('model_proveedor');

		if($this->model_proveedor->eliminar_proveedor($idProveedor))
			redirect('principal/Proveedores');

	}

}
