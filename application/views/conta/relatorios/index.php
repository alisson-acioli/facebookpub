<section class="site-content">
  <h3><?php echo $this->lang->line('filtro');?></h3>
  <form class="form-inline">

    <?php
    if(!empty($paginas)){
    ?>
    <select id="paginas" class="custom-select mb-2 mr-sm-2 mb-sm-0">
      <option value=""><?php echo $this->lang->line('todas_paginas');?></option>
      <?php
        foreach($paginas as $pagina){
          echo '<option value="'.$pagina['page_id'].'">'.$pagina['page'].'</option>';
        }
      ?>
    </select>

    <?php
    }
    ?>

    <label class="mr-sm-2" for=""><?php echo $this->lang->line('periodo');?></label>
    <input type="text" id="periodo" value="<?php echo date('d/m/Y', time() - (60*60*24*5));?> - <?php echo date('d/m/Y', time() + (60*60*24*10));?>" data-plugin="daterangepicker" class="form-control mr-2">

    <button type="button" class="btn btn-primary" id="FiltrarRelatorio"><?php echo $this->lang->line('filtrar');?></button>
    </form>

    <br />

  <div id="postagem_dia"></div>
  <br /><br />
  <div id="curtidas_dia"></div>
</section>
<!-- /.site-content -->