

<!----------------------------VISTA DE PROVEEDORES------------------------------------------>
<?php
/*ACA MANDO QUE ACCION DEBE REALIZARSE DEPENDIENDO QUE SE HAGA Y BUSCA EL CONTROLADOR CORRESPONDIENTE */
if(isset($proveedor_actualizar)){
			$idProveedor='<p><input type="text" name="idProveedor" value="'.$this->uri->segment(3).'"></p>';
			$NombreProveedor=$proveedor_actualizar->NombreProveedor;
			$accion ='actualizarProveedor';
	}
	else
	{

		$idProveedor='';
		$NombreProveedor='';
		$accion='insertarProveedor';

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
					Lista de proveedores
				</div>
				<div class="p-4">
					<table class="table align-middle" name="example" id="#examples">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Nombre</th>
								<th scope="col" colspan="2">Opciones</th>
							</tr>
						</thead>
						<?php if(count($Proveedor)>0):?>
							<?php foreach($Proveedor as $p):?>
						<tbody>
							<tr>
								<td scope ="row"><?php echo $p->idProveedor;?></td>
								<td><?php echo $p->NombreProveedor;?></td>
								<td ><a href="<?php echo base_url();?>principal/Proveedores/<?php echo $p->idProveedor;?>" class="btn btn-warning">Editar</a></td>
								<td ><a href="<?php echo base_url();?>principal/EliminarProveedor/<?php echo $p->idProveedor;?>" class="btn btn-danger">Eliminar</a></td>
							</tr>	
						</tbody>
					<?php endforeach;?>
				<?php else:?>
					<h2>No hay registros</h2>
				<?php endif;?>
					</table>
				</div>
			</div>
		</div>
		<div class="col-md-5">
			<div class="card">
				<div class="card-header">
					Ingresa mas proveedores
				</div>
				<form method="post" action="<?php echo base_url();?>principal/actualizarProveedor" class="p-4" id="form1" name="form">
					<div class="mb-3">
						<?php echo $idProveedor?>
						<label class="form-label" >Nombre de el proveedor</label>
						<input type="text" name="NombreProveedor" class="form-control" autofocus value="<?php echo $NombreProveedor;?>" id="NombreProveedor">
					</div>
					<div class="d-grid">
						<input type="submit" class="btn btn-success" value="Registrar" id="btn_save">
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
			var NombreProveedor=$('#NombreProveedor').val();
			if(NombreProveedor!=''){
				$.ajax({
					type:"POST",
					url:"<?php echo base_url();?>principal/<?php echo $accion;?>",
					dataType:"JSON",
					data:{NombreProveedor:NombreProveedor},
					success:function(data){
						$('[NombreProveedor="NombreProveedor"]').val("");
						$('#form1').model('hide')


					}

				});
			}else{
				alert("error debes guardar datos");
			}
		})
	});
</script>