<?php
require './valida-acceso.php';
$nombre = $_SESSION["datos-usuario"]["nombre"];
$apellido = $_SESSION["datos-usuario"]["apellido"];
$rol = $_SESSION["datos-usuario"]["rol"];
?>
<?php if ($rol == "administrador") { ?>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Test A/B</title>
        <link rel="stylesheet" href="assets/bootstrap.css" />
        <link rel="stylesheet" href="assets/styleLay.css" />
        <link rel="stylesheet" href="assets/Layout.css" />


        <script src="https://kit.fontawesome.com/122bb03e13.js" crossorigin="anonymous"></script>

        <style>
            .top-menu {
                width: 95%;
                margin: 10px;
            }

            .top-menu ul {
                display: flex;
                justify-content: center;
            }

            .top-menu ul li {
                margin-left: 85px;
            }

            .ausername:hover {
                text-decoration: none !important;
                color: #70ccd1 !important;
                border-bottom: 1px solid #70ccd1 !important;
            }

            .ausername:focus {
                color: #70ccd1 !important;
                text-decoration: none !important;
            }

            .itemdl:hover {
                text-decoration: none !important;
                color: #70ccd1 !important;
            }

            .itemdl {
                margin-top: 10px;
                letter-spacing: 1px;
                font-family: 'Raleway', sans-serif;
            }

            /*
                    ESTILOS BTN LOGOUT
                */
            .logout_btn {
                margin-top: 10px;
                border: none;
                background: #ffff;
            }

            .logout_btn:hover {
                color: #70ccd1 !important;
            }

            
        </style>

    </head>

    <body>
        <?php
        include './includes/adminlayout.php';
        ?>

        


        <script src="assets/jquery/dist/jquery.min.js"></script>
        <script src="assets/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    </body>

    </html>
<?php } else { ?>

<?php
    header('Location:empleado.php');
}
?>