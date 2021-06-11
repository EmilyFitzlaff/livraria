<?php

    require_once('conexao.controller.php');
    
    class Controller_Autor {
        /**
         * @return Array retorna em um array todas as informações do banco de dados
         */
        private function selectAll() {
            $consulta = Conexao::Conectar()->prepare("SELECT * FROM autor");
            $consulta->execute();

            $aResultado = [];

            while($aLinha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $oAutor = new Model_Autor;
                $oAutor->setCodigo($aLinha['codigo']);
                $oAutor->setDescricao($aLinha['nome']);
                $oAutor->setNacionalidade($aLinha['nacionalidade']);
                $aResultado[] = $oAutor;
            }
            return $aResultado;  
        }

        public function returnSelectAll() {
            $aDados = $this->SelectAll();
            return $aDados;
        }

        public function cadastrarAutor($nome, $nacionalidade) {
            $sql = ("INSERT INTO autor (nome, nacionalidade) 
                     VALUES ('".$nome."', '".$nacionalidade."')");
         
            executeQuery($sql);   
        }

        public function deletarAutor($codigo) {
            if(isset($_POST['excluir'])) {
                try {
                    $sql = ("DELETE FROM autor WHERE codigo = {$codigo}");
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

        public function alterarAutor($codigo, $nome, $nacionalidade){
            if(isset($_POST['alterar'])) {
                try {
                    $stmt = Conexao::Conectar()->prepare("UPDATE autor set nome = '{$nome}', nacionalidade = '{$nacionalidade}' WHERE codigo = {$codigo}");

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

        public function montaSelect($descricao) {
            $aDados = $this->returnSelectAll();
            echo "<label for='autor'>{$descricao}</label>";
            echo "<select name='autor' class='form-control'>";
            echo "<option disabled selected>Selecione um autor</option>";            
            foreach ($aDados as $oObjeto){
                echo "<option value='{$oObjeto->getCodigo()}'>{$oObjeto->getDescricao()}</option>";
            }
            echo "</select>";
        }
    }
?>