<section class="site-content">
  
  <h3><?php echo $this->lang->line('configuracoes_sistema');?></h3>

  <p><?php echo $this->lang->line('configuracoes_sistema_texto');?></p>
  
  <?php if(isset($message)) echo $message; ?>

  <form action="" method="post">
      <div class="form-group">
        <label><?php echo $this->lang->line('nome_site');?></label>
        <input type="text" name="nome_site" class="form-control" value="<?php echo website_config('nome_site');?>" required>
      </div>
      <div class="form-group">
        <label><?php echo $this->lang->line('descricao_site');?></label>
        <textarea class="form-control" name="descricao_site"><?php echo website_config('descricao_site');?></textarea>
      </div>
      <div class="form-group">
        <label><?php echo $this->lang->line('linguagem_site');?></label>
        <select name="lingua" class="form-control" required>
        <?php
        if(!empty($linguas)){
          foreach($linguas as $lingua){

            $selected = (strtolower($lingua) == strtolower(website_config('linguagem'))) ? 'selected' : '';

            echo '<option value="'.strtolower($lingua).'" '.$selected.'>'.$lingua.'</option>';
          }
        }
        ?>
        </select>
      </div>
      <div class="form-group">
        <label><?php echo $this->lang->line('timezone');?></label>
        <select name="timezone" class="form-control">
          <?php
          $TZ = TimesZones();

          foreach($TZ as $time){
            $selected = ($time['zone'] == website_config('timezone')) ? 'selected' : '';
            echo '<option value="'.$time['zone'].'" '.$selected.'>'.$time['diff_from_GMT'].' - '.$time['zone'].'</option>';
          }
          ?>
        </select>
      </div>
      <div class="form-group">
        <label><?php echo $this->lang->line('app_id');?></label>
        <input type="text" name="app_id" class="form-control" value="<?php echo website_config('app_id');?>" required>
      </div>
      <div class="form-group">
        <label><?php echo $this->lang->line('app_secret');?></label>
        <input type="text" name="app_secret" class="form-control" value="<?php echo website_config('app_secret');?>" required>
      </div>

      <input type="submit" name="submit" class="btn btn-success pointer" value="<?php echo $this->lang->line('salvar_alteracoes');?>" />
  </form>
</section>
<!-- /.site-content -->