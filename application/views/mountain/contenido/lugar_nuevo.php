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
                           Agregando <small>Nueva lugar</small>
                        </h1>
                    </div>
                </div>

                <div class="row">
                  <div class="col-lg-12">
                      <div class="panel panel-default">
                          <div class="panel-heading">
                              Crear nuevo lugar
                          </div>
                          <div class="panel-body">
                              <div class="row">
                                <form role="form" method="post" action="<?php echo base_url(); ?>ubicacion/agregar" onsubmit ="return validacion()">
                                    <div class="col-lg-6">
                                      <!--Nombre del lugar -->
                                      <div class="form-group">
                                          <label>Nombre del lugar</label>
                                          <input name="nombre" id="nombre" class="form-control">
                                      </div>
                                      <!--Caracteristicas -->
                                      <div class="form-group">
                                          <label>Caracteristicas</label>
                                          <textarea name="caracteristica" id="descripcion" class="form-control" rows="3"></textarea>
                                      </div>
                                      <!--Informacion -->
                                      <div class="form-group">
                                          <label>Informacion</label>
                                          <textarea name="informacion" class="form-control" rows="5"></textarea>
                                      </div>
                                      <!--Riesgos -->
                                      <div class="form-group">
                                          <label>Riesgos</label>
                                          <textarea name="riesgo" class="form-control" rows="3"></textarea>
                                      </div>

                                    </div>

                                    <div class="col-lg-6">
                                      <!--Datos utiles -->
                                      <div class="form-group">
                                          <label>Datos utiles</label>
                                          <textarea name="utiles" class="form-control" rows="3"></textarea>
                                      </div>
                                      <!--Equipamiento sugerido -->
                                      <div class="form-group">
                                          <label>Equipamiento sugerido</label>
                                          <textarea name="equipamiento" class="form-control" rows="3"></textarea>
                                      </div>
                                      <!--Recomendaciones -->
                                      <div class="form-group">
                                          <label>Recomendaciones</label>
                                          <textarea name="recomendacion" class="form-control" rows="3"></textarea>
                                      </div>
                                      <!--Costos -->
                                      <div class="form-group">
                                          <label>Costo</label>
                                          <input name="costo" class="form-control">
                                      </div>
                                      <!--Rutas -->
                                      <div class="form-group">
                                          <label>Rutas</label>
                                          <input name="ruta" class="form-control">
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
