<section class="site-content">
  <h3><?php echo $this->lang->line('menu_perfils');?></h3>
  <p><?php echo $this->lang->line('help_perfils_1');?></p>
  <p><?php echo $this->lang->line('help_perfils_2');?></p>

  <div align="center">
    <form action="" method="post">
    <?php

    ?>

    <input type="submit" name="submit" class="btn btn-primary pull-right mb-3 pointer" value="<?php echo $this->lang->line('salvar_alteracoes');?>">
    <div class="clearfix"></div>

    <table class="table table-hover table-striped">
    <thead>
      <tr>
        <th><?php echo $this->lang->line('perfil_facebook');?></th>
        <th><?php echo $this->lang->line('ativo');?></th>
      </tr>
    </thead>

    <tbody>
    <?php
        foreach($perfils as $perfil){

          $checked = ($perfil['status'] == 1) ? 'checked' : '';
    ?>
    <tr>
      <td><?php echo $perfil['perfil'];?></td>
      <td><input type="checkbox" data-plugin="switchry" data-color="#10c469" name="perfils[]" value="<?php echo $perfil['perfil_id'];?>" data-size="small" <?php echo $checked;?>></td>
    </tr>
    <?php
        }
    ?>
    </tbody>
  </table>

    </form>
  </div>
    
</section>
<!-- /.site-content -->