<?php

    require_once('autor.model.php');
    require_once('editora.model.php');
    require_once('categoria.model.php');
    
    /**
     * @var Livro model da tabela mydb.livro
     */
    class Model_Livro {
        private $codigo;
        private $descricao;
        private $dataPublicacao;

        /**
         * @var Autor autor.model.php
         */
        private $Autor;

        /**
         * @var Categoria categoria.model.php
         */
        private $Categoria;

        /**
         * @var Editora editora.model.php
         */
        private $Editora;

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

        public function getDataPublicacao() {
            return $this->dataPublicacao;
        }

        public function setDataPublicacao($dataPublicacao) {
            $this->dataPublicacao = $dataPublicacao;
        }   
        
        public function getAutor() {
            return $this->Autor;
        }

        public function setAutor(Autor $autor) {
            $this->Autor = $autor;
        } 

        public function getCategoria() {
            return $this->Categoria;
        }

        public function setCategoria(Categoria $categoria) {
            $this->Categoria = $categoria;
        } 

        public function getEditora() {
            return $this->Editora;
        }

        public function setEditora(Editora $editora) {
            $this->Editora = $editora;
        } 
    }
?>