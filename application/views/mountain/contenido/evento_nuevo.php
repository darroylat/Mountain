<div id="page-wrapper" >
            <div id="page-inner">
			           <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Creando evento <small>Agrega las caracteristicas necesarias.</small>
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
                                <form role="form" method="post" action="<?php echo base_url(); ?>evento/crear">
                                    <div class="col-lg-6">
                                      <!--Nombre del evento a crear -->
                                      <div class="form-group">
                                          <label>Nombre del Evento</label>
                                          <input name="nombre" class="form-control" placeholder="Ingrese el nombre de su evento">
                                      </div>
                                      <!--Descripcion del evento -->
                                      <div class="form-group">
                                          <label>Descripcion del Evento</label>
                                          <textarea name="descripcion" class="form-control" rows="3" placeholder="Ingrese la descripción de su evento"></textarea>
                                      </div>
                                      <!--Punto de encuentro -->
                                      <div class="form-group">
                                          <label>Punto de encuentro</label>
                                          <input name="punto" class="form-control" placeholder="Ingrese el punto de encuentro">
                                      </div>
                                      <!--Select lugar para crear un evento -->
                                      <div class="form-group">
                                          <label>Donde iremos.</label>
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
                                        <label>Imagen a utilizar</label>
                                        <p>Imagen predeterminada</p>
                                        <img src="<?php echo base_url(); ?>images/sin_imagen.jpg" width="360"/>
                                        <label>Seleccione una imagen si desea utilizar una propia</label>
                                        <input name="foto" type="file">
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <!--Seleccion del equipamiento para este evento -->
                                      <div class="form-group">
                                          <label>Equipamientos</label>
                                          <?php foreach ($equipo->result() as $row) { ?>
                                            <div class="checkbox">
                                                <label>
                                                    <input name="equipo[]" type="checkbox" value="<?= $row->IDEQUIPOTRECK; ?>"> <?= $row->NOMBRE ?>&nbsp;<?= $row->DESCRIPCION ?>
                                                </label>
                                            </div>
                                          <?php } ?>
                                          <!--Fecha del evento -->
                                          <div class="form-group">
                                              <label>Fecha del evento</label>
                                              <input name="fechaevento" class="form-control" placeholder="Formato YYYY/MM/DD">
                                          </div>
                                          <!--Hora del evento -->
                                          <div class="form-group">
                                              <label>Hora del evento</label>
                                              <input name="horaevento" class="form-control" placeholder="Formato 00:00:00">
                                          </div>
                                          <!--Fecha y hora de termino del Evento -->
                                          <div class="form-group">
                                              <label>Fecha y Hora de termino del evento</label>
                                              <input name="fechatermino" class="form-control" placeholder="Formato YYYY/MM/DD 00:00:00">
                                          </div>
                                          <!--Valor del Evento -->
                                          <div class="form-group">
                                              <label>Valor del evento</label>
                                              <input name="valor" class="form-control" placeholder="000">
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
				 <footer><p>All right reserved. Template by: <a href="http://webthemez.com">WebThemez</a></p></footer>
				   </div>
             <!-- /. PAGE INNER  -->
            </div>
