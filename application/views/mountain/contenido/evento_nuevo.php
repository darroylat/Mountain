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

</script>

<div id="page-wrapper" >
            <div id="page-inner">
			    <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Nueva Salida de Trekking 
                            <br>
                            <small>Seleccionar el lugar e ingresar la información</small>
                        </h1>
                    </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                      <div class="panel panel-default">
                          <div class="panel-heading">
                             Crear nueva salida de trekking
                          </div>
                          <div class="panel-body">
                              <div class="row">
                                <form role="form" method="post" action="<?php echo base_url(); ?>evento/crear" enctype="multipart/form-data">
                                    <div class="col-lg-6">
                                      <!--Nombre del evento a crear -->
                                      <div class="form-group">
                                          <label>Nombre</label>
                                          <input name="nombre" class="form-control" placeholder="CERRO MANQUEHUE">
                                      </div>
                                      <!--Descripcion del evento -->
                                      <div class="form-group">
                                          <label>Descripción</label>
                                          <textarea name="descripcion" class="form-control" rows="3" placeholder="TWKD te invita a contemplar la hermosa luna llena este viernes..."></textarea>
                                      </div>
                                      <!--Punto de encuentro -->
                                      <div class="form-group">
                                          <label>Punto de encuentro</label>
                                          <div class="form-group input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-screenshot"></span></span>
                                                <input name="punto" type="text" class="form-control" placeholder="Linea 1 metro">
                                                </div>
                                      </div>
                                    
                                              
                                      <!--Select lugar para crear un evento -->
                                      <div class="form-group">
                                          <label>Lugar</label>
                                          <select name="ubicacion" id="ubicacion" class="form-control" onchange="cargaSendero();">
                                              <option value="0">Seleccione una ubicacion</option>
                                              <?php foreach ($ubicacion->result() as $row){?>
                                                <option value="<?= $row->IDUBICACION; ?>"><?= $row->NOMBRE; ?></option>
                                              <?php } ?>
                                          </select>
                                      </div>
                                      <!--Select sendero a elegir para el lugar del evento -->
                                      <div class="form-group">
                                          <label>Cual sera el sendero a recorrer.</label>
                                          <select id="sendero" name="sendero" class="form-control" disabled="">
                                              <option value="0">Seleccione un Sendero</option>
                                          </select>
                                      </div>
                                      <!--Imagen a utilizar -->
                                      <div class="form-group">
                                     	<label>Subir imagen repesentativa</label>
                                      <input type="file" name="foto" id="foto">
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <!--Seleccion del equipamiento para este evento -->
                                      <div class="form-group row">
                                      		<div class="col-xs-4">
                                              <label>Fecha Incio</label>
                                              <div class="form-group input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                              <input type="text" id="fechaevento" name="fechaevento" class="form-control" value="<?php echo date('Y-m-d');?>" placeholder="2000/01/01">
                                              </div>
                                            </div>
                                            <!--Hora del evento -->
                                            <div class="col-xs-4">
                                              <label>Hora</label>
                                              <div class="form-group input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                                              <input name="horaevento" class="form-control" placeholder="00:00">
                                              </div>
                                            </div>
                                            <!--Fecha y hora de termino del Evento -->
                                            <div class="col-xs-4">
                                              <label>Cierre inscripciones</label>
                                              <div class="form-group input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                              <input type="text" id="fechatermino" name="fechatermino" class="form-control" placeholder="2000/01/01">
                                              </div>
                                            </div>
                                            <!--Valor del Evento -->
                                            <div class="col-xs-4">
                                              <label>Precio</label>
                                              <div class="form-group input-group">
                                                <span class="input-group-addon">$</span>
                                                <input  name="valor" type="text" class="form-control">
                                                </div>
                                            </div>
                                            

                                      </div>
                                      <div class="form-group row">
                                          <div class="col-xs-8">
                                          <label>Seleccionar equipo técnico a usar</label>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <?php foreach ($equipo->result() as $row) { ?>
                                            <div class="col-xs-4">
                                                <label>
                                                    <input name="equipo[]" type="checkbox" value="<?= $row->IDEQUIPOTRECK; ?>" titlle="<?= $row->DESCRIPCION ?>"> <?= $row->NOMBRE ?>
                                                </label>
                                            </div>
                                          <?php } ?>
                                          <!--Fecha del evento -->
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
				   <footer><p>SISTEMA WEB DE ADMINISTRACION: <a href="http://webthemez.com">MOUNTAIN</a></p></footer>
             <!-- /. PAGE INNER  -->
            </div>
