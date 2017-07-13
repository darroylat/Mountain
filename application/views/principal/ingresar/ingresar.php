<script type="text/javascript">
  
  function validacion() {
  	
  	var valor= document.getElementById('user').value;
  	var pass= document.getElementById('pass').value;
  	if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
	  alert('Ingresar usuario');
	  return false;
	}
  	else
  	{
  		
  		if( pass == null || pass.length == 0 || /^\s+$/.test(pass) ) {
		  alert('Ingresar contraseña');
		  return false;
		}
  	}
  	 
  
}
</script>

			<!-- Main -->
				<section id="main" class="container 75%">
					<header>
						<h2>Ingresar al portal</h2>
					</header>
					<div class="box">
						<form method="post" action="<?php echo base_url(); ?>cliente/ingresar" onsubmit ="return validacion()" >
							<div class="row uniform 50%">
								<div class="12u">
									<input type="text" name="user" id="user" value="" placeholder="Usuario" />
								</div>
							</div>
							<div class="row uniform 50%">
								<div class="12u">
									<input type="password" name="pass" id="pass" value="" placeholder="Contraseña" />
								</div>
							</div>
							<div class="row uniform">
								<div class="12u">
									<ul class="actions align-center">
										<li><input type="submit" value="Ingresa" /></li>
									</ul>
								</div>
							</div>
						</form>
					</div>
				</section>
