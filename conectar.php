<?php
    $conexion = pg_connect("host=localhost port=5432 dbname=DB_MERUQ user=postgres password=avera")
    or die('NO HAY CONEXION: ' . pg_last_error());

    if(!$conexion)
        echo "<p><i>No se conecto a la base de datos.. </i></p>";
?>