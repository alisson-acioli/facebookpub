<?php
defined('BASEPATH') OR exit('Você não tem permissão para acessar o script diretamente!');

class Requests extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->model('paginas');

        if($this->session->has_userdata('lingua')){
          $lang = $this->session->userdata('lingua');
        }else{
          $lang = website_config('linguagem');
          $this->session->set_userdata('lingua', $lang);
        }

        $this->lang->load($lang, $lang);
    }

    public function send_link_recoverpassword(){

        $email = $this->input->post('email');

        $this->db->where('email', $email);
        $user = $this->db->get('usuarios');

        if($user->num_rows() > 0){

            $hash = md5(time().rand(10,100));

            $this->db->insert('codigos_recuperacao_senha', array('email'=>$email, 'codigo'=>$hash, 'expirado'=>0));

            $link_recuperacao = base_url().'login/recover?email='.$email.'&code='.$hash;

            $html  = 'Olá, recebemos uma solicitação de recuperação de senha para sua conta. Caso não foi você, por favor, ignore esse email. <br /><br />';
            $html .= '<b>Link de recuperação:</b> <a href="'.$link_recuperacao.'" target="_blank">'.$link_recuperacao.'</a> <br /><br />';
            $html .= 'Estamos a disposição.';

            $urlWebmail = parse_url(base_url());

            $this->email->to($email);
            $this->email->from('no-reply@'.str_replace('www.', '', $urlWebmail['host']));
            $this->email->set_mailtype('html');
            $this->email->subject('Link de confirmação');
            $this->email->message($html);

            if($this->email->send()){

                echo json_encode(array('status'=>1, 'message'=>$this->lang->line('email_confirmacao_enviado'), 'class'=>'alert alert-success text-center'));
            }else{
                echo json_encode(array('status'=>0, 'message'=>$this->lang->line('erro_enviar_confirmacao'), 'class'=>'alert alert-danger text-center'));
            }
        }else{

            echo json_encode(array('status'=>0, 'message'=>$this->lang->line('email_nao_encontrado'), 'class'=>'alert alert-danger text-center'));
        }
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
        $Grupos          = $this->input->post('grupos');
        $PostarPor       = $this->input->post('postar_por');
        $Perfils         = $this->input->post('perfils');
        $lugar           = $this->input->post('lugar');

        $dataAgendamento = converter_data($dataAgendamento, '/', '-');

        $conteudoInsercaoProgramacao = array(
        'id_user' => $userid,
        'mensagem_post'=>$Mensagem,
        'data_programacao'=>$dataAgendamento.' '.$horaAgendamento,
        'repetir_programacao'=>($repetirPostagem == 1) ? 1 : 0,
        'intervalo'=>(60*60*24*$Intervalo),
        'data_final_repeticao'=>($repetirPostagem == 1) ? converter_data($dataFinal, '/', '-').' 23:59:59' : NULL,
        'tipo_programacao'=>'texto',
        'lugar_postagem'=>$lugar,
        'data_criacao'=>date('Y-m-d'),
        'status'=>1
        );

        $this->db->insert('programacoes', $conteudoInsercaoProgramacao);

        $IDProgramacao = $this->db->insert_id();

        if($lugar == 'pagina'){

            $Paginas = rtrim($Paginas, ',');

            $separaPaginas = explode(',', $Paginas);

            foreach($separaPaginas as $pagina){

                $this->db->insert('programacoes_contas', array('id_programacao'=>$IDProgramacao, 'id_conta'=>$pagina, 'tipo'=>'pagina'));
                
                $contagem++;
            }

        }elseif($lugar == 'perfil'){

            $Perfils = rtrim($Perfils, ',');

            $separaPerfils = explode(',', $Perfils);

            foreach($separaPerfils as $perfil){

                $this->db->insert('programacoes_contas', array('id_programacao'=>$IDProgramacao, 'id_conta'=>$perfil, 'tipo'=>'perfil'));
                
                $contagem++;
            }

        }elseif($lugar == 'grupo'){

            $Grupos = rtrim($Grupos, ',');

            $separaGrupos = explode(',', $Grupos);

            foreach($separaGrupos as $grupo){

                $this->db->insert('programacoes_contas', array('id_programacao'=>$IDProgramacao, 'id_conta'=>$grupo, 'post_group_admin'=>$PostarPor, 'tipo'=>'grupo'));
                
                $contagem++;
            }

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
        $Grupos          = $this->input->post('grupos');
        $PostarPor       = $this->input->post('postar_por');
        $Perfils         = $this->input->post('perfils');
        $lugar           = $this->input->post('lugar');

        $dataAgendamento = converter_data($dataAgendamento, '/', '-');

        $conteudoInsercaoProgramacao = array(
        'id_user' => $userid,
        'titulo_link'=>$tituloLink,
        'descricao_link'=>$descricaoLink,
        'imagem_link'=>$imagemLink,
        'url_link'=>$urlLink,
        'mensagem_post'=>$Mensagem,
        'data_programacao'=>$dataAgendamento.' '.$horaAgendamento,
        'repetir_programacao'=>($repetirPostagem == 1) ? 1 : 0,
        'intervalo'=>(60*60*24*$Intervalo),
        'data_final_repeticao'=>($repetirPostagem == 1) ? converter_data($dataFinal, '/', '-').' 23:59:59' : NULL,
        'tipo_programacao'=>'link',
        'lugar_postagem'=>$lugar,
        'data_criacao'=>date('Y-m-d'),
        'status'=>1
        );

        $this->db->insert('programacoes', $conteudoInsercaoProgramacao);

        $IDProgramacao = $this->db->insert_id();

        if($lugar == 'pagina'){

            $Paginas = rtrim($Paginas, ',');

            $separaPaginas = explode(',', $Paginas);

            foreach($separaPaginas as $pagina){

                $this->db->insert('programacoes_contas', array('id_programacao'=>$IDProgramacao, 'id_conta'=>$pagina, 'tipo'=>'pagina'));
                
                $contagem++;
            }

        }elseif($lugar == 'perfil'){

            $Perfils = rtrim($Perfils, ',');

            $separaPerfils = explode(',', $Perfils);

            foreach($separaPerfils as $perfil){

                $this->db->insert('programacoes_contas', array('id_programacao'=>$IDProgramacao, 'id_conta'=>$perfil, 'tipo'=>'perfil'));
                
                $contagem++;
            }

        }elseif($lugar == 'grupo'){

            $Grupos = rtrim($Grupos, ',');

            $separaGrupos = explode(',', $Grupos);

            foreach($separaGrupos as $grupo){

                $this->db->insert('programacoes_contas', array('id_programacao'=>$IDProgramacao, 'id_conta'=>$grupo, 'post_group_admin'=>$PostarPor, 'tipo'=>'grupo'));
                
                $contagem++;
            }

        }

        if($contagem > 0){

            echo json_encode(array('status'=>1));
            
        }else{

            echo json_encode(array('status'=>0, 'erro'=>$this->lang->line('nenhum_pagina_encontrada')));
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
        $Grupos          = $this->input->post('grupos');
        $PostarPor       = $this->input->post('postar_por');
        $Perfils         = $this->input->post('perfils');
        $lugar           = $this->input->post('lugar');

        $dataAgendamento = converter_data($dataAgendamento, '/', '-');

        $conteudoInsercaoProgramacao = array(
        'id_user'=>$userid,
        'imagem_imagem'=>$imagemImagem,
        'mensagem_post'=>$Mensagem,
        'data_programacao'=>$dataAgendamento.' '.$horaAgendamento,
        'repetir_programacao'=>($repetirPostagem == 1) ? 1 : 0,
        'intervalo'=>(60*60*24*$Intervalo),
        'data_final_repeticao'=>($repetirPostagem == 1) ? converter_data($dataFinal, '/', '-').' 23:59:59' : NULL,
        'tipo_programacao'=>'imagem',
        'lugar_postagem'=>$lugar,
        'data_criacao'=>date('Y-m-d'),
        'status'=>1
        );

        $this->db->insert('programacoes', $conteudoInsercaoProgramacao);

        $IDProgramacao = $this->db->insert_id();

        if($lugar == 'pagina'){

            $Paginas = rtrim($Paginas, ',');

            $separaPaginas = explode(',', $Paginas);

            foreach($separaPaginas as $pagina){

                $this->db->insert('programacoes_contas', array('id_programacao'=>$IDProgramacao, 'id_conta'=>$pagina, 'tipo'=>'pagina'));
                
                $contagem++;
            }

        }elseif($lugar == 'perfil'){

            $Perfils = rtrim($Perfils, ',');

            $separaPerfils = explode(',', $Perfils);

            foreach($separaPerfils as $perfil){

                $this->db->insert('programacoes_contas', array('id_programacao'=>$IDProgramacao, 'id_conta'=>$perfil, 'tipo'=>'perfil'));
                
                $contagem++;
            }

        }elseif($lugar == 'grupo'){

            $Grupos = rtrim($Grupos, ',');

            $separaGrupos = explode(',', $Grupos);

            foreach($separaGrupos as $grupo){

                $this->db->insert('programacoes_contas', array('id_programacao'=>$IDProgramacao, 'id_conta'=>$grupo, 'post_group_admin'=>$PostarPor, 'tipo'=>'grupo'));
                
                $contagem++;
            }

        }

        if($contagem > 0){

            echo json_encode(array('status'=>1));
            
        }else{

            echo json_encode(array('status'=>0, 'erro'=>$this->lang->line('nenhum_pagina_encontrada')));
        }
    }

    public function post_video(){

        $contagem = 0;

        $userid = $this->session->userdata('userid');

        $tituloVideo     = $this->input->post('titulo_video');
        $descricaoVideo  = $this->input->post('descricao_video');
        $urlVideo        = $this->input->post('url_video');
        $mensagem        = $this->input->post('mensagem');
        $dataAgendamento = $this->input->post('data_agendamento');
        $horaAgendamento = $this->input->post('hora_agendamento');
        $repetirPostagem = $this->input->post('repetir_postagem');
        $Intervalo       = $this->input->post('intervalo');
        $dataFinal       = $this->input->post('data_final');
        $Paginas         = $this->input->post('paginas');
        $Grupos          = $this->input->post('grupos');
        $PostarPor       = $this->input->post('postar_por');
        $Perfils         = $this->input->post('perfils');
        $lugar           = $this->input->post('lugar');

        $dataAgendamento = converter_data($dataAgendamento, '/', '-');

        $conteudoInsercaoProgramacao = array(
        'id_user'=>$userid,
        'titulo_video'=>$tituloVideo,
        'descricao_video'=>$descricaoVideo,
        'link_video'=>$urlVideo,
        'mensagem_post'=>$mensagem,
        'data_programacao'=>$dataAgendamento.' '.$horaAgendamento,
        'repetir_programacao'=>($repetirPostagem == 1) ? 1 : 0,
        'intervalo'=>(60*60*24*$Intervalo),
        'data_final_repeticao'=>($repetirPostagem == 1) ? converter_data($dataFinal, '/', '-').' 23:59:59' : NULL,
        'tipo_programacao'=>'video',
        'lugar_postagem'=>$lugar,
        'data_criacao'=>date('Y-m-d'),
        'status'=>1
        );

        $this->db->insert('programacoes', $conteudoInsercaoProgramacao);

        $IDProgramacao = $this->db->insert_id();

        if($lugar == 'pagina'){

            $Paginas = rtrim($Paginas, ',');

            $separaPaginas = explode(',', $Paginas);

            foreach($separaPaginas as $pagina){

                $this->db->insert('programacoes_contas', array('id_programacao'=>$IDProgramacao, 'id_conta'=>$pagina, 'tipo'=>'pagina'));
                
                $contagem++;
            }

        }elseif($lugar == 'perfil'){

            $Perfils = rtrim($Perfils, ',');

            $separaPerfils = explode(',', $Perfils);

            foreach($separaPerfils as $perfil){

                $this->db->insert('programacoes_contas', array('id_programacao'=>$IDProgramacao, 'id_conta'=>$perfil, 'tipo'=>'perfil'));
                
                $contagem++;
            }

        }elseif($lugar == 'grupo'){

            $Grupos = rtrim($Grupos, ',');

            $separaGrupos = explode(',', $Grupos);

            foreach($separaGrupos as $grupo){

                $this->db->insert('programacoes_contas', array('id_programacao'=>$IDProgramacao, 'id_conta'=>$grupo, 'post_group_admin'=>$PostarPor, 'tipo'=>'grupo'));
                
                $contagem++;
            }

        }

        if($contagem > 0){

            echo json_encode(array('status'=>1));
            
        }else{

            echo json_encode(array('status'=>0, 'erro'=>$this->lang->line('nenhum_pagina_encontrada')));
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

            $html .= '<h5>'.$this->lang->line('tipo_publicacao').': <u>'.str_replace(array('Texto', 'Link', 'Imagem', 'Vídeo'), array($this->lang->line('postagem_texto'), $this->lang->line('postagem_link'), $this->lang->line('postagem_imagem'), $this->lang->line('postagem_video')), ucfirst(strtolower($row->tipo_programacao))).'</u></h5><br />';

            if($row->tipo_programacao == 'texto'){
                
                $html .= '<b>'.$this->lang->line('mensagem_post').':</b> '.$row->mensagem_post.'<br /><br />';

            }elseif($row->tipo_programacao == 'link'){

                $html .= '<b>'.$this->lang->line('titulo_link').':</b> '.$row->titulo_link.'<br />';
                $html .= '<b>'.$this->lang->line('descricao_link').':</b> '.$row->descricao_link.'<br />';
                $html .= '<b>'.$this->lang->line('imagem_link').':</b> <a href="'.$row->imagem_link.'" target="_blank">'.$this->lang->line('clique_visualizar').'</a><br />';
                $html .= '<b>'.$this->lang->line('url_link').':</b> <a href="'.$row->url_link.'" target="_blank">'.$this->lang->line('clique_visualizar').'</a><br />';
                $html .= '<b>'.$this->lang->line('mensagem_post').':</b> '.$row->mensagem_post.'<br /><br />';
               

            }elseif($row->tipo_programacao == 'imagem'){

                $html .= '<b>'.$this->lang->line('link_imagem').':</b> <a href="'.$row->imagem_imagem.'" target="_blank">'.$this->lang->line('clique_visualizar').'</a><br />';
                $html .= '<b>'.$this->lang->line('mensagem_post').':</b> '.$row->mensagem_post.'<br /><br />';


            }elseif($row->tipo_programacao == 'video'){

                $html .= '<b>'.$this->lang->line('titulo_video').':</b> '.$row->titulo_video.'<br />';
                $html .= '<b>'.$this->lang->line('descricao_video').':</b> '.$row->descricao_video.'<br />';
                $html .= '<b>'.$this->lang->line('url_video').':</b> <a href="'.$row->link_video.'" target="_blank">'.$this->lang->line('clique_visualizar').'</a><br />';
                $html .= '<b>'.$this->lang->line('mensagem_post').':</b> '.$row->mensagem_post.'<br />';

            }else{
                echo '<div class="alert alert-danger text-center">'.$this->lang->line('publicacao_nao_compativel').'</div>';
                return;
            }

            $separaDataHora = explode(' ', $row->data_programacao);
            $html .= '<b>'.$this->lang->line('data_programacao').':</b> '.converter_data($separaDataHora[0], '-', '/').' '.$this->lang->line('as').' '.$separaDataHora[1].'<br />';
            
            $repete_programacao = ($row->repetir_programacao == 1) ? $this->lang->line('sim') : $this->lang->line('nao');

            $html .= '<b>'.$this->lang->line('repetir_programacao').':</b> '.$repete_programacao.'<br /><br />';

            if($row->repetir_programacao == 1){

                $dias = ($row->intervalo/3600)/24;

                if($dias < 7){
                    $label = $this->lang->line('dias');
                }elseif($dias >= 7 && $dias < 30){
                    $label = $this->lang->line('semanas');
                }elseif($dias >= 30 && $dias < 365){
                    $label = $this->lang->line('meses');
                }else{
                    $label = $this->lang->line('anos');
                }

                $html .= '<b>'.$this->lang->line('intervalo').':</b> '.$this->lang->line('a_cada').' '.$dias.' '.$label.'<br />';

                $separaDataFinalRepeticao = explode(' ', $row->data_final_repeticao);

                $html .= '<b>'.$this->lang->line('data_final').':</b> '.converter_data($separaDataFinalRepeticao[0], '-', '/').'<br /><br />';
            }

            foreach($queryPages->result() as $key=>$page){

                if($page->tipo == 'pagina'){

                    $html .= $this->lang->line('pagina').' '.($key+1).' - '.$this->facebook->NamePage($page->id_conta).'<br />';
                
                }elseif($page->tipo == 'perfil'){

                    $html .= $this->lang->line('perfil_facebook').' '.($key+1).' - '.$this->facebook->getNameProfile($page->id_conta).'<br />';

                }elseif($page->tipo == 'grupo'){

                    $html .= $this->lang->line('grupo').' '.($key+1).' - '.$this->facebook->NameGroup($page->id_conta).'<br />';
                }

                if(!empty($page->post_id) && !is_null($page->post_id)){

                    $html .= '<a class="pointer" href="https://www.facebook.com/permalink.php?story_fbid='.$page->post_id.'&id='.$page->id_conta.'" target="_blank" style="text-decoration:underline;">'.$this->lang->line('clique_visualizar_publicacao').'</a> <br /><br />';
                }
            }

            $html .= '<br />';

          switch($row->status){
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
          $html .= '<b>'.$this->lang->line('status').':</b> <span class="label '.$label.'">'.StatusPostagem($row->status).'</span> <br /><br />';

          if($row->status == 4){

            $html .= '<div class="alert alert-danger text-center">'.$row->erro_post.'</div>';
          }

          echo $html;

        }else{
            echo '<div class="alert alert-danger text-center">'.$this->lang->line('sem_permissao_detalhes').'</div>';
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
            echo json_encode(array('status'=>0, 'erro'=>$this->lang->line('nenhum_publicacao_excluir')));
        }
    }

    public function relatorio_postagens(){

        $userid  = $this->session->userdata('userid');

        $pagina  = $this->input->post('paginas');
        $periodo = $this->input->post('periodo');

        $paginas_id = array();

        if($pagina == false || empty($pagina)){

            if($this->paginas->TodasPaginas()){

                foreach($this->paginas->TodasPaginas() as $paginas){

                    $paginas_id[] = $paginas['page_id'];
                }
            }
        }else{

            $paginas_id = explode(',', $pagina);
        }

        $this->db->where_in('programacoes_contas.id_conta', $paginas_id);

        if($periodo == false || empty($periodo)){

            $this->db->where('programacoes.data_programacao >= ', date('Y-m-d', time() - (60*60*24*5)));
            $this->db->where('programacoes.data_programacao <= ', date('Y-m-d', time() + (60*60*24*10)));
        
        }else{

            $separaPeriodo = explode('-', $periodo);

            $dataInicial = converter_data(trim($separaPeriodo[0]), '/', '-');
            $dataFinal   = converter_data(trim($separaPeriodo[1]), '/', '-');

            $this->db->where('programacoes.data_programacao >= ', $dataInicial);
            $this->db->where('programacoes.data_programacao <= ', $dataFinal);
        }

        $this->db->where('programacoes.status', 2);
        $this->db->where('id_user', $userid);

        $this->db->select('COUNT(*) AS quantidade, programacoes.data_programacao, programacoes_contas.id_conta');
        $this->db->from('programacoes');
        $this->db->join('programacoes_contas', 'programacoes.id = programacoes_contas.id_programacao', 'inner');
        $this->db->group_by(array('programacoes.data_programacao', 'programacoes_contas.id_conta'));

        $query = $this->db->get();

        if($query->num_rows() > 0){

            $dias = array();

            foreach($query->result() as $result){

                $separadorData = explode(" ", $result->data_programacao);

                if(!in_array(converter_data($separadorData[0], '-', '/'), $dias)){

                    $separadorData = explode(" ", $result->data_programacao);
                    $dias[] = converter_data($separadorData[0], '-', '/');
                }

                $data[$result->id_conta][] = array('data'=>converter_data($separadorData[0], '-', '/'),'quantidade'=>$result->quantidade);
            }

            foreach($data as $id_conta=>$dataSecound){

                $quantidades = array();

                foreach($dataSecound as $array){

                    foreach($dias as $dataCompleta){

                        if($array['data'] == $dataCompleta){

                            if(isset($quantidades[$dataCompleta])){

                                $quantidades[$dataCompleta] = (int)$quantidades[$dataCompleta] + (int)$array['quantidade'];
                            }else{
                                $quantidades[$dataCompleta] =  (int)$array['quantidade'];
                            }

                        }else{

                            if(!isset($quantidades[$dataCompleta])){
                                $quantidades[$dataCompleta] = 0;
                            }
                        }
                    }
                }

                $newValues = array();

                foreach($quantidades as $quantidade_unica){

                    $newValues[] = $quantidade_unica;
                }

                $new[] = array('name'=>$this->facebook->NamePage($id_conta), 'data'=>$newValues);
            }

            $grafico = array('series'=>$new, 'categories'=>$dias);

            echo json_encode($grafico);

        }else{
            echo json_encode(array('series'=>'', 'categories'=>''));
        }
    }

    public function relatorio_curtidas(){

        $userid  = $this->session->userdata('userid');

        $pagina  = $this->input->post('paginas');
        $periodo = $this->input->post('periodo');

        $paginas_id = array();

        if($pagina == false || empty($pagina)){

            if($this->paginas->TodasPaginas()){

                foreach($this->paginas->TodasPaginas() as $paginas){

                    $paginas_id[] = $paginas['page_id'];
                }
            }
        }else{

            $paginas_id = explode(',', $pagina);
        }

        $this->db->where_in('id_page', $paginas_id);

        if($periodo == false || empty($periodo)){

            $this->db->where('data >= ', date('Y-m-d H:i:s', time() - (60*60*24*5)));
            $this->db->where('data <= ', date('Y-m-d H:i:s', time() + (60*60*24*10)));
        
        }else{

            $separaPeriodo = explode('-', $periodo);

            $dataInicial = converter_data(trim($separaPeriodo[0]), '/', '-');
            $dataFinal   = converter_data(trim($separaPeriodo[1]), '/', '-');

            $this->db->where('data >= ', $dataInicial);
            $this->db->where('data <= ', $dataFinal);
        }

        $this->db->where('id_user', $userid);

        $this->db->group_by(array('data', 'id_page'));

        $this->db->select('SUM(quantidade) AS quantidade, id_page, data');
        $this->db->from('relatorio_curtidas');

        $query = $this->db->get();

        if($query->num_rows() > 0){

            $dias = array();

            foreach($query->result() as $result){

                if(!in_array($result->data, $dias)){

                    $separadorData = explode(" ", $result->data);
                    $dias[] = converter_data($separadorData[0], '-', '/');
                }

                $separadorData = explode(" ", $result->data);
                $data[$result->id_page][] = array('data'=>converter_data($separadorData[0], '-', '/'),'quantidade'=>$result->quantidade);
            }

            foreach($data as $id_conta=>$dataSecound){

                $quantidades = array();

                foreach($dataSecound as $array){

                    foreach($dias as $dataCompleta){

                        if($array['data'] == $dataCompleta){
                            $quantidades[$dataCompleta] = (int)$array['quantidade'];

                        }else{

                            if(!isset($quantidades[$dataCompleta])){
                                $quantidades[$dataCompleta] = 0;
                            }
                        }
                    }
                }

                $newValues = array();

                foreach($quantidades as $quantidade_unica){

                    $newValues[] = $quantidade_unica;
                }

                $new[] = array('name'=>$this->facebook->NamePage($id_conta), 'data'=>$newValues);
            }

            $grafico = array('series'=>$new, 'categories'=>$dias);

            echo json_encode($grafico);

        }else{
            echo json_encode(array('series'=>'', 'categories'=>''));
        }
    }

    public function user_edit(){
        
        $id = $this->input->post('id');

        $this->db->where('id', $id);
        $usuarios = $this->db->get('usuarios');

        if($usuarios->num_rows() > 0){

            $row = $usuarios->row();

            
            echo json_encode(array('status'=>1, 'fields'=>array('nome'=>$row->nome, 'email'=>$row->email, 'login'=>$row->login, 'status'=>$row->status, 'admin'=>$row->admin)));
        }else{

            echo json_encode(array('status'=>0, 'error'=>$this->lang->line('nenhum_usuario_encontrado_id'), 'class'=>'alert alert-danger text-center'));
        }
    }

    public function save_user(){

        $array = array();

        $id = $this->input->post('id');
        $nome = $this->input->post('nome');
        $email = $this->input->post('email');
        $login = $this->input->post('login');
        $senha = $this->input->post('senha');
        $status = $this->input->post('status');
        $admin = $this->input->post('admin');

        $this->db->where('id', $id);
        $user = $this->db->get('usuarios');

        $row = $user->row();

        if($row->login != $login){

            $this->db->where('login', $login);
            $userCheck = $this->db->get('usuarios');

            if($userCheck->num_rows() > 0){

                echo json_encode(array('class'=>'alert alert-danger text-center', 'message'=>$this->lang->line('login_cadastrado')));
            
            }else{
                $data['login'] = $login;
            }
        }

        if($row->email != $email){

            $this->db->where('email', $email);
            $emailCheck = $this->db->get('usuarios');

            if($emailCheck->num_rows() > 0){

                echo json_encode(array('class'=>'alert alert-danger text-center', 'message'=>$this->lang->line('email_ja_cadastrado')));

            }else{
                $data['email'] = $email;
            }
        }

        if(!empty($senha)){

            $data['senha'] = md5($senha);
        }
        
        $data['nome'] = $nome;
        $data['status'] = $status;
        $data['admin'] = $admin;

        $this->db->where('id', $id);
        $update = $this->db->update('usuarios', $data);

        if($update){

            echo json_encode(array('class'=>'alert alert-success text-center', 'message'=>$this->lang->line('dados_atualizados')));

        }else{

            echo json_encode(array('class'=>'alert alert-danger text-center', 'message'=>$this->lang->line('erro_atualizar_dados')));

        }
    }

    public function user_details(){

        $id = $this->input->post('id');

        $this->db->where('id', $id);
        $user = $this->db->get('usuarios');

        if($user->num_rows() > 0){

            $row = $user->row();

            $status = StatusUsuario($row->status);

            echo json_encode(array('status'=>1, 'fields'=>array('nome'=>$row->nome, 'email'=>$row->email, 'login'=>$row->login, 'status'=>$status, 'admin'=>($row->admin == 1) ? $this->lang->line('sim') : $this->lang->line('nao'))));
        }else{

            echo json_encode(array('status'=>0, 'class'=>'alert alert-danger text-center', 'error'=>$this->lang->line('nenhum_usuario_encontrado_id')));
        }
    }

    public function delete_user(){

        $id = $this->input->post('id');

        $this->db->where('id', $id);
        $delete = $this->db->delete('usuarios');

        if($delete){

            echo json_encode(array('status'=>1));
        }else{
            echo json_encode(array('status'=>0, 'erro'=>$this->lang->line('erro_atualizar_dados')));
        }
    }

    public function imageUpload(){

        $config['upload_path'] = 'uploads';
        $config['allowed_types'] = 'png|jpg|jpeg|gif';
        $config['encrypt_name'] = true;

        $this->load->library('upload');

        $this->upload->initialize($config);

        if($this->upload->do_upload('FileInput')){

            $upload = $this->upload->data();

            echo json_encode(array('status'=>1, 'url'=>base_url('uploads/'.$upload['file_name'])));

        }else{

            echo json_encode(array('status'=>0, 'error'=>$this->upload->display_errors()));
        }
    }

    public function info_group_posting(){

        $id_grupo = $this->input->post('id');

        $admins = $this->facebook->getAdminsGroup($id_grupo);

        $administradores = array();

        if(!empty($admins)){

            foreach($admins as $admin){

                $this->db->where('id_conta', $admin);
                $userProfiles = $this->db->get('usuarios_perfils');

                if($userProfiles->num_rows() > 0){

                    foreach($userProfiles->result() as $perfil){

                        $administradores[] = array('id_perfil'=>$perfil->id_conta, 'nome'=>$this->facebook->getNameProfile($perfil->id_conta));
                    }
                }
            }

            echo json_encode(array('status'=>1, 'admins'=>$administradores));
        }else{
            echo json_encode(array('status'=>0));
        }
    }
}