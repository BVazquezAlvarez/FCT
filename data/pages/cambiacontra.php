<?php

echo '
 <div class="container" style="margin-top: 90px">
<div class="row">
<div class="col-sm-12">
</div>
</div>
<div class="row">
<div class="col-sm-6 col-sm-offset-3">
<form method="post" id="nuevacontra">
<input type="password" class="input-lg form-control" name="password1" id="oldpassword" placeholder="Introduzca la antigua contraseña" autocomplete="off">
<div class="row">
<div class="col-sm-6">
</div>
<div class="col-sm-6">
</div>
</div>
<input type="password" class="input-lg form-control" name="password1" id="password1" placeholder="Nueva Contraseña" autocomplete="off">
<div class="row">
<div class="col-sm-12">
</div>
</div>
<div class="row">
<div class="col-sm-6">
</div>
<div class="col-sm-6">
</div>
</div>
<input type="password" class="input-lg form-control" name="password2" id="password2" placeholder="Repite la contraseña" autocomplete="off">
<div class="row">
<div class="col-sm-12">
</div>
</div>
<button type="button" id="botoncambiacontra" class="col-xs-12 btn btn-primary btn-lg"  value="Cambia tu contraseña">Cambia tu contraseña</button>
</form>
</div><!--/col-sm-6-->
</div><!--/row-->
</div>
<script src="js/cambiacontra.js"></script>
';
