$(document).on('ready',inicio);

function inicio () {
 	//evento onclick para boton de agregar usuarios
	$("#agregar_user").on("click",mostrar_agregar_user);
}

function mostrar_agregar_user()
{
	$.post("agregar_usuario.php",{},function  (respuesta) {
		$("#fondoPopUp").css({display:'block'});
		$("#PopUp").html(respuesta);
		$("#PopUp").css({top:($(document).height() - $("#PopUp").height())/2});
		$("#PopUp").css({display:'block'});
	})
}

function guardar_usuario()
{
	
	var nombre    = document.getElementById("agregar_user_nombre");
	var apellido  = document.getElementById("agregar_user_apellido");
	var mail      = document.getElementById("agregar_user_email");
	var operador  = document.getElementById("agregar_user_operador");
	var tlf       = document.getElementById("agregar_user_tlf");
	var prioridad = document.getElementById("agregar_user_prioridad");
	var l_user    = $("#l_user").val();

	if((nombre.value!='')&&(apellido.value!='')&&(mail.value!='')
	&&(operador.value!='')&&(tlf.value!='')&&(prioridad.value!=0))
	{	
		$.post("insert_usuario.php",{nomb:nombre.value,ap:apellido.value,
									ema:mail.value,oper:operador.value,
									tf:tlf.value,prd:prioridad.value, l_user_i:l_user},
		function (respuesta) {})			
	}
	else
	{alert("Falta rellenar un campo.");}
}

function  mostrar_lista_user()
{
	$("#lista_user").css({display:'block'});
}

function  ocultar_lista_user(id,nombre,apellido,mail,tlf,n_user,prid)
{
	$("#lista_user").css({display:'none'});
	$("#l_user").val(id);
	$("#agregar_user_nombre").val(nombre);
	$("#agregar_user_apellido").val(apellido);
	$("#agregar_user_email").val(mail);
	$("#agregar_user_operador").val(n_user);
	$("#agregar_user_tlf").val(tlf);
	$("#agregar_user_prioridad").val(prid);
	$("#guardar_nuevo_user").html('ACTUALIZAR <i class="fa fa-pencil-square"></i>');
}

function validarEmail() 
{	
	valor = $("#agregar_user_email").val();
	
	if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(valor)){
		return true;
	} 
	else {
		alert("Debe ingresar un e-mail válido.");
	}
}


function  validaTelefono(e)
{
   key = e.keyCode || e.which;
   tecla = String.fromCharCode(key).toLowerCase();
   letras = "0123456789";
   especiales = [8,32];
	
   tecla_especial = false;
   for(var i in especiales){
		if(key == especiales[i]){
			tecla_especial = true;			
			break;
		}
	}
	if(letras.indexOf(tecla)==-1 && !tecla_especial){return false;}
	
	var tlf = $("#agregar_user_tlf").val();
	
	if(tecla_especial && tlf.indexOf(tecla)!=-1 && key!=8 ){return false;}		
	
	if(tlf.length>10 && key!=8){return false;}
}