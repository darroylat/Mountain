<div id="page-wrapper" >
            <div id="page-inner">
			           <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                           Agregando <small>Nuevo sendero</small>
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
                                <form role="form" method="post" action="<?php echo base_url(); ?>sendero/agregar">
                                    <div class="col-lg-6">
                                      <!--Lugar al que pertenece el Sendero -->
                                      <div class="form-group">
                                          <label>Lugar</label>
                                          <select name="ubicacion" class="form-control">
                                              <option value="0">Seleccione una Ubicacion</option>
                                              <!--option>Parque Metropolitano</option-->
                                              <?php foreach ($ubicacion->result() as $row){?>
                                                <option value="<?= $row->IDUBICACION; ?>"><?= $row->NOMBRE; ?></option>
                                              <?php } ?>
                                          </select>
                                      </div>
                                      <!--Nombre del lugar -->
                                      <div class="form-group">
                                          <label>Nombre del sendero</label>
                                          <input name="nombre" class="form-control">
                                      </div>
                                      <div class="form-group">
                                            <label>Opción</label>
                                            <div class="checkbox">
                                                <label>
                                                    <input name="volver" type="checkbox" value=""> Guardar y volver a agregar nuevo equipamiento
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                      <!--Nivel del sendero -->
                                      <div class="form-group">
                                          <label>Nivel del Sendero</label>
                                          <select name="nivel" class="form-control">
                                            <option value="0">Seleccione el nivel</option>
                                            <?php foreach ($nivel->result() as $rownivel){?>
                                              <option value="<?= $rownivel->IDDIFICULTAD; ?>"><?= $rownivel->NOMBRE; ?></option>
                                            <?php } ?>
                                          </select>
                                      </div>
                                      <!--Descripcion -->
                                      <div class="form-group">
                                          <label>Descripción</label>
                                          <textarea name="descripcion" class="form-control" rows="3"></textarea>
                                      </div>
                                    </div>
                                    <div class="col-lg-12">
                                      <!--Botones para guardar el evento o volver a la pagina de inicio -->
                                      <input type="submit" class="btn btn-default" value="Guardar"/>
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
