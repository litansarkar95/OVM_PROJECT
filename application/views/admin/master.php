<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title><?php
                if (isset($title)) {
                    echo $title;
                }
                ?></title>
 <!-- favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>front-assts/assets/images/ovm.png">

        <!-- BOOTSTRAP STYLES-->
        <link href="<?php echo base_url(); ?>admin_panel/assets/css/bootstrap.css" rel="stylesheet" />
        <!-- FONTAWESOME STYLES-->
        <link href="<?php echo base_url(); ?>admin_panel/assets/css/font-awesome.css" rel="stylesheet" />
        <!--CUSTOM BASIC STYLES-->
        <link href="<?php echo base_url(); ?>admin_panel/assets/css/basic.css" rel="stylesheet" />
        <!--CUSTOM MAIN STYLES-->
        <link href="<?php echo base_url(); ?>admin_panel/assets/css/custom.css" rel="stylesheet" />
        <!-- TABLE STYLES-->
        <link href="<?php echo base_url() ?>admin_panel/assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
        <!-- GOOGLE FONTS-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
        <!--- chart -->
        <link rel="stylesheet" href="<?php echo base_url() . 'assets/chart/css/morris.css' ?>">
            <!-- JQUERY SCRIPTS -->
            <script type="text/javascript" src="<?php echo base_url(); ?>admin_panel/assets/js/jquery_ui/jquery-ui.min.js"></script>

            <script src="<?php echo base_url(); ?>admin_panel/assets/js/jquery-1.10.2.js"></script>
    </head>
    <body>
        <div id="wrapper">
            <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo base_url() ?>">Online Voting System</a>
                </div>

                <div class="header-right">

                    <a href="" class="btn btn-info" title="New Message"><b>0 </b><i class="fa fa-envelope-o fa-2x"></i></a>
                    <a href="" class="btn btn-primary" title="New Task"><b>0 </b><i class="fa fa-bars fa-2x"></i></a>
                    <a href="<?php echo base_url() ?>logout" class="btn btn-danger" title="Logout"><i class="fa fa-exclamation-circle fa-2x"></i></a>


                </div>
            </nav>
            <!-- /. NAV TOP  -->
            <nav class="navbar-default navbar-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="main-menu">
                        <li>
                            <div class="user-img-div">
                                <img src="<?php echo base_url(); ?>front-assts/assets/images/ovmlogo.png" class="img-thumbnail" />

                                <div class="inner-text">
                                    User Name
                                    <br />
                                    <small>Last Login : 1 day Ago </small>
                                </div>
                            </div>

                        </li>


                        <li>
                            <a <?php
                            if (isset($active_menu)) {
                                if ($active_menu == "dashboard") {
                                    echo 'class="active-menu"';
                                }
                            }
                            ?>  href="<?php echo base_url() ?>dashboard"><i class="fa fa-dashboard "></i>Dashboard</a>
                        </li>
                        <li>
                            <a   href=""><i class="fa fa-desktop "></i>Create <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <li>
                                        <a
                                        <?php
                                        if (isset($active_menu)) {
                                            if ($active_menu == "candidate") {
                                                echo 'class="active-menu"';
                                            }
                                        }
                                        ?>
                                            href="<?php echo base_url() ?>candidate"><i class="fa fa-toggle-on "></i>Create Candidate</a>
                                    </li>
                                    <li>
                                        <a
                                        <?php
                                        if (isset($active_menu)) {
                                            if ($active_menu == "voter") {
                                                echo 'class="active-menu"';
                                            }
                                        }
                                        ?>
                                            href="<?php echo base_url() ?>voter"><i class="fa fa-toggle-on "></i>Create Voter</a>
                                    </li>
                                    <li>
                                        <a
                                        <?php
                                        if (isset($active_menu)) {
                                            if ($active_menu == "divisions") {
                                                echo 'class="active-menu"';
                                            }
                                        }
                                        ?>
                                            href="<?php echo base_url() ?>divisions"><i class="fa fa-toggle-on "></i>Create Divisions</a>
                                    </li>
                                    <li>
                                        <a
                                        <?php
                                        if (isset($active_menu)) {
                                            if ($active_menu == "district") {
                                                echo 'class="active-menu"';
                                            }
                                        }
                                        ?>
                                            href="<?php echo base_url() ?>district"><i class="fa fa-toggle-on "></i>Create District</a>
                                    </li>
                                    <li>
                                        <a
                                        <?php
                                        if (isset($active_menu)) {
                                            if ($active_menu == "candidate_area") {
                                                echo 'class="active-menu"';
                                            }
                                        }
                                        ?> href="<?php echo base_url() ?>candidate_area"><i class="fa fa-toggle-on "></i>Create Candidate Area</a>
                                    </li>

                                    <li>
                                        <a
                                        <?php
                                        if (isset($active_menu)) {
                                            if ($active_menu == "party_list") {
                                                echo 'class="active-menu"';
                                            }
                                        }
                                        ?> href="<?php echo base_url() ?>party_list"><i class="fa fa-toggle-on "></i>Create Party List</a>
                                    </li>


                            </ul>
                        </li>

                        <li>
                            <a
                            <?php
                            if (isset($active_menu)) {
                                if ($active_menu == "voter") {
                                    echo 'class="active-menu"';
                                }
                            }
                            ?>
                                href="<?php echo base_url() ?>voter"><i class="fa fa-flash "></i>Create Voter</a>
                        </li> 
                        <li>
                            <a
                            <?php
                            if (isset($active_menu)) {
                                if ($active_menu == "voterview") {
                                    echo 'class="active-menu"';
                                }
                            }
                            ?>
                                href="<?php echo base_url() ?>voter/view"><i class="fa fa-flash "></i>Voter View</a>
                        </li> 
                        <li>
                            <a
                            <?php
                            if (isset($active_menu)) {
                                if ($active_menu == "candidateview") {
                                    echo 'class="active-menu"';
                                }
                            }
                            ?>
                                href="<?php echo base_url() ?>candidate/view"><i class="fa fa-flash "></i>Candidate View</a>
                        </li>        
                        <li>
                            <a
                            <?php
                            if (isset($active_menu)) {
                                if ($active_menu == "registration") {
                                    echo 'class="active-menu"';
                                }
                            }
                            ?>
                                href="<?php echo base_url() ?>registration"><i class="fa fa-flash "></i>Registration</a>
                        </li> 

                        <li>
                            <a   href=""><i class="fa fa-desktop "></i>Report<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <li>
                                        <a
                                        <?php
                                        if (isset($active_menu)) {
                                            if ($active_menu == "report") {
                                                echo 'class="active-menu"';
                                            }
                                        }
                                        ?>
                                            href="<?php echo base_url() ?>report/vote"><i class="fa fa-toggle-on "></i>Vote Report</a>
                                    </li>
                                    <li>
                                        <a
                                        <?php
                                        if (isset($active_menu)) {
                                            if ($active_menu == "vote_details") {
                                                echo 'class="active-menu"';
                                            }
                                        }
                                        ?>
                                            href="<?php echo base_url() ?>report/vote_details"><i class="fa fa-toggle-on "></i>Result Report</a>
                                    </li>
                                    <li>
                                        <a
                                        <?php
                                        if (isset($active_menu)) {
                                            if ($active_menu == "voter_vote") {
                                                echo 'class="active-menu"';
                                            }
                                        }
                                        ?>
                                            href="<?php echo base_url() ?>report/voter_vote"><i class="fa fa-toggle-on "></i>voter vote</a>
                                    </li>
                                    <li>
                                        <a
                                        <?php
                                        if (isset($active_menu)) {
                                            if ($active_menu == "district") {
                                                echo 'class="active-menu"';
                                            }
                                        }
                                        ?>
                                            href="<?php echo base_url() ?>district"><i class="fa fa-toggle-on "></i>Create District</a>
                                    </li>





                            </ul>
                        </li>
                   

                    </ul>
                </div>

            </nav>
            <!-- /. NAV SIDE  -->
            <div id="page-wrapper">
                <!---  content page -->
                <?php
                if (isset($content)) {
                    echo $content;
                }
                ?>
                <!-- /. PAGE WRAPPER  -->
            </div>
            <!-- /. WRAPPER  -->
            <div id="footer-sec">
                &copy; 2019 Versity Project | Design & Develop By : <a href="http://www.binarytheme.com/" target="_blank">Jewel Dhali & Litan Sarkar </a>
            </div>
            <!-- /. FOOTER  -->
            <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->

            <!-- BOOTSTRAP SCRIPTS -->
            <script src="<?php echo base_url(); ?>admin_panel/assets/js/bootstrap.js"></script>
            
            <!-- METISMENU SCRIPTS -->
            <script src="<?php echo base_url(); ?>admin_panel/assets/js/jquery.metisMenu.js"></script>
            <!-- DATA TABLE SCRIPTS -->
            <script src="<?php echo base_url() ?>admin_panel/assets/js/dataTables/jquery.dataTables.js"></script>
            <script src="<?php echo base_url() ?>admin_panel/assets/js/dataTables/dataTables.bootstrap.js"></script>
            
            <script>
                $(document).ready(function () {
                    $('#dataTables-example').dataTable();
                });
            </script>
            <!-- CUSTOM SCRIPTS -->
            <script src="<?php echo base_url() ?>admin_panel/assets/js/custom.js"></script>
            


    </body>
</html>
