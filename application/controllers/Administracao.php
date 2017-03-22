<?php
defined('BASEPATH') OR exit('Você não tem permissão para acessar o script diretamente!');

class Administracao extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->model('administracaomodel', 'AdministracaoModel');
        checksession();
        isAdmin();
    }

    public function usuarios(){

        $data['titulo'] = $this->lang->line('submenu_usuarios');
        
        $data['usuarios'] = $this->AdministracaoModel->TodosUsuarios();

        $data['jsVariables'] = array(
                                     'tem_certeza'=>$this->lang->line('tem_certeza'),
                                     'tem_certeza_excluir_usuario'=>$this->lang->line('tem_certeza_excluir_usuario'),
                                     'cancelar'=>$this->lang->line('cancelar'),
                                     'erro'=>$this->lang->line('erro'),
                                     'sim_deletar'=>$this->lang->line('sim_deletar'),
                                     'deletado'=>$this->lang->line('deletado'),
                                     'usuario_deletado'=>$this->lang->line('usuario_deletado'),
                                     'erro_deletar'=>$this->lang->line('erro_deletar')
                                     );

        $data['jsLoader'] = array(
                                  'assets/js/pages/administracao.js'
                                  );

        $this->load->view('conta/templates/header', $data);
        $this->load->view('conta/administrador/usuarios');
        $this->load->view('conta/templates/footer');
    }

    public function configuracoes(){

        $data['titulo'] = $this->lang->line('submenu_configuracoes');

        $data['linguas'] = $this->AdministracaoModel->LinguagensSite();

        if($this->input->post('submit')){

            $data['message'] = $this->AdministracaoModel->SalvarConfiguracoes();
        }

        $this->load->view('conta/templates/header', $data);
        $this->load->view('conta/administrador/sistema');
        $this->load->view('conta/templates/footer');
    }
}