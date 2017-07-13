function validaLogin(){
    var objeto = new Object();

    var usuario = $('#user').val();
    var clave = $('#pass').val();

    alert(usuario+" "+clave);

    var contador = 0;

    var usuarioflag = false;
    var claveflag = false;


    if(usuario == "" || usuario < 9)
    {
        contador +=1;
        usuarioflag = true;
    }
    if(clave == "" || clave.length < 6)
    {
        contador +=1;
        claveflag = true;
    }

    objeto.usuario = usuario;
    objeto.clave = clave;

    if(contador == 0) {
        alert('login');
    }else{
        var mensajeModal = "";
        if (usuarioflag){
            mensajeModal = mensajeModal+"<p>Ingrese Nombre Administrador T\u00e9cnico</p>";
        }
        if (claveflag){
            mensajeModal = mensajeModal+"<p>Ingrese Tel\u00e9fono fijo</p>";
        }
        modalMsj(mensajeModal);
    }




}
