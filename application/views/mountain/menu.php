<nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                      <a href="<?php echo site_url('administracion'); ?>"><i class="fa fa-dashboard"></i> Resumen</a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-table"></i>Trekking<span class="fa arrow"></span></a>
                      <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php echo site_url('evento'); ?>">Nueva Salida</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('evento/ver_eventos'); ?>">Salidas de Trekking</a>
                        </li>
                      </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-sitemap"></i>Pack Trekking<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo site_url('pack'); ?>">Nuevo Pack</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('pack/ver_pack'); ?>">Lista de Packs</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="glyphicon glyphicon-user"></i>Usuarios<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo site_url('usuario'); ?>">Nuevo Usuario</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('usuario/ver_usuarios'); ?>">Lista de usuarios</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o"></i>Informes<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                            	<a href="<?php echo site_url('Ingresos/ingresos_eventos'); ?>">Ingresos Trekking</a>
                            	<a href="<?php echo site_url('Ingresos/ingresos_packs'); ?>">Ingresos Pack</a>
                                <!--<a href="<?php// echo site_url('informes/inscripciones'); ?>">Inscripciones</a>-->
                            </li>
                        </ul>
                    </li>
                    <li>
                      
                      <a href="<?php echo site_url('informes/depositos'); ?>"><i class="glyphicon glyphicon-download"></i>Depositos</a>
                    </li>
                    <li>
                        <a href="#"><i class="glyphicon glyphicon-share"></i>Campañas<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo site_url('campana'); ?>">Nueva Campaña</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-edit"></i>Parametros del sistema<span class="fa arrow"></span></a>
                      <ul class="nav nav-second-level">
                        <li>
                        	<a href="#"></i>Lugares para Trekking<span class="fa arrow"></span></a>
                            
                            <ul class="nav nav-third-level">
                            	<li><a href="<?php echo base_url(); ?>Ubicacion">Nuevo Lugar</a></li>
                            	<li><a href="<?php echo base_url(); ?>Ubicacion/ver_lugares">Lista de Lugares</a></li>
                            </ul>
                        </li>
                        <li>
                        	<a href="#"></i>Senderos para Lugares<span class="fa arrow"></span></a>
                            
                            <ul class="nav nav-third-level">
                            	<li><a href="<?php echo base_url(); ?>sendero">Nuevo Sendero</a></li>
                            	<li><a href="<?php echo base_url(); ?>sendero/ver_senderos">Lista de Lugares</a></li>
                            </ul>
                        </li>
                        <li>
                        	<a href="#"></i>Equipo técnico de usuarios<span class="fa arrow"></span></a>
                            
                            <ul class="nav nav-third-level">
                            	<li><a href="<?php echo base_url(); ?>equipo">Nuevo Equipo</a></li>
                            	<li><a href="<?php echo base_url(); ?>equipo/ver_equipos">Lista de Equipos</a></li>
                            </ul>
                        </li>
                        <li>
                           
                        </li>
                      </ul>
                    </li>
                    
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
