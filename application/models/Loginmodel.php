<?php
defined('BASEPATH') OR exit('Você não tem permissão para acessar o script diretamente!');

if(!is_null(website_config('timezone'))){
    date_default_timezone_set(website_config('timezone'));
}

class Loginmodel extends CI_Model{

    public function __construct(){
        parent::__construct();
    }

    public function Logar(){

        $login = $this->input->post('login');
        $senha = $this->input->post('senha');

        $this->db->where('login', $login);
        $this->db->where('senha', md5($senha));
        $query = $this->db->get('usuarios');

        if($query->num_rows() > 0){

            $row = $query->row();

            $this->session->set_userdata('userid', $row->id);

            redirect('conta');
        }else{

            return '<div class="alert alert-danger text-center">'.$this->lang->line('login_senha_invalidos').'</div>';
        }
    }

    public function Cadastrar(){

        $nome = $this->input->post('nome');
        $email = $this->input->post('email');
        $login = $this->input->post('login');
        $senha = $this->input->post('senha');

        $this->db->where('email', $email);
        $queryEmail = $this->db->get('usuarios');

        if($queryEmail->num_rows() > 0){
            return '<div class="alert alert-danger text-center">'.$this->lang->line('email_ja_cadastrado').'</div>';
        }

        $this->db->where('login', $login);
        $queryLogin = $this->db->get('usuarios');

        if($queryLogin->num_rows() > 0){
            return '<div class="alert alert-danger text-center">'.$this->lang->line('login_cadastrado').'</div>';
        }

        $data = array(
                      'admin'=>0,
                      'nome'=>$nome,
                      'email'=>$email,
                      'login'=>$login,
                      'senha'=>md5($senha),
                      'token'=>NULL,
                      'status'=>1,
                      'data_cadastro'=>time()
                      );

        $insert = $this->db->insert('usuarios', $data);

        if($insert){
            return '<div class="alert alert-success text-center">'.$this->lang->line('cadastro_efetuado').'</div>';
        }else{
            return '<div class="alert alert-danger text-center">'.$this->lang->line('erro_cadastro').'</div>';
        }
    }

    public function VerificaContaFacebook(){

        if($this->input->get('code') && $this->input->get('state')){

            $userid = $this->session->userdata('userid');
            $access_token = $this->session->userdata('fb_access_token');
            $id_account = $this->facebook->getAccountId();

            $this->db->where('id_conta', $id_account);
            $this->db->where('id_user', $userid);
            $perfils = $this->db->get('usuarios_perfils');

            if($perfils->num_rows() > 0){

                $this->db->where('id_conta', $id_account);
                $this->db->where('id_user', $userid);
                $this->db->update('usuarios_perfils', array('token'=>$access_token));
            }else{

                $this->db->insert('usuarios_perfils', array('id_user'=>$userid, 'id_conta'=>$id_account, 'token'=>$access_token));
            }
        }
    }

    public function MudarInformacoes(){

        $userid    = $this->session->userdata('userid');

        $nome      = $this->input->post('nome');
        $senha     = $this->input->post('senha');
        $novasenha = $this->input->post('novasenha');

        $data['nome'] = $nome;

        if(!empty($senha)){

            if($senha != $novasenha){

                return '<div class="alert alert-danger text-center">'.$this->lang->line('senhas_nao_conferem').'</div>';
            }

            $data['senha'] = md5($senha);
        }

        $this->db->where('id', $userid);
        $atualiza = $this->db->update('usuarios', $data);

        if($atualiza){

            return '<div class="alert alert-success text-center">'.$this->lang->line('dados_atualizados').'</div>';
        }

        return '<div class="alert alert-danger text-center">'.$this->lang->line('erro_atualizar_dados').'</div>';
    }

    public function TrocaSenha($email){

        $senha = $this->input->post('senha');
        $confirmar_senha = $this->input->post('confirmar_senha');

        if(!empty($senha) && !empty($confirmar_senha)){

            if($senha == $confirmar_senha){

                $this->db->where('email', $email);
                $update = $this->db->update('usuarios', array('senha'=>md5($senha)));

                if($update){

                    $this->db->where('email', $email);
                    $this->db->update('codigos_recuperacao_senha', array('expirado'=>1));

                    return '<div class="alert alert-success text-center">'.$this->lang->line('senha_alterada').'</div>';

                }else{

                    return '<div class="alert alert-danger text-center">'.$this->lang->line('erro_atualizar_senha').'</div>';
                }

            }else{

                return '<div class="alert alert-danger text-center">'.$this->lang->line('senhas_nao_conferem').'</div>';
            }
        }else{

            return '<div class="alert alert-danger text-center">'.$this->lang->line('preencha_todos_campos').'</div>';
        }
    }
}
?>