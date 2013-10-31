<?php
    
    if(isset($_SESSION['SCC']['usuario'])){
    session_destroy();
    }
	session_start();
	
	include ("conectar.php");
	
	$login = $_POST['usuario'];
	$clave = $_POST['password'];
	
	//Selecciona todos los datos del usuario para validar.
	$query = pg_query ($conexion, "SELECT id_usuario, nombre_usuario, clave,prioridad FROM ".'"CALLCENTER"'.".usuarios a
									where a.nombre_usuario='".$login."' and a.clave='".$clave."'") 
    
    or die ("Error en la consulta 1");
	$array= pg_fetch_assoc($query);

	$_SESSION['SCC']['prioridad']	= $array['prioridad'];
	$_SESSION['SCC']['id_usuario']	= $array['id_usuario'];
	$_SESSION['SCC']['usuario']		= $array['nombre_usuario'];    
    
		if ( $_SESSION['SCC']['usuario'] )
			header("Location: modulos/inicio.php");
	else
			header("Location: noacceso.php");
?>
