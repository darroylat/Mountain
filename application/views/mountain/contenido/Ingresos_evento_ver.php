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
                            Ingresos por Salidas de Trekking
                            <br>
                            <small>Revisa los montos</small>
                        </h1>
    	</div>
    <div id="page-inner">
    <div class="row">
                    <div class="col-md-2 col-sm-2 col-xs-4">
                        <div class="panel panel-primary text-center no-boder bg-color-green">
                            <div class="panel-body">
                                <i class="fa fa-bar-chart-o fa-3x"></i>
                                <h3><?=@$cntactivos?></h3>
                            </div>
                            <div class="panel-footer back-footer-green">
                                Activas
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-4">
                        <div class="panel panel-primary text-center no-boder bg-color-red">
                            <div class="panel-body">
                                <i class="fa fa-bar-chart-o fa-3x"></i>
                                <h3><?=@$cntcerradas?></h3>
                            </div>
                            <div class="panel-footer back-footer-red">
                            Cerradas
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-4">
                        <div class="panel panel-primary text-center no-boder bg-color-brown">
                            <div class="panel-body">
                                <i class="fa fa-bar-chart-o fa-3x"></i>
                                <h3><?=@$cntcanceladas?> </h3>
                            </div>
                            <div class="panel-footer back-footer-brown">
                            	Canceladas
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
						<div class="panel panel-default">
				        	<div class="panel-heading">
				            	Montos totales por salidas Activas:
				        	</div>
							<div class="panel-body">
								<button class="btn btn-sm btn-danger" type="text"></i>A Pagar<br><?=@$sumeneventosact->INSCRITO?></button>
								<button class="btn btn-sm btn-warning" type="text"></i>Confirma Pago<br><?=@$sumeneventosact->CONFIRMAR?></button>
							    <button class="btn btn-sm btn-success" type="text"></i>Pago realizados<br><?=@$sumeneventosact->PAGADO?></button>
							</div>
						</div>
					</div>
        </div>
	<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        	Pagos por salidas de trekking
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTables-example">
                                    <thead class="btn-info">	
                                    		<th>NOMBRE SALIDA</th>
                                            <th>A pagar</th>
                                            <th>Confirma Pago</th>
                                            <th>Pago realizados</th>
                                            <th>Estado</th>
                                            <th>Pagan todos</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($listaeventos as $salidas){?>
                                      <tr>
                                            <td><a href="<?php echo site_url('Evento/ver');?>/<?= $salidas->IDEVENTO; ?>"><?= $salidas->NOMBRE; ?></a></td>
                                            <td class="bg-color-red">$<?= $salidas->INSCRITO; ?></td>
                                            <td class="bg-color-brown">$<?= $salidas->CONFIRMAR; ?></td>
                                            <td class="bg-color-green">$<?= $salidas->PAGADO; ?></td>
                                            <td><?php  
                                            if($salidas->ESTADO==0)
                                            {
                                            	
                                            	echo "<button type='button' class='btn btn-success btn-circle'><i class='glyphicon glyphicon-eye-open'>A</i></button>";
                                            }
                                            else {
                                            	echo "<button type='button' class='btn btn-danger btn-circle'><i class='glyphicon glyphicon-eye-close'>C</i></button>";
                                            }                                            ?></td>
                                            <td>$<?= $salidas->TOTAL; ?></td>
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

</div>
</div>
