<?php

    require_once('conexao.controller.php');
    
    class Controller_Categoria {
        /**
         * @return Array retorna em um array todas as informações do banco de dados
         */
        private function selectAll() {
            $consulta = Conexao::Conectar()->prepare("SELECT * FROM categoria");
            $consulta->execute();

            $aResultado = [];
            
            while($aLinha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $oCategoria = new Model_Categoria;
                $oCategoria->setCodigo($aLinha['codigo']);
                $oCategoria->setDescricao($aLinha['descricao']);
                $oCategoria->setObservacao($aLinha['observacao']);
                $aResultado[] = $oCategoria;
            }
            return $aResultado;  
        }

        public function returnSelectAll() {
            $aDados = $this->SelectAll();
            return $aDados;
        }

        public function cadastrarCategoria($descricao, $observacao) {
            $sql = ("INSERT INTO categoria (descricao, observacao) 
                     VALUES ('".$descricao."', '".$observacao."')");
         
            executeQuery($sql);   
        }

        public function deletarCategoria($codigo) {
            if(isset($_POST['excluir'])) {
                try {
                    $sql = ("DELETE FROM categoria WHERE codigo = {$codigo}");
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

        public function alterarCategoria($codigo, $descricao, $observacao){
            if(isset($_POST['alterar'])) {
                try {
                    $stmt = Conexao::Conectar()->prepare("UPDATE categoria set descricao = '{$descricao}', observacao = '{$observacao}' WHERE codigo = {$codigo}");

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
            echo "<label for='categoria'>{$descricao}</label>";
            echo "<select name='categoria' class='form-control'>";
            echo "<option disabled selected>Selecione uma categoria</option>";            
            foreach ($aDados as $oObjeto){
                echo "<option value='{$oObjeto->getCodigo()}'>{$oObjeto->getDescricao()}</option>";
            }
            echo "</select>";
        }
    }
?>