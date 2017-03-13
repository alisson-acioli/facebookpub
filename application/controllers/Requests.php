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
        'intervalo'=>(60*60*24*$Intervalo),
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
        'intervalo'=>(60*60*24*$Intervalo),
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
        'intervalo'=>(60*60*24*$Intervalo),
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
        'intervalo'=>(60*60*24*$Intervalo),
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

    public function details_programming(){

        $userid = $this->session->userdata('userid');

        $id = $this->input->post('id');

        $html = '';

        $this->db->where('id_user', $userid);
        $this->db->where('id', $id);
        $query = $this->db->get('programacoes');

        $this->db->where('id_programacao', $id);
        $queryPages = $this->db->get('programacoes_contas');

        if($query->num_rows() > 0){

            $row = $query->row();

            $html .= '<h5>Tipo de Publicação: <u>'.ucfirst(strtolower($row->tipo_programacao)).'</u></h5><br />';

            if($row->tipo_programacao == 'texto'){
                
                $html .= '<b>Mensagem do Post:</b> '.$row->mensagem_post.'<br /><br />';

            }elseif($row->tipo_programacao == 'link'){

                $html .= '<b>Título:</b> '.$row->titulo_link.'<br />';
                $html .= '<b>Descrição:</b> '.$row->descricao_link.'<br />';
                $html .= '<b>Imagem:</b> <a href="'.$row->imagem_link.'" target="_blank">'.$row->imagem_link.'</a><br />';
                $html .= '<b>URL:</b> <a href="'.$row->url_link.'" target="_blank">'.$row->url_link.'</a><br />';
                $html .= '<b>Mensagem do Post:</b> '.$row->mensagem_post.'<br /><br />';
               

            }elseif($row->tipo_programacao == 'imagem'){

                $html .= '<b>Imagem:</b> <a href="'.$row->imagem_imagem.'" target="_blank">'.$row->imagem_imagem.'</a><br />';
                $html .= '<b>Mensagem do Post:</b> '.$row->mensagem_post.'<br /><br />';


            }elseif($row->tipo_programacao == 'video'){

                $html .= '<b>Título:</b> '.$row->titulo_video.'<br />';
                $html .= '<b>Descrição:</b> '.$row->descricao_video.'<br />';
                $html .= '<b>Link Vídeo:</b> <a href="'.$row->link_video.'" target="_blank">'.$row->link_video.'</a><br />';
                $html .= '<b>URL:</b> <a href="'.$row->url_link.'" target="_blank">'.$row->url_link.'</a><br /><br />';

            }else{
                echo '<div class="alert alert-danger text-center">O tipo de publicação não é compatível com o sistema. Fale com um administrador</div>';
                return;
            }

            $html .= '<b>Data da Programação:</b> '.converter_data($row->data_programacao, '-', '/').' às '.$row->hora_programacao.'<br />';
            
            $repete_programacao = ($row->repetir_programacao == 1) ? 'Sim' : 'Não';

            $html .= '<b>Repetir Programação:</b> '.$repete_programacao.'<br /><br />';

            if($row->repetir_programacao == 1){

                $dias = ($row->intervalo/3600)/24;

                if($dias < 7){
                    $label = 'Dia(s)';
                }elseif($dias >= 7 && $dias < 30){
                    $label = 'Semana(s)';
                }elseif($dias >= 30 && $dias < 365){
                    $label = 'Mes(es)';
                }else{
                    $label = 'Ano(s)';
                }

                $html .= '<b>Intervalo:</b> A cada '.$dias.' '.$label.'<br />';
                $html .= '<b>Data Final:</b> '.converter_data($row->data_final_repeticao, '-', '/').'<br /><br />';
            }

            foreach($queryPages->result() as $key=>$page){

                $html .= 'Página '.$key.' - '.$this->facebook->NamePage($page->id_conta).'<br />';
            }

          switch($row->status){
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
          $html .= '<b>Status:</b> <span class="label '.$label.'">'.StatusPostagem($row->status).'</span>';

          echo $html;

        }else{
            echo '<div class="alert alert-danger text-center">Você não tem autorização para ver detalhes dessa publicação.</div>';
        }
    }

    public function delete_programming(){

        $userid = $this->session->userdata('userid');

        $id = $this->input->post('id');

        $separa = explode(',', $id);

        if(!empty($separa)){

            foreach($separa as $idProgramacao){

                $this->db->where('id_user', $userid);
                $this->db->where('id', $idProgramacao);
                $query = $this->db->get('programacoes');

                if($query->num_rows() > 0){

                    $this->db->where('id_user', $userid);
                    $this->db->where('id', $idProgramacao);
                    $this->db->delete('programacoes');

                    $this->db->where('id_programacao', $idProgramacao);
                    $this->db->delete('programacoes_contas');
                }
            }

            echo json_encode(array('status'=>1));

        }else{
            echo json_encode(array('status'=>0, 'erro'=>'Nenhuma programação foi selecionada para excluir.'));
        }
    }
}