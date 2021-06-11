<!DOCTYPE html>
    <head>
        <?php
            $title = "Cadastrar Categoria";

            require_once('../autoload.php');
            require_once('head.view.php');
        ?>
    </head>
    <body>
        <div class='container-fluid'>
            <?php
                require_once('menu.view.php');
            ?>
            <div class="container">
                <p class="lead mt-5">
                    <?php echo $title; ?>
                </p>
                <form method="POST">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Exemplos: Inconformidade de Software, Duvida, Consultoria, etc.">
                        <label for="descricao" required>Descrição</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Deixe sua observação aqui" name="observacao" id="observacao" style="height: 100px"></textarea>
                        <label for="observacao">Observação</label>
                    </div>                    
                    <button type="submit" class="btn btn-success" value="cadastrar" name="acaoCadastrar">Cadastrar</button>
                    <button type="reset" class="btn btn-danger">Limpar Dados</button>
                </form>            
                <?php 
                    include_once('footer.view.php');

                    $oCategoria = new Controller_Categoria();

                    if (isset($_POST['acaoCadastrar']) && $_POST['acaoCadastrar'] == 'cadastrar'){ 
                        try {

                            $oCategoria->cadastrarCategoria($_POST['descricao'], $_POST['observacao']);

                            ?>

                            <div class="alert alert-success mt-2" role="alert">
                                Categoria cadastrado com sucesso!
                            </div>

                            <?php

                        } catch (PDOException $erro) {

                            ?>
                                
                            <div class="alert alert-danger mt-2" role="alert">
                                <span>Ocorreu um erro inesperado, entre em contato com o suporte.</span> 
                            </div>

                            <?php
                            
                                echo "<em>Erro: {$erro->getMessage()}</em>";           
                        }
                    }
                ?>  
            </div>          
        </div>
    </body>
</html>