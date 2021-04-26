<ul class="nav navbar-right top-nav">
    <li class="dropdown">
      <!--   <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
     <ul class="dropdown-menu message-dropdown">
            <li class="message-preview">
                <a href="#">
                    <div class="media">
                        <span class="pull-left">
                            <img class="media-object" src="" alt="">
                        </span>
                        <div class="media-body">
                            <h5 class="media-heading"><strong>Administrador</strong>
                            </h5>
                            <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                            <p>Lorem ipsum dolor sit amet, consectetur...</p>
                        </div>
                    </div>
                </a>
            </li>
            <li class="message-preview">
                <a href="#">
                    <div class="media">
                        <span class="pull-left">
                            <img class="media-object" src="" alt="">
                        </span>
                        <div class="media-body">
                            <h5 class="media-heading"><strong>John Smith</strong>
                            </h5>
                            <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                            <p>Lorem ipsum dolor sit amet, consectetur...</p>
                        </div>
                    </div>
                </a>
            </li>
            <li class="message-preview">
                <a href="#">
                    <div class="media">
                        <span class="pull-left">
                            <img class="media-object" src="" alt="">
                        </span>
                        <div class="media-body">
                            <h5 class="media-heading"><strong>John Smith</strong>
                            </h5>
                            <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                            <p>Lorem ipsum dolor sit amet, consectetur...</p>
                        </div>
                    </div>
                </a>
            </li>
            <li class="message-footer">
                <a href="#">Read All New Messages</a>
            </li>
        </ul>
    </li>-->
    <div class="navbar-header">
        <a class="" href="?pagina=home"><?php echo "" . isset($_SESSION['_USU'][0]['crs_description']) ? $_SESSION['_USU'][0]['crs_description'] :""; ?></a>
    </div>
    <!--<div class="navbar-header">
        <a class="navbar-brand" href="?pagina=home"><img class="user-login" src="./View/images/Snai.png" style=""  ></a>
    </div>-->
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?php echo "" . $_SESSION['_USU'][0]['usr_name']; ?><b class="caret"></b></a>
        <input type="text" value="<?php echo "" . isset($_SESSION['_USU'][0]['usr_id']) ? $_SESSION['_USU'][0]['usr_id']: "";  ?>" id="txtIdUser" hidden=""/>
        <input type="text" value="<?php echo "" . isset($_SESSION['_USU'][0]['prfle_id'] ) ? $_SESSION['_USU'][0]['prfle_id'] :"" ?>" id="txtPrfle_id" hidden=""/>
        <input type="text" value="<?php echo "" . isset($_SESSION['_USU'][0]['crs_id']) ? $_SESSION['_USU'][0]['crs_id']: ""; ?>" id="crs_id" hidden="" />
        <ul class="dropdown-menu">
            <li>
                <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
            </li>
            <li class="divider"></li>
            <li>
                <a href="./View/login.php?exit=1"><i class="fa fa-fw fa-power-off"></i> Salir</a>
            </li>
        </ul>
    </li>
</ul>
