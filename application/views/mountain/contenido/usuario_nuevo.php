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
function validacion() {
  	
  	var valor= document.getElementById('rut').value;
  	var pass= document.getElementById('nombres').value;
  	if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
	  alert('Es requerido ingresar rut');
	  return false;
	}
  	else
  	{
  		
  		if( pass == null || pass.length == 0 || /^\s+$/.test(pass) ) {
		  alert('Es requerido el nombre');
		  return false;
		}
  	}
  	 
  
}
	
</script>
<div id="page-wrapper" >
            <div id="page-inner">
			           <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Nuevo Usuario <br>
                            <small>Ingresa la información y registra un usuario.</small>
                        </h1>
                    </div>
                </div>

                <div class="row">
                  <div class="col-lg-12">
                      <div class="panel panel-default">
                          <div class="panel-heading">
                              Crear nuevo usuario
                          </div>
                          <div class="panel-body">
                              <div class="row">
                                <form role="form" method="post" action="<?php echo base_url(); ?>usuario/crear" onsubmit ="return validacion()">
                                    <div class="col-lg-3">
                                      <!--Nombre del evento a crear -->
                                      <div class="form-group">
                                          <label>Rut</label>
                                          <div class="form-group input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                                <input name="rut" id="rut" type="text" class="form-control" placeholder="Rut sin digito verificador">
                                                </div>
                                      </div>
                                    </div>
                                    <div class="col-lg-3">
                                      <div class="form-group">
                                          <label>Contraseña</label>
                                          <input name="contrasena" value="123456" class="form-control" placeholder="Contraseña">
                                      </div>
                                    </div>
                                    <div class="col-lg-2">
                                      <div class="form-group">
                                          <label>Sexo</label>
                                          <div class="form-group input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-record"></span></span>
                                          <select name="sexo" class="form-control">
										  <option value="M">M</option>
										  <option value="F">F</option>
										  </select>
										  </div>
                                      </div>
                                    </div>
                                    <div class="col-lg-2">
                                      <div class="form-group">
                                          <label>Nivel</label>
                                          <div class="form-group input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-signal"></span></span>
                                          <select name="nivel" class="form-control">
										  <option value="1">Básico</option>
										  <option value="2">Básico Intermedio</option>
										  <option value="3">Medio</option>
										  <option value="4">Medio Intermedio</option>
										  <option value="5">Avanzado</option>
										  
										  </select>
										  </div>
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <!--Nombre del evento a crear -->
                                      <div class="form-group">
                                          <label>Nombres</label>
                                          <div class="form-group input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
                                          <input name="nombres" id="nombres" class="form-control" placeholder="Ingrese el nombre de su evento">
                                          </div>
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <div class="form-group">
                                          <label>Apellidos</label>
                                          <div class="form-group input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
                                          <input name="apellidos" class="form-control" placeholder="Ingrese el nombre de su evento">
                                          </div>
                                      </div>

                                    </div>
                                    <div class="col-lg-12">
                                      <!--Nombre del evento a crear -->
                                      <div class="form-group">
                                          <label>Decripción</label>
                                        <textarea name="descripcion" class="form-control" rows="3"></textarea>
                                      </div>
                                    </div>
                                    
                                    <div class="col-lg-6">
                                      <div class="form-group">
                                          <label>Correo Electrónico</label>
                                          <div class="form-group input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                                                <input name="correo" type="text" class="form-control" placeholder="ejemplo@correo.cl">
                                                </div>
                                      </div>
                                    </div>
                                    <div class="col-lg-12">
                                      <!--Botones para guardar el evento o volver a la pagina de inicio -->
                                      <input type="submit" class="btn btn-success" value="Guardar"/>
                                      <!--a href="#" class="btn btn-default">Cancelar</a-->
                                    </div>
                                </form>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>
				   </div>
             <!-- /. PAGE INNER  -->
</div>
