<section class="site-content">
   
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
      ?>
       <tr>
         <td><input type="checkbox" id="excluir" value="<?php echo $postagem->id;?>"></td>
         <td scope="row"><?php echo converter_data($postagem->data_programacao, '-', '/').' '.$postagem->hora_programacao;?></td>
         <td><?php echo ucfirst(strtolower($postagem->tipo_programacao));?></td>
         <td>
          <?php
          switch($postagem->status){
            case 1:
              $label = 'label-info';
            break;

            case 2:
              $label = 'info-success';
            break;

            case 3:
              $label = 'info-danger';
            break;

            case 4:
              $label = 'info-warning';
            break;

            default:
              $label = 'info-warning';
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
</section>
<!-- /.site-content -->