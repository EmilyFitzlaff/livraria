<!DOCTYPE html>
    <head>
        <?php
            $title = "Alterar Editora";

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
                    <?php 
                    
                        echo $title; 

                        if (isset($_GET['registro'])) {
                            $oEditora = new Controller_Editora();        
                            $stmt = Conexao::Conectar()->prepare("SELECT * FROM editora WHERE codigo = :id");                    
                            $stmt->bindParam(':id', $_GET['registro']);                    
                            $stmt->execute();                            
                            $resultado = $stmt->fetchAll();   
                        }
                    
                        if(isset($_POST['nomeFantasia']) || (isset($_POST['cnpj'])) || (isset($_POST['telefone']))) {                            
                            $oEditora->alterarEditora($_GET['registro'], ($_POST['nomeFantasia']), ($_POST['cnpj']), $_POST['telefone']);
                        }
                        
                    ?>
                </p>
                <form method="POST">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="nomeFantasia" name="nomeFantasia" value="<?php echo $resultado[0]['nomeFantasia']?>">
                        <label for="descricao">Descrição</label>    
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="cnpj" name="cnpj" value="<?php echo $resultado[0]['cnpj']?>">
                        <label for="descricao">CNPJ</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="telefone" name="telefone" value="<?php echo $resultado[0]['telefone']?>">
                        <label for="descricao">Telefone</label>
                    </div>
                                      
                    <button type="submit" class="btn btn-primary" name="alterar">Alterar</button>
                </form>            
                <?php 
                    include_once('footer.view.php');
                ?>  
            </div>          
        </div>
    </body>
</html>