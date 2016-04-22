function validarCheckbox()
{
	
	var todos = document.forms[0].getElementsByTagName('input');
	var allValid = true;
	
	for(x=0;x<todos.length;x++)
	{
		if(todos[x].type=="checkbox" && todos[x].checked)
		{
			allValid = false;
			break;
		}
		
	}
	
	if (!allValid) 
	{
		
	}
	else
	{
		alert("Debes marcar una opcion.");
		document.forms[0].id.focus();
		return false;
	}
	
	con = confirm("Desea eliminar el boletin?");
	
	if(con==true)
	{
		document.frmindex.target= "_self";
		document.frmindex.action = "eliminar.php";
		document.frmindex.submit();
	}
	
} 

/*funcion para seleccionar los checkbox de las filas*/
function selectall()
{
	var formname=document.getElementById(formname);
	var recslen = document.forms[0].length;
	
	if(document.forms[0].topcheckbox.checked==true)
	{
		for(i=1;i<recslen;i++) 
		{
			document.forms[0].elements[i].checked=true;
		}
	}
	else
	{
			
		for(i=1;i<recslen;i++)
			document.forms[0].elements[i].checked=false;
	
	}
	
} 

function enviarBoletin(cod) 
{		
	//abre una ventana confirmando que si desea k le sele envie el boletin.
	con = confirm('estas seguro de enviar ahora el boletin ?');
	if(con==true)
	{
		window.open("enviomasivo.php?cod="+cod,null,"height=200,width=400,status=yes,toolbar=no,menubar=no,location=yes");
	}
	
} 