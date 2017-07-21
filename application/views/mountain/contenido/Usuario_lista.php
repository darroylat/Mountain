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
	<div class="row">
    					<h1 class="page-header">
                            Lista de usuarios
                            <br>
                            <small>Encuentra a todos los usuarios y sus detalles</small>
                        </h1>
    	</div>
    <div id="page-inner">
		<div class="row">
                    <div class="col-md-2 col-sm-2 col-xs-4">
                        <div class="panel panel-primary text-center no-boder bg-color-green">
                            <div class="panel-body">
                                <i class="fa fa-bar-chart-o fa-3x"></i>
                                <h3><?=$cantidadusuarioactivos?> </h3>
                            </div>
                            <div class="panel-footer back-footer-green">
                                Activos
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-4">
                        <div class="panel panel-primary text-center no-boder bg-color-red">
                            <div class="panel-body">
                                <i class="fa fa-users fa-3x"></i>
                                <h3><?=$cantidadusuariodesactivado?></h3>
                            </div>
                            <div class="panel-footer back-footer-red">
                            	Desactivados
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-4">
                        <div class="panel panel-primary text-center no-boder bg-color-brown">
                            <div class="panel-body">
                                <i class="fa fa-users fa-3x"></i>
                                <h3><?=$cantidadusuarios?> </h3>
                            </div>
                            <div class="panel-footer back-footer-brown">
                            	Registrados
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
						<div class="panel panel-default">
				        	<div class="panel-heading">
				            	Resumen Usuarios Activos:
				        	</div>
							<div class="panel-body">
								<button class="btn btn-sm btn-default" type="text"></i>Básico<br><?=@$resumenUsuariosactivos->NIVEL1?></button>
								<button class="btn btn-sm btn-default" type="text"></i>Básico Intermedio<br><?=@$resumenUsuariosactivos->NIVEL2?></button>
							    <button class="btn btn-sm btn-default" type="text"></i>Medio<br><?=@$resumenUsuariosactivos->NIVEL3?></button>
							    <button class="btn btn-sm btn-default" type="text"></i>Medio Intermedio<br><?=@$resumenUsuariosactivos->NIVEL4?></button>
							    <button class="btn btn-sm btn-default" type="text"></i>Avanzado<br><?=@$resumenUsuariosactivos->NIVEL5?></button>
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
                                    <thead class="btn-info">
                                        <tr>
                                            <th>NOMBRE</th>
                                            <th>TELEFONO(s)</th>
                                            <th>NIVEL</th>
                                            <th>EMAIL</th>
                                            <th>AUTO(C)</th>
                                            <th>EDAD</th>
                                            <th>INSTAGRAM</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($listausuarios->result() as $usuarios){?>
                    					<tr>

                							<td><a href="<?php echo site_url('usuario/ver');?>/<?= $usuarios->IDUSUARIO; ?>"><?= $usuarios->NOMBRE; ?> <?= $usuarios->APELLIDO; ?></a></td>
						                	<td><?= $usuarios->TELEFONO; ?></td>
                                            <td><?= $usuarios->NIVEL; ?></td>
                                            <td><?= $usuarios->EMAIL; ?></td>
                                             <?php
                                            	if($usuarios->AUTOCOMPAR == 1){
                                             		echo "<td>Si</td>";
                                             }
                                            else {
                                             		echo "<td>NO</td>";

                                            }

                                            ?>
                                            <td><?= $usuarios->EDAD; ?></td>
                                            <td><?= $usuarios->INSTAGRAM; ?></td>

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
