function abrirModalEmergencia(){
  $('#nombreContacto').val('');
  $('#telefonoContacto').val('');
  $('#nombreContacto').focus;
  $('#modalEmergencia').modal('show');
}
function abrirModalContrasena(){
  $('#contrasenaActual').val('');
  $('#nuevaContrasena').val('');
  $('#confirmaContrasena').val('');

  $('#modalContrasena').modal('show');
}
