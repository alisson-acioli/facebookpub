<?php
defined('BASEPATH') OR exit('Você não tem permissão para acessar o script diretamente!');

class Cronjobs extends CI_Model{

    public function __construct(){
        parent::__construct();
    }

    public function FazerPostagem(){

        $error = false;
        $imagem = false;

        $this->db->where('data_programacao <= ', date('Y-m-d H:i:s'));
        $this->db->where('status', 1);
        $query = $this->db->get('programacoes');

        if($query->num_rows() > 0){

            foreach($query->result() as $result){

                if($result->tipo_programacao == 'texto'){

                    $params['message'] = $result->mensagem_post;

                }elseif($result->tipo_programacao == 'link'){

                    $params['message']     = $result->mensagem_post;
                    $params['link']        = $result->url_link;
                    $params['name']        = $result->titulo_link;
                    $params['description'] = $result->descricao_link;
                    $params['picture']     = $result->imagem_link;

                }elseif($result->tipo_programacao == 'imagem'){

                    $params['message'] = $result->mensagem_post;
                    $params['url']  = $result->imagem_imagem;

                    $imagem = true;

                }elseif($result->tipo_programacao == 'video'){

                    $params['message'] = $result->mensagem_post;
                    $params['name'] = $result->titulo_video;
                    $params['description'] = $result->descricao_video;
                    $params['link']  = $result->link_video;

                }else{

                    $this->db->where('id', $result->id);
                    $this->db->update('programacoes', array('status'=>4));

                    $error = true;
                }

                if(!$error){

                    $this->db->where('id_programacao', $result->id);
                    $paginas = $this->db->get('programacoes_contas');

                    if($paginas->num_rows() > 0){

                        $success = false;

                        foreach($paginas->result() as $pagina){

                            $this->db->where('id_page', $pagina->id_conta);
                            $paginasTable = $this->db->get('paginas');

                            if($paginasTable->num_rows() > 0){

                                $rowPost = $paginasTable->row();

                                $post = $this->facebook->FazerPost($pagina->id_conta, $params, $rowPost->token, $imagem);

                                if(isset($post['id'])){
                                    $success = true;
                                }
                            }
                        }

                        if($success){

                            if($result->repetir_programacao == 1){

                                $ProximaExecucao = date('Y-m-d H:i:s', (strtotime($result->data_programacao) + $result->intervalo));
                                
                                if($ProximaExecucao <= $result->data_final_repeticao){

                                    $this->db->where('id', $result->id);
                                    $this->db->update('programacoes', array('data_programacao'=>$ProximaExecucao));
                                }else{

                                    $this->db->where('id', $result->id);
                                    $this->db->update('programacoes', array('status'=>2));
                                }
                            }else{

                                    $this->db->where('id', $result->id);
                                    $this->db->update('programacoes', array('status'=>2));
                            }
                        }
                    }
                }
            }
        }
    }
}
?>