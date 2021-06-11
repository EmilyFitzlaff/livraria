<?php

    require_once('conexao.controller.php');

    require_once('../model/autor.model.php');
    require_once('../model/editora.model.php');
    require_once('../model/categoria.model.php');
    
    class Controller_Livro {
        /**
         * @return Array retorna em um array todas as informações do banco de dados
         */
        private function selectAll() {
            $consulta = Conexao::Conectar()->prepare("SELECT e.codigo as editora_codigo,
                                                             e.nomeFantasia as editora_descricao,
                                                             c.codigo as categoria_codigo,
                                                             c.descricao as categoria_descricao,
                                                             a.codigo as autor_codigo,
                                                             a.nome as autor_descricao,
                                                             l.codigo as livro_codigo,
                                                             l.descricao as livro_descricao,
                                                             l.dataPublicacao as livro_dataPublicacao                                                          
                                                        FROM livro l
                                                        join editora e on e.codigo = l.editora_codigo
                                                        join categoria c on c.codigo = l.categoria_codigo
                                                        join autor a on a.codigo = l.autor_codigo;");
            $consulta->execute();

            $aResultado = [];
            
            while($aLinha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $oLivro = new Model_Livro;
                $oLivro->setCodigo($aLinha['livro_codigo']);
                $oLivro->setDescricao($aLinha['livro_descricao']);
                $oLivro->setDataPublicacao($aLinha['livro_dataPublicacao']);

                $oEditora = new Model_Editora;
                $oEditora->setCodigo($aLinha['editora_codigo']);
                $oEditora->setDescricao($aLinha['editora_descricao']);

                $oLivro->setEditora($oEditora);

                $oCategoria = new Model_Categoria;
                $oCategoria->setCodigo($aLinha['categoria_codigo']);
                $oCategoria->setDescricao($aLinha['categoria_descricao']);

                $oLivro->setCategoria($oCategoria);

                $oAutor = new Model_Autor;
                $oAutor->setCodigo($aLinha['autor_codigo']);
                $oAutor->setDescricao($aLinha['autor_descricao']);

                $oLivro->setAutor($oAutor);
                
                $aResultado[] = $oEditora;
            }
            return $aResultado;  
        }

        public function returnSelectAll() {
            $aDados = $this->SelectAll();
            return $aDados;
        }

        public function cadastrarLivro($descricao, $dataPublicacao, $autor, $categoria, $editora) {
            $sql = ("INSERT INTO livro (descricao, dataPublicacao, autor_codigo, categoria_codigo, editora_codigo) 
                     VALUES ('".$descricao."', '".$dataPublicacao."', $autor, $categoria, $editora)");
         
            executeQuery($sql);   
        }

        public function deletarLivro($codigo) {
            if(isset($_POST['excluir'])) {
                try {
                    $sql = ("DELETE FROM livro WHERE codigo = {$codigo}");
                    executeQuery($sql);
        
                    if (!executeQuery($sql)){
                        throw new PDOException();
                    }
        
                    echo deletadoComSucesso();

                    exit;
                   
                } catch(PDOException $erro) {

                    echo mensagemIntegridade();   

                }
            }
        }

        public function alterarLivro($codigo, $descricao, $dataPublicacao, $categoria, $autor, $editora){
            if(isset($_POST['alterar'])) {
                try {
                    $stmt = Conexao::Conectar()->prepare("UPDATE livro set descricao = '{$descricao}', dataPublicacao = '{$dataPublicacao}', categoria_codigo = $categoria, autor_codigo = $autor, editora_codigo = $editora WHERE codigo = {$codigo}");

                    $stmt->execute();

                    if (!$stmt->execute()){
                        throw new PDOException();
                    }

                    echo alteradoComSucesso();

                    exit;

                } catch(PDOException $erro) {
                    
                    echo semAlteracao();
                }
            }
        }
    }
?>