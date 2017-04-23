<div id="page-wrapper" >
            <div id="page-inner">
			           <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                           Informacion <small>Del cliente</small>
                        </h1>
                    </div>
                </div>

                <div class="row">
                  <div class="col-lg-12">
                      <div class="panel panel-default">
                          <div class="panel-heading">
                              Datos Cliente
                          </div>
                          <div class="panel-body">
                              <div class="row">
                                <form role="form">
                                    <div class="col-lg-6">
                                      <input type="hidden" value="" id="idcliente" name="idcliente" class="form-control">
                                      <!--Nombre del lugar -->
                                      <div class="form-group">
                                          <label>Nombre</label>
                                          <input type="text" value="<?=$nombre ?>" id="nombre" name="nombre" class="form-control">
                                      </div>
                                      <!--Nombre del lugar -->
                                      <div class="form-group">
                                          <label>Correo electronico</label>
                                          <input type="email" value="<?=$email?>" id="email" name="email" class="form-control">
                                      </div>
                                      <!--Nombre del lugar -->
                                      <div class="form-group">
                                            <label>Desea recibir noticias?</label>
                                            <div class="checkbox">
                                                <label>
                                                  <?php
                                                  if (isset($recibir)) {
                                                    if ($recibir == '1') {
                                                      ?>
                                                      <input type="checkbox" id="noticia" name="noticia" checked>
                                                      <?php
                                                    }else{
                                                      ?>
                                                      <input type="checkbox" id="noticia" name="noticia" >
                                                      <?php
                                                    }
                                                  }else{
                                                    ?>
                                                    <input type="checkbox" id="noticia" name="noticia">
                                                    <?php
                                                  }
                                                  ?>
                                                    Seleccione si lo desea
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                    <div class="col-lg-6">
                                      <button class="btn btn-primary btn-md"  onclick="abrirModalContrasena()">
                                        Cambiar Contraseña
                                      </button>
                                    </div>
                                    <div class="col-lg-12">
                                      <!--Botones para guardar el evento o volver a la pagina de inicio -->
                                      <a href="#" class="btn btn-default">Guardar</a>
                                    </div>

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
