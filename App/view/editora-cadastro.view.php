<!DOCTYPE html>
    <head>
        <?php
            $title = "Cadastrar Editora";

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
                        <input type="text" class="form-control" id="cnpj" name="cnpj" placeholder="Informe o CNPJ da editora">
                        <label for="cnpj" required>CNPJ</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="nomeFantasia" name="nomeFantasia" placeholder="Informe o nome fantasia">
                        <label for="nomeFantasia">Nome/Razão</label>
                    </div>    
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Informe o telefone">
                        <label for="telefone">Telefone</label>
                    </div>                 
                    <button type="submit" class="btn btn-success" value="cadastrar" name="acaoCadastrar">Cadastrar</button>
                    <button type="reset" class="btn btn-danger">Limpar Dados</button>
                </form>            
                <?php 
                    include_once('footer.view.php');

                    $oEditora = new Controller_Editora();

                    if (isset($_POST['acaoCadastrar']) && $_POST['acaoCadastrar'] == 'cadastrar'){ 
                        try {

                            $oEditora->cadastrarEditora($_POST['nomeFantasia'], $_POST['cnpj'], $_POST['telefone']);

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