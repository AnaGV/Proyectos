<?php 
    include ("../conectar.php");
    session_start();
    
    if (!$_SESSION['SCC']['usuario'])
        header("Location: index.php");

    $nombre = $_POST["nomb"];
    $apellido = $_POST["ap"];
	$email = $_POST["ema"];
	$operador = $_POST["oper"];
	$tlf = $_POST["tf"];
	$priod = $_POST["prd"];									
	$id_user = $_POST["l_user_i"];

	if($id_user!=null)
	{
		//Realiza el query para actualizar los datos.. 
	    $query1 = pg_query ($conexion, "UPDATE ".'"CALLCENTER"'.".usuarios 
										   SET nombre='".$nombre."', apellido='".$apellido."', email='".$email."', telefono1=".$tlf.", nombre_usuario='".$operador."', prioridad=".$priod."
										WHERE id_usuario=".$id_user."")                                                                            
	    or die ("Error en la consulta 1");
	
	}else{
	    
	    //busca el max registro de los usuarios 
	    $query2 = pg_query ($conexion, "SELECT max(id_usuario) maximo FROM ".'"CALLCENTER"'.".usuarios ")                                                                            
	    or die ("Error en la consulta 2");
	    $maximo_us = pg_fetch_assoc($query2);

       	if ($maximo_us['maximo']==null )
			{$maximo_us['maximo'] = 1;}
		else
			{$maximo_us['maximo']++;}


		//Realiza el query para insertar los nuevos los datos.. 
	    $query3 = pg_query ($conexion, "INSERT INTO ".'"CALLCENTER"'.".usuarios(id_usuario, nombre, apellido, email, telefono1, nombre_usuario, clave, prioridad)
								       VALUES (".$maximo_us['maximo'].", '".$nombre."', '".$apellido."', '".$email."', '".$tlf."', '".$operador."',  '1234', ".$priod.")")                                                                            
	    or die ("Error en la consulta 3");
	} 
?>