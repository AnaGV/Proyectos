
<section id="agregar_usuario">
    <div>
        Agregar Nuevos Usuarios<br>

        <div>
            <span class="fa-stack fa-lg" onClick="mostrar_lista_user();">
                <i class="fa fa-square-o fa-stack-2x"></i>
                <i class="fa fa-user fa-stack-1x"></i>
            </span>
            
            <?include ("../conectar.php");
                session_start();
                //Selecciona los datos para armar la tabla casos 
                $query = pg_query ($conexion, "SELECT concat( upper(left(a.nombre,1))||' '||a.apellido) useer,a.id_usuario, a.nombre, a.apellido, a.email, a.telefono1, a.nombre_usuario, a.prioridad
                                                FROM ".'"CALLCENTER"'.".usuarios a")                                                                            
                or die ("Error en la consulta 1");?>
            <div>
                <ul id="lista_user">
                    <?while( $array_user= pg_fetch_assoc($query)){?>
                        <li Onclick="ocultar_lista_user('<?echo $array_user['id_usuario'];?>','<?echo $array_user['nombre'];?>','<?echo $array_user['apellido'];?>','<?echo $array_user['email'];?>','<?echo $array_user['telefono1'];?>','<?echo $array_user['nombre_usuario'];?>','<?echo $array_user['prioridad'];?>');">
                            <a href="#"><?echo $array_user['useer'];?></a>
                        </li><br>                       
                    <?}?>
                </ul>
                <input type="hidden" id="l_user">
            </div>
        </div>

        <input class="input_valido" id="agregar_user_nombre"    size="15" type="text" placeholder="Nombres"/>
        <input class="input_valido" id="agregar_user_apellido"  size="15" type="text" placeholder="Apellidos"/>
        <input type="email" name="email" class="input_valido"   id="agregar_user_email" size="15" placeholder="E-mail" required onChange='validarEmail();' />
        <input class="input_valido" id="agregar_user_operador"  size="15" type="text" placeholder="Nombre de Operador"/>
        <input class="input_valido" id="agregar_user_tlf"       size="15" type="text" placeholder="Teléfono" onkeyPress='return validaTelefono(event);'/>
        
        <select id="agregar_user_prioridad" style="width:130px" Onchange="prioridad();">
            <option value="0" selected>Prioridad</option>
            <option value="0"></option>
            <option value="1">Administrador</option>
            <option value="2">Operador</option>
        </select><br>
        
        <button class="btn btn-2 btn-2d" id="guardar_nuevo_user" onClick="guardar_usuario();">GUARDAR  <i class="fa fa-save"></i></button>
    </div>
</section>