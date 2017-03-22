<section class="site-content">

  <a data-toggle="modal" id="detalhes" data-target="#modalDetalhes"></a>
  <a data-toggle="modal" id="editar" data-target="#modalEditar"></a>

   <h3><?php echo $this->lang->line('usuarios_cadastrados');?></h3>
   <p><?php echo $this->lang->line('usuarios_cadastrados_texto');?></p>
   
   <div class="table-responsive">
     <table class="table table-hover table-striped">
     <thead class="thead-inverse">
       <tr>
         <th><?php echo $this->lang->line('campo_cadastrar_nome');?></th>
         <th><?php echo $this->lang->line('campo_login');?></th>
         <th><?php echo $this->lang->line('status');?></th>
         <th><?php echo $this->lang->line('administrador');?></th>
         <th><?php echo $this->lang->line('acao');?></th>
       </tr>
     </thead>
     <tbody>
      <?php
      if($usuarios !== false){
        foreach($usuarios as $usuario){
      ?>
       <tr>
         <td scope="row"><?php echo $usuario->nome;?></td>
         <td><?php echo $usuario->login;?></td>
         <td>
          <?php
          echo StatusUsuario($usuario->status);
          ?>
         </td>
         <td>
         <?php
          echo ($usuario->admin == 1) ? $this->lang->line('sim') : $this->lang->line('nao');
          ?>
         </td>
         <td>
          <a href="javascript:void(0);" id="AbrirModal" data-type="detalhes" data-id="<?php echo $usuario->id;?>"><?php echo $this->lang->line('detalhes');?></a> |
          <a href="javascript:void(0);" id="AbrirModal" data-type="editar" data-id="<?php echo $usuario->id;?>"><?php echo $this->lang->line('editar');?></a> |
          <a href="javascript:void(0);" id="excluirUsuario" data-id="<?php echo $usuario->id;?>"><?php echo $this->lang->line('excluir');?></a>
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
              <h4 class="text-center"><?php echo $this->lang->line('detalhes_usuario');?></h4>
              <br />

              <div class="" id="msg-return-detalhes"></div>

              <div id="contentdetalhes">
                
                <table class="table">
                  <tr>
                    <td><?php echo $this->lang->line('campo_cadastrar_nome');?></td>
                    <td data-attr="nome"></td>
                  </tr>
                  <tr>
                    <td><?php echo $this->lang->line('campo_cadastrar_email');?></td>
                    <td data-attr="email"></td>
                  </tr>
                  <tr>
                    <td><?php echo $this->lang->line('campo_login');?></td>
                    <td data-attr="login"></td>
                  </tr>
                  <tr>
                    <td><?php echo $this->lang->line('campo_senha');?></td>
                    <td><span class="label label-danger"><?php echo $this->lang->line('senha_criptografada');?></td>
                  </tr>
                  <tr>
                    <td><?php echo $this->lang->line('status_conta');?></td>
                    <td data-attr="status"></td>
                  </tr>
                  <tr>
                    <td><?php echo $this->lang->line('e_administrador');?></td>
                    <td data-attr="admin"></td>
                  </tr>
                </table>

              </div>

           </div>
           <!-- /.modal-body -->
        </div>
        <!-- /.modal-content -->
     </div>
     <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="image-gallery-modal" aria-hidden="true">
     <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
           <div class="modal-body p-5">
              <h4 class="text-center"><?php echo $this->lang->line('editar_usuario');?></h4>
              <br />
              
              <div class="" id="msg-return-editar">&nbsp;</div>

              <div id="contenteditar">
                
                <div class="form-group">
                  <label><?php echo $this->lang->line('campo_cadastrar_nome');?></label>
                  <input type="text" name="nome" class="form-control" />
                </div>

                <div class="form-group">
                  <label><?php echo $this->lang->line('campo_cadastrar_email');?></label>
                  <input type="email" name="email" class="form-control" />
                </div>

                <div class="form-group">
                  <label><?php echo $this->lang->line('campo_login');?></label>
                  <input type="text" name="login" class="form-control" autocomplete="off" />
                </div>

                <div class="form-group">
                  <label><?php echo $this->lang->line('nova_senha');?></label>
                  <input type="password" name="senha" class="form-control" autocomplete="off" />
                </div>

                <div class="form-group">
                  <label><?php echo $this->lang->line('status_conta');?></label> <br />
                  <input type="radio" name="status" data-name="ativo" value="1" /> <?php echo $this->lang->line('ativo');?>
                  <input type="radio" name="status" data-name="naoativo" value="0" /> <?php echo $this->lang->line('nao_ativo');?>
                  <input type="radio" name="status" data-name="bloqueado" value="2" /> <?php echo $this->lang->line('bloqueado');?>
                </div>

                <div class="form-group">
                  <label><?php echo $this->lang->line('e_administrador');?></label> <br />
                  <input type="radio" name="administrador" data-name="sim" value="1" /> <?php echo $this->lang->line('sim');?>
                  <input type="radio" name="administrador" data-name="nao" value="0" /> <?php echo $this->lang->line('nao');?>
                </div>

                <input type="hidden" id="id_usuario" value="" />

                <input type="button" class="btn btn-success" id="salvarAlteracoesBtn" value="<?php echo $this->lang->line('salvar_alteracoes');?>" />

              </div>

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