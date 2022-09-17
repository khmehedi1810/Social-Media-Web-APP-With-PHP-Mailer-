<?php 

  include "../inc/db.php"; 
  include "functions.php";
  ob_start();

  session_start();

  if ( !$_SESSION['con_security_email'] ){
    header("Location: index.php");
    session_unset();
    session_destroy();
  }

?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <title>Somadhan - Control Panel</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/materialpro-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <!-- chartist CSS -->
    <link href="assets/plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="assets/plugins/chartist-js/dist/chartist-init.css" rel="stylesheet">
    <link href="assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <!--This page css - Morris CSS -->
    <link href="assets/plugins/c3-master/c3.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <!-- <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div> -->
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand ms-4" href="">
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                           <h2 class="text-white pt-2">Somadhan</h2>
                        </span>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <a class="nav-toggler waves-effect waves-light text-white d-block d-md-none"
                        href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav d-lg-none d-md-block ">
                        <li class="nav-item">
                            <a class="nav-toggler nav-link waves-effect waves-light text-white "
                                href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav me-auto mt-md-0 ">
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->

                        
                    </ul>

                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-3">
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown con-logout">
                            <a class="custom-logout" href="inc/logout.php"><i
                                class="mdi mdi-power"></i>Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="dashboard.php" aria-expanded="false"><i class="mdi me-2 mdi-gauge"></i><span
                                    class="hide-menu">Dashboard</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="activeusers.php" aria-expanded="false">
                                    <i class="mdi me-2 mdi-account-check"></i><span class="hide-menu"> Active Users</span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="pendinguser.php" aria-expanded="false"><i class="mdi me-2 mdi-account-alert"></i><span class="hide-menu"> Pending Users</span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="categories.php" aria-expanded="false"><i class="mdi me-2 mdi-menu"></i><span class="hide-menu"> Post Categories</span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="pendingpost.php" aria-expanded="false">
                                <i class="mdi me-2 mdi-book-open-variant"></i><span class="hide-menu"> Pending Post</span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="publishpost.php" aria-expanded="false">
                                <i class="mdi me-2 mdi-emoticon"></i><span class="hide-menu"> Published Post</span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="reportedpost.php" aria-expanded="false"><i class="mdi me-2 mdi-table"></i><span
                                    class="hide-menu"> Reported Post</span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="publicrepresentatives.php" aria-expanded="false"><i class="mdi me-2 mdi-account-star"></i><span
                                    class="hide-menu"> সংসদ সদস্য</span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="security.php" aria-expanded="false"><i class="mdi me-2 mdi-security"></i><span
                                    class="hide-menu"> Security</span></a>
                        </li>
                        
                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
            <div class="sidebar-footer">
                <div class="row">
                    <div class="col-4 link-wrap">
                        <!-- item-->
                        <a href="https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox" target="_blank" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i
                                class="mdi mdi-gmail"></i></a>
                    </div>
                    <div class="col-4 link-wrap">
                        <!-- item-->
                        <a href="inc/logout.php" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i
                                class="mdi mdi-power"></i></a>
                    </div>
                </div>
            </div>
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  courseenrole.php -->
        <!-- ============================================================== -->

<!-- This section cannot visible to uses -->
<section class="sr-only">
    <!-- Count Teachers Active -->
    <?php 
        $countPubPost = 0;
        $findPubPost = "SELECT * FROM blog WHERE post_status = 'Published'";
        $selectAct_PubPost = mysqli_query($connection, $findPubPost);
        while ( $row = mysqli_fetch_assoc($selectAct_PubPost) )
        {
            $postId    = $row['post_id'];
            $countPubPost++;
            ?>
            <?php
        }
    ?>

    <?php 
        $countPenPost = 0;
        $findPenPost = "SELECT * FROM blog WHERE post_status = 'Pending'";
        $selectAct_PenPost = mysqli_query($connection, $findPenPost);
        while ( $row = mysqli_fetch_assoc($selectAct_PenPost) )
        {
            $postId    = $row['post_id'];
            $countPenPost++;
            ?>
            <?php
        }
    ?>

    <?php 
        $countrepPost = 0;
        $findrepPost = "SELECT DISTINCT post_id FROM report,blog WHERE blog_id = post_id";
        $selectAct_RepPost = mysqli_query($connection, $findrepPost);
        while ( $row = mysqli_fetch_assoc($selectAct_RepPost) )
        {
            $postId    = $row['post_id'];
            $countrepPost++;
            ?>
            <?php
        }
    ?>

    <?php 
        $countPenUser = 0;
        $findPenuser = "SELECT * FROM users WHERE active = 'NO'";
        $selectAct_PenUser = mysqli_query($connection, $findPenuser);
        while ( $row = mysqli_fetch_assoc($selectAct_PenUser) )
        {
            $postId    = $row['post_id'];
            $countPenUser++;
            ?>
            <?php
        }
    ?>



</section>