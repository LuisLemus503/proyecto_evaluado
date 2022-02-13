

<!----------------------------VISTA DE EL REGISTRO------------------------------------------>

<br>
<br>
<br>
<br>

<center>

<div class="col-md-5">
			<div class="card">
				<div class="card-header">
					Registrate 
				</div>
				<form  role="form" method="post" action="<?php echo base_url();?>login/RegistroUsuario"
				 class="p-4" >
					<div class="mb-3">
						<label class="form-label" >Nombre usuario</label>
						<input type="text" class="form-control"  name="Nombre_user" required>
					</div>
					<div class="mb-3">
						<label class="form-label" >Codigo de empleado</label>
						<input type="text" class="form-control" autofocus  name="CodEmpleado" required>
					</div>
					<div class="mb-3">
						<label class="form-label" >Contraseña</label>
						<input type="text" class="form-control"  name="contra_user" required>
					</div>
					<div class="d-grid">
						<a href="<?php echo base_url();?>login" class="btn btn-danger">Atras</a> <input type="submit" class="btn btn-success" id="add">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</center>