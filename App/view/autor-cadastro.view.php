<!DOCTYPE html>
    <head>
        <?php
            $title = "Cadastrar Autor";

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
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Informe o nome do autor" required>
                        <label for="nome">Nome</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="nacionalidade" name="nacionalidade" placeholder="Informe a nacionalidade do autor">
                        <label for="nacionalidade">Nacionalidade</label>
                    </div>                    
                    <button type="submit" class="btn btn-success" value="cadastrar" name="acaoCadastrar">Cadastrar</button>
                    <button type="reset" class="btn btn-danger">Limpar Dados</button>
                </form>            
                <?php 
                    include_once('footer.view.php');
                    
                    if (isset($_POST['acaoCadastrar']) && $_POST['acaoCadastrar'] == 'cadastrar'){ 
                        try {
                            $oAutor = new Controller_Autor();
                            $oAutor->cadastrarAutor($_POST['nome'], $_POST['nacionalidade']);
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