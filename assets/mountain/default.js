
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
  
  if(seleccion =='0'){
  	$('#sendero').prop('disabled',true);
  }
  else
  {
  	$('#sendero').prop('disabled',false);
  }
  $.ajax({
  type: 'POST',
  url:base_url()+'/Sendero/mostrar',
  data: {id: seleccion},
  dataType:'json',
  success: function(data) {
	$('#sendero').html(data);
	//alert('Ok');
  }
  });
}
function cargaSenderodepack(chekid){
	var checkidselect=chekid.value;
	if (document.getElementById("slg"+checkidselect).style.display == 'none')
	{
	div = document.getElementById('slg'+checkidselect);
    div.style.display = '';
	
		var seleccion = $('#lg'+checkidselect).val();
	  
		  if(seleccion =='0'){
		  	$('#slg'+checkidselect).prop('disabled',true);
		  }
		  else
		  {
		  	$('#slg'+checkidselect).prop('disabled',false);
		  }
		  $.ajax({
		  type: 'POST',
		  url:base_url()+'/Sendero/mostrar',
		  data: {id: seleccion},
		  dataType:'json',
		  success: function(data) {
			$('#slg'+checkidselect).html(data);
			//alert('Ok');
		  }
		  });
		
	}
	else {
	div = document.getElementById('slg'+checkidselect);
    div.style.display = 'none';
		
	}
	//alert(checkidselect);
}
