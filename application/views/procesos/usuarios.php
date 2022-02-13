
<!----------------------------VISTA DE USUARIOS------------------------------------------>
<?php

 
/*ACA MANDO QUE ACCION DEBE REALIZARSE DEPENDIENDO QUE SE HAGA Y BUSCA CONTROLADOR CORRESPONDIENTE */
	if(isset($usuario_actualizar)){
			$idusuario='<p><input type="text" name="idusuario" value="'.$this->uri->segment(3).'"></p>';
			$Nombre_user=$usuario_actualizar->Nombre_user;
			$CodEmpleado=$usuario_actualizar->CodEmpleado;
			$contra_user=$usuario_actualizar->contra_user;
			$Rol=$usuario_actualizar->Rol;
			$accion ='actualizarUsuario';
	}
	else
	{

		$idusuario='';
		$Nombre_user='';
		$CodEmpleado='';
		$contra_user='';
		$Rol='';
		$accion='insertarUsuario';

	}
?>

<div class="container mt-5">
	
	<div class="row justify-content-center">
		<form action="" method="post" class="form">
			<input type="text" name="busqueda">
			<input type="submit" class="btn btn-danger" value="Buscar">
		</form>
		
		<div class="col-md-7">
			<div class="card">
				<div class="card-header">
					Lista de Usuarios
				</div>
				<div class="p-4">
					<table class="table align-middle">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Nombre usuario</th>
								<th scope="col">Codigo empleado</th>
								<th scope="col">Contraseña</th>
								<th scope="col">Rol</th>
								<th scope="col" colspan="2">Opciones</th>
							</tr>
						</thead>
						<?php if(count($Usuarios)>0):?>
		                      <?php foreach($Usuarios as $a):?>
						<tbody>
						
							<tr>
								<td scope ="row"><?php echo $a->idusuario;?></td>
								<td><?php echo $a->Nombre_user;?></td>
								<td><?php echo $a->CodEmpleado;?></td>
								<td><?php echo $a->contra_user;?></td>
								<td><?php echo $a->Rol;?></td>
								<td ><a href="<?php echo base_url();?>principal/EliminarUsuario/<?php echo $a->idusuario;?>" class="btn btn-danger">Eliminar</a></td>
								<td ><a class="btn btn-warning" href="<?php echo base_url();?>principal/Usuarios/<?php echo $a->idusuario;?>">Editar</a></td>

							</tr>							
						</tbody>
							   <?php endforeach;?>
						<?php else:?>
		                      <h2>NO HAY REGISTROS</h2>
	                     <?php endif; ?>

					</table>
				</div>
			</div>
		</div>
		<div class="col-md-5">
			<div class="card">
				<div class="card-header">
					Ingresa mas clientes
				</div>
				<form  id="form1" method="post" action="<?php echo base_url();?>principal/actualizarUsuario"
				 class="p-4" >
				    <?php echo $idusuario?>
					<div class="mb-3">
						<label class="form-label" >Nombre usuario</label>
						<input type="text" class="form-control"  name="Nombre_user" value="<?php echo             $Nombre_user;?>" id="Nombre_user">
					</div>
					<div class="mb-3">
						<label class="form-label" >Codigo de empleado</label>
						<input type="text" class="form-control" autofocus  name="CodEmpleado" value="<?php echo $CodEmpleado;?>" id="CodEmpleado">
					</div>
					<div class="mb-3">
						<label class="form-label" >Contraseña</label>
						<input type="text" class="form-control"  name="contra_user" value="<?php echo $contra_user;?>" id="contra_user">
					</div>
				    <div class="mb-3">
						<label class="form-label" >Rol</label>
						<input type="text"  class="form-control" name="Rol" value="<?php echo $Rol;?>" id="Rol">
					</div>
					<div class="d-grid">
						<input type="submit" class="btn btn-success" id="btn_save">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<br>
<br>
<br>
<br>
<br>
<script type="text/javascript">
	$(document).ready(function(){
		$('#btn_save').on('click', function(){
			var Nombre_user=$('#Nombre_user').val();
			var CodEmpleado=$('#CodEmpleado').val();
			var contra_user=$('#contra_user').val();
			var Rol=$('#Rol').val();
			if(Nombre_user!='' && CodEmpleado!='' && contra_user!='' && Rol!=''){
				$.ajax({
					type:"POST",
					url:"<?php echo base_url();?>principal/<?php echo $accion;?>",
					dataType:"JSON",
					data:{Nombre_user:Nombre_user, CodEmpleado:CodEmpleado, contra_user:contra_user, Rol:Rol},
					success:function(data){
						$('[Nombre_user="Nombre_user"]').val("");
						$('[CodEmpleado="CodEmpleado"]').val("");
						$('[contra_user="contra_user"]').val("");
						$('[Rol="Rol"]').val("");
						$('#form1').model('hide')


					}

				});
			}else{
				alert("error debes guardar datos");
			}
		})
	});
</script>
</body>