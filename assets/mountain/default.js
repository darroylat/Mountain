
// base url
function base_url() {
    var pathparts = location.pathname.split('/');
    if (location.host == 'localhost') {
        var url = location.origin+'/'+pathparts[1].trim('/')+'/'; // http://localhost/myproject/
    }else{
        var url = location.origin; // http://stackoverflow.com
    }
    return url;
}

function cargaSendero(){
  var seleccion = $('#ubicacion').val();
  alert(seleccion);
  $.ajax({
  type: 'POST',
  url: base_url()+'sendero/mostrar',
  data: {id: seleccion
  },
  success: function(data) {


  }
  });
}
