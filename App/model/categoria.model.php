<?php

    /**
     * @var Categoria model da tabela mydb.categoria
     */
    class Model_Categoria {
        private $codigo;
        private $descricao;
        private $observacao;

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

        public function getObservacao() {
            return $this->observacao;
        }

        public function setObservacao($observacao) {
            $this->observacao = $observacao;
        }        
    }
?>