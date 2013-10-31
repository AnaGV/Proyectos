<?php
    include ("../conectar.php");
    session_start();
    
    if (!$_SESSION['SCC']['usuario'])
        header("Location: index.php");
?>


<!DOCTYPE html>

<html Lang="es">

    <head>

        <meta charset="utf-8" />
        <title>Call Center - Inicio</title>    
        <link rel="stylesheet" href="../css/estilo.css">
        <link rel="stylesheet" href="../css/normalize.css">
        <link rel="stylesheet" href="../css/font-awesome.css">
        <link rel="stylesheet" href="../css/font-awesome.min.css">
        <link rel="icon" type="image/png" href="images/.png" />

        <script type="text/javascript" src="../js/jquery-2.0.3.min.js"></script>
        <script type="text/javascript" src="../js/inicio.js"></script>
    </head>

    <body>

        <div class="contenedorPrincipal">
            <header>
                <figure class="bannerSuperior">
                    <img src="http://tplinkve.com/sites/default/files/banner0500activo2.jpg" />
                </figure> 
            </header>

            <nav class="barraNavegacion">
                <ul> 
                    <li><a href=""> Menu > </a>
                        <ul>
                            <li><a href="inicio.php">Casos </a></li> 
                            <li><a href="productos.php">Estado de Productos</a></li>
                            <li><a href="">Inventarios</a></li>
                        </ul> 

                    </li>
                    <li>
                        <a href="#"><i class="fa fa-user fa-fw fa-2x"></i><?echo $_SESSION['SCC']['usuario'];?></a>
                        <a data-toggle="dropdown" href="#">
                        <span class="fa fa-caret-down"></span></a>
                        <ul>
                            <li><a href="#"><i class="fa fa-pencil fa-fw"></i> Editar</a></li>
                            <li><a href="#" id="agregar_user"><i class="fa fa-group"></i>Agregar Usuarios</a></li>
                            <li><a href="#"><i class="fa fa-cog"></i> Configurar</a></li>
                            <li><a href="../cerrarsesion.php"><i class="fa fa-sign-out"></i> Salir</a></li>
                        </ul>
                        
                    </li>
                </ul>
                
            </nav>

            <section id="casos_descripcionCasos">

                <div class="barraHerramientasTabla">

                    <ul>
                        <li><p>Descripcion de Casos </p></li> 
                        <li><a href="#">Agregar> </a></li>
                        <li><a href="#">Borrar> </a></li>
                    </ul>

                </div>
                <table id="casos_tablaCasos" border="1">

                    <!--
                    <nav>
                        <ul>
                            <li>Editar</li>
                            <li># de Caso</li>
                            <li>Cliente</li>
                            <li>Fecha de inicio</li>
                            <li>Serial</li>
                            <li>Estado
                                <ul>
                                    <li>Abierto <input type="radio" name="estado" value=""> </li>
                                    <li>Proceso de Soporte <input type="radio" name="estado" value=""></li>
                                    <li>Producto defectuoso
                                        <ul>
                                            <li>Pendiente por recibir <input type="radio" name="estado" value=""></li>
                                            <li>Recibido/pendiente por revisar <input type="radio" name="estado" value=""></li>
                                            <li>Revisado/pendiente por enviar <input type="radio" name="estado" value=""></li>
                                            <li>Confirmacion</li> 
                                        </ul>
                                    </li>
                                    <li>Cerrado <input type="radio" name="estado" value=""></li>
                                    
                                </ul>
                            </li>
                            <li>Decision
                                <ul>
                                    <li>Nuevo <input type="radio" name="decision" value=""></li>
                                    <li>Devolucion <input type="radio" name="decision" value=""></li>   
                                </ul>
                            </li>
                            <li>Prioridad
                                <ul>
                                    <li>Alta <input type="radio" name="prioridad" value=""></li>
                                    <li>Media <input type="radio" name="prioridad" value=""></li>
                                    <li>Baja <input type="radio" name="prioridad" value=""></li>   
                                </ul>
                            </li>
                        </ul>

                    </nav>
                    -->  
                
                    <tr>
                        <td>Editar</td>
                        <td>Nº de Caso</td>
                        <td>Cliente</td>
                        <td>Fecha de inicio</td>
                        <td>Serial</td>
                        <td>Estado
<!--                             <ul>
                                <li>Abierto <input type="radio" name="estado" value=""> </li>
                                <li>Proceso de Soporte <input type="radio" name="estado" value=""></li>
                                <li>Producto defectuoso
                                    <ul>
                                        <li>Pendiente por recibir <input type="radio" name="estado" value=""></li>
                                        <li>Recibido/pendiente por revisar <input type="radio" name="estado" value=""></li>
                                        <li>Revisado/pendiente por enviar <input type="radio" name="estado" value=""></li>
                                        <li>Confirmacion</li> 
                                    </ul>
                                </li>
                                <li>Cerrado <input type="radio" name="estado" value=""></li>
                                    
                            </ul> -->
                        </td>
                        <td>Decision
<!--                             <ul>
                                <li>Nuevo <input type="radio" name="decision" value=""></li>
                                <li>Devolucion <input type="radio" name="decision" value=""></li>   
                            </ul> -->
                        </td>
                        <td>Prioridad
 <!--                            <ul>
                                <li>Alta <input type="radio" name="prioridad" value=""></li>
                                <li>Media <input type="radio" name="prioridad" value=""></li>
                                <li>Baja <input type="radio" name="prioridad" value=""></li>   
                            </ul> -->
                        </td>
                    </tr>
                
                    <? /*//Selecciona los datos para armar la tabla casos 
                    $query = pg_query ($conexion, "SELECT a.id_caso, b.nombre_empresa, e.fecha, d.descripcion_caso,f.descripcion_serial,c.descripcion,a.prioridad 
                                                        from ".'"CALLCENTER"'.".casos a, ".'"CALLCENTER"'.".cliente b, ".'"CALLCENTER"'.".decision c, 
                                                        ".'"CALLCENTER"'.".estados_caso d, ".'"CALLCENTER"'.".registro_abierto e, ".'"CALLCENTER"'.".serial_modelo f
                                                        where a.cliente=b.id_cliente
                                                        and a.estado=d.id_edo
                                                        and a.decision=c.id_decision
                                                        and a.id_caso=e.caso
                                                        and a.serial=f.id_serial")                                                                            
                    or die ("Error en la consulta 1");
                
                    while( $array= pg_fetch_assoc($query)){
                    ?>
                        <tr>
                            <td><input type="Checkbox" id="" value="" /></td>
                            <td><?echo $array['id_caso'];?></td>
                            <td><?echo $array['nombre_empresa'];?></td>
                            <td><?echo $array['fecha'];?></td>
                            <td><?echo $array['descripcion_serial'];?></td>
                            <td><?echo $array['descripcion_caso'];?></td>
                            <td><?echo $array['descripcion'];?></td>
                            <td><?echo $array['prioridad'];?></td>
                        </tr>
                    <?}*/?>

                </table>
            <div id="fondoPopUp"></div>
            <div id="PopUp"></div> 
            </section>
           
            
            <footer>
            </footer>  
        </div>
    </body>
</html>