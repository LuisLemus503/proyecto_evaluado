
<!----------------------------VISTA DE EL NAVEGADOR------------------------------------------>
<body>
<nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" >Bienvenido</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
        	<a  class="nav-link active" aria-current="page"  href="<?php echo base_url();?>principal/usuarios">Usuarios</a>	
        </li>
         <li class="nav-item">
        	<a  class="nav-link active" aria-current="page"  href="<?php echo base_url();?>principal/productos">Productos</a>	
        </li>
         <li class="nav-item">
        	<a  class="nav-link active" aria-current="page"  href="<?php echo base_url();?>principal/proveedores">Proveedores</a>	
        </li>
      </ul>
      <form class="d-flex">
        <a class="btn btn-outline-danger" type="submit" href="<?php echo base_url()?>">Salir</a>
      </form>
    </div>
  </div>
</nav>
</body>