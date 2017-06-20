<div id="page-wrapper" >
            <div id="page-inner">
			           <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Pack creados <small>Visualiza los eventos generados.</small>
                        </h1>
                    </div>
                </div>

                <div class="row">
                  <div class="col-lg-12">
                      <div class="panel panel-default">
                          <div class="panel-heading">
                              Lista de pack 
                          </div>
                          <div class="panel-body">
                              <div class="row">
                                <div class="col-lg-12">
                                  <div class="table-responsive pre-scrollable">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Acciones</th>
                                            <th>Nombre</th>
                                            <th>Valor</th>
                                            <th>Fecha de cierre</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php foreach ($packs as $pack){?>
                    					<tr>
                    
                							<td>
                                              <a href="<?php echo site_url('Pack/ver');?>/<?= $pack->IDPACK; ?>"><button type="button" name="button" class="btn btn-primary glyphicon glyphicon-eye-open"></button></a>
                                              <button type="button" name="button" class="btn btn-success glyphicon glyphicon-edit"></button>
                                              <button type="button" name="button" class="btn btn-danger glyphicon glyphicon-trash"></button>
                                            </td>
                                            <td><?= $pack->NOMBRE; ?></td>
                                            <td><?= $pack->VALOR; ?></td>
                                            <td><?= $pack->FECHAINICIO; ?></td>
                                        </tr>
                    					<?php } ?>

                                    </tbody>
                                </table>
                            </div>
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
