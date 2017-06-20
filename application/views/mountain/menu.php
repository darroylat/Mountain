<nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                      <a href="<?php echo site_url('administracion'); ?>"><i class="fa fa-dashboard"></i> Inicio</a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-table"></i> Salidas de Trekking<span class="fa arrow"></span></a>
                      <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php echo site_url('evento'); ?>">Nueva Salida</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('evento/ver_eventos'); ?>">Informe Salidas</a>
                        </li>
                      </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-sitemap"></i>Pack Lugares<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo site_url('pack'); ?>">Crear Pack</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('pack/ver_pack'); ?>">Informe Packs</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-sitemap"></i>Usuarios<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo site_url('usuario'); ?>">Crear Usuarios</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('usuario/ver_usuarios'); ?>">Bucar usuario</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-edit"></i>Parametros<span class="fa arrow"></span></a>
                      <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php echo base_url(); ?>administracion/lugar/nuevo">Nueva Ubicacion</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>administracion/sendero/nuevo">Nuevo Sendero</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>administracion/equipamiento/nuevo">Nuevo Equipamiento</a>
                        </li>
                      </ul>
                    </li>
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
