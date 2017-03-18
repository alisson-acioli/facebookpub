<section class="site-content">
  <h3>Filtro</h3>
  <form class="form-inline">

    <?php
    if($paginas !== false){
    ?>
    <select class="custom-select mb-2 mr-sm-2 mb-sm-0">
      <?php
        foreach($paginas as $pagina){
          echo '<option value="'.$pagina->page_id.'">'.$pagina->page.'</option>';
        }
      ?>
    </select>

    <?php
    }
    ?>

    <label class="mr-sm-2" for="">Período</label>
    <input type="text" data-plugin="daterangepicker" class="form-control mr-2">

    <button type="submit" class="btn btn-primary">Filtrar</button>
    </form>

    <br />

  <div id="postagem_dia"></div>
  <br /><br />
  <div id="curtidas_dia"></div>
</section>
<!-- /.site-content -->