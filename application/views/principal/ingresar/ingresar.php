
			<!-- Main -->
				<section id="main" class="container 75%">
					<header>
						<h2>Ingresa al portal</h2>
						<p>Tell us what you think about our little operation.</p>
					</header>
					<div class="box">
						<form method="post" action="<?php echo base_url(); ?>cliente/ingresar">
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
