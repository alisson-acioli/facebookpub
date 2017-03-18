<section class="site-content">
   
<div class="bd-example" data-example-id="">
   
   <h3>Meus dados</h3>
   <hr />
   
   <?php if(isset($message)) echo $message; ?>

   <form action="" method="post">
      <div class="form-group">
         <label for="nome">Nome Completo</label>
         <input class="form-control" id="nome" name="nome" placeholder="Seu nome" value="<?php echo usuario('nome');?>" type="text" required> 
      </div>
      <div class="form-group">
         <label for="senha">Nova Senha</label>
         <input class="form-control" id="senha" name="senha" placeholder="Senha" type="password">
      </div>
      <div class="form-group">
         <label for="novasenha">Nova Senha</label>
         <input class="form-control" id="novasenha" name="novasenha" placeholder="Senha" type="password">
      </div>
      <input type="submit" name="submit" class="btn btn-primary pointer" value="Alterar informações">
   </form>
</div>

</section>
<!-- /.site-content -->