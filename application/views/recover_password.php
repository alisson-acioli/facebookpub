<!doctype html>
<html lang="pt-br">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title><?php echo website_config('nome_site');?> | <?php echo $this->lang->line('recuperacao_senha');?></title>
      <meta name="description" content="<?php echo website_config('descricao_site');?>">
      <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
      <!-- core plugins -->
      <link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/css/bootstrap.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/bower_components/font-awesome/css/font-awesome.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.css">
      <!-- core plugins --><!-- plugins for the current page -->
      <link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/owl-carousel/owl.carousel.css">
      <!-- / plugins for the current page --><!-- site-wide stylesheets -->
      <link rel="stylesheet" href="<?php echo base_url();?>assets/css/site.css">
      <!-- / site-wide stylesheets --><!-- styles for the current page -->
      <link rel="stylesheet" href="<?php echo base_url();?>assets/examples/css/pages/login.css">
      <!-- / styles for the current page -->
      <style>
        @import 'https://fonts.googleapis.com/css?family=Roboto:300,400,500,600';
      </style>
   </head>
   <body class="simple-page page-login">
      <!--[if lt IE 10]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
      <![endif]-->
      <header class="login-page-header d-flex">
         <div class="mr-auto">
            <a href="<?php echo base_url('login');?>" class="d-flex align-items-center">
               <svg class="flip-y mr-2" xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 32 32">
                  <path fill="#ffffff" d="M30.063 2.585c-.253-1.023-.758-1.754-1.5-2.17-3.28-1.842-9.02 3.577-11.05 6.88-.65 1.06-1.275 2.358-1.792 3.718-1.486-.21-2.95-.098-4.366.337C6.954 12.694 4 16.975 4 22v2c0 4.337 3.663 8 8 8h1.98c5.31 0 9.803-3.664 10.682-8.714.33-1.89.142-3.807-.54-5.585 1.26-1.2 2.43-2.587 3.268-3.886 1.646-2.554 3.46-8.062 2.673-11.23zM12 23c-1.105 0-2-.895-2-2s.895-2 2-2 2 .895 2 2-.895 2-2 2z"/>
                  <path data-color="color-2" fill="#39527b" d="M10.77 9.437c1.14-.35 2.32-.527 3.506-.527h.148c.424-.954.888-1.846 1.37-2.633-1.106-2.466-2.56-4.72-4.01-5.71-.7-.477-1.387-.656-2.04-.528-.442.086-1.08.37-1.594 1.23C7 3.19 6.89 7.465 7.457 11.06c1-.7 2.108-1.255 3.312-1.623z"/>
               </svg>
               <h5 class="text-white m-0"><?php echo website_config('nome_site');?></h5>
            </a>
         </div>
      </header>
      <!-- /.login-page-header -->
      <div class="login-page-wrap">
         <div class="side second-side">
            <div class="side-content">
               <div id="signin-form-wrap" class="form-wrap show">
                  <h4 class="my-5 font-weight-light text-uppercase"><?php echo $this->lang->line('recuperacao_senha');?></h4>
                  <form id="signin-form" class="form" action="" method="post">

                     <?php if(isset($message)) echo $message; ?>

                     <?php
                     if(!isset($error)){
                     ?>

                     <div class="form-group">
                        <input type="password" name="senha" class="form-control" placeholder="<?php echo $this->lang->line('nova_senha');?>" autocomplete="off" required>
                     </div>
                     <div class="form-group">
                        <input type="password" name="confirmar_senha" class="form-control" placeholder="<?php echo $this->lang->line('repetir_nova_senha');?>" autocomplete="off" required>
                     </div>
                    
                     <input type="submit" name="submit" class="btn btn-outline-success py-2 mt-5" style="width: 200px" value="<?php echo $this->lang->line('trocar_senha');?>">
                     <?php
                     }
                     ?>
                  </form>
               </div>
               <!-- /#signin-form-wrap -->
            </div>
            <!-- /.side-content -->
         </div>
         <!-- /.second-side -->
      </div>
      <!-- /.login-page-wrap -->
      <!-- core plugins -->


      <script src="<?php echo base_url();?>assets/vendor/bower_components/jquery/dist/jquery.min.js"></script>
      <script src="<?php echo base_url();?>assets/vendor/bower_components/tether/dist/js/tether.min.js"></script>
      <script src="<?php echo base_url();?>assets/vendor/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

      <!-- plugins for the current page -->
      <script src="<?php echo base_url();?>assets/vendor/owl-carousel/owl.carousel.min.js"></script>
      <!-- / plugins for the current page -->

      <!-- scripts for the current page -->
      <script src="<?php echo base_url();?>assets/examples/js/pages/login.js"></script>
      <!-- / scripts for the current page-->
   </body>
</html>