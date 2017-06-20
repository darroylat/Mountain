<div id="page-wrapper" >
    <div id="page-inner">
		<div class="row">
            <div class="col-md-12">
                <h1 class="page-header">
                <?=$evento->NOMBRE?></br> 
                <small>Pack de salidas</small>
                </h1>
            </div>
        </div>
		<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
			Porcentaje pagados 
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-12">
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
						$fecha_cierre = strtotime($evento->FECHAINICIO." 23:59:59");
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
						<!-- los pack no tienen fecha -->
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
					<div class="col-lg-12">
						<h4>Descripción</h4>
						<?=$evento->DESCRIPCION?>
					</div>
				</div>
			</div>
		</div>
	</div>
                  
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">
			Pago de participantes 
			</div>
			<div class="panel-body">
		    	<table class="table">
		    		<thead>
		    			<tr>
		    				<th>Nombre</th>
		    				<th>Comprobante</th>
		    			</tr>
		    		</thead>
		    		<tbody>
		    			<?php foreach($usuarios as $row){ ?>
		    			<tr>
		    				<td><?=$row->NOMBRE;?></td>
		    				<td>
		    					<!-- Comprobante 0=no ingresado, 1=ingresado, 2=validado -->
		    					<?php if($row->COMPROBANTE == 0){ ?>
		    						<button class="btn btn-sm btn-danger" type="button"><i class="fa fa-check"></i></button>
		    					<?php }else if($row->COMPROBANTE == 1){ ?>
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
	<div class="col-md-6">
		<div class="panel panel-default">
        	<div class="panel-heading">
            	Datos de la Salida
        	</div>
			<div class="panel-body">
				<ul class="nav nav-pills">
					<li class="active"><a href="#home-pills" data-toggle="tab">Senderos</a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane fade active in" id="home-pills">
						</br>
		        		<table class="table">
		        			<tbody>
		        				<?php foreach($senderos as $sen){ ?>
		    			<tr>
		    				<td><?=$sen->NOMBRE;?></td>
		    			</tr>
		    			<?php } ?>
		    		</tbody>
		        			</tbody>
		        		</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
			Avance de participantes 
			</div>
			<div class="panel-body">
		    	<table class="table">
		    		<thead>
		    			<tr>
		    				<th>Nombre</th>
		    				<th>Avance</th>
		    			</tr>
		    		</thead>
		    		<tbody>
		    			<?php foreach($usuarios as $row){ ?>
		    			<tr>
		    				<td><?=$row->NOMBRE;?></td>
		    				<td>
		    				<div class="progress progress-striped">
			  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
			    <span class="sr-only">20% Complete</span>
			  </div>
					</div>
		    				</td>
		    			</tr>
		    			<?php } ?>
		    		</tbody>
		    	</table>
			</div>
		</div>
	</div>
	
</div>
                 <!-- /. ROW  -->
<footer><p>All right reserved. Template by: <a href="http://webthemez.com">WebThemez</a></p></footer>
</div>
</div>
