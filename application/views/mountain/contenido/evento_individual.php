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
            <div class="col-md-10">
                <h1 class="page-header">
                <?=$evento->NOMBRE?></br>
                <small>Detalle de la salida</small>
                </h1>
         </div>
            <div class="col-md-2">
            	<?php  $estado=$evento->ESTADO;
               if($estado==0)
                                            {
                                            	echo "<button type='button' class='btn btn-danger'><i class='glyphicon glyphicon-lock'> Finalizar Salida</i></button>";
                                            }
                                            else {
                                            	echo "<button type='button' class='btn btn-danger'><i class='glyphicon glyphicon-eye-close'> Cerrada</i></button>";
                                            }  ?>
            </div>
        </div>
        <div class="row">
         <div class="col-md-6">
         <div class="col-md-12">
			<div class="panel panel-defaul no-boder bg-color-green">
	                            <div class="panel-body">
	                            <?php 
	                            
	                            $rutaimagen="images/eventos/".$imagen.".jpg";
	                            
	                            if (file_exists($rutaimagen)) {
								   $rutaimagen=$rutaimagen;
								} else {
								    $rutaimagen="images/sin_imagen.jpg";
								}
	                            ?>
	                            	 <img src="<?php echo base_url(); ?><?=$rutaimagen?>" style="box-shadow: 0px 0px 5px 0px #101010;"width="100%"/>
	                                
	                            </div>
	                            <div class="panel-footer back-footer-green">
	                                Fotografía del Lugar
	
	                            </div>
        	</div>
		</div>
		    <div class="col-md-12">
				<div class="panel panel-default">
		        	<div class="panel-heading">
		            	Datos de la Salida
		        	</div>
					<div class="panel-body">
						<ul class="nav nav-pills">
							<li class="active"><a href="#home-pills" data-toggle="tab">Fechas</a>
							</li>
							<li><a href="#profile-pills" data-toggle="tab">Descripcion</a>
							</li>
							<li><a href="#messages-pills" data-toggle="tab">Información</a>
							</li>
							<li><a href="#settings-pills" data-toggle="tab">Equipo</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane fade active in" id="home-pills">
							</br>
			        		<table class="table">
			        			<tbody>
			        				<tr>
			        					<td>Fecha Inicio</td>
			        					<td><?= $evento->FECHA ?></td>
			        				</tr>
			        				<tr>
			        					<td>Hora Inicio</td>
			        					<td><?= $evento->HORA ?></td>
			        				</tr>
			        				<tr>
			        					<td>Fecha Termino Inscripción</td>
			        					<?php strtotime($evento->FECHACIERRE." 23:59:59"); ?>
			        					<td><?= $evento->FECHACIERRE ?></td>
			        				</tr>
			        			</tbody>
			        		</table>
						</div>
						<div class="tab-pane fade" id="profile-pills">
							<h4>Ubicacion</h4>
							<p><?=$ubicacion->INFORMACION?></p>
							<h4>Evento</h4>
							<p><?=$evento->DESCRIPCION?></p>
						</div>
						<div class="tab-pane fade" id="messages-pills">
							<h4>Caracteristica</h4>
							<p><?=$ubicacion->CARACTERISTICA?></p>
							<h4>Riesgos</h4>
							<p><?=$ubicacion->RIESGOS?></p>
						</div>
						<div class="tab-pane fade" id="settings-pills">
							<?php $id = 1; ?>
							<?php foreach($equipo as $row){ ?>
								<?=$id++?>.-<?=$row->DESCRIPCION?></br> 
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
	    </div>
		
        
			<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
				Porcentaje de pagos
				</div>
					<div class="panel-body">
						<div class="row">
						<div class="col-lg-9">
						<?php 
							if($comprobante->TOTAL!=0)
								{
									$totalComprobante = (($comprobante->PAGO/$comprobante->TOTAL)*100);
							}
							else {
								$totalComprobante=0;
							}
							if($valor->TOTAL!=0)
							{
							$total = (($valor->PAGO/$valor->TOTAL)*100);
							}
							else {
							$total=0;
							}
							
							$fecha_actual = strtotime(date("d-m-Y H:i:00",time()));
							$fecha_cierre = strtotime($evento->FECHACIERRE." 23:59:59");
						
						?>
	                	% Comprobantes ingresados:
							<div class="progress">
								<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="<?=$totalComprobante?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$totalComprobante?>%">
										<?php if($totalComprobante == 100){ ?>
									Estamos listos para salir
									<?php }else{ ?><!-- Cuando la fecha de termino de inscripcion llegue el msg: 70% Somos los que somos -->
									<?php	if($totalComprobante<$total){ ?>
									<?=$totalComprobante?>	% Completo
									<?php	}else{ ?>
									<?=$totalComprobante?>	% Validar comprobantes
									<?php	}
										} ?>
								</div>
							</div>
							% Comprobantes validados:
							<div class="progress">
								<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?=$total?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$total?>%">
									<?php if($total == 100){ ?>
									Estamos listos para salir
									<?php }else{ ?><!-- Cuando la fecha de termino de inscripcion llegue el msg: 70% Somos los que somos -->
									<?php	if($fecha_actual<$fecha_cierre){ ?>
									<?=$total?>	% Completo
									<?php	}else{ ?>
									<?=$total?>	% Somos los que somos
									<?php	}
										} ?>
								</div>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="panel panel-primary text-center no-boder bg-color-blue">
	                            <div class="panel-body">
	                            	<img src="<?php echo base_url(); ?>/images/iconoauto.png" width="50%" class="img-responsive center-block">
	                                <h3><?=$cantidad->AUTO?></h3>
	                            </div>
	                            <div class="panel-footer back-footer-blue">
	                                Autos
	
	                            </div>
	                        </div>
						</div>
						
						<div class="col-lg-4">
							<h4>Descripción</h4>
								<?=$evento->DESCRIPCION?>
						</div>
						<div class="col-lg-4">
							<h4>Ubicación</h4>
							<?=$ubicacion->NOMBREUBICACION?> </br>
							<?=$ubicacion->NOMBRESENDERO?>
						</div>
						<div class="col-lg-4">
							<h4>Punto de encuentro</h4>
							<?=$evento->PUNTO?>
						</div>
					</div>
					</div>
				</div>
			</div>
	</div>
	<div class="col-md-6">
	<div class="col-md-12">
				<div class="panel panel-default">
			<div class="panel-heading">
			Participantes 
			</div>
			<div class="panel-body">
		    	<table class="table">
			    		<thead>
		    				<th>Nombre</th>
		    				<th>Comprobante</th>
		    			</tr>
		    		</thead>
			    		<tbody>
					<?php foreach($usuarios as $row){ ?>	
					
						<td><?=$row->NOMBRE;?></td>
						<td>
						<?php if($row->COMPROBANTE == 0){ ?>
						<button class="btn btn-sm btn-danger" type="button"><i class="fa fa-check"> Inscrito </i></button>
						<?php }else if($row->COMPROBANTE == 1){ ?>
						<button class="btn btn-sm btn-warning" type="button"><i class="fa fa-check">Confirmar</i></button>
						<?php }else{ ?>
						<button class="btn btn-sm btn-success" type="button"><i class="fa fa-check">Pagado  </i></button>
						<?php } ?>
						</td>
		    			</tr>
		    			<?php } ?>
		    		</tbody>
		    	</table>
			</div>
		</div>
	</div>
	<div class="col-lg-12">
		<div class="panel panel-default">
           <div class="panel-heading">
            Participantes agrupados por nivel
   			</div>
        <div class="panel-body">
            <div class="panel-group" id="accordion">
            	<div class="panel panel-default">
	           		<div class="panel-heading">
               	 		<h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" class="collapsed">Participantes de nivel Basico</a>
                       </h4>
      	           </div>                       
      	           <div id="collapse1" class="panel-collapse collapse" style="height: auto;">
                        <div class="panel-body">
            				<?php foreach($usuarios as $row){ 
                        	  		if($row->IDNIVEL == 1){ ?>
                           				<a href=""><?=$row->NOMBRE?></a>,
							<?php } }?>
						</div>
                   </div>
                </div>
            	<div class="panel panel-default">
                	<div class="panel-heading">
	                	<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapse2" class="collapsed">Participantes de nivel Basico intermedio</a>
						</h4>
                    </div>
       				<div id="collapse2" class="panel-collapse collapse" style="height: 0px;">
                        <div class="panel-body">
                  			<?php foreach($usuarios as $row){ 
									if($row->IDNIVEL == 2){ ?>
                                    	<a href=""><?=$row->NOMBRE?></a>,
                             <?php } }?>
        	            </div>
                    </div>
                </div>
                <div class="panel panel-default">
                	<div class="panel-heading">
                		<h4 class="panel-title">
        	            	<a data-toggle="collapse" data-parent="#accordion" href="#collapse3" class="collapsed">Participantes de nivel Medio</a>
          				</h4>
                    </div>              
                	<div id="collapse3" class="panel-collapse collapse" style="height: 0px;">
                    	<div class="panel-body">
           					<?php foreach($usuarios as $row){ 
                    				if($row->IDNIVEL == 3){ ?>
                                    	<a href=""><?=$row->NOMBRE?></a>
                                     <?php } }?>
        	            </div>                            
    	            </div>
                </div>
     	        <div class="panel panel-default">
                	<div class="panel-heading">
                        <h4 class="panel-title">
   		                	<a data-toggle="collapse" data-parent="#accordion" href="#collapse4" class="collapsed">Participantes de nivel Medio intermedio</a>
      	                </h4>
  	                </div>
           			<div id="collapse4" class="panel-collapse collapse" style="height: 0px;">
                       <div class="panel-body">
                           <?php foreach($usuarios as $row){ 
                            	    if($row->IDNIVEL == 4){?>
										<a href=""><?=$row->NOMBRE?></a>,
							<?php } }?>
	   	            	</div>
                	</div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                  		<h4 class="panel-title">
            	   	    	<a data-toggle="collapse" data-parent="#accordion" href="#collapse5" class="">Participantes de nivel Experto</a>
                     	</h4>              
  					</div>
        	        <div id="collapse5" class="panel-collapse collapse in" style="height: 0px;">
                        <div class="panel-body">
                            <?php foreach($usuarios as $row){ 
                  	          		if($row->IDNIVEL == 5){ ?>
										<a href=""><?=$row->NOMBRE?></a>,
                            <?php } }?>
                        </div>
                    </div>
               </div>
            </div>
        </div>
    </div>
	</div>
	</div>
</div>
</div>
</div>
