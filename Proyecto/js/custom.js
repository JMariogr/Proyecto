function createSpan(mensaje){
	   var newSpan = document.createElement('span');
       newSpan.className = "closebtn";
       newSpan.innerHTML = "&times;";
       newSpan.onclick = function(){ this.parentElement.style.display='none'; };
       document.getElementById('error-aviso').innerHTML = mensaje;
       document.getElementById('error-aviso').appendChild(newSpan);
       document.getElementById('error-aviso').style="display:block;margin-top:30px;";
}


function validateRegistration() {
    var name = document.forms["formulario-registro"]["username"].value;
    var email= document.forms["formulario-registro"]["email"].value;
    var password = document.forms["formulario-registro"]["password"].value;
    var password2 = document.forms["formulario-registro"]["password_confirm"].value;

    var todook=true;

    if (name == null || name == "") {

       createSpan("Debe rellenar el nombre");
       
        todook= false;
    }

    else if (email == null || email == "") {
      	createSpan("Debe rellenar el email");
        todook= false;
    }
    else if (password == null || password == "") {
        createSpan("Debe rellenar la contraseña");
        todook= false;
    }
    else if (password2 == null || password2 == "") {
        createSpan("Debe rellenar la confirmación");
        todook= false;
    }

    else if(password != password2){
    	createSpan("Las contraseñas no coinciden");
    	todook= false;
    }

    return todook;

};

function validateLogin() {
	var email= document.forms["formulario-login"]["email"].value;
    var password = document.forms["formulario-login"]["password"].value;

    if (email == null || email == "") {
       createSpan("Debe rellenar el email");
        return false;
    }
    else if (password == null || password == "") {
        createSpan("Debe rellenar la contraseña");
        return false;
    }
    else{
    	return true;
    }


};

function validatePublicar() {
	var nombre= document.forms["formulario-publica"]["name-product"].value;
    var descripcion= document.forms["formulario-publica"]["descripcion"].value;

    if (nombre == null || nombre == "") {
      createSpan("Debe rellenar el nombre del producto");
        return false;
    }
    else if (descripcion == null || descripcion == "") {
        createSpan("Debe rellenar la descripción");
        return false;
    }
    else{
    	return true;
    }


};






