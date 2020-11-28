<?php
//cambio
?>

<head>
    <title>TestA/B</title>
    <!-- Meta-Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <!-- //Meta-Tags -->
    <!-- Index-Page-CSS -->
    <link rel="stylesheet" href="assets/style.css" type="text/css" media="all">
    <!-- //Custom-Stylesheet-Links -->
    <link rel="stylesheet" href="assets/datatables/datatables.min.css">
    <link rel="stylesheet" href="assets/datatables/DataTables-1.10.22/css/dataTables.bootstrap4.min.css">
    <!--fonts -->
    <!-- //fonts -->
    <script src="https://kit.fontawesome.com/122bb03e13.js" crossorigin="anonymous"></script>
    <!-- //Font-Awesome-File-Links -->
    <!-- Google fonts -->
    <link href="//fonts.googleapis.com/css?family=Quattrocento+Sans:400,400i,700,700i" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Mukta:200,300,400,500,600,700,800" rel="stylesheet">
    <!-- Google fonts -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <script src="assets/jquery/dist/jquery.min.js"></script>
    <script src="assets/Scripts/Usuario.js"> </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>
<!-- //Head -->
<!-- Body -->

<body>


    <style>
        a,
        a:hover {
            color: #fc636b;
        }

        .custom-checkbox .custom-control-input:checked~.custom-control-label::before {
            background-color: #fc636b;
            border-radius: 0px;
        }

        input:focus {
            color: #000;
        }

        input:not(:focus) {
            color: #000;
        }

        .down {
            display: flex;
            justify-content: space-between;
        }

        .custom-control-label {
            margin-bottom: 0;
            color: #ffff;
        }

        .custom-control-label::before {
            display: none;
        }
    </style>



    <section class="main">
        <div class="layer">
            <div class="content-w3ls">
                <div class="text-center test">
                    <img src="assets/images/logo-blanco.png" class="logopng" />
                </div>
                <div class="content-bottom">
                    <form id="form_login" action="" name="form_login" method="post">
                        <div class="field-group">
                            <span class="fa fa-envelope" aria-hidden="true"></span>
                            <div class="wthree-field">
                                <input class="placeholder" name="email" type="text" id="email" value="" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="field-group">
                            <span class="fa fa-lock" aria-hidden="true"></span>
                            <div class="wthree-field">
                                <input class="placeholder" name="password" id="myInput" type="Password" placeholder="Password">
                            </div>
                        </div>


                        <!-- Default unchecked -->
                        <div class="down">
                            <div class=" ">
                                <input type="checkbox" value="lsRememberMe" id="rememberMe">
                                <label class="custom-control-label" for="customCheck1">Remember Me</label>
                            </div>
                            <div class="forgot">
                                <a class="text-right" href="recuperaContra.php">forgot password?</a>
                            </div>
                        </div>





                        <div class="wthree-field">
                            <input type="hidden" name="accion" value="login">
                            <button type="button" id="btn_login" name="btn_login" class="btn" onclick="lsRememberMe()">Login</button>
                        </div>


                    </form>
                </div>
            </div>
            <div class="bottom-grid1">




            </div>
        </div>
    </section>

    <script type="text/javascript" charset="utf8" src="assets/datatables/datatables.js"></script>



</body>


<script>
    const rmCheck = document.getElementById("rememberMe"),
        emailInput = document.getElementById("email");

    if (localStorage.checkbox && localStorage.checkbox !== "") {
        rmCheck.setAttribute("checked", "checked");
        emailInput.value = localStorage.username;
    } else {
        rmCheck.removeAttribute("checked");
        emailInput.value = "";
    }

    function lsRememberMe() {
        if (rmCheck.checked && emailInput.value !== "") {
            localStorage.username = emailInput.value;
            localStorage.checkbox = rmCheck.value;
        } else {
            localStorage.username = "";
            localStorage.checkbox = "";
        }
    }
</script>