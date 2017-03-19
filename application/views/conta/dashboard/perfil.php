<section class="site-content">
   
<div class="bd-example" data-example-id="">
   
   <h3><?php echo $this->lang->line('meus_dados');?></h3>
   <hr />
   
   <?php if(isset($message)) echo $message; ?>

   <form action="" method="post">
      <div class="form-group">
         <label for="nome"><?php echo $this->lang->line('nome_completo');?></label>
         <input class="form-control" id="nome" name="nome" placeholder="<?php echo $this->lang->line('seu_nome');?>" value="<?php echo usuario('nome');?>" type="text" required> 
      </div>
      <div class="form-group">
         <label for="senha"><?php echo $this->lang->line('nova_senha');?></label>
         <input class="form-control" id="senha" name="senha" placeholder="<?php echo $this->lang->line('campo_senha');?>" type="password">
      </div>
      <div class="form-group">
         <label for="novasenha"><?php echo $this->lang->line('repetir_nova_senha');?></label>
         <input class="form-control" id="novasenha" name="novasenha" placeholder="<?php echo $this->lang->line('repetir_nova_senha');?>" type="password">
      </div>
      <input type="submit" name="submit" class="btn btn-primary pointer" value="<?php echo $this->lang->line('alterar_informacoes');?>">
   </form>
</div>

</section>
<!-- /.site-content -->