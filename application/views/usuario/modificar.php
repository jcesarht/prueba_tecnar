<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<div id="container">
	<h1>Modificar a TestNar</h1>

	<div id="body">
		<div><font color="red"><?=$error ?></font></div>
		<form method="post"	action="../actualizar">
			<input type="hidden" name="id" value="<?= $id; ?>">
			Usuario: <input type="text" name="usuario" autocomplete="off" value="<?= $usuario; ?>"><br>
			Password: <input type="password" name="password" value="" placeholder="Escriba una contraseña nueva"><br>
			Rol: <select name="rol">
				<?php
					$selected_admin = '';
					$selected_operario = '';
					if($rol == 'administrador'){
						$selected_admin = 'selected';
					}else{
						$selected_operario = 'selected';
					}
				?>
				<option <?= $selected_admin; ?>value="adminstrador">Adminstrador</option>
				<option <?= $selected_operario; ?> value="operario">Operario</option>
			</select><br>
			Estado: <select name="estado">
				<?php
					$selected_activo = '';
					$selected_inactivo = '';
					if($estado == 'activo'){
						$selected_activo = 'selected';
					}else{
						$selected_inactivo = 'selected';
					}
				?>
				<option <?= $selected_activo; ?>value="activo">Activo</option>
				<option <?= $selected_inactivo; ?> value="inactivo">Inactivo</option>
			</select><br>

			<input type="submit" name="registrar" value="Actualizar"><br>
		</form>
		<a href="javascript: history.go(-1)">Volver</a>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>