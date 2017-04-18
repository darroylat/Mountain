
			<!-- Main -->
				<section id="main" class="container 75%">
					<header>
						<h2>Registro</h2>
						<p>Todos los datos son requeridos</p>
					</header>
					<div class="box">
						<form method="post" action="../registrar">
              <div class="row uniform 50%">
								<div class="12u">
									<input type="text" name="nombre" id="nombre" value="" placeholder="Nombre Completo" />
								</div>
							</div>
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
              <div class="row uniform 50%">
								<div class="12u">
									<input type="password" name="cpass" id="cpass" value="" placeholder="Confirma Contraseña" />
								</div>
							</div>
              <div class="row uniform 50%">
								<div class="12u">
									<input type="text" name="mail" id="mail" value="" placeholder="Correo electronico" />
								</div>
							</div>
							<div class="row uniform">
								<div class="12u">
									<ul class="actions align-center">
										<input type="hidden" name="id" id="id" value="<?php echo $id ?>"/>
										<li><input type="submit" value="Registrar" /></li>
									</ul>
								</div>
							</div>
						</form>
					</div>
				</section>
