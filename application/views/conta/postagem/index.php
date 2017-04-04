<section class="site-content">

   <!--<div align="center">-->
      <?php
      // if($this->facebook->is_authenticated()){
      //    echo '<div class="alert alert-success text-center">O sistema está conectado com o seu Facebook</div>';
      
      ?>
      
   <form action="" id="bootstrap-wizard-form">
      <div class="wizard p-5" id="bootstrap-wizard-1">
      <ul class="nav nav-tabs vertices" role="tablist">
         
         <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#tipo-publicacao" role="tab">
               <div class="vertex">
                  <span class="vertex-inner">
                     <svg width="22" height="22" class="svg-isvg-package-icon">
                        <use xlink:href="<?php echo base_url();?>assets/global/svg-sprite/sprite.svg#isvg-package"/>
                     </svg>
                  </span>
               </div>
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#detalhes-publicacao" role="tab">
               <div class="vertex">
                  <span class="vertex-inner">
                     <svg width="22" height="22" class="svg-isvg-money-icon">
                        <use xlink:href="<?php echo base_url();?>assets/global/svg-sprite/sprite.svg#isvg-money"/>
                     </svg>
                  </span>
               </div>
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#agendamento-publicacao" role="tab">
               <div class="vertex">
                  <span class="vertex-inner">
                     <svg width="22" height="22" class="svg-isvg-chat-icon">
                        <use xlink:href="<?php echo base_url();?>assets/global/svg-sprite/sprite.svg#isvg-chat"/>
                     </svg>
                  </span>
               </div>
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#paginas-publicacao" role="tab">
               <div class="vertex">
                  <span class="vertex-inner">
                     <svg width="22" height="22" class="svg-isvg-chat-icon">
                        <use xlink:href="<?php echo base_url();?>assets/global/svg-sprite/sprite.svg#isvg-chat"/>
                     </svg>
                  </span>
               </div>
            </a>
         </li>
      </ul>
      <div class="tab-content">
         <!-- /.tab-pane -->
         <div class="tab-pane active py-5" id="tipo-publicacao" role="tabpanel">

            <h4 class="text-center mb-4"><?php echo $this->lang->line('tipo_postagem');?></h4>
            <p class="text-center"><?php echo $this->lang->line('help_tipo_postagem');?></p>
            <div class="d-flex justify-content-center">

               <div class="wizard-radio mr-4">
                  <input id="textoin" value="texto" type="radio" name="tipo" checked>
                  <label for="textoin">
                     <i class="fa fa-text-height mb-2"></i>
                     <span class="fz-base"><?php echo $this->lang->line('postagem_texto');?></span>
                  </label>
               </div>
               <div class="wizard-radio mr-4">
                  <input id="linkin" value="link" type="radio" name="tipo">
                  <label for="linkin">
                     <i class="fa fa-link mb-2"></i>
                     <span class="fz-base"><?php echo $this->lang->line('postagem_link');?></span>
                  </label>
               </div>
               <div class="wizard-radio mr-4">
                  <input id="imagemin" value="imagem" type="radio" name="tipo">
                  <label for="imagemin">
                     <i class="fa fa-file-picture-o mb-2"></i>
                     <span class="fz-base"><?php echo $this->lang->line('postagem_imagem');?></span>
                  </label>
               </div>
               <div class="wizard-radio">
                  <input id="videoin" value="video" type="radio" name="tipo">
                  <label for="videoin">
                     <i class="fa fa-video-camera mb-2"></i>
                     <span class="fz-base"><?php echo $this->lang->line('postagem_video');?></span>
                  </label>
               </div>
            </div>
         </div>
         <!-- /.tab-pane -->
         <div class="tab-pane p-5" id="detalhes-publicacao" role="tabpanel">
            <h4 class="text-center mb-5"><?php echo $this->lang->line('detalhes_programacao');?></h4>

            <div class="texto" style="display:block;">
               <div class="form-group row">
                  <label for="mensagem_texto" class="col-2 col-form-label"><?php echo $this->lang->line('mensagem_post');?></label>
                  <div class="col-10">
                     <textarea name="mensagem_texto" id="mensagem_texto" rows="4" class="form-control"></textarea>
                  </div>
               </div>
            </div>

            <div class="row link" style="display:none;">
               <div class="form-group row">
                  <label for="mensagem_link" class="col-2 col-form-label"><?php echo $this->lang->line('mensagem_post');?></label>
                  <div class="col-10">
                     <textarea name="mensagem_link" id="mensagem_link" rows="4" class="form-control"></textarea>
                  </div>
               </div>
               <div class="form-group row">
                  <label for="titulo_link_link" class="col-2 col-form-label"><?php echo $this->lang->line('titulo_link');?></label>
                  <div class="col-10">
                     <input type="text" id="titulo_link_link" name="titulo_link_link" class="form-control">
                  </div>
               </div>
               <div class="form-group row">
                  <label for="descricao_link_link" class="col-2 col-form-label"><?php echo $this->lang->line('descricao_link');?></label>
                  <div class="col-10">
                     <textarea type="text" id="descricao_link_link" name="descricao_link_link" class="form-control"></textarea>
                  </div>
               </div>
               <div class="form-group row">
                  <label for="imagem_link_link" class="col-2 col-form-label"><?php echo $this->lang->line('imagem_link');?></label>
                  <div class="col-10">
                     <input type="text" id="imagem_link_link" name="imagem_link_link" class="form-control">
                  </div>
               </div>
               <div class="form-group row">
                  <label for="url_link_link" class="col-2 col-form-label"><?php echo $this->lang->line('url_link');?></label>
                  <div class="col-10">
                     <input type="text" id="url_link_link" name="url_link_link" class="form-control">
                  </div>
               </div>
            </div>

            <div class="row imagem" style="display:none;">
               <div class="form-group row">
                  <label for="imagem_imagem" class="col-2 col-form-label"><?php echo $this->lang->line('link_imagem');?></label>
                  <div class="col-9">
                     <input type="url" id="imagem_imagem" name="imagem_imagem" class="form-control">
                  </div>

                  <div class="col-md-1">
                      <a data-toggle="modal" href="javascript:void(0)" data-target="#uploadImagem"><i class="fa fa-2x fa-cloud-upload"></i></a>
                  </div>
               </div>
               <div class="form-group row">
                  <label for="mensagem_post_imagem" class="col-2 col-form-label"><?php echo $this->lang->line('mensagem_post');?></label>
                  <div class="col-10">
                     <textarea id="mensagem_post_imagem" name="mensagem_post_imagem" rows="4" class="form-control"></textarea>
                  </div>
               </div>
            </div>

            <div class="row video" style="display:none;">
               <div class="form-group row">
                  <label for="titulo_video_video" class="col-2 col-form-label"><?php echo $this->lang->line('titulo_video');?></label>
                  <div class="col-10">
                     <input type="text" id="titulo_video_video" name="titulo_video_video" class="form-control">
                  </div>
               </div>
               <div class="form-group row">
                  <label for="descricao_video_video" class="col-2 col-form-label"><?php echo $this->lang->line('descricao_video');?></label>
                  <div class="col-10">
                     <textarea id="descricao_video_video" name="descricao_video_video" rows="4" class="form-control"></textarea>
                  </div>
               </div>
               <div class="form-group row">
                  <label for="url_video_video" class="col-2 col-form-label"><?php echo $this->lang->line('url_video');?></label>
                  <div class="col-10">
                     <input type="text" id="url_video_video" name="url_video_video" class="form-control">
                  </div>
               </div>
               <div class="form-group row">
                  <label for="mensagem_post_video" class="col-2 col-form-label"><?php echo $this->lang->line('mensagem_post');?></label>
                  <div class="col-10">
                     <textarea id="mensagem_post_video" name="mensagem_post_video" rows="4" class="form-control"></textarea>
                  </div>
               </div>
            </div>

         </div>
         <!-- /.tab-pane -->
         <div class="tab-pane p-5" id="agendamento-publicacao" role="tabpanel">
            <h4 class="text-center mb-5"><?php echo $this->lang->line('agendamento');?></h4>
            <div class="form-group row">
               <label for="services" class="col-2 col-form-label"><?php echo $this->lang->line('data');?></label>
               <div class="col-10">
                  <input type="text" id="daterange-ex-3" name="data_agendamento" class="form-control" value="<?php echo date('d/m/Y');?>" style="width:150px;">
               </div>
            </div>
            <div class="form-group row">
               <label for="services" class="col-2 col-form-label"><?php echo $this->lang->line('hora');?></label>
               <div class="col-10">
                  <div class="clockpicker" data-plugin="clockpicker">
                     <input type="text" name="hora_agendamento" class="form-control" value="<?php echo date('H:i', time() + (60*5));?>" style="width: 150px">
                  </div>
               </div>
            </div>
            <div class="form-group row">
               <label for="services" class="col-2 col-form-label"><?php echo $this->lang->line('repetir_postagem');?></label>
               <div class="col-10">
                  <div class="radio radio-inline radio-primary">
                     <input type="radio" id="radio-inline-1" name="repetir_post" value="0" checked="checked">
                     <label for="radio-inline-1"><?php echo $this->lang->line('nao');?></label>
                  </div>
                  <div class="ml-3 radio radio-inline radio-primary">
                     <input type="radio" id="radio-inline-2" name="repetir_post" value="1">
                     <label for="radio-inline-2"><?php echo $this->lang->line('sim');?></label>
                  </div>
               </div>
            </div>
            <div class="repeticao_postagem" style="display:none;">
               <div class="form-group row">
                  <label for="intervalo" class="col-2 col-form-label"><?php echo $this->lang->line('intervalo');?></label>
                  <div class="col-10">
                     <select id="intervalo" name="intervalo" class="form-control" style="width:200px">
                        <option value="1">A cada 1 dia</option>
                        <option value="2">A cada 2 dias</option>
                        <option value="3">A cada 3 dias</option>
                        <option value="4">A cada 4 dias</option>
                        <option value="5">A cada 5 dias</option>
                        <option value="6">A cada 6 dias</option>
                        <option value="7">A cada 1 semana</option>
                        <option value="14">A cada 2 semanas</option>
                        <option value="30">A cada 1 mês</option>
                     </select>
                  </div>
               </div>
               <div class="form-group row">
                  <label for="dt-picker" class="col-2 col-form-label"><?php echo $this->lang->line('data_final');?></label>
                  <div class="col-10">
                     <input type="text" id="dt-picker" name="data_final" class="form-control" value="<?php echo date('d/m/Y', time() + (60*60*24));?>" style="width:150px;">
                  </div>
               </div>
            </div>
         </div>
         <!-- /.tab-pane -->
         <!-- /.tab-pane -->
         <div class="tab-pane py-5" id="paginas-publicacao" role="tabpanel">

            <h4 class="text-center mb-4"><?php echo $this->lang->line('qual_lugar_postagem');?></h4>
            <div class="d-flex justify-content-center mb-4">

               <div class="wizard-radio mr-4">
                  <input id="paginain" value="pagina" type="radio" name="lugar" checked>
                  <label for="paginain">
                     <i class="fa fa-bank mb-2"></i>
                     <span class="fz-base"><?php echo $this->lang->line('pagina_facebook');?></span>
                  </label>
               </div>
               <div class="wizard-radio mr-4">
                  <input id="perfilin" value="perfil" type="radio" name="lugar">
                  <label for="perfilin">
                     <i class="fa fa-user mb-2"></i>
                     <span class="fz-base"><?php echo $this->lang->line('perfil_facebook');?></span>
                  </label>
               </div>
               <div class="wizard-radio mr-4">
                  <input id="groupoin" value="grupo" type="radio" name="lugar">
                  <label for="groupoin">
                     <i class="fa fa-users mb-2"></i>
                     <span class="fz-base"><?php echo $this->lang->line('grupo_facebook');?></span>
                  </label>
               </div>
            </div>
            
            <div class="local-pagina" style="display:block">
               <p class="text-center"><?php echo $this->lang->line('help_quais_paginas');?></p>
               <select name="paginas_programacao_select" id="paginas_programacao_select" class="form-control" style="width:75%;">
               <?php
               if(!empty($this->paginas->TodasPaginas())){

                     foreach($this->paginas->TodasPaginas() as $pagina){
                        echo '<option value="'.$pagina['page_id'].'">'.$pagina['page'].'</option>';
                     }
               }
               ?>
               </select>
            </div>

            <div class="local-perfil" style="display:none">
               <div class="alert alert-info text-center"><?php echo $this->lang->line('voce_selecionou_perfil');?></div>
            </div>

            <div class="local-grupo" style="display:none">
               <p class="text-center"><?php echo $this->lang->line('help_quais_grupos');?></p>
               <select name="grupos_programacao_select" id="grupos_programacao_select" class="form-control" style="width:75%;">
               <?php
               if(!empty($this->grupos->TodosGrupos())){

                     foreach($this->grupos->TodosGrupos() as $grupo){
                        echo '<option value="'.$grupo['group_id'].'">'.$grupo['group'].'</option>';
                     }
               }
               ?>
               </select>
            </div>


         </div>
         <!-- /.tab-pane -->
         <div class="pager d-flex justify-content-center">
            <button type="button" id="previous-btn" class="previous btn btn-success w-50 mr-4"><?php echo $this->lang->line('btn_anterior');?></button>
            <button type="button" id="next-btn" class="next btn btn-success w-50"><?php echo $this->lang->line('btn_proximo');?></button>
            <button type="button" id="finish-btn" class="finish btn btn-info w-50 mr-4"><?php echo $this->lang->line('btn_finalizar');?></button>
         </div>
         <!-- /.pager -->
      </div>
      <!-- /.tab-content -->
   </div>
   <!-- /.form-wizard -->
   </form>
   <?php
   //}else{
   ?>
   <!--<a href="<?php echo $this->facebook->login_url();?>" class="btn btn-primary">Faça o login no Facebook antes de usar o sistema</a>
   <div class="alert alert-info text-center mt-4">Para você fazer uma postagem você precisa primeiro estar no facebook para as informações ficarem sincronizadas.</div>-->
   <?php
   //}
   ?>
<!--</div>-->

<div class="modal fade" id="uploadImagem" tabindex="-1" role="dialog" aria-labelledby="image-gallery-modal" aria-hidden="true">
     <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
           <div class="modal-body p-5">
              <h4 class="text-center"><?php echo $this->lang->line('upload_de_imagem');?></h4>
              <p><?php echo $this->lang->line('upload_de_imagem_texto');?></p>
              <br />

              <div class="" id="msg-return"></div>

              <div id="container">
                
                <form action="<?php echo base_url();?>requests/imageUpload" method="post" enctype="multipart/form-data" id="MyUploadForm">
                  <div class="form-group">
                  <labeL><?php echo $this->lang->line('upload_da_imagem');?></labeL>
                  <input type="file" name="FileInput" id="FileInput" />
                  <input type="submit" id="submit-btn" class="btn btn-success" value="<?php echo $this->lang->line('btn_fazer_upload');?>" />
                </div>
                </form>
                  <div id="progressbox">
                     <div id="progressbar"></div>
                  </div>
                  <div id="output"></div>

              </div>

           </div>
           <!-- /.modal-body -->
        </div>
        <!-- /.modal-content -->
     </div>
     <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

</section>
<!-- /.site-content -->