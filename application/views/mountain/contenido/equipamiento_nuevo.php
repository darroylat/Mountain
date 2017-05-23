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
                                <form role="form" method="post" action="<?php echo base_url(); ?>equipo/agregar">
                                    <div class="col-lg-6">
                                      <!--Nombre del evento a crear -->
                                      <div class="form-group">
                                          <label>Nombre equipamiento</label>
                                          <input name="nombre" class="form-control" placeholder="Ingrese el nombre de su evento">
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
                                      <div class="form-group">
                                          <label>Descripcion equipamiento</label>
                                          <input name="descripcion" class="form-control" placeholder="Ingrese el nombre de su evento">
                                      </div>

                                    </div>
                                    <div class="col-lg-12">
                                      <!--Botones para guardar el evento o volver a la pagina de inicio -->
                                      <input type="submit" class="btn btn-default" value="Guardar"/>
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
