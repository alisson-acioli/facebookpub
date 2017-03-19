<section class="site-content">
  <h3><?php echo $this->lang->line('menu_paginas');?></h3>
  <p><?php echo $this->lang->line('help_paginas_1');?></p>
  <p><?php echo $this->lang->line('help_paginas_2');?></p>

  <div align="center">
    <form action="" method="post">
    <?php
    if($this->facebook->is_authenticated()){

      $pagesList = $this->facebook->getPages();

      if(count($pagesList['data']) > 0){
    ?>

    <input type="submit" name="submit" class="btn btn-primary pull-right mb-3 pointer" value="Salvar Alterações">
    <div class="clearfix"></div>

    <table class="table table-hover table-striped">
    <thead>
      <tr>
        <th><?php echo $this->lang->line('pagina');?></th>
        <th><?php echo $this->lang->line('curtidas');?></th>
        <th><?php echo $this->lang->line('ativa');?></th>
      </tr>
    </thead>

    <tbody>
    <?php
        foreach($pagesList['data'] as $page){

          $this->db->where('id_page', $page['id']);
          $queryPage = $this->db->get('paginas');

          if($queryPage->num_rows() > 0){

            $row = $queryPage->row();

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
      <td><?php echo $page['name'];?></td>
      <td><?php echo $this->facebook->getLikesPage($page['id']);?> <?php echo $this->lang->line('curtidas');?></td>
      <td><input type="checkbox" data-plugin="switchry" data-color="#10c469" name="pages[]" value="<?php echo $page['id'];?>" data-size="small" <?php echo $checked;?>></td>
    </tr>
    <?php
        }
    ?>
    </tbody>
  </table>
    <?php
      }else{
        echo '<div class="alert alert-danger text-center">'.$this->lang->line('crie_uma_pagina').'</div>';
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