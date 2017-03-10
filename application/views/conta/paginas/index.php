<section class="site-content">
  <h3>Páginas</h3>
  <p>Selecione abaixo todas as páginas que você quer gerenciar a partir de nosso sistema. Somente as páginas selecionadas poderão ser gerenciadas por nosso sistemas, as demais não.</p>
  <p>Caso queira adiconar ou remover posteriormente, será possível por essa página.</p>

  <div align="center">
    <?php
    if($this->facebook->is_authenticated()){

      $pagesList = $this->facebook->getPages();

      if(count($pagesList['data']) > 0){
    ?>

    <input type="submit" class="btn btn-primary pull-right mb-3 pointer" value="Salvar Alterações">
    <div class="clearfix"></div>
    
    <table class="table table-hover table-striped">
    <thead>
      <tr>
        <th>Página</th>
        <th>Curtidas</th>
        <th>Ativa</th>
      </tr>
    </thead>

    <tbody>
    <?php
        foreach($pagesList['data'] as $page){
    ?>
    <tr>
      <td><?php echo $page['name'];?></td>
      <td><?php echo $this->facebook->getLikesPage($page['id']);?> curtidas</td>
      <td><input type="checkbox" data-plugin="switchry" data-color="#10c469" name="pages[]" value="<?php echo $page['id'];?>" data-size="small"></td>
    </tr>
    <?php
        }
    ?>
    </tbody>
  </table>
    <?php
      }else{
        echo '<div class="alert alert-danger text-center">Você ainda não gerencia nenhuma página. Para usar essa ferramente, crie uma página.</div>';
      }
    }else{
    ?>
      <a href="<?php echo $this->facebook->login_url();?>" class="btn btn-primary">Faça o login para gerenciar suas páginas</a>
    <?php
    }
    ?>
  </div>
    
</section>
<!-- /.site-content -->