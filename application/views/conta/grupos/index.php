<section class="site-content">
  <h3><?php echo $this->lang->line('menu_grupos');?></h3>
  <p><?php echo $this->lang->line('help_grupos_1');?></p>
  <p><?php echo $this->lang->line('help_grupos_2');?></p>

  <div align="center">
    <form action="" method="post">
    <?php
    if($this->facebook->is_authenticated()){

      $groupsList = $this->facebook->getGroups();

      if(count($groupsList['data']) > 0){
    ?>

    <input type="submit" name="submit" class="btn btn-primary pull-right mb-3 pointer" value="<?php echo $this->lang->line('salvar_alteracoes');?>">
    <div class="clearfix"></div>

    <table class="table table-hover table-striped">
    <thead>
      <tr>
        <th><?php echo $this->lang->line('grupo');?></th>
        <th><?php echo $this->lang->line('ativo');?></th>
      </tr>
    </thead>

    <tbody>
    <?php
        foreach($groupsList['data'] as $grupo){

          $this->db->where('group_id', $grupo['id']);
          $queryGroup = $this->db->get('grupos');

          if($queryGroup->num_rows() > 0){

            $row = $queryGroup->row();

            if($row->status == 1){
              $checked = 'checked';
            }else{
              $checked = '';
            }
          }else{
            $checked = '';
          }
    ?>
    <tr>
      <td><?php echo $grupo['name'];?></td>
      <td><input type="checkbox" data-plugin="switchry" data-color="#10c469" name="groups[]" value="<?php echo $grupo['id'];?>" data-size="small" <?php echo $checked;?>></td>
    </tr>
    <?php
        }
    ?>
    </tbody>
  </table>
    <?php
      }else{
        echo '<div class="alert alert-danger text-center">'.$this->lang->line('crie_um_grupo').'</div>';
      }
    }else{
    ?>
      <a href="<?php echo $this->facebook->login_url();?>" class="btn btn-primary"><?php echo $this->lang->line('btn_login_facebook');?></a>
    <?php
    }
    ?>
    </form>
  </div>
    
</section>
<!-- /.site-content -->