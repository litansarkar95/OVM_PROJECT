<!Doctype html>
<html lang="en" class="no-js">
    <head>
        <!-- TITLE OF SITE -->
        <title><?php
                if (isset($title)) {
                    echo $title;
                }
                ?></title>

        <!-- favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>front-assts/assets/images/ovm.png">

        <!-- META DATA -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">


        <!--font-family-->
        <link href='https://fonts.googleapis.com/css?family=Fira+Sans:300,400,500,700|Libre+Baskerville' rel='stylesheet' type='text/css'>

        <!--font-awesome.min.css-->
        <link href="<?php echo base_url(); ?>front-assts/assets/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>		

        <!--smoothbox.css-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>front-assts/assets/css/smoothbox.css">

        <!-- Apply Responsive Menu CSS -->
        <link href="<?php echo base_url(); ?>front-assts/assets/css/responsive-menu.css" rel="stylesheet">

        <!--SLIDER REVOLUTION 4.x CSS SETTINGS-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>front-assts/rs-plugin/css/settings.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>front-assts/rs-plugin/css/dynamic-captions.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>front-assts/rs-plugin/css/static-captions.css" type="text/css" />

        <!--bootstrap.min.css-->
        <link href="<?php echo base_url(); ?>front-assts/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>front-assts/assets/css/bootstrap-progressbar.css" rel="stylesheet" type="text/css">

        <!--style.css-->
        <link href="<?php echo base_url(); ?>front-assts/assets/css/style.css" rel="stylesheet" type="text/css"/>

        <!--responsive.css-->
        <link href="<?php echo base_url(); ?>front-assts/assets/css/responsive.css" rel="stylesheet" type="text/css"/>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
                <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
                <script src="animate-legacy-support.js"></script>
        <![endif]-->

    </head>


    <body>
        <!-- Preloader start here -->
        <div class="preloader">
            <div class="loader">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <!-- Preloader end here -->


        <!-- Start header -->
        <div class="contain">
            <section id="header">
                <div class="container">
                    <ul class="top-left"> 
                        <li><i class="fa fa-phone"></i> +8801829107469</li>
                        <li><i class="fa fa-envelope"></i> <a href="#"></a> info@mail.com</li>
                    </ul>
                    <div class="bc">
                        <ul class="top-right">
                            <li class="bb">
                                <select class="selected">
                                    <option>English</option>
                                    <option>Bangla</option>
                                    <option>italiano</option>

                                </select>
                            </li>
                            <li class="bb"> 
                                <?php
                                $myid = $this->session->userdata("myid");
                                if ($myid) {
                                    ?>
                                    <a href="<?php echo base_url() ?>dashboard" ><i class="fa fa-dashboard"></i>dashboard</a>

                                <?php }
                                ?>
                            </li>
                            <li class="bb"> 
                                <?php
                                $myid = $this->session->userdata("myid");
                                if ($myid) {
                                    ?>
                                    <a href="<?php echo base_url() ?>logout" ><i class="fa fa-sign-out"></i> sign out</a>

                                    <?php
                                } else {
                                    ?>
                                    <a href="#" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-sign-in"></i> sign in</a>
                                    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <!-- Start .panel -->
                                                <div class="panel-body">
                                                    <form class="form-horizontal" action="<?php echo base_url() ?>login/insert" role="form"  method="post">
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <label>Email :</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control"  name="email" placeholder="Enter Email">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <label>Password :</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="input-group">
                                                                    <input type="password" name="password" class="form-control" placeholder="Your password">
                                                                </div>
                                                                <span class="help-block text-right"><a href="#">Forgot password ?</a></span> 
                                                            </div>
                                                        </div>
                                                        <div class="form-group ">
                                                            <div class="col-md-6 col-sm-6">
                                                                <div class="checkbox-custom">
                                                                    <input type="checkbox" value="option">
                                                                    <label>Remember me ?</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm-6">
                                                                <button class="btn btn-default pull-right hvr-rectangle-in" type="submit">Login</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- End .panel -->
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>

                            </li>
                        </ul>
                        <div class="h-icon">
                            <div class="icon">
                                <div class="t-bg"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></div>
                                <div class="t-bg"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></div>
                                <div class="t-bg"><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.container -->
            </section><!-- /.header -->
            <!-- End header -->



            <!-- Start Main-Menu -->
            <section id="main-menu">
                <div class="container">
                    <div class="wrapper">
                        <div class="brand">
                            <a class="navbar-brand" href="<?php echo base_url() ?>"><img src="<?php echo base_url(); ?>front-assts/assets/images/ovmlogo.png" alt="image" /></a>
                        </div>

                        <!-- START Responsive Menu HTML -->
                        <div class="rm-container">
                            <a class="rm-toggle rm-button rm-nojs" href="#">Menu</a>

                            <nav class="rm-nav rm-nojs rm-lighten">
                                <ul>
                                    <li class="active"><a href="<?php echo base_url() ?>">home</a></li>
                                    <li><a href="<?php echo base_url() ?>">about</a></li>
                                    <li><a href="<?php echo base_url() ?>politacal-party">party list</a></li>
                                    <li><a href="<?php echo base_url() ?>vote_system">Vote Now</a></li>
                                 
                                    <li><a href="<?php echo base_url() ?>">blog</a></li>
                                    <li><a href="<?php echo base_url() ?>contact">contact</a></li>
                                </ul>
                            </nav>
                        </div><!-- .rm-container -->
                        <!-- End Responsive Menu HTML -->
                    </div><!-- .wrapper -->
                </div><!-- /.container -->
            </section><!-- /#main-menu  -->
            <!-- End Main-Menu -->



            <!--Start revolution-slider-->
            <?php
            if (isset($slide)) {
                echo $slide;
            }
            ?>

            <!--#revolution-->
        </div>
        <!--End slider section-->

        <?php
        if (isset($content)) {
            echo $content;
        }
        ?>



        <!-- Start Footer -->
        <div class="contain">
            <section id="footer">
                <div class="footer">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3 col-sm-6">
                                <div class="f-content">
                                    <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>front-assts/assets/images/ovmlogo.png" alt="image" /></a>
                                    <p>The system We are going to build will provide solutions for the problems current manual system facing. Primary benefits that can be acquired by shifting to Online Voting Management System are as follows:</p>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <h5 class="title">Recent post</h5>
                                <div class="f-txt">
                                    <div class="f-img"><a href="#"><img src="<?php echo base_url(); ?>front-assts/assets/images/f5.jpg" alt="image" /></a></div>
                                    <p><a href="#">EVM proves prone to abuse</a> <br /><span>December 31, 2018</span></p>
                                </div>
                                <div class="f-txt">
                                    <div class="f-img"><a href="#"><img src="<?php echo base_url(); ?>front-assts/assets/images/f3.jpg" alt="image" /></a></div>
                                    <p><a href="#">The challenges of the EC</a> <br /><span>October 27th, 2018</span></p>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <h5 class="title">Recent tweets</h5>
                                <div class="f-txt1">
                                    <i class="fa fa-twitter"></i>
                                    <p>Every to @There are many variations of passages.twitter.com <br>8 hours ago</p>
                                </div>
                                <div class="f-txt1">
                                    <i class="fa fa-twitter"></i>
                                    <p>Every to @There are many variations of passages.twitter.com <br>8 hours ago</p>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <h5 class="title">contact us</h5>
                                <div class="f-txt">
                                    <i class="fa fa-map-marker"></i> Address :<br>148 East Raja Bazar , Dhaka
                                    <hr />
                                    <i class="fa fa-envelope"></i> email :<br>info@ovm.com<br>contact@ovm.com
                                </div>
                            </div>
                        </div>
                    </div><!-- /.container -->
                </div>
            </section><!-- /#footer -->
            <!-- End Footer -->



            <!-- Start Footer Menu -->
            <section id="f-menu">
                <div class="container">
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <div class="menu-txt">
                                    <p>&copy;Copyright 2019  <span>|</span>   OVM Templates   <span>|</span>   All Rights Reserved.</p>
                                </div>
                            </div>
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse">
                                <ul class="nav navbar-nav navbar-right">
                                    <li><a href="<?php echo base_url(); ?>">home</a></li>
                                    <li><a href="<?php echo base_url(); ?>">about</a></li>
                                    <li><a href="#">pages</a></li>
                                    <li><a href="<?php echo base_url(); ?>">blog</a></li>
                                    <li><a href="<?php echo base_url(); ?>contact" class="b-c">contact</a></li>
                                </ul>
                            </div><!-- /.navbar-collapse -->
                        </div><!-- /.container-fluid -->
                    </nav><!-- .navbar navbar-default -->
                    <!-- scroll-to-top -->
                    <div class="scroll-to-top">
                        <a href="#" id="scrollup"><i class="fa fa-angle-up"></i></a>
                    </div>
                    <!-- scroll-to-top -->
                </div><!-- /.container -->
            </section><!-- /#f-menu -->
        </div>
        <!-- End Footer Menu -->





        <!--jquery,bootstrap-->
        <script src="<?php echo base_url(); ?>front-assts/assets/js/jquery-1.11.3.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>front-assts/assets/js/bootstrap.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.js"></script>

        <!-- responsive menu -->
        <script src="<?php echo base_url(); ?>front-assts/assets/menu/responsive-menu.js" type="text/javascript"></script>

        <!--Isotope JS-->
        <script src="<?php echo base_url(); ?>front-assts/assets/js/imagesloaded.pkgd.min.js"></script>
        <script src="<?php echo base_url(); ?>front-assts/assets/js/isotope.function.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>front-assts/assets/js/isotope.pkgd.min.js" type="text/javascript"></script>

        <!-- smoothbox JS file -->
        <script type="text/javascript" src="<?php echo base_url(); ?>front-assts/assets/js/smoothbox.min.js"></script>

        <!--SLIDER REVOLUTION 4.x SCRIPTS-->
        <script type="text/javascript" src="<?php echo base_url(); ?>front-assts/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>front-assts/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

        <!-- Bootstrap-progress-bar -->
        <script type="text/javascript" src="<?php echo base_url(); ?>front-assts/assets/js/bootstrap-progressbar.js"></script>

        <!--gmaps-->
        <script src="http://maps.google.com/maps/api/js?key=AIzaSyBZ9LCkJO6IPkR-DndlDs5UPMeoDNKa7LA"></script>
        <script src="<?php echo base_url(); ?>front-assts/assets/js/gmaps.js"></script>

        <!--Custom JS-->
        <script src="<?php echo base_url(); ?>front-assts/assets/js/custom.js" type="text/javascript"></script>

    </body>
</html>