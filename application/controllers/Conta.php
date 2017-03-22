<?php
defined('BASEPATH') OR exit('Você não tem permissão para acessar o script diretamente!');

class Conta extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->model('paginas');
        $this->load->model('postagem');
        $this->load->model('loginmodel', 'LoginModel');

        if($this->session->has_userdata('lingua')){
          $lang = $this->session->userdata('lingua');
        }else{
          $lang = website_config('linguagem');
          $this->session->set_userdata('lingua', $lang);
        }

        $this->lang->load($lang, $lang);

        checksession();
    }

    public function index(){

        $data['titulo'] = $this->lang->line('menu_dashboard');

        $data['jsLoader'] = array(
                                  'assets/examples/js/dashboards/dashboard.v1.js'
                                  );

        $this->LoginModel->AtualizarTokenUser();
        
        $this->load->view('conta/templates/header', $data);
        $this->load->view('conta/dashboard/index');
        $this->load->view('conta/templates/footer');
    }

    public function perfil(){

        $data['titulo'] = $this->lang->line('menu_perfil');

        if($this->input->post('submit')){
          $data['message'] = $this->LoginModel->MudarInformacoes();
        }

        $data['jsLoader'] = array();
        
        $this->load->view('conta/templates/header', $data);
        $this->load->view('conta/dashboard/perfil');
        $this->load->view('conta/templates/footer');
    }

    public function postagem(){

        $data['titulo'] = $this->lang->line('menu_postagem');

        $data['jsVariables'] = array(
                                     'feito'=>$this->lang->line('feito'),
                                     'programacao_feita'=>$this->lang->line('programacao_feita'),
                                     'erro_programacao'=>$this->lang->line('erro_programacao'),
                                     'erro'=>$this->lang->line('erro'),
                                     'post_nao_identificado'=>$this->lang->line('post_nao_identificado'),
                                     'preencha_campos'=>$this->lang->line('preencha_campos'),
                                     'aplicar'=>$this->lang->line('aplicar'),
                                     'cancelar'=>$this->lang->line('cancelar'),
                                     'campo_obrigatorio'=>$this->lang->line('campo_obrigatorio'),
                                     'email_valido'=>$this->lang->line('email_valido'),
                                     'url_valida'=>$this->lang->line('url_valida'),
                                     'data_valida'=>$this->lang->line('data_valida'),
                                     'numero_valido'=>$this->lang->line('numero_valido'),
                                     'apenas_numeros'=>$this->lang->line('apenas_numeros'),
                                     'dados_nao_conferem'=>$this->lang->line('dados_nao_conferem'),
                                     'numero_maximo'=>$this->lang->line('numero_maximo'),
                                     'numero_minimo'=>$this->lang->line('numero_minimo')
                                     );
        
        $data['jsLoader'] = array(
                                  'assets/vendor/bower_components/jquery-validation/dist/jquery.validate.min.js',
                                  'assets/vendor/bower_components/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js',
                                  'assets/js/pages/postagem.js',
                                  'assets/js/additional-methods.js',
                                  'assets/vendor/bower_components/moment/min/moment.min.js',
                                  'assets/vendor/bower_components/bootstrap-daterangepicker/daterangepicker.js',
                                  'assets/vendor/bower_components/clockpicker/dist/bootstrap-clockpicker.js',
                                  'assets/examples/js/demos/forms.datetime.js'
                                  );

        $this->load->view('conta/templates/header', $data);
        $this->load->view('conta/postagem/index');
        $this->load->view('conta/templates/footer');
    }

    public function programacoes(){

        $data['titulo'] = $this->lang->line('menu_programacoes');

        $data['postagens'] = $this->postagem->TodasProgramacoes();

        $data['jsVariables'] = array(
                                     'tem_certeza'=>$this->lang->line('tem_certeza'),
                                     'tem_certeza_excluir_programacao'=>$this->lang->line('tem_certeza_excluir_programacao'),
                                     'tem_certeza_excluir_programacoes'=>$this->lang->line('tem_certeza_excluir_programacoes'),
                                     'cancelar'=>$this->lang->line('cancelar'),
                                     'erro'=>$this->lang->line('erro'),
                                     'sim_deletar'=>$this->lang->line('sim_deletar'),
                                     'deletado'=>$this->lang->line('deletado'),
                                     'programacao_deletada'=>$this->lang->line('programacao_deletada'),
                                     'programacoes_deletadas'=>$this->lang->line('programacoes_deletadas'),
                                     'erro_deletar'=>$this->lang->line('erro_deletar'),
                                     'ops'=>$this->lang->line('ops'),
                                     'selecione_um_deletar'=>$this->lang->line('selecione_um_deletar')
                                     );

        $data['jsLoader'] = array(
                                  'assets/js/pages/programacoes.js'
                                  );

        $this->load->view('conta/templates/header', $data);
        $this->load->view('conta/postagem/programacoes');
        $this->load->view('conta/templates/footer');
    }

    public function paginas(){

        $data['titulo'] = $this->lang->line('menu_paginas');

        if($this->input->post('submit')){
          $data['message'] = $this->paginas->SalvaPagina();
        }

        $this->load->view('conta/templates/header', $data);
        $this->load->view('conta/paginas/index');
        $this->load->view('conta/templates/footer');
    }

    public function relatorios(){

        $data['titulo'] = $this->lang->line('menu_relatorios');

        $data['paginas'] = $this->paginas->TodasPaginas();

        $data['jsVariables'] = array(
                                     'postagem_por_dia'=>$this->lang->line('postagem_por_dia'),
                                     'quantidade_postagem_dia'=>$this->lang->line('quantidade_postagem_dia'),
                                     'quantidade'=>$this->lang->line('quantidade'),
                                     'curtidas_por_dia'=>$this->lang->line('curtidas_por_dia'),
                                     'curtidas_total_paginas'=>$this->lang->line('curtidas_total_paginas'),
                                     'aplicar'=>$this->lang->line('aplicar'),
                                     'cancelar'=>$this->lang->line('cancelar')
                                     );

        $data['jsLoader'] = array(
                          'assets/vendor/bower_components/moment/min/moment.min.js',
                          'assets/vendor/bower_components/bootstrap-daterangepicker/daterangepicker.js',
                          'assets/js/pages/relatorios.js'
                          );

        $this->load->view('conta/templates/header', $data);
        $this->load->view('conta/relatorios/index');
        $this->load->view('conta/templates/footer');
    }

    public function logoff(){

      $this->facebook->destroy_session();
      $this->session->unset_userdata('userid');

      redirect('login');
    }
}
