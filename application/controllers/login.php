<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {

	/*controlador login donde cargara vistas y metodos */
	/*METODO PRINICIPAL QUE CARGA LA VISTA DE LOGIN Y COMPRUEBA LOS DATOS RECIVIDOS */
	public function index()
	{
		$data['titulo']='productos';
		$data['vista']='inicio';
		if(isset($_POST['contra_user'])){
			$this->load->model('model_login');
			if($this->model_login->login($_POST['Nombre_user'],$_POST['contra_user'])){
				redirect('principal/Productos');
			}else{
				redirect('login');
			}
		}
		$this->load->view('contenedorlogin',$data);


	}
	/*METODO DONDE CARGARA LA VISTA NUEVO USUARIO */
	public function NuevoUsuario(){
		$data['titulo']='Nuevo-usuario';
		$data['vista']='procesos/NuevoUser';
		$this->load->view('contenedorregistro',$data);
	}
	/*METODO QUE INSERTARA EL NUEVO USUARIO */
	public function RegistroUsuario(){
		$Usuarios=array(
			'Nombre_user'=>$this->input->post('Nombre_user'),
			'CodEmpleado'=>$this->input->post('CodEmpleado'),
			'contra_user'=>$this->input->post('contra_user')

		);
		$this->load->model('model_usuario');

		if($this->model_usuario->insertar_usuario($Usuarios))
			redirect('login');
	}
}