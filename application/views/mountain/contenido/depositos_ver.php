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
                    <div class="col-md-12">
                        <h1 class="page-header">
                           Nuevos Depositos <br>
                           <small>Revisa y Confirma los Depositos</small>
                        </h1>
                    </div>
                </div>
	<div class="row">
		<div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Registro de depositos realizados
                    </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead class="btn-info">
                                            <tr>
                                            	<th>Nro </th>
                                            	<th>Salida de trekking </th>
                                                <th>Rut</th>
                                                <th>Nombre </th>
                                                <th>Email</th>
                                                <th>Telefono</th>
                                                <th>Comprobante Desposito</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $x=0;
                                            foreach($Depositos as $row2){ ?>
							    			<tr>
							    				<td><?php echo $x=$x+1; ?></td>
							    				<td><?=$row2->NOMBREVENTO;?></td>
							    				<td><?=$row2->IDUSUARIO;?></td>
							    				<td><?=$row2->NOMBRE;?> <?=$row2->APELLIDO;?></td>
							    				<td><?=$row2->EMAIL;?></td>
							    				<td><?=$row2->TELEFONO;?></td>
							    				<td><!-- Comprobante 0=no ingresado, 1=ingresado, 2=validado -->
							    					<?php if($row2->COMPROBANTE == 0){ ?>
							    						<button class="btn btn-sm btn-danger" type="button"><i class="fa fa-check"></i>No enviado</button>
							    					<?php }else if($row2->COMPROBANTE == 1){ ?>
							    						<a href="<?php echo site_url('informes/confdeposito/'); ?><?php echo $row2->IDINSCRIPCION;?>" class="btn btn-sm btn-warning"><i class="fa fa-check"></i>No confirmado</a>
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
