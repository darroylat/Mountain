<script>
	function base_url() {
    var pathparts = location.pathname.split('/');
    if (location.host == 'localhost') {
        var url = location.origin+'/'+pathparts[1].trim('/')+'/'; // http://localhost/myproject/
    }else{
        var url = location.origin; // http://stackoverflow.com
    }
    return url;
}



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

            /* MORRIS BAR CHART
			-----------------------------------------*/
		
            Morris.Bar({
                element: 'morris-bar-chart',
                data: [
                
                <?php foreach($cantidadcnc as $row){ ?>
		    	{
                    y: '<?=$row->NOMBRE;?>',
                    a: <?= $row->PAGADO;?>,
                    b: <?=$row->INSCRITOS;?>
                },
                
				<?php } ?>

                ],
                xkey: 'y',
                ykeys: ['a', 'b'],
                labels: ['Total Pagados', 'Total inscritos'],
                hideHover: 'auto',
                resize: true
            });
            
            $.ajax({
				  type: 'POST',
				  url: base_url()+'Daniel/vergrafico',
				  data: '',
				  success: function(data) {
					alert(data.body);
				
				  }
			});
            /* MORRIS AREA CHART
			----------------------------------------*/

            Morris.Area({
                element: 'morris-area-chart',
                data: [
                <?php foreach($cantidadcncpor as $graf2){ ?>
		    	{
                    period: '<?=$graf2->FECHAREGISTRO;?>',
                    iphone: <?= $graf2->INSCRITOS;?>,
                    ipad: <?=$graf2->CONFIRMAR;?>,
                    itouch:<?=$graf2->PAGADO;?>
                },
                
				<?php } ?>	
                	
                ],
                xkey: 'period',
                ykeys: ['iphone', 'ipad', 'itouch'],
                labels: ['Inscritos', 'Por confirmar', 'Pagados'],
                pointSize: 2,
                hideHover: 'auto',
                resize: true
            });

            /* MORRIS DONUT CHART
			----------------------------------------*/
            Morris.Donut({
                element: 'morris-donut-chart',
                data: [
                
                <?php foreach($cantidadsxuser as $row2){ ?>
                    {
                    label: "Total usuarios",
                    value: <?=$row2->TOTAL;?>
	                }, {
	                    label: "Total hombres",
	                    value: <?=$row2->MASCULINO;?>
	                }, {
	                    label: "Total mujeres",
	                    value: <?= $row2->FEMENINO;?>
	                }
                
				<?php } ?>
				
                ],
                resize: true
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
<div id="page-wrapper">
	<div class="row">
    					<h1 class="page-header">
                            Resumen de Salidas de Trekking
                            <br>
                            <small>Inscripciones, depositos, usuarios</small>
                        </h1>
    	</div>
            <div id="page-inner">

                <div class="row">
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-green">
                            <div class="panel-body">
                                <i class="fa fa-bar-chart-o fa-5x"></i>
                                <h3><?=$cantidadaeventos?></h3>
                            </div>
                            <div class="panel-footer back-footer-green">
                               <a class="btn-success" href="<?php echo site_url('evento/ver_eventos'); ?>"> Salidas de Trekking Activos</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-blue">
                            <div class="panel-body">
                                <i class="fa fa-shopping-cart fa-5x"></i>
                                <h3><?=$cantidaddepositos?></h3>
                            </div>
                            <div class="panel-footer back-footer-blue">
                               <a class="btn-info" href="<?php echo site_url('informes/depositos'); ?>">Nuevos Depositos en Trekking Activos </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-brown">
                            <div class="panel-body">
                                <i class="fa fa-users fa-5x"></i>
                                <h3><?=$cantidadusuarios?></h3>
                            </div>
                            <div class="panel-footer back-footer-brown">
                                <a class="btn-warning" href="<?php echo site_url('Usuario/ver_usuarios'); ?>">Inscripciones en Trekking Activos</a>

                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">


                    <div class="col-md-12 col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Resumen de las 10 ultimas salidas de trekking
                            </div>
                            <div class="panel-body">
                                <div id="morris-bar-chart">
                                	
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Resumen demografico de usuarios
                            </div>
                            <div class="panel-body">
                                <div id="morris-donut-chart"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-12 col-xs-12">                     
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Resumen de eventos con inscripciones
                        </div>
                        <div class="panel-body">
                            <div id="morris-area-chart"></div>
                        </div>
                    </div>            
                </div> 

                </div>
                </div>

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
