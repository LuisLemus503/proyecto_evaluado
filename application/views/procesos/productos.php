

<!----------------------------VISTA DE PRODUCTOS------------------------------------------>
<?php
     
     /*ACA MANDO QUE ACCION DEBE REALIZARSE DEPENDIENDO QUE SE HAGA Y BUSCA CONTROLADOR CORRESPONDIENTE */
	if(isset($producto_actualizar)){
			$idproducto='<p><input type="text" name="idproducto" value="'.$this->uri->segment(3).'"></p>';
			$NombreProducto=$producto_actualizar->NombreProducto;
			$Precioproducto=$producto_actualizar->Precioproducto;
			$FechaVencimiento=$producto_actualizar->FechaVencimiento;
			$idProveedor=$producto_actualizar->idProveedor;
			$accion ='actualizarProducto';
	}
	else
	{

	        $idproducto='';
			$NombreProducto='';
			$Precioproducto='';
			$FechaVencimiento='';
			$idProveedor='';
		    $accion='insertarProducto';

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
					Lista de productos
				</div>
				<div class="p-4">
					<table class="table align-middle">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Nombre producto</th>
								<th scope="col">Precio</th>
								<th scope="col">Fecha Vencimiento</th>
								<th scope="col">Proveedor</th>
								<th scope="col" colspan="2">Opciones</th>
							</tr>
						</thead>
						<?php if(count($Producto)>0):?>
							<?php foreach($Producto as $pr):?>
						<tbody>
							<tr>
								<td scope ="row"><?php echo $pr->idproducto;?></td>
								<td><?php echo $pr->NombreProducto;?></td>
								<td><?php echo $pr->Precioproducto;?></td>
								<td><?php echo $pr->FechaVencimiento;?></td>
								<td ><a href="<?php echo base_url();?>principal/Productos/<?php echo $pr->idproducto;?>" class="btn btn-danger">Editar</a></td>
								<td><a href="<?php echo base_url();?>principal/EliminarProducto/<?php echo $pr->idproducto;?>" class="btn btn-warning">Eliminar</a></td>
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
					Ingresa mas productos
				</div>
				<form method="post" action="<?php echo base_url();?>principal/actualizarProducto" class="p-4" id="form1" name="form1">
					 <?php echo $idproducto?>
					<div class="mb-3">
						<label class="form-label" >Nombre producto</label>
						<input type="text" name="NombreProducto" class="form-control" autofocus value="<?php echo $NombreProducto;?>" id="NombreProducto" >
					</div>
					<div class="mb-3">
						<label class="form-label" >Precio</label>
						<input type="text" name="Precioproducto" class="form-control" autofocus value="<?php echo $Precioproducto;?>" id="Precioproducto">
					</div>
					<div class="mb-3">
						<label class="form-label" >Fecha de vencimiento</label>
						<input type="date" name="FechaVencimiento" class="form-control" autofocus value="<?php echo $FechaVencimiento;?>" id="FechaVencimiento">
					</div>
					<div class="mb-3">
						<label class="form-label" >Proveedor</label>
						<select class="form-select" name="idProveedor;">
							<option value="" selected disabled>Seleccionar</option>
							
						</select>
					</div>
					<div class="d-grid">
						<input type="submit" class="btn btn-success" value="Registrar" id="btn_guardar">
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
		$('#btn_guardar').on('click', function(){
			var NombreProducto=$('#NombreProducto').val();
			var Precioproducto=$('#Precioproducto').val();
			var FechaVencimiento=$('#FechaVencimiento').val();
			if(NombreProducto!='' &&  Precioproducto!='' && FechaVencimiento!=''){
				$.ajax({
					type:"POST",
					url:"<?php echo base_url();?>principal/<?php echo $accion;?>",
					dataType:"JSON",
					data:{NombreProducto:NombreProducto, Precioproducto:Precioproducto, FechaVencimiento:FechaVencimiento},
					success:function(data){
						$('[NombreProducto="NombreProducto"]').val("");
						$('[Precioproducto="Precioproducto"]').val("");
						$('[FechaVencimiento="FechaVencimiento"]').val("");
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