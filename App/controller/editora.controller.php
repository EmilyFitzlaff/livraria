<?php

    require_once('conexao.controller.php');
    
    class Controller_Editora {
        /**
         * @return Array retorna em um array todas as informações do banco de dados
         */
        private function selectAll() {
            $consulta = Conexao::Conectar()->prepare("SELECT * FROM editora");
            $consulta->execute();

            $aResultado = [];
            
            while($aLinha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $oEditora = new Model_Editora;
                $oEditora->setCodigo($aLinha['codigo']);
                $oEditora->setDescricao($aLinha['nomeFantasia']);
                $oEditora->setCnpj($aLinha['cnpj']);
                $oEditora->setTelefone($aLinha['telefone']);
                $aResultado[] = $oEditora;
            }
            return $aResultado;  
        }

        public function returnSelectAll() {
            $aDados = $this->SelectAll();
            return $aDados;
        }

        public function cadastrarEditora($descricao, $cnpj, $telefone) {
            $sql = ("INSERT INTO editora (nomeFantasia, cnpj, telefone) 
                     VALUES ('".$descricao."', '".$cnpj."', '".$telefone."')");
         
            executeQuery($sql);   
        }

        public function deletarEditora($codigo) {
            if(isset($_POST['excluir'])) {
                try {
                    $sql = ("DELETE FROM editora WHERE codigo = {$codigo}");
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

        public function alterarEditora($codigo, $nome, $cnpj, $telefone){
            if(isset($_POST['alterar'])) {
                try {
                    $stmt = Conexao::Conectar()->prepare("UPDATE editora set nomeFantasia = '{$nome}', cnpj = '{$cnpj}', telefone = $telefone WHERE codigo = {$codigo}");

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

        public function montaSelect($descricao, $selected) {
            $aDados = $this->returnSelectAll();
            echo "<label for='editora'>{$descricao}</label>";
            echo "<select name='editora' class='form-control'>";         
            foreach ($aDados as $oObjeto){
                if (empty($selected)) {
                    echo "<option disabled selected>Selecione uma editora</option>";
                }
                if(!empty($selected) && ($selected = $oObjeto->getCodigo())) {
                    echo "<option value='{$oObjeto->getCodigo()}' selected>{$oObjeto->getDescricao()}</option>";
                } else {
                    echo "<option value='{$oObjeto->getCodigo()}'>{$oObjeto->getDescricao()}</option>";
                } 
            }
            echo "</select>";
        }
    }
?>