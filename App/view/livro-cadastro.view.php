<!DOCTYPE html>
    <head>
        <?php
            $title = "Cadastrar Livro";

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
                        <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Informe a descrição do livro" required>
                        <label for="descricao">Descrição</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" id="dataPublicacao" name="dataPublicacao" placeholder="Informe a data de publicação" required>
                        <label for="dataPublicacao">Data de Publicação</label>
                    </div>        
                    <div class="form mb-3">
                        <?php 
                            $oEditora = new Controller_Editora;
                            $oEditora->montaSelect("Editora", "");
                        ?>
                    </div> 
                    <div class="form mb-3">
                        <?php 
                            $oCategoria = new Controller_Categoria;
                            $oCategoria->montaSelect("Categoria", "");
                        ?>
                    </div> 
                    <div class="form mb-3">
                        <?php 
                            $oAutor = new Controller_Autor;
                            $oAutor->montaSelect("Autor", "");
                        ?>
                    </div>           
                    <button type="submit" class="btn btn-success" value="cadastrar" name="acaoCadastrar">Cadastrar</button>
                    <button type="reset" class="btn btn-danger">Limpar Dados</button>
                </form>            
                <?php 
                    include_once('footer.view.php');

                    $oLivro = new Controller_Livro();

                    if (isset($_POST['acaoCadastrar']) && $_POST['acaoCadastrar'] == 'cadastrar'){ 
                        try {

                            $oLivro->cadastrarLivro($_POST['descricao'], $_POST['dataPublicacao'], $_POST['autor'], $_POST['categoria'], $_POST['editora']);

                            echo cadastradoComSucesso();

                        } catch (PDOException $erro) {

                            echo erroInesperado();
                            
                            echo "<em>Erro: {$erro->getMessage()}</em>";           
                        }
                    }
                ?>  
            </div>          
        </div>
    </body>
</html>