<?php
defined('BASEPATH') OR exit('Você não tem permissão para acessar o script diretamente!');

class Requests extends CI_Controller {

    public function __construct(){
        parent::__construct();
    }

    public function post_texto(){

        $contagem = 0;

        $userid = $this->session->userdata('userid');

        $Mensagem        = $this->input->post('mensagem');
        $dataAgendamento = $this->input->post('data_agendamento');
        $horaAgendamento = $this->input->post('hora_agendamento');
        $repetirPostagem = $this->input->post('repetir_postagem');
        $Intervalo       = $this->input->post('intervalo');
        $dataFinal       = $this->input->post('data_final');
        $Paginas         = $this->input->post('paginas');

        $dataAgendamento = converter_data($dataAgendamento, '/', '-');

        $conteudoInsercaoProgramacao = array(
        'id_user' => $userid,
        'mensagem_post'=>$Mensagem,
        'data_programacao'=>$dataAgendamento,
        'hora_programacao'=>$horaAgendamento,
        'repetir_programacao'=>($repetirPostagem == 1) ? 1 : 0,
        'intervalo'=>(60*60*$Intervalo),
        'data_final_repeticao'=>($repetirPostagem == 1) ? converter_data($dataFinal, '/', '-') : NULL,
        'tipo_programacao'=>'texto',
        'data_criacao'=>date('Y-m-d'),
        'status'=>1
        );

        $this->db->insert('programacoes', $conteudoInsercaoProgramacao);

        $IDProgramacao = $this->db->insert_id();

        $separaPaginas = explode(',', $Paginas);

        foreach($separaPaginas as $pagina){

            $this->db->insert('programacoes_contas', array('id_programacao'=>$IDProgramacao, 'id_conta'=>$pagina, 'tipo'=>'pagina'));
            
            $contagem++;
        }

        if($contagem > 0){

            echo json_encode(array('status'=>1));
            
        }else{

            echo json_encode(array('status'=>0, 'erro'=>'Não foi encontrada nenhuma página/grupo para relacionar com a postagem a ser feita.'));
        }
    }

    public function post_link(){

        $contagem = 0;

        $userid = $this->session->userdata('userid');

        $Mensagem        = $this->input->post('mensagem');
        $tituloLink      = $this->input->post('titulo_link');
        $descricaoLink   = $this->input->post('descricao_link');
        $imagemLink      = $this->input->post('imagem_link');
        $urlLink         = $this->input->post('url_link');
        $dataAgendamento = $this->input->post('data_agendamento');
        $horaAgendamento = $this->input->post('hora_agendamento');
        $repetirPostagem = $this->input->post('repetir_postagem');
        $Intervalo       = $this->input->post('intervalo');
        $dataFinal       = $this->input->post('data_final');
        $Paginas         = $this->input->post('paginas');

        $dataAgendamento = converter_data($dataAgendamento, '/', '-');

        $conteudoInsercaoProgramacao = array(
        'id_user' => $userid,
        'titulo_link'=>$tituloLink,
        'descricao_link'=>$descricaoLink,
        'imagem_link'=>$imagemLink,
        'url_link'=>$urlLink,
        'mensagem_post'=>$Mensagem,
        'data_programacao'=>$dataAgendamento,
        'hora_programacao'=>$horaAgendamento,
        'repetir_programacao'=>($repetirPostagem == 1) ? 1 : 0,
        'intervalo'=>(60*60*$Intervalo),
        'data_final_repeticao'=>($repetirPostagem == 1) ? converter_data($dataFinal, '/', '-') : NULL,
        'tipo_programacao'=>'link',
        'data_criacao'=>date('Y-m-d'),
        'status'=>1
        );

        $this->db->insert('programacoes', $conteudoInsercaoProgramacao);

        $IDProgramacao = $this->db->insert_id();

        $separaPaginas = explode(',', $Paginas);

        foreach($separaPaginas as $pagina){

            $this->db->insert('programacoes_contas', array('id_programacao'=>$IDProgramacao, 'id_conta'=>$pagina, 'tipo'=>'pagina'));
            
            $contagem++;
        }

        if($contagem > 0){

            echo json_encode(array('status'=>1));
            
        }else{

            echo json_encode(array('status'=>0, 'erro'=>'Não foi encontrada nenhuma página/grupo para relacionar com a postagem a ser feita.'));
        }
    }

    public function post_imagem(){

        $contagem = 0;

        $userid = $this->session->userdata('userid');

        $Mensagem        = $this->input->post('mensagem');
        $imagemImagem    = $this->input->post('imagem_imagem');
        $dataAgendamento = $this->input->post('data_agendamento');
        $horaAgendamento = $this->input->post('hora_agendamento');
        $repetirPostagem = $this->input->post('repetir_postagem');
        $Intervalo       = $this->input->post('intervalo');
        $dataFinal       = $this->input->post('data_final');
        $Paginas         = $this->input->post('paginas');

        $dataAgendamento = converter_data($dataAgendamento, '/', '-');

        $conteudoInsercaoProgramacao = array(
        'imagem_imagem'=>$imagemImagem,
        'mensagem_post'=>$Mensagem,
        'data_programacao'=>$dataAgendamento,
        'hora_programacao'=>$horaAgendamento,
        'repetir_programacao'=>($repetirPostagem == 1) ? 1 : 0,
        'intervalo'=>(60*60*$Intervalo),
        'data_final_repeticao'=>($repetirPostagem == 1) ? converter_data($dataFinal, '/', '-') : NULL,
        'tipo_programacao'=>'imagem',
        'data_criacao'=>date('Y-m-d'),
        'status'=>1
        );

        $this->db->insert('programacoes', $conteudoInsercaoProgramacao);

        $IDProgramacao = $this->db->insert_id();

        $separaPaginas = explode(',', $Paginas);

        foreach($separaPaginas as $pagina){

            $this->db->insert('programacoes_contas', array('id_programacao'=>$IDProgramacao, 'id_conta'=>$pagina, 'tipo'=>'pagina'));
            
            $contagem++;
        }

        if($contagem > 0){

            echo json_encode(array('status'=>1));
            
        }else{

            echo json_encode(array('status'=>0, 'erro'=>'Não foi encontrada nenhuma página/grupo para relacionar com a postagem a ser feita.'));
        }
    }

    public function post_video(){

        $contagem = 0;

        $userid = $this->session->userdata('userid');

        $tituloVideo     = $this->input->post('titulo_video');
        $descricaoVideo  = $this->input->post('descricao_video');
        $urlVideo        = $this->input->post('url_video');
        $dataAgendamento = $this->input->post('data_agendamento');
        $horaAgendamento = $this->input->post('hora_agendamento');
        $repetirPostagem = $this->input->post('repetir_postagem');
        $Intervalo       = $this->input->post('intervalo');
        $dataFinal       = $this->input->post('data_final');
        $Paginas         = $this->input->post('paginas');

        $dataAgendamento = converter_data($dataAgendamento, '/', '-');

        $conteudoInsercaoProgramacao = array(
        'titulo_video'=>$tituloVideo,
        'descricao_video'=>$descricaoVideo,
        'link_video'=>$urlVideo,
        'data_programacao'=>$dataAgendamento,
        'hora_programacao'=>$horaAgendamento,
        'repetir_programacao'=>($repetirPostagem == 1) ? 1 : 0,
        'intervalo'=>(60*60*$Intervalo),
        'data_final_repeticao'=>($repetirPostagem == 1) ? converter_data($dataFinal, '/', '-') : NULL,
        'tipo_programacao'=>'video',
        'data_criacao'=>date('Y-m-d'),
        'status'=>1
        );

        $this->db->insert('programacoes', $conteudoInsercaoProgramacao);

        $IDProgramacao = $this->db->insert_id();

        $separaPaginas = explode(',', $Paginas);

        foreach($separaPaginas as $pagina){

            $this->db->insert('programacoes_contas', array('id_programacao'=>$IDProgramacao, 'id_conta'=>$pagina, 'tipo'=>'pagina'));
            
            $contagem++;
        }

        if($contagem > 0){

            echo json_encode(array('status'=>1));
            
        }else{

            echo json_encode(array('status'=>0, 'erro'=>'Não foi encontrada nenhuma página/grupo para relacionar com a postagem a ser feita.'));
        }
    }
}