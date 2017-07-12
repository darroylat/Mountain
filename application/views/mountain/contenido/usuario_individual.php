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
    <div id="page-inner">
		<div class="row">
            <div class="col-md-12">
                <h1 class="page-header">
                <?=$infopersonal->NOMBRE?> <?=$infopersonal->APELLIDO?></br> 
                <small>Nivel: Básico</small>
                </h1>
            </div>
        </div>
	<div class="row">
    <div class="col-md-6">
		<div class="panel panel-default">
        	<div class="panel-heading">
            	Información
        	</div>
			<div class="panel-body">
				<ul class="nav nav-pills">
					<li class="active"><a href="#home-pills" data-toggle="tab">Datos personales</a>
					</li>
					<li><a href="#profile-pills" data-toggle="tab">Equipo técnico</a>
					</li>
					<li><a href="#messages-pills" data-toggle="tab">Datos Emergencia</a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane fade active in" id="home-pills">
						</br>
		        		<table class="table">
		        			<tbody>
		        				<tr>
		        					<th>Telefono</th>
		        					<td> <?=$infopersonal->TELEFONO?></td>
		        					<th>Correo</th>
		        					<td><?= $infopersonal->EMAIL ?></td>
		        				</tr>
		        				<tr>
		        				</tr>
		        				<tr>
		        					<th>Comparte auto</th>
		        					<td><?php if ($infopersonal->AUTOCOMPAR==0) { echo "No";} else{ echo "si"; }?></td>
		        					<th>Comparte auto</th>
		        					<td><?php if ($infopersonal->AUTOCOMPAR==0) { echo "No";} else{ echo "si"; }?></td>
		        				</tr>
		        				<tr>
		        					<th>Edad</th>
		        					<td> <?=$infopersonal->EDAD?></td>
		        					<th>Sexo</th>
		        					<td><?= $infopersonal->SEXO ?></td>
		        				</tr>
		        				<tr>
		        					<th colspan="1">Instagran</th>
		        					<td colspan="3"> <?=$infopersonal->INSTAGRAM?></td>
		        				</tr>
		        			</tbody>
		        		</table>
					</div>
					<div class="tab-pane fade" id="profile-pills">
					<table class="table">
		        			<tbody>
		        				
		        					<?php $id = 1; ?>
									<?php foreach($equipousuario as $row){ ?>
										<tr><th><?=$id++?>.-<?=$row->NOMBRE?></th></tr>
									<?php } ?>
		        				
		        			</tbody>
		        		</table>
					</div>
					<div class="tab-pane fade" id="messages-pills">
						<table class="table">
		        			<tbody>
		        				<tr>
		        					<th>Responsable</th>
		        					<td> <?=@$datosemergencia->NOMBRECONTACTO?></td>
		        					<th>Telefono</th>
		        					<td><?=@$datosemergencia->TELEFONO ?></td>
		        				</tr>
		        				<tr>
		        					<th colspan=2>SALUD</th>
		        					<td> <?=@$datosemergencia->SALUD?></td>
		        				</tr>
		        			</tbody>
		        		</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">
			Lugares en los que ha participado 
			</div>
			<div class="panel-body">
		    	<table class="table">
		    		<thead>
		    			<tr>
		    				<th>Nombre</th>
		    				<th>Asisitio</th>
		    			</tr>
		    		</thead>
		    		<tbody>
		    			<?php foreach($lugaresasistidos as $row22){ ?>
		    			<tr>
		    				<td><?=$row22->NOMBRE;?></td>
		    				<td>
		    					<!-- Comprobante 0=no ingresado, 1=ingresado, 2=validado -->
		    					<?php if($row22->COMPROBANTE == 0){ ?>
		    						<button class="btn btn-sm btn-danger" type="button"><i class="fa fa-check"></i></button>
		    					<?php }else if($row22->COMPROBANTE == 1){ ?>
		    						<button class="btn btn-sm btn-warning" type="button"><i class="fa fa-check"></i></button>
		    					<?php }else{ ?>
		    						<button class="btn btn-sm btn-success" type="button"><i class="fa fa-check"></i></button>
		    					<?php } ?>
		    				</td>
		    			</tr>
		    			<?php } ?>
		    		</tbody>
		    	</table>
			</div>
		</div>
	</div>
	</div>
	<div class="row">
		<div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                                Registro de inscripciones
                    </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                            	<th>Nro </th>
                                                <th>Nombre </th>
                                                <th>Fecha Inscripción</th>
                                                <th>Valor</th>
                                                <th>Estado salida</th>
                                                <th>Comprobante Desposito</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $x=0;
                                            foreach($Inscripcionesusuario as $row2){ ?>
							    			<tr>
							    				<td><?php echo $x=$x+1; ?></td>
							    				<td><?=$row2->NOMBRE;?></td>
							    				<td><?=$row2->FECHA;?></td>
							    				<td><?=$row2->VALOR;?></td>
							    				<td><?php  
		                                            if($row2->ESTADO==0)
		                                            {
		                                            	
		                                            	echo "<button type='button' class='btn btn-success btn-circle'><i class='glyphicon glyphicon-eye-open'>A</i></button>";
		                                            }
		                                            else {
		                                            	echo "<button type='button' class='btn btn-danger btn-circle'><i class='glyphicon glyphicon-eye-close'>C</i></button>";
		                                            }?>
		                                          </td>
							    				<td><!-- Comprobante 0=no ingresado, 1=ingresado, 2=validado -->
							    					<?php if($row2->COMPROBANTE == 0){ ?>
							    						<button class="btn btn-sm btn-danger" type="button"><i class="fa fa-check"></i>No enviado</button>
							    					<?php }else if($row2->COMPROBANTE == 1){ ?>
							    						<button class="btn btn-sm btn-warning" type="button"><i class="fa fa-check"></i>No confirmado</button>
							    					<?php }else{ ?>
							    						<button class="btn btn-sm btn-success" type="button"><i class="fa fa-check"></i>Confirmado</button>
							    					<?php } ?>
							    					</td>
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
                 <!-- /. ROW  -->
<footer><p>All right reserved. Template by: <a href="http://webthemez.com">WebThemez</a></p></footer>
</div>
</div>
