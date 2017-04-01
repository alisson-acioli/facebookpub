<?php
defined('BASEPATH') OR exit('Você não tem permissão para acessar o script diretamente!');

if(!is_null(website_config('timezone'))){
    date_default_timezone_set(website_config('timezone'));
}

class Administracaomodel extends CI_Model{

    public function __construct(){
        parent::__construct();

        if($this->session->has_userdata('lingua')){
          $lang = $this->session->userdata('lingua');
        }else{
          $lang = website_config('linguagem');
          $this->session->set_userdata('lingua', $lang);
        }

        $this->lang->load($lang, $lang);
    }

    public function TodosUsuarios(){

        $this->db->order_by('nome', 'ASC');
        $usuarios = $this->db->get('usuarios');

        if($usuarios->num_rows() > 0){

            return $usuarios->result();
        }

        return false;
    }

    public function LinguagensSite(){

        $linguas = array();

        $openLanguagesDir = opendir('application/language');

        while($readLanguagesDir = readdir($openLanguagesDir)){

           if($readLanguagesDir != '.' && $readLanguagesDir != '..' && is_dir('application/language/'.$readLanguagesDir)){

            $linguas[] = strtoupper($readLanguagesDir);

           }
       }

       return $linguas;
    }

    public function SalvarConfiguracoes(){

        $nome_site = $this->input->post('nome_site');
        $descricao_site = $this->input->post('descricao_site');
        $lingua = $this->input->post('lingua');
        $timezone = $this->input->post('timezone');
        $app_id = $this->input->post('app_id');
        $app_secret = $this->input->post('app_secret');
        $permitir_cadastros = $this->input->post('permitir_cadastros');

        $update = $this->db->update('website_config', array('nome_site'=>$nome_site, 'descricao_site'=>$descricao_site, 'linguagem'=>$lingua, 'timezone'=>$timezone, 'app_id'=>$app_id, 'app_secret'=>$app_secret, 'permitir_cadastros'=>$permitir_cadastros));
        
        if($update){

            return '<div class="alert alert-success text-center">'.$this->lang->line('dados_atualizados').'</div>';
        }else{
            return '<div class="alert alert-danger text-center">'.$this->lang->line('erro_atualizar_dados').'</div>';
        }
    }
}
?>