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
	  alert('Es requerido nombre');
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
            	Campañas de correo <br>
                <small>Selecciona las salidas de trekking vigentes</small>
                        </h1>
                    </div>
                </div>

                <div class="row">
                  <div class="col-lg-12">
                      <div class="panel panel-default">
                          <div class="panel-heading">
                             Formulario de envio de correos
                          </div>
                          <div class="panel-body">
                              <div class="row">
                                <form role="form" method="post" action="<?php echo base_url(); ?>Campana/enviar" enctype="multipart/form-data" onsubmit ="return validacion()">
                                    <div class="col-lg-12">
                                      <!--Nombre del evento a crear -->
                                      <div class="form-group">
                                          <label>Asunto</label>
                                          <div class="form-group input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
                                          <input id="nombre" name="nombre"class="form-control" placeholder="Nueva promocion">
                                          </div>
                                      </div>
                                      <!--Descripcion del evento -->
                                      <div class="form-group">
                                          <label>Descripcion</label>
                                          <textarea id="descripcion" name="descripcion" class="form-control" rows="3" placeholder="Aprovecha ahora esta promocion para ti"></textarea>
                                      </div>
                                      </div>
                                      <div class="col-lg-6">
                                      <!--Imagen a utilizar -->
                                      <div class="panel panel-default">
										<div class="panel-heading">
										Seleccionar las salidas de trekking vigentes:
										</div>
										<div class="panel-body">
							                                    	<div class="form-group row">
							                                          <!--Fecha y hora de termino del Evento -->
							                                          <?php
							                                          foreach ($eventosactivos->result() as $row){
							                                          ?>
							                                            <div class="col-xs-12">
							                                                <label>
							                                                    <input name="evento[]" type="checkbox" value="<?= $row->IDEVENTO; ?>"> <?= $row->NOMBRE; ?>
							                                                </label>
							                                            </div>
							                                          <?php } ?>
							
							                                          <!--Fecha del evento -->
							                                         </div>
							                                    	</div>
										</div> 
                                    </div>
                                    <div class="col-md-6">
										<div class="panel panel-default">
											<div class="panel-heading">
											Seleccionar usuarios según nivel:
											</div>
											<div class="panel-body">
								            	<div class="form-group row">
								                 
								                    <div class="col-xs-12">
								                        <label><input name="nivel[]" type="checkbox" value="1"> Básico</label><br>
								                        <label><input name="nivel[]" type="checkbox" value="2"> Básico Intermedio </label><br>
								                        <label><input name="nivel[]" type="checkbox" value="3"> Medio </label><br>
								                        <label><input name="nivel[]" type="checkbox" value="4"> Medio Intermedio </label><br>
								                        <label><input name="nivel[]" type="checkbox" value="5"> Avanzado </label>
								                        
								                    </div>
								                 </div>
								            </div>
										</div>                                    	
									</div>
                                    </div>
                                    <div class="col-lg-12">
                                      <!--Botones para guardar el evento o volver a la pagina de inicio -->
                                      <input type="submit" class="btn btn-success" value="Enviar correo"/>
                                      <!--a href="#" class="btn btn-default">Cancelar</a-->
                                    </div>
                                </form>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>
                 <!-- /. ROW  -->
				 <footer><p>All right reserved. Template by: <a href="http://webthemez.com">WebThemez</a></p></footer>
				   </div>
             <!-- /. PAGE INNER  -->
            </div>

