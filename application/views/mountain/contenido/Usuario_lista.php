<div id="page-wrapper" >
    <div id="page-inner">
		<div class="row">
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-green">
                            <div class="panel-body">
                                <i class="fa fa-users fa-5x"></i>
                                <h3><?=$cantidadusuarios?> </h3>
                            </div>
                            <div class="panel-footer back-footer-green">
                                usuarios disponibles
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-red">
                            <div class="panel-body">
                                <i class="fa fa-users fa-5x"></i>
                                <h3><?=$cantidadnuevostrekk?> </h3>
                            </div>
                            <div class="panel-footer back-footer-red">
                            	Nuevos en trekking
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-brown">
                            <div class="panel-body">
                                <i class="fa fa-users fa-5x"></i>
                                <h3><?=$cantidadnuevosregis?> </h3>
                            </div>
                            <div class="panel-footer back-footer-brown">
                            	Registrados del día
                            </div>
                        </div>
                    </div>
        </div>
	<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Advanced Tables
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>NOMBRE</th>
                                            <th>APELLIDO</th>
                                            <th>TELEFONO(s)</th>
                                            <th>NIVEL</th>
                                            <th>EMAIL</th>
                                            <th>AUTO(C)</th>
                                            <th>EDAD</th>
                                            <th>INSTAGRAM</th>
                                            <th>INGRESO</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($listausuarios->result() as $usuarios){?>
                    					<tr>
                    
                							<td><?= $usuarios->NOMBRE; ?></td>
                                            <td><?= $usuarios->APELLIDO; ?></td>
                                            <td><?= $usuarios->TELEFONO; ?></td>
                                            <td><?= $usuarios->NIVEL; ?></td>
                                            <td><?= $usuarios->EMAIL; ?></td>
                                             <?php 
                                            	if($usuarios->AUTOCOMPAR == 1){
                                            ?>
                                            	<td>Si</td>
                                            <?php } 
                                            else {
                                            ?>
                                            	<td>No</td>
                                            <?php	
                                            }
                                            
                                            ?>
                                            <td><?= $usuarios->EDAD; ?></td>
                                            <td><?= $usuarios->INSTAGRAM; ?></td>
                                            <td><?= $usuarios->INGRESO; ?></td>
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
