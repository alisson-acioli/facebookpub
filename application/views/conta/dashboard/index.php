<section class="site-content">
   <div class="row">
      <div class="col-lg-4 col-sm-6">
         <div class="card">
            <header class="card-header">
               <h6 class="card-heading"><?php echo $this->lang->line('titulo_postagem_mes');?></h6>
            </header>
            <div class="card-block d-flex px-3">
               <div class="mr-auto text-primary">
                  <h5><span data-plugin="counterUp"><?php echo $this->postagem->PostagensMes();?></span> <?php echo $this->lang->line('postagens');?></h5>
                  <span><?php echo $this->lang->line('quantidade_postada');?></span>
               </div>
               <div>
                  <a href="#" class="btn btn-sm btn-primary"><?php echo $this->lang->line('mes');?></a>
               </div>
            </div>
            <!-- /.card-block -->
         </div>
         <!-- /.card -->
      </div>
      <!-- /.col -->
      <div class="col-lg-4 col-sm-6">
         <div class="card">
            <header class="card-header">
               <h6 class="card-heading"><?php echo $this->lang->line('titulo_programadas_hoje');?></h6>
            </header>
            <div class="card-block d-flex px-3">
               <div class="mr-auto text-primary">
                  <h5><span data-plugin="counterUp"><?php echo $this->postagem->PostagensHoje();?></span> <?php echo $this->lang->line('postagens');?></h5>
                  <span><?php echo $this->lang->line('postagens_hoje');?></span>
               </div>
               <div>
                  <a href="#" class="btn btn-sm btn-success"><?php echo $this->lang->line('hoje');?></a>
               </div>
            </div>
            <!-- /.card-block -->
         </div>
         <!-- /.card -->
      </div>
      <!-- /.col -->
      <div class="col-lg-4 col-sm-12">
         <div class="card">
            <header class="card-header">
               <h6 class="card-heading"><?php echo $this->lang->line('titulo_crescimento_total');?></h6>
            </header>
            <div class="card-block d-flex px-3">
               <div class="mr-auto text-primary">
                  <h5><span data-plugin="counterUp"><?php echo $this->paginas->CrescimentoPaginasTotal();?></span> <?php echo $this->lang->line('curtidas');?></h5>
                  <span><?php echo $this->lang->line('a_mais_paginas');?></span>
               </div>
               <div>
                  <a href="#" class="btn btn-sm btn-danger"><?php echo $this->lang->line('total');?></a>
               </div>
            </div>
            <!-- /.card-block -->
         </div>
         <!-- /.card -->
      </div>
      <!-- /.col -->
   </div>
   <!-- /.row -->

   <div align="center">
      <?php
      if($this->facebook->is_authenticated()){
         echo '<div class="alert alert-success text-center">'.$this->lang->line('sistema_conectado_facebook').'. <br /> <a href="'.$this->facebook->logout_url().'">'.$this->lang->line('deslogar_facebook').'</a></div>';
      }else{
      ?>
      <a href="<?php echo $this->facebook->login_url();?>" class="btn btn-primary"><?php echo $this->lang->line('btn_login_facebook');?></a>
      <?php
      }
      ?>
   </div>

   <div class="row">
      <div class="col-md-12">
         <h3><?php echo $this->lang->line('bemvindo');?></h3>
         <p><?php echo $this->lang->line('texto_bemvindo');?></p>
         <h3><?php echo $this->lang->line('porque_usar');?></h3>
         <p><?php echo $this->lang->line('texto_porque_usar');?></p>
         <h3><?php echo $this->lang->line('como_usar');?></h3>
         <p><?php echo $this->lang->line('texto_como_usar');?></p>
      </div>
   </div>

</section>
<!-- /.site-content -->