<script>

(function ($) {
    "use strict";
    var mainApp = {

        initFunction: function () {
            /*MENU 
            ------------------------------------*/
            $('#main-menu').metisMenu();
			
            $(window).bind("load resize", function () {
                if ($(this).width() < 768) {
                    $('div.sidebar-collapse').addClass('collapse')
                } else {
                    $('div.sidebar-collapse').removeClass('collapse')
                }
            });

        },

        initialization: function () {
            mainApp.initFunction();

        }

    }
    // Initializing ///

    $(document).ready(function () {
        mainApp.initFunction();
    });

}(jQuery));

function validacion() {
  	
  	var valor= document.getElementById('nombre').value;
  	var pass= document.getElementById('descripcion').value;
  	if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
	  alert('Es requerido el nombre');
	  return false;
	}
  	else
  	{
  		
  		if( pass == null || pass.length == 0 || /^\s+$/.test(pass) ) {
		  alert('Es requerido la descripcion');
		  return false;
		}
  	}
  	 
  
}	

</script>
<div id="page-wrapper" >
            <div id="page-inner">
			           <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Agregando equipamiento <small>equipo necesario para el trekking.</small>
                        </h1>
                    </div>
                </div>

                <div class="row">
                  <div class="col-lg-12">
                      <div class="panel panel-default">
                          <div class="panel-heading">
                              Datos básicos
                          </div>
                          <div class="panel-body">
                              <div class="row">
                                <form role="form" method="post" action="<?php echo base_url(); ?>equipo/agregar" onsubmit ="return validacion()">
                                    <div class="col-lg-6">
                                      <!--Nombre del evento a crear -->
                                      <div class="form-group">
                                          <label>Nombre equipamiento</label>
                                          <input name="nombre" id="nombre" class="form-control" placeholder="Ingrese el nombre de su evento">
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <div class="form-group">
                                          <label>Descripcion equipamiento</label>
                                          <input name="descripcion" id="descripcion" class="form-control" placeholder="Ingrese el nombre de su evento">
                                      </div>

                                    </div>
                                    <div class="col-lg-12">
                                      <!--Botones para guardar el evento o volver a la pagina de inicio -->
                                      <input type="submit" class="btn btn-success" value="Guardar"/>
                                      <!--a href="#" class="btn btn-default">Cancelar</a-->
                                    </div>
                                </form>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>
                 <!-- /. ROW  -->
				   </div>
             <!-- /. PAGE INNER  -->
</div>
