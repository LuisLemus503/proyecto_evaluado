<?php

/*CONTENEDOR DONDE CARGA EL HEADER,EL NAV Y VISTAS*/
$this->load->view('cabezera/header');
$this->load->view('navegar');
$this->load->view($vista);


?>