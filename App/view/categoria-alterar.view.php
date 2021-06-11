<!DOCTYPE html>
    <head>
        <?php
            $title = "Alterar Categoria";

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
                            $oCategoria = new Controller_Categoria();        
                            $stmt = Conexao::Conectar()->prepare("SELECT * FROM categoria WHERE codigo = :id");                    
                            $stmt->bindParam(':id', $_GET['registro']);                    
                            $stmt->execute();                            
                            $resultado = $stmt->fetchAll();   
                        }
                    
                        if(isset($_POST['descricao']) || isset($_POST['observacao'])) {                    
                            $oCategoria->AlterarCategoria($_GET['registro'], $_POST['descricao'], $_POST['observacao']);
                        }                        
                    ?>
                </p>
                <form method="POST">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="descricao" name="descricao" value="<?php echo $resultado[0]['descricao']?>">
                        <label for="descricao">Descrição</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Deixe sua observação aqui" name="observacao" id="observacao" style="height: 100px" value="<?php echo $resultado[0]['observacao']?>"></textarea>
                        <label for="observacao">Observação</label>
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