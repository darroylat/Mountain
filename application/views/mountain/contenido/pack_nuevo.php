<div id="page-wrapper" >
            <div id="page-inner">
			           <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Creando pack de eventos<small>Agrega las caracteristicas necesarias.</small>
                        </h1>
                    </div>
                </div>

                <div class="row">
                  <div class="col-lg-12">
                      <div class="panel panel-default">
                          <div class="panel-heading">
                              Basic Form Elements
                          </div>
                          <div class="panel-body">
                              <div class="row">
                                <form role="form" method="post" action="<?php echo base_url(); ?>pack/crear">
                                    <div class="col-lg-6">
                                      <!--Nombre del evento a crear -->
                                      <div class="form-group">
                                          <label>Nombre del Pack</label>
                                          <input id="nombre" name="nombre"class="form-control" placeholder="Ingrese el nombre de su evento">
                                      </div>
                                      <!--Descripcion del evento -->
                                      <div class="form-group">
                                          <label>Descripcion del Pack</label>
                                          <textarea id="descripcion" name="descripcion" class="form-control" rows="3" placeholder="Ingrese la descripción de su evento"></textarea>
                                      </div>
                                      <!--Imagen a utilizar -->
                                      <div class="form-group">
                                        <label>Imagen a utilizar</label>
                                        <p>Imagen predeterminada</p>
                                        <img src="<?php echo base_url(); ?>images/sin_imagen.jpg" width="360"/>
                                        <label>Seleccione una imagen si desea utilizar una propia</label>
                                        <input id="foto" name="foto" type="file">
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <!--Seleccion del equipamiento para este evento -->
                                      <div class="form-group">
                                      	<div class="form-group">
                                              <label>Valor</label>
                                              <input id="valor" name="valor" class="form-control" placeholder="0000">
                                          </div>
                                      	<div class="form-group">
                                              <label>Fecha Inicio del Pack</label>
                                              <input id="fechainicio" name="fechainicio" class="form-control" placeholder="Formato YYY/MM/DDD">
                                          </div>
                                          <!--Fecha y hora de termino del Evento -->
                                          <label>Donde iremos</label>
                                          <?php foreach ($ubicacion->result() as $row){?>
                                            <div class="checkbox">
                                                <label>
                                                    <input id="lg<?= $row->IDUBICACION; ?>" type="checkbox" value="<?= $row->IDUBICACION; ?>"  onchange="cargaSenderodepack(lg<?= $row->IDUBICACION; ?>);"> <?= $row->NOMBRE; ?>
                                                </label>
                                                <div class="form-group">
                                                	<select id="slg<?= $row->IDUBICACION; ?>" name="<?= $row->IDUBICACION; ?>" class="form-control" style="display:none;">
		                                              <option>Seleccione un Sendero</option>
		                                              <option>Sendero Atacameño</option>
		                                          </select>
	                                    		</div>
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
				 <footer><p>All right reserved. Template by: <a href="http://webthemez.com">WebThemez</a></p></footer>
				   </div>
             <!-- /. PAGE INNER  -->
            </div>
