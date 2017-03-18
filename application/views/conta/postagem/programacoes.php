<section class="site-content">

   <a data-toggle="modal" id="verDetalhes" data-target="#modalDetalhes"></a>

   <h3>Suas programações</h3>

   <p>Quando você faz uma publicação você tem a possibilidade de programar as postagens, assim você não precisa se preocupar em entrar todo dia no facebook para postar em sua página.</p>
   <p>Caso você queria <b>Cancelar</b> uma programação, basta clicar em <u>Excluir</u>, assim a programação não será postada.</p>
   
   <button class="btn btn-danger pull-right mb-2" id="deletarSelecionados"><i class="fa fa-times"></i> Deletar Selecionados</button>
   <div class="table-responsive">
     <table class="table table-hover table-striped">
     <thead class="thead-inverse">
       <tr>
         <th><input type="checkbox" id="selecionarTudo"></th>
         <th>Programado para</th>
         <th>Tipo</th>
         <th>Status</th>
         <th>Ação</th>
       </tr>
     </thead>
     <tbody>
      <?php
      if($postagens !== false){
        foreach($postagens as $postagem){

          $separaDataHora = explode(' ', $postagem->data_programacao);
      ?>
       <tr>
         <td><input type="checkbox" id="excluir" value="<?php echo $postagem->id;?>"></td>
         <td scope="row"><?php echo converter_data($separaDataHora[0], '-', '/').' '.$separaDataHora[1];?></td>
         <td><?php echo ucfirst(strtolower($postagem->tipo_programacao));?></td>
         <td>
          <?php
          switch($postagem->status){
            case 1:
              $label = 'label-info';
            break;

            case 2:
              $label = 'label-success';
            break;

            case 3:
              $label = 'label-danger';
            break;

            case 4:
              $label = 'label-warning';
            break;

            default:
              $label = 'label-warning';
            break;
          }
          ?>
          <span class="label <?php echo $label;?>"><?php echo StatusPostagem($postagem->status);?></span>
         </td>
         <td>
          <?php
          if($postagem->status != 2){
            echo '<a href="javascript:void(0);" id="deletaProgramacao" data-id="'.$postagem->id.'">Excluir</a> | ';
          }
          ?>
          <a href="javascript:void(0);" id="detalhesProgramacao" data-id="<?php echo $postagem->id;?>">Detalhes</a>
         </td>
       </tr>
      <?php
        }
      }
      ?>
     </tbody>
     </table>
    </div>

    <div class="modal fade" id="modalDetalhes" tabindex="-1" role="dialog" aria-labelledby="image-gallery-modal" aria-hidden="true">
     <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
           <div class="modal-body p-5">
              <h4 class="text-center">Detalhes da Programação</h4>
              <br />

              <div id="contentDetalhesProgramacao"></div>

           </div>
           <!-- /.modal-body -->
        </div>
        <!-- /.modal-content -->
     </div>
     <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
</section>
<!-- /.site-content -->