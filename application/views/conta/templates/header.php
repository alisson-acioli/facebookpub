<!doctype html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title><?php echo website_config('nome_site');?> | <?php echo $titulo;?></title>
<meta name="description" content="<?php echo website_config('descricao_site');?>">
<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
<!-- core plugins -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/css/bootstrap.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/css/hamburgers.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/bower_components/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/bower_components/perfect-scrollbar/css/perfect-scrollbar.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/bower_components/switchery/dist/switchery.min.css">
<!-- plugins for the current page -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/bower_components/chartist/dist/chartist.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/jvectormap/jquery-jvectormap.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/owl-carousel/owl.carousel.css">
<!-- theme customizier -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/examples/css/theme-customizer.css">
<!-- site-wide styles -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/site.css">
<!-- current page styles -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/examples/css/dashboards/dashboard.v1.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/bower_components/sweetalert/dist/sweetalert.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/examples/css/demos/form.wizard.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/bower_components/clockpicker/dist/bootstrap-clockpicker.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/bower_components/bootstrap-daterangepicker/daterangepicker.css">

<style>
@import url('https://fonts.googleapis.com/css?family=Roboto:300,400,500,600');
@import url('https://fonts.googleapis.com/css?family=Raleway:300,400,500');
</style>
<script src="<?php echo base_url();?>assets/vendor/bower_components/breakpoints.js/dist/breakpoints.min.js"></script><script src="<?php echo base_url();?>assets/vendor/js/svg4everybody.min.js"></script><script>Breakpoints({xs: {min:0,max:575},sm: {min:576,max:767},md: {min:768,max:991},lg: {min:992,max:1199},xl: {min:1200,max:Infinity}});
svg4everybody();
</script>
</head>
<body class="menubar-left menubar-inverse dashboard dashboard-v1">
<!--[if lt IE 10]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<nav class="site-navbar navbar fixed-top navbar-toggleable-md navbar-light bg-faded">
<div class="navbar-header">
   <a class="navbar-brand" href="index.html">
      <svg class="flip-y" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 32 32">
         <path fill="currentColor" d="M30.063 2.585c-.253-1.023-.758-1.754-1.5-2.17-3.28-1.842-9.02 3.577-11.05 6.88-.65 1.06-1.275 2.358-1.792 3.718-1.486-.21-2.95-.098-4.366.337C6.954 12.694 4 16.975 4 22v2c0 4.337 3.663 8 8 8h1.98c5.31 0 9.803-3.664 10.682-8.714.33-1.89.142-3.807-.54-5.585 1.26-1.2 2.43-2.587 3.268-3.886 1.646-2.554 3.46-8.062 2.673-11.23zM12 23c-1.105 0-2-.895-2-2s.895-2 2-2 2 .895 2 2-.895 2-2 2z"/>
         <path data-color="color-2" fill="#52c03b" d="M10.77 9.437c1.14-.35 2.32-.527 3.506-.527h.148c.424-.954.888-1.846 1.37-2.633-1.106-2.466-2.56-4.72-4.01-5.71-.7-.477-1.387-.656-2.04-.528-.442.086-1.08.37-1.594 1.23C7 3.19 6.89 7.465 7.457 11.06c1-.7 2.108-1.255 3.312-1.623z"/>
      </svg>
      <span class="brand-name hidden-fold"><?php echo website_config('nome_site');?></span> 
   </a>
   <button data-toggle="menubar" class="mr-auto hidden-lg-up hamburger hamburger--collapse js-hamburger" type="button">
      <span class="hamburger-box">
         <span class="hamburger-inner"></span>
      </span>
   </button>

   <button type="button" class="navbar-toggler hidden-lg-up collapsed" data-toggle="navbar-search">
      <span class="sr-only">Toggle navigation</span>
      <span class="zmdi zmdi-hc-lg zmdi-search"></span>
   </button> 

   <button type="button" class="navbar-toggler hidden-lg-up collapsed" data-toggle="collapse" data-target="#site-navbar-collapse" aria-expanded="false">
      <span class="sr-only">Toggle navigation</span>
      <span class="zmdi zmdi-hc-lg zmdi-more"></span>
   </button>
</div>
<!-- /.navbar-header -->
<div class="collapse navbar-collapse" id="site-navbar-collapse">
   <ul class="navbar-nav mr-auto">
      <li class="nav-item hidden-xl-up hidden-md-down"><a class="nav-link" href="#"><button data-toggle="menubar" class="hamburger hamburger--arrowalt js-hamburger" type="button"><span class="hamburger-box"><span class="hamburger-inner"></span></span></button></a></li>
      <li class="nav-item dropdown">
         <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
               <g fill="none" stroke-linecap="round" stroke-miterlimit="10" stroke-linejoin="round">
                  <path data-color="color-2" stroke="currentColor" d="M15.5 20.5c0 1.7-1.3 3-3 3s-3-1.3-3-3"/>
                  <path stroke="currentColor" d="M19.5 13.5v-5c0-3.9-3.1-7-7-7s-7 3.1-7 7v5c0 4-2 7-2 7h18s-2-3-2-7z"/>
               </g>
            </svg>
            <span class="badge badge-circle badge-danger">4</span>
         </a>
         <div class="media-list dropdown-menu p-0" data-plugin="dropdownCaret">
            <div class="dropdown-item dropdown-menu-cap d-flex"><span class="mr-auto my-1">Você tem 4 notificações não lidas</span> <a href="#" class="btn btn-sm btn-secondary my-1">Ver todas</a></div>
            <div class="scroll-container">
               <a href="javascript:void(0)" class="media dropdown-item">
                  <span class="avatar bg-success" data-plugin="firstLitter" data-target="#message-1"></span>
                  <div class="media-body">
                     <h6 class="media-heading" id="message-1">Mohamed Ali</h6>
                     <small>Lorem ipsum dolor sit amet, Lorem ipsum dolor.</small>
                  </div>
               </a>
               <a href="javascript:void(0)" class="media dropdown-item">
                  <span class="avatar bg-warning" data-plugin="firstLitter" data-target="#message-2"></span>
                  <div class="media-body">
                     <h6 class="media-heading" id="message-2">Sophia Smith</h6>
                     <small>Lorem ipsum dolor sit amet, Lorem ipsum dolor.</small>
                  </div>
               </a>
               <a href="javascript:void(0)" class="media dropdown-item">
                  <span class="avatar bg-primary" data-plugin="firstLitter" data-target="#message-3"></span>
                  <div class="media-body">
                     <h6 class="media-heading" id="message-3">Sarah Adams</h6>
                     <small>Lorem ipsum dolor sit amet, Lorem ipsum dolor.</small>
                  </div>
               </a>
               <a href="javascript:void(0)" class="media dropdown-item">
                  <span class="avatar bg-danger" data-plugin="firstLitter" data-target="#message-4"></span>
                  <div class="media-body">
                     <h6 class="media-heading" id="message-4">John Doe</h6>
                     <small>Lorem ipsum dolor sit amet, Lorem ipsum dolor.</small>
                  </div>
               </a>
            </div>
            <!-- /.scroll-container -->
         </div>
         <!-- /.media-list -->
      </li>
      <li class="nav-item dropdown">
         <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img class="nav-img" src="<?php echo base_url();?>assets/global/images/flags/United-States-of-America.png" alt="">
            <span class="nav-text hidden-sm-down ml-2">English</span> 
            <i class="nav-caret hidden-sm-down zmdi zmdi-hc-sm zmdi-chevron-down"></i>
         </a>
         <div class="dropdown-menu p-0" data-plugin="dropdownCaret">
            <a class="dropdown-item dropdown-menu-cap">2 Linguagens</a>
            <a class="dropdown-item" href="#">
               <img src="<?php echo base_url();?>assets/global/images/flags/Egypt.png" class="mr-2 dropdown-item-icon" alt="">
               <span>Português</span> </a><a class="dropdown-item" href="#">
               <img src="<?php echo base_url();?>assets/global/images/flags/United-States-of-America.png" class="mr-2 dropdown-item-icon" alt="">
               <span>English</span>
            </a>
      </li>
   </ul>
   <ul class="navbar-nav">
      <li id="navbar-search-toggler" class="nav-item hidden-xl-up hidden-sm-down">
         <a class="nav-link" href="#" data-toggle="navbar-search">
            <span class="zmdi zmdi-hc-lg zmdi-search"></span>
         </a>
      </li>
      <li class="nav-item dropdown">
         <a class="nav-link site-user dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img class="nav-img" src="<?php echo base_url();?>assets/global/images/user-img.png" alt="">
            <span class="nav-text hidden-sm-down ml-2"><?php echo usuario('nome');?></span> 
            <i class="nav-caret hidden-sm-down zmdi zmdi-hc-sm zmdi-chevron-down"></i>
         </a>
         <div class="dropdown-menu dropdown-menu-right p-0" data-plugin="dropdownCaret">
            <a class="dropdown-item dropdown-menu-cap"><?php echo usuario('nome');?></a> 
            <a class="dropdown-item" href="#">
               <span>Perfil</span> 
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
               <span>Sair</span>
            </a>
         </div>
      </li>
      
   </ul>
   <!-- /.navbar-nav -->
</div>
<!-- /.navbar-collapse -->
</nav>
<div class="site-wrapper">
<aside class="site-menubar">
   <div class="site-menubar-inner">
      <ul class="site-menu">
         <!-- MAIN NAVIGATION SECTION -->
         <li class="menu-section-heading">NAVEGAÇÃO</li>
         <li>
            <a href="<?php echo base_url('conta');?>">
               <i class="fa fa-home"></i>
               <span class="menu-text">Dashboard</span>
            </a>
         </li>
         <li>
            <a href="<?php echo base_url('conta/postagem');?>">
               <i class="fa fa-edit"></i>
               <span class="menu-text">Postagem</span>
            </a>
         </li>
         <li>
            <a href="<?php echo base_url('conta/programacoes');?>">
               <i class="fa fa-clock-o"></i>
               <span class="menu-text">Programações</span>
            </a>
         </li>
         <li>
            <a href="<?php echo base_url('conta/paginas');?>">
               <i class="fa fa-facebook-official"></i>
               <span class="menu-text">Páginas</span>
            </a>
         </li>
         <li>
            <a href="<?php echo base_url('conta/relatorios');?>">
               <i class="fa fa-line-chart"></i>
               <span class="menu-text">Relatórios</span>
            </a>
         </li>
         
      </ul>
      <!-- /.site-menu -->
   </div>
   <!-- /.site-menubar-inner -->
</aside>
<!-- /.site-menubar -->
<main class="site-main">