<?php 

$contenido='
<div class="container" style="margin-top: 90px; width: 30%;">
<div class="panel panel-success"> 
	   <div class="panel-heading">
    		<h3 class="panel-title">Insertar Usuarios por CSV</h3>
  	   </div>
	   <div class="panel-body">
		<form id="formcsv" enctype="multipart/form-data" method="post">
			<input  type="file" id="archivocsv" name="archivocsv">
			<select id="selecttipo" name="selecttipo">
			<option value="alumno">Alumno</option>
			<option value="profesor">Profesor</option>
			<option value="admin">Admin</option>
			</select>
			<button type="button" id="submit" name="Subir" value="Subir">Subir</button>	
		</form> 
		<p id="resultados" style="margin-top: 10px"></p>
		</div>
	</div>	
</div>
<script src="js/scriptCSV.js"></script>
';

echo $contenido;






 ?>