<?php
session_start();
date_default_timezone_set('America/Guayaquil');
$login = FALSE;
if (isset($_SESSION['_USU'])) {
    $login = TRUE;
    foreach ($_SESSION['_USU'] as $key => $value) {
        $USER_PROFILE[] = $value;
    }


    /* include_once './dominio/menu.php';
      $header = new Menu();
      $menu = $header->GetMenu($_SESSION['_USU']['prfle_id']);
      $ROL_SA = (boolean) ((int) $_SESSION['_USU']['prfle_id'] === 1 ? TRUE : FALSE);//SuperAdmin
      $ROL_AD = (boolean) ((int) $_SESSION['_USU']['prfle_id'] === 2 ? TRUE : FALSE);//Analyst
      $ROL_AL = (boolean) ((int) $_SESSION['_USU']['prfle_id'] === 3 ? TRUE : FALSE);//
      $RO */
}
?>
<style media="screen">
    *{
      /*  border: 1px solid #C00;*/


    }
    *{
        font-size: 12px;
        text-transfor: uppercase;
    }
</style>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Traslados</title>

        <link rel='shortcut icon' href='./View/images/239360-transfer_arrows-512.png' type='image/x-icon' sizes="65x50"/>
        <!-- Bootstrap Core CSS -->

        <link href="./View/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <!-- Custom CSS -->
        <link href="./View/css/sb-admin.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="./View/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="./View/css/indexstyle.css" rel="stylesheet" type="text/css"/>

        <!-- jQuery -->
        <script src="./View/js/jquery.js" type="text/javascript"></script>

        <script src="./View/js/bootstrap.min.js" type="text/javascript"></script>
        <!--Customize-->
        <link href="./View/components/css/customize.css" rel="stylesheet" type="text/css"/>
        <script src="./View/components/js/customize.js" type="text/javascript"></script>
        <!--Utils-->
        <script src="./Utilitarian/js/utils.js" type="text/javascript"></script>

    </head>

    <body style=" font-size: 14px; ">
        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <?php
                if ($login) {

                    /* switch ($USER_PROFILE[0]['prfle_id']) {
                      case 1:
                      include_once ('./View/top_memu_items.php');
                      include_once ('./View/sidebar_menu_items.php');

                      break;
                      case 2:

                      break;
                      default:
                      // code...
                      break;
                      } */
                    include_once ('./View/top_memu_items.php');
                    include_once ('./View/sidebar_menu_items.php');
                }
                ?>


                <!-- /.navbar-collapse -->
            </nav>

            <div id="page-wrapper">
                <div class="container-fluid" style="font-size: 12px;" >
                    <?php
                    if ($login) {
                        if (isset($_GET['page'])) {

                            require './View/' . $_GET['page'] . '.php';
                        } else {
                            require './View/home.php';
                        }
                    } else {
                        include_once("./View/login.php");

                    }
                    ?>
                </div>


            </div>
            <!-- /#Waiting -->
            <div class="modal modal-danger fade" id="waiting">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">

                        </div>
                        <div class="modal-body">
                            <span style="color: red;"> Espere por favor. </span></spam><img id="loader" src="./View/images/giphy.gif"/>
                        </div>

                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>

    </body>

</html>
