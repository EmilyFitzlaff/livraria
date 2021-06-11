<?php
    /**
     * Neste arquivo estão as funções que serão utilizadas em diversas classes do sistema.
     */
    
    function mensagemIntegridade() {
        return '<div class="alert alert-danger mt-2" role="alert">
                    <span>Este registro não pode ser excluído pois está vinculado à outro e isso violará uma regra de integradade definida no banco de dados!</span>
                </div>';
    }

    function alteradoComSucesso() {
        return '<div class="alert alert-success mt-2" role="alert">
                    <span>Registro alterado com sucesso!</span>
                </div>';
    }

    function deletadoComSucesso() {
        return '<div class="alert alert-success mt-2" role="alert">
                    <span>Registro excluído com sucesso!</span>
                </div>';
    }

    function semAlteracao() {
        return '<div class="alert alert-danger mt-2" role="alert">
                    <span>Este registro não pode ser alterado.</span>
                </div>';
    }

    function setVazio() {
        return "<div class='alert alert-secondary'><span>Não há dados para exibição!</span></div>";
    }

    function cadastradoComSucesso() {
        return '<div class="alert alert-success mt-2" role="alert">
                    Registro cadastrado com sucesso!
                </div>';
    }

    function erroInesperado() {
        return '<div class="alert alert-danger mt-2" role="alert">
                    <span>Ocorreu um erro inesperado, entre em contato com o suporte.</span> 
                </div>';
    }
?>