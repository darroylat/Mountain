<nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                      <a href="<?php echo base_url(); ?>administracion/index"><i class="fa fa-home"></i> Inicio</a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-edit"></i> Agregar<span class="fa arrow"></span></a>
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
                    <li>
                      <a href="#"><i class="fa fa-table"></i> Eventos<span class="fa arrow"></span></a>
                      <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php echo base_url(); ?>administracion/evento/nuevo">Nueva Salida</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>administracion/evento/ver">Ver Salidas</a>
                        </li>
                      </ul>
                    </li>

                    <li>
                        <a class="active-menu" href="index"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-sitemap"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">Second Level Link</a>
                            </li>
                            <li>
                                <a href="#">Second Level Link</a>
                            </li>
                            <li>
                                <a href="#">Second Level Link<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Third Level Link</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Link</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Link</a>
                                    </li>

                                </ul>

                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="empy_page"><i class="fa fa-fw fa-file"></i> Empty Page</a>
                    </li>
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
