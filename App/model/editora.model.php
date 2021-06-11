<?php

    /**
     * @var Editora model da tabela mydb.editora
     */
    class Model_Editora {
        private $codigo;
        private $descricao;
        private $cnpj;
        private $telefone;

        public function getCodigo() {
            return $this->codigo;
        }
        
        public function setCodigo($codigo) {
            $this->codigo = $codigo;
        }

        public function getDescricao() {
            return $this->descricao;
        }

        public function setDescricao($descricao) {
            $this->descricao = $descricao;
        }

        public function getCnpj() {
            return $this->cnpj;
        }

        public function setCnpj($cnpj) {
            $this->cnpj = $cnpj;
        }   
        
        public function getTelefone() {
            return $this->telefone;
        }

        public function setTelefone($telefone) {
            $this->telefone = $telefone;
        } 
    }
?>