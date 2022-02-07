<?php
session_start();
date_default_timezone_set('America/Guayaquil');
$login = FALSE;
if (isset($_SESSION['_USU'])) {
    if ((time() - $_SESSION['time']) > 60) {
        header('location: ./View/logout_page.php');
    }

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
        /*border: 1px solid #C00;*/
    }
    *{
        /*font-size: 12px;*/
        text-transfor: uppercase;
    }

    /*******************************Sidear*****************************************/
    .sidebar {
        height: 100%;
        width: 0;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #111;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
    }

    .sidebar a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 15px;
        color: #818181;
        display: block;
        transition: 0.3s;
    }

    /**********************color for comments placeholder*************************************/
    ::placeholder {
        color: red;
        opacity: 1; /* Firefox */
    }

    :-ms-input-placeholder { /* Internet Explorer 10-11 */
        color: red;
    }

    ::-ms-input-placeholder { /* Microsoft Edge */
        color: red;
    }

    .sidebar a:hover {
        color: #f1f1f1;
    }

    .sidebar .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
    }

    .openbtn {
        font-size: 20px;
        cursor: pointer;
        background-color: #111;
        color: white;
        padding: 10px 15px;
        border: none;
    }

    .openbtn:hover {
        background-color: #444;
    }

    #main {
        transition: margin-left .5s;
        padding: 16px;
    }

    /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
    @media screen and (max-height: 450px) {
        .sidebar {
            padding-top: 15px;
        }
        .sidebar a {
            font-size: 18px;
        }
    }




</style>

<!DOCTYPE html>
<html lang="es">
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
            <div id="main">
                <button class="openbtn" onclick="openNav()">☰</button>  
                <!--div id="page-wrapper">
                    <div class="container-fluid" style="font-size: 12px; "-->

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
    </div>
</body>
<script>
    function openNav() {
        document.getElementById("mySidebar").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
    }

    function closeNav() {
        document.getElementById("mySidebar").style.width = "0";
        document.getElementById("main").style.marginLeft = "0";
    }
</script>
</html>
