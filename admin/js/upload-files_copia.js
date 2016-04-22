var numero = 0; //Esta es una variable de control para mantener nombres
            //diferentes de cada campo creado dinamicamente.
evento = function (evt) { //esta funcion nos devuelve el tipo de evento disparado
   return (!evt) ? event : evt;
}

//Aqui se hace lamagia... jejeje, esta funcion crea dinamicamente los nuevos campos file
addCampo = function () { 
//Creamos un nuevo div para que contenga el nuevo campo
   nDiv = document.createElement('div');
//con esto se establece la clase de la div
   nDiv.className = 'imagenes';
//este es el id de la div, aqui la utilidad de la variable numero
//nos permite darle un id unico
   nDiv.id = 'file' + (++numero);
//creamos el input para el formulario:
   nCampo = document.createElement('input');
//le damos un nombre, es importante que lo nombren como vector, pues todos los campos
//compartiran el nombre en un arreglo, asi es mas facil procesar posteriormente con php
   nCampo.name = 'imagenes[]';
   nCampo.className = 'formularios';
//Establecemos el tipo de campo
   nCampo.type = 'file';
   
   
//creamos un elemento imagen.
	imagen = document.createElement('img');
	imagen.src = "../imagenes/delete.png";
	
//Ahora creamos un link para poder eliminar un campo que ya no deseemos
   a = document.createElement('a');
//El link debe tener el mismo nombre de la div padre, para efectos de localizarla y eliminarla
   a.name = nDiv.id;
//Este link no debe ir a ningun lado
   a.href = 'javascript:void(0);';
//Establecemos que dispare esta funcion en click
   a.onclick = elimCamp;
   a.className = 'enlaces';
   
//Con esto ponemos el texto del link
   a.innerHTML = "&nbsp;X";
   //a.appendChild(imagen);

//Bien es el momento de integrar lo que hemos creado al documento,
//primero usamos la funci�n appendChild para adicionar el campo file nuevo
   nDiv.appendChild(nCampo);
//Adicionamos el Link
   nDiv.appendChild(a);
//Ahora si recuerdan, en el html hay una div cuyo id es 'adjuntos', bien
//con esta funci�n obtenemos una referencia a ella para usar de nuevo appendChild
//y adicionar el div que hemos creado, la cual contiene el campo file con su link de eliminaci�n:
   container = document.getElementById('adjuntos');
   container.appendChild(nDiv);
}
//con esta funci�n eliminamos el campo cuyo link de eliminaci�n sea presionado
elimCamp = function (evt){
   evt = evento(evt);
   nCampo = rObj(evt);
   div = document.getElementById(nCampo.name);
   div.parentNode.removeChild(div);
}
//con esta funci�n recuperamos una instancia del objeto que disparo el evento
rObj = function (evt) { 
   return evt.srcElement ?  evt.srcElement : evt.target;
}
