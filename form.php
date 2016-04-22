<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />



<script type="text/javascript">


function Validar(form){

  if (form.nombre.value == "")

  { alert("NOMBRE: Por favor ingrese su nombre"); form.nombre.focus(); return; }

  if (form.nombre.value.length < 2)

  { alert("Entrar 2 o mas caracteres"); form.nombre.focus(); return; }
  
  
   if (form.apellidos.value == "")

  { alert("APELLIDOS: Por favor ingrese sus apellidos"); form.apellidos.focus(); return; }

  if (form.apellidos.value.length < 2)

  { alert("Entrar 2 o mas caracteres"); form.apellidos.focus(); return; }
  
  
  
  if (form.email.value == "")

  { alert("EMAIL: Por favor ingrese su dirección de e-mail"); form.email.focus(); return; }

  if (form.email.value.indexOf('@', 0) == -1 |

      form.email.value.indexOf('.', 0) == -1)

  { alert("Dirección de email inválida"); form.email.focus(); return; }
  
  
  
  
  
	if (form.telefono.value == "")

  { alert("Por favor ingrese su telefono"); form.telefono.focus(); return; }

 

	var checkOK = "0123456789*-";

  var checkStr = form.telefono.value;

  var allValid = true;

  var decPoints = 0;

  var allNum = "";

  for (i = 0; i < checkStr.length; i++) {

    ch = checkStr.charAt(i);

    for (j = 0; j < checkOK.length; j++)

      if (ch == checkOK.charAt(j))

        break;

    if (j == checkOK.length) {

      allValid = false;

      break;

    }

    allNum += ch;

  }

  if (!allValid) {

    alert("TELEFONO: Ingrese solo caracteres numericos");

    form.telefono.focus();

    return (false);

  } 

	 if (form.telefono.value.length < 7)

  { alert("TELEFONO: Minimo 7 numeros de telefono"); form.telefono.focus(); return; }

  
  
  
  
  
  
  
  if (form.asunto.value == "")

  { alert("ASUNTO: Por favor ingrese el nombre de la ciudad"); form.asunto.focus(); return; }

  if (form.nombre.value.length < 2)

  { alert("Entrar 2 o mas caracteres"); form.asunto.focus(); return; }
  
  
  


 if (form.comentario.value == "")

  { alert("MENSAJE: Por favor ingrese su mesnaje"); form.comentario.focus(); return; }

  if (form.comentario.value.length < 2)

  { alert("Entrar 2 o mas caracteres"); form.ncomentario.focus(); return; }



  form.submit();

	}

</script>


<style type="text/css">
<!--

body{
	font-family: Arial, Helvetica, sans-serif;
}
#fila { height: 25px; width: 450px; margin-top: 6px; margin-bottom: 6px; padding-top: 3px; padding-right: 0px; padding-bottom: 3px; padding-left: 0px; }
.texto {
	height: 20px;
	width: 80px;
	float: left;
	text-align: left;
	color: #333;
	font-weight: normal;
	font-size: 12px;
	margin-top: 2px;
	margin-right: 5px;
	margin-bottom: 2px;
	margin-left: 2px;
	padding-right: 2px;
}
.borde {
	border: 1px solid #06AEC6;
	width: 270px;
	padding: 2px;
	margin-bottom: 5px;
}
#boton { text-align: right; width: 365px; margin-top: 25px; float: left; height: auto; padding-top: 15px; }
form { margin: 0px; padding: 0px; }
body { margin: 0px; padding: 0px; }
.enviar {
	height: 30px;
	width: 70px;
	cursor: pointer;
	background-color: #047888;
	border: thin solid transparent;
	color: #FFFFFF;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.comentario { height: 30px; margin-bottom: 5px; }
-->
</style>


<div style="width:385px; float:left; text-align:left; height:auto;">

					<form id="form1" name="form1" method="post" action="send.php">

					<div id="fila"><span class="texto">Nombres*</span>
                      <input name="nombre" type="text" class="borde" id="nombre" size="20" />
					</div>

					<div id="fila"><span class="texto">Apellidos*</span>
					  <input name="apellidos" type="text" class="borde" id="apellidos" size="20" />
					</div>

                    <div id="fila"><span class="texto">Email*</span>
					  <input name="email" type="text" class="borde" id="email" size="20" />
                    </div>
                      
                    <div id="fila"><span class="texto">Telefono*</span>
					  <input name="telefono" type="text" class="borde" id="telefono" size="20" />
                    </div>

					<div id="fila"><span class="texto">Asunto*</span>
					  <input name="asunto" type="text" class="borde" id="asunto" size="20" />
					</div>

					
					<div id="fila" ><span class="texto">Mensaje*</span>
					  <textarea name="comentario" cols="17" rows="3" class="borde" id="comentario"></textarea>
					</div>

					

				<div id="boton"><input  name="" type="button" class="enviar" onclick="Validar(this.form)" value="Enviar" /></div>

					

  </form>

</div>
