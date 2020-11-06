<header>
    <!-- banner -->
    <div class="banner">
        <div class="container">
            <div class="header">
                <div class="col-md-4 head-logo">
                    <h1><a href="#"><img src="assets/images/logo-oficial.png" alt="" /></a></h1>
                </div>
                <div class="col-md-4">
                    
                </div>
                <div class="col-md-4 social">

                    <div class="user">
                        <div class="user-contenedor">
                            <div class="dropdown">
                                <a class="ausername" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown">
                                    <div class="contenedor-right">
                                        <div class="username"> <?php echo $nombre . " " . $apellido ?></div>
                                        <div class="icon">
                                            <i class="fas fa-sort-down"></i>
                                        </div>
                                    </div>



                                </a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item itemdl" href="#">Ver perfil</a>
                                    <form id="frmLogout" name="frmLogout" method="post" action="procesar.php">
                                        <input type="hidden" name="accion" value="logout">
                                        <input type="submit" class="logout_btn" name="btnLogout" value="Cerrar Sesion">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="top-menu">
                <ul>
                    <li><a class="scroll" href="empleado.php">Clientes</a></li>
                    <li class=""><a class="scroll" href="empleado-vertest.php">Test</a></li>
                    <li><a class="scroll" href="empleado-verobjetivo.php">Objetivo</a></li>
                    <li><a class="scroll" href="">Resultados</a></li>
                    <div class="clearfix"></div>
                </ul>

            </div>
        </div>
    </div>
</header>