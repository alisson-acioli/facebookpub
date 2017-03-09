<section class="site-content">
   <div class="row">
      <div class="col-lg-4 col-sm-6">
         <div class="card">
            <header class="card-header">
               <h6 class="card-heading">Postagens no mês</h6>
            </header>
            <div class="card-block d-flex px-3">
               <div class="mr-auto text-primary">
                  <h5><span data-plugin="counterUp">50</span> postagens</h5>
                  <span>Quantidade postada no mês</span>
               </div>
               <div>
                  <a href="#" class="btn btn-sm btn-primary">Mês</a>
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
               <h6 class="card-heading">Programadas hoje</h6>
            </header>
            <div class="card-block d-flex px-3">
               <div class="mr-auto text-primary">
                  <h5><span data-plugin="counterUp">13</span> postagens</h5>
                  <span>Postagens programadas para hoje</span>
               </div>
               <div>
                  <a href="#" class="btn btn-sm btn-success">Hoje</a>
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
               <h6 class="card-heading">Crescimento total</h6>
            </header>
            <div class="card-block d-flex px-3">
               <div class="mr-auto text-primary">
                  <h5><span data-plugin="counterUp">439</span> likes</h5>
                  <span>A mais em suas páginas</span>
               </div>
               <div>
                  <a href="#" class="btn btn-sm btn-danger">Total</a>
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
         echo '<div class="alert alert-success text-center">O sistema está conectado com o seu Facebook</div>';
      }else{
      ?>
      <a href="<?php echo $this->facebook->login_url();?>" class="btn btn-primary">Faça o login no Facebook antes de usar o sistema</a>
      <?php
      }
      ?>
   </div>

   <div class="row">
      <div class="col-md-12">
         <h3>Bem vindo!</h3>
         <p>Bem vindo ao sistema de marketing Facebook. Com nosso sistema você poderá programar postagens, ter relatórios, gerenciar usuários e muitas coisas a mais para ajudar sua página a crescer como nunca cresceu antes.</p>
         <h3>Porque usar o sistema?</h3>
         <p>Imagine que você tem uma página, precisa cresce-lá mas está sem tempo para postar, ou, até tem tempo, mas gostaria de gerar relatórios sobre as curtidas que teve em sua página, quantidade de postagens feitas no mês ou outro tipo de relatório ? Com certeza anotar isso na mão é cansativo e faz você perder muito tempo. Por isso lançamos a ferramenta <b><?php echo website_config('nome_site');?></b>, uma ferramenta que te auxilia para crescer sua página.</p>
         <h3>Como usar ?</h3>
         <p>Simples, antes de mais nada você terá que fazer o login no seu facebook para termos acesso as páginas/grupos que você gerencia. <b>Pode ficar sossegado(a), que não salvaremos suas senha.</b> Para logar, clique no botão acima (caso esteja aparecendo) e confirme as permissões necessárias. Depois disso, é só navegar no menu a sua esquerda. Em cada tela, terá uma breve explicação de como usar.</p>
      </div>
   </div>

</section>
<!-- /.site-content -->