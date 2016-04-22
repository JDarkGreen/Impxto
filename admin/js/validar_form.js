function validar_form()
{
	if(document.form1.categoria.selectedIndex==0)
	{
		alert("Seleccione la categoria.")
		document.form1.categoria.focus();
		return 0;
	}

	if(document.form1.nombre_producto.value==0)
	{
		alert("Ingrese el nombre del producto");
		document.form1.nombre_producto.focus();
		return 0;		
	}
	
	if(document.form1.imagen_producto.value==0)
	{
		alert("Debe subir una imagen para el producto");
		document.form1.imagen_producto.focus();
		return 0;		
	}	
		
	
	document.form1.action="procesar.php";
	document.form1.submit();
	
}