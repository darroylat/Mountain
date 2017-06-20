<div id="page-wrapper" >
    <div class="row">
    		<h1>Salidas de Trekking</h1>
    	</div>
    <div id="page-inner">
    <div class="row">
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-green">
                            <div class="panel-body">
                                <i class="fa fa-bar-chart-o fa-5x"></i>
                                <h3><?=$cntactivos?></h3>
                            </div>
                            <div class="panel-footer back-footer-green">
                                Salidas Activas
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-red">
                            <div class="panel-body">
                                <i class="fa fa-bar-chart-o fa-5x"></i>
                                <h3><?=$cntcerradas?></h3>
                            </div>
                            <div class="panel-footer back-footer-red">
                            	Salidas cerradas
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-brown">
                            <div class="panel-body">
                                <i class="fa fa-bar-chart-o fa-5x"></i>
                                <h3><?=$cntcanceladas?> </h3>
                            </div>
                            <div class="panel-footer back-footer-brown">
                            	Salidas canceladas
                            </div>
                        </div>
                    </div>
        </div>
	<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Listado de salidas de trekking
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTables-example">
                                    <thead class="btn-info">	
                                    		<th>Acciones</th>
                                    		<th>NOMBRE SALIDA</th>
                                            <th>F. DE SALIDA</th>
                                            <th>HORA</th>
                                            <th>F. CIERRE INSCRIPCIONES</th>
                                            <th>PTO. ENCUENTRO</th>
                                            <th>VALOR</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($listaeventos as $salidas){?>
                                        <?php 
                                        $color=$salidas->ESTADO;
                                        if ($color==1) { 
                                        echo "<tr class='btn-danger'>";
                                        } else { 
                                        echo "<tr class='btn-success'>";
                                        }
                                        ?>                    					
                    						<td>
                                              <a href="<?php echo site_url('Evento/ver');?>/<?= $salidas->IDEVENTO; ?>"><button type="button" name="button" class="btn btn-primary glyphicon glyphicon-eye-open"></button></a>
                                              <button type="button" name="button" class="btn btn-success glyphicon glyphicon-edit"></button>
                                              <button type="button" name="button" class="btn btn-danger glyphicon glyphicon-trash"></button>
                                            </td>
                                            <td><?= $salidas->NOMBRE; ?></td>
                                            <td><?= $salidas->FECHA; ?></td>
                                            <td><?= $salidas->HORA; ?></td>
                                            <td><?= $salidas->FECHACIERRE; ?></td>
                                            <td><?= $salidas->PUNTO; ?></td>
                                            <td>$<?= $salidas->VALOR; ?></td>
                                        </tr>
                    					<?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
</div>
                 <!-- /. ROW  -->
<footer><p>All right reserved. Template by: <a href="http://webthemez.com">WebThemez</a></p></footer>
</div>
</div>
