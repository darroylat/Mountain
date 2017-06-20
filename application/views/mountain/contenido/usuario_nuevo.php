<div id="page-wrapper" >
            <div id="page-inner">
			           <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Ingreso de Usuario <small></small>
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
                                    <div class="col-lg-3">
                                      <!--Nombre del evento a crear -->
                                      <div class="form-group">
                                          <label>Rut</label>
                                          <input name="nombre" class="form-control" placeholder="1234567-8">
                                      </div>
                                    </div>
                                    <div class="col-lg-3">
                                      <div class="form-group">
                                          <label>Contraseña</label>
                                          <input type="password" name="descripcion" class="form-control" placeholder="Contraseña">
                                      </div>
                                    </div>
                                    
                                    <div class="col-lg-3">
                                      <div class="form-group">
                                          <label>Repetir Contraseña</label>
                                          <input type="password" name="descripcion" class="form-control" placeholder="Repetir contraseña">
                                      </div>
                                    </div>
                                    <div class="col-lg-1">
                                      <div class="form-group">
                                          <label>Sexo</label>
                                          <select class="form-control">
										  <option>M</option>
										  <option>F</option>
										  <option>Otro</option>
										  </select>
                                      </div>
                                    </div>
                                    <div class="col-lg-2">
                                      <div class="form-group">
                                          <label>Nivel</label>
                                          <select class="form-control">
										  <option>Básico</option>
										  <option>Básico Intermedio</option>
										  <option>Medio</option>
										  <option>Medio Intermedio</option>
										  <option>Avanzado</option>
										  
										  </select>
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <!--Nombre del evento a crear -->
                                      <div class="form-group">
                                          <label>Nombres</label>
                                          <input name="nombre" class="form-control" placeholder="Ingrese el nombre de su evento">
                                      </div>
                                      <div class="form-group">
                                            <div class="checkbox">
                                                <label>
                                                    <input name="volver" type="checkbox" value="">Recibir correos electronicos
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <div class="form-group">
                                          <label>Apelldiso</label>
                                          <input name="descripcion" class="form-control" placeholder="Ingrese el nombre de su evento">
                                      </div>

                                    </div>
                                    <div class="col-lg-12">
                                      <!--Nombre del evento a crear -->
                                      <div class="form-group">
                                          <label>Decripción</label>
                                        <textarea class="form-control" rows="3"></textarea>
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <div class="form-group">
                                          <label>Correo electronico</label>
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
