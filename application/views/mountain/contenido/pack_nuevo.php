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
                           Nuevo Pack de Trekking <br>
                            <small>Seleccionar lugare e ingresar infoormación</small>
                        </h1>
                    </div>
                </div>

                <div class="row">
                  <div class="col-lg-12">
                      <div class="panel panel-default">
                          <div class="panel-heading">
                              Crear nuevo Pack de Trekking
                          </div>
                          <div class="panel-body">
                              <div class="row">
                                <form role="form" method="post" action="<?php echo base_url(); ?>pack/crear" enctype="multipart/form-data" onsubmit ="return validacion()">
                                    <div class="col-lg-6">
                                      <!--Nombre del evento a crear -->
                                      <div class="form-group">
                                          <label>Nombre</label>
                                          <input id="nombre" name="nombre"class="form-control" placeholder="Mis primeras cumbres">
                                      </div>
                                      <!--Descripcion del evento -->
                                      <div class="form-group">
                                          <label>Descripción</label>
                                          <textarea id="descripcion" name="descripcion" class="form-control" rows="3" placeholder="TWKD te invita a contemplar las siguientes cumbres que se..."></textarea>
                                      </div>
                                      <!--Imagen a utilizar -->
                                      <div class="form-group">
                                        <label>Subir imagen repesentativa</label>
                                        <input id="foto" name="foto" type="file">
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
	                                    <div class="form-group row">
	                                      <!--Seleccion del equipamiento para este evento -->
	                                      
	                                      	<div class="col-xs-4">
                                              <label>Precio</label>
                                              <div class="form-group input-group">
                                                <span class="input-group-addon">$</span>
                                                <input  name="valor" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                              <label>Fecha Incio</label>
                                              <div class="form-group input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                              <input type="text" id="fechainicio" name="fechainicio" class="form-control" value="<?php echo date('Y-m-d');?>" placeholder="2000/01/01">
                                              </div>
                                            </div>
                                            <div class="col-xs-4">
                                              <label>Cierre inscripciones</label>
                                              <div class="form-group input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                              <input type="text" id="fechacierre" name="fechacierre" class="form-control" placeholder="2000-01-01">
                                              </div>
                                            </div>

                                    </div>
                                    <div class="col-lg-6">
                                    	<div class="form-group row">
                                          <!--Fecha y hora de termino del Evento -->
                                          <label>Donde iremos</label>
                                          <?php
                                          $contador=0;
                                          foreach ($ubicacion->result() as $row){
                                          $contador=$contador+1;
                                          ?>
                                            <div class="col-xs-12">
                                                <label>
                                                    <input id="lg<?= $row->IDUBICACION; ?>" name="lg<?= $row->IDUBICACION; ?>" type="checkbox" value="<?= $row->IDUBICACION; ?>"  onchange="cargaSenderodepack(lg<?= $row->IDUBICACION; ?>);"> <?= $row->NOMBRE; ?>
                                                </label>
                                                <div class="col-xs-12">
                                                	<select id="slg<?= $row->IDUBICACION; ?>" name="slg<?= $row->IDUBICACION; ?>"class="form-control" style="display:none;">
		                                          </select>
	                                    		</div>
                                            </div>
                                          <?php } ?>
                                          <input type="hidden" id="total" name="total" value="<?=$contador?>">

                                          <!--Fecha del evento -->
                                         </div>
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
