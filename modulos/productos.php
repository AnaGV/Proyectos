<!DOCTYPE html>

<html Lang="es">

    <head>

        <meta charset="utf-8" />
     
        <link rel="stylesheet" type="text/css" href="../css/estilo.css">
        <link rel="stylesheet" type="text/css" href="../css/normalize.css">
        <link rel="icon" type="image/png" href="images/.png" />

        <title>Call Center Tplink</title>

    </head>

    <body>

        <div class="contenedorPrincipal">
            <header>
                <figure id="bannerSuperior">
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

            <section id="productos_nuevos">
                <table id="productos_tablaNuevos">

                    <tr>
                        <td>Editar</td>
                        <td>Codigo</td>
                        <td>Categoria</td>
                        <td>Modelo</td>
                        <td>Cantidad</td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>

                </table>

            </section>

            <section id="productos_enviados">
                <table id="productos_tablaEnviados">

                    <tr>
                        <td>Editar</td>
                        <td>Codigo</td>
                        <td>Categoria</td>
                        <td>Modelo</td>
                        <td># Caso</td>
                        <td>Reemplazo</td>
                        
                    </tr>
                    <tr>
                        <td></td>
                    </tr>

                </table>

            </section>

            <section id="productos_recibidos">
                <table id="productos_tablaRecibidos">

                    <tr>
                        <td>Editar</td>
                        <td>Codigo</td>
                        <td>Categoria</td>
                        <td>Modelo</td>
                        <td>Serial</td>
                        <td># Caso</td>
                        <td>Reemplazado por</td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>

                </table>

            </section>
            
      
            <footer>
            
            </footer>  


        </div>

        
      

    </body>

</html>