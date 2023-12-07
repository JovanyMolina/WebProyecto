function limpiar(){
    var inputNombre = document.getElementById('txtNombre');
    var inputCorreo = document.getElementById('txtEmail');
    var inputContrasena = document.getElementById('txtContrasena');
    var inputComfirmarContrasena = document.getElementById('txtConfirmarContrasena');
    var institucion = document.getElementById('txtInstitucion');


    inputNombre.value = '';
    inputCorreo.value = '';
    inputContrasena.value = '';
    inputComfirmarContrasena.value = '';
    institucion.value = '';

}