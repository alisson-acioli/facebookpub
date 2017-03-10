<section class="site-content">

   <!-- <div align="center">
      <?php
      if($this->facebook->is_authenticated()){
         echo '<div class="alert alert-success text-center">O sistema está conectado com o seu Facebook</div>';
      }else{
      ?>
      <a href="<?php echo $this->facebook->login_url();?>" class="btn btn-primary">Faça o login no Facebook antes de usar o sistema</a>
      <?php
      }
      ?>
   </div> -->
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
      </ul>
      <div class="tab-content">
         <!-- /.tab-pane -->
         <div class="tab-pane active py-5" id="tipo-publicacao" role="tabpanel">
            <h4 class="text-center mb-5">Qual é o tipo de postagem ?</h4>
            <p class="text-center">Caso você não escolha, o padrão será <b>Texto</b>.</p>
            <div class="d-flex justify-content-center">

               <div class="wizard-radio mr-4">
                  <input id="cloud" type="radio" name="tipo">
                  <label for="cloud">
                     <i class="fa fa-text-height mb-2"></i>
                     <span class="fz-base">Texto</span>
                  </label>
               </div>
               <div class="wizard-radio mr-4">
                  <input id="hosting" type="radio" name="tipo">
                  <label for="hosting">
                     <i class="fa fa-link mb-2"></i>
                     <span class="fz-base">Link</span>
                  </label>
               </div>
               <div class="wizard-radio mr-4">
                  <input id="analytics" type="radio" name="tipo">
                  <label for="analytics">
                     <i class="fa fa-file-picture-o mb-2"></i>
                     <span class="fz-base">Imagem</span>
                  </label>
               </div>
               <div class="wizard-radio">
                  <input id="video" type="radio" name="tipo">
                  <label for="video">
                     <i class="fa fa-video-camera mb-2"></i>
                     <span class="fz-base">Vídeo</span>
                  </label>
               </div>
            </div>
         </div>
         <!-- /.tab-pane -->
         <div class="tab-pane p-5" id="detalhes-publicacao" role="tabpanel">
            <h4 class="text-center mb-5">Detalhes da Programação</h4>
            <div class="form-group row mb-5">
               <label class="col-4 col-form-label text-right">Payment Method:</label>
               <div class="col-6">
                  <div class="radio radio-primary"><input type="radio" id="cache" name="payment_method"><label for="cache">Cache</label></div>
                  <div class="radio radio-primary"><input type="radio" id="card" name="payment_method"><label for="card">Debit Card</label></div>
               </div>
            </div>
            <div class="form-group row">
               <label for="spending" class="col-4 col-form-label text-right">Shopping Spending:</label>
               <div class="col-6"><input type="text" id="spending" name="spending" class="form-control" placeholder="How much you spend in $ ?"></div>
            </div>
         </div>
         <!-- /.tab-pane -->
         <div class="tab-pane p-5" id="agendamento-publicacao" role="tabpanel">
            <h4 class="text-center mb-5">Agendamento</h4>
            <div class="form-group row">
               <label for="services" class="col-2 col-form-label">Service</label>
               <div class="col-10">
                  <select name="services" id="services" class="form-control">
                     <option disabled="disabled" selected="selected">Choose Service</option>
                     <option value="cloud">Cloud Services</option>
                     <option value="hosting">Web Hosting</option>
                     <option value="analytics">Analytics</option>
                  </select>
               </div>
            </div>
            <div class="form-group row">
               <label for="message" class="col-2 col-form-label">Message</label>
               <div class="col-10"><textarea name="message" id="message" rows="4" class="form-control"></textarea></div>
            </div>
         </div>
         <!-- /.tab-pane -->
         <div class="pager d-flex justify-content-center">
            <button type="button" id="finish-btn" class="finish btn btn-success w-50 mr-4">Finalizar</button>
            <button type="button" id="previous-btn" class="previous btn btn-success w-50 mr-4">Anterior</button>
            <button type="button" id="next-btn" class="next btn btn-success w-50">Próximo</button></div>
         <!-- /.pager -->
      </div>
      <!-- /.tab-content -->
   </div>
   <!-- /.form-wizard -->
   </form>
</section>
<!-- /.site-content -->