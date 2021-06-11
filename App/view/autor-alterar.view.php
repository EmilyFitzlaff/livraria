<!DOCTYPE html>
    <head>
        <?php
            $title = "Alterar Autor";

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
                            $oAutor = new Controller_Autor();        
                            $stmt = Conexao::Conectar()->prepare("SELECT * FROM autor WHERE codigo = :id");                    
                            $stmt->bindParam(':id', $_GET['registro']);                    
                            $stmt->execute();                            
                            $resultado = $stmt->fetchAll();   
                        }
                    
                        if(isset($_POST['descricao']) || isset($_POST['nacionalidade'])) {                    
                            $oAutor->AlterarAutor($_GET['registro'], $_POST['descricao'], $_POST['nacionalidade']);
                        }                        
                    ?>
                </p>
                <form method="POST">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="descricao" name="descricao" value="<?php echo $resultado[0]['nome']?>">
                        <label for="descricao">Nome</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="nacionalidade" name="nacionalidade" value="<?php echo $resultado[0]['nacionalidade']?>">                        
                        <label for="nacionalidade">Nacionalidade</label>
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