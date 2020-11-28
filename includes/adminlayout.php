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
                                    <a class="dropdown-item itemdl" href="administrador-verperfil.php">Ver perfil</a>
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
                    <li class=""><a class="scroll">Clientes</a></li>
                    <li><a class="scroll" href="">Test</a></li>
                    <li><a class="scroll" href="">Resultados</a></li>
                    <li><a class="scroll" href="administrador-verempleados.php">Usuarios</a></li>

                    <div class="clearfix"></div>
                </ul>

            </div>
        </div>
    </div>
</header>

<style>
    .dropdown-menu{
        padding-top: 16px;
    }
</style>