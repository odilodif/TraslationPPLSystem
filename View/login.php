<?php
if (isset($_GET['exit']) && $_GET['exit'] == 1) {
    session_start();
    $_SESSION['_USU'] = NULL;
    session_destroy();
    header("Location:../index.php");
}
?>


<script type="text/javascript">



</script>



<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sistema Traslados PPL</title>
        <meta name="description" content="Control de taxis online" />
        <meta name="keywords" content="css3, login, form, custom, input, submit, button, html5, placeholder" />
        <meta name="author" content="Odilo Ipiales" />
        <link rel="stylesheet" type="text/css" href="./View/components/css/login.css" />
        <script src="./View/components/js/modernizr.custom.63321.js"></script>
        <script src="./View/js/login.js"></script>
    </head>
    <body>
        <div class="title-login">
            <h1></h1>

        </div>


        <section class="main">
            <div align="center" >
                <!--img src="./View/images/Encabezado2.jpg" /-->
                <h1> SysTra <span style="font-size: 18px">Sistema de Gestion y Traslados SNAI</span></h1>
            </div>

            <form  action="" method="POST" onsubmit="return false;" style="max-width: 40%;" id="frmLogin" >
                <table style="margin-left: 75px;     margin-top: 20px;">
                    <tr>
                        <td>
                             <p class="field">
                        <input type="text"  id="nick" placeholder="Username"  >
                        <i class="fa fa-user fa-2x"></i>
                    </p>
                        </td>

                    </tr>
                    <tr>
                        <td>
                              <p class="field">
                        <input type="password"  id="password" placeholder="Password"  >
                        <i class="fa fa-lock fa-2x"></i>
                    </p>
                        </td>


                    </tr>
                </table>
                <input type="submit" class="btn btn-primary" value="INGRESAR" style="margin-left: 75px" onclick="validateUser()"/>

            </form>

        </section>


    </body>
</html>
