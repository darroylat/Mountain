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
                            Lista de lugares para hacer trekking
                            <br>
                            <small>Encuentra a todos los lugares</small>
                        </h1>
    	</div>
    <div id="page-inner">
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
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($all_equipo->result() as $equipo){?>
                    					<tr>
                    
                							<td><?= $equipo->NOMBRE; ?></td>
                                            
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
