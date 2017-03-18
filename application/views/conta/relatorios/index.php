<section class="site-content">
  <h3>Filtro</h3>
  <form class="form-inline">

    <?php
    if(!empty($paginas)){
    ?>
    <select id="paginas" class="custom-select mb-2 mr-sm-2 mb-sm-0">
      <option value="">Todas as Páginas</option>
      <?php
        foreach($paginas as $pagina){
          echo '<option value="'.$pagina['page_id'].'">'.$pagina['page'].'</option>';
        }
      ?>
    </select>

    <?php
    }
    ?>

    <label class="mr-sm-2" for="">Período</label>
    <input type="text" id="periodo" data-plugin="daterangepicker" class="form-control mr-2">

    <button type="button" class="btn btn-primary" id="FiltrarRelatorio">Filtrar</button>
    </form>

    <br />

  <div id="postagem_dia"></div>
  <br /><br />
  <div id="curtidas_dia"></div>
</section>
<!-- /.site-content -->