<!DOCTYPE html>
    <head>
        <?php
            $title = "Excluir Editora";

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
                        if (isset($_GET['registro'])) {

                            $oEditora = new Controller_Editora();

                            $stmt = Conexao::Conectar()->prepare("SELECT * 
                                                                    FROM editora 
                                                                   WHERE codigo = :id");
                    
                            $stmt->bindParam(':id', $_GET['registro']);
                
                            $stmt->execute();
                            
                            $resultado = $stmt->fetchAll();   
                        }

                        
                        $oEditora->deletarEditora($_GET['registro']);
                        
                    ?>
                </p>
                <span class="">Tem certeza que seja excluir o registro abaixo?</span>
                <form method="POST">
                    <div class="form-group mt-2">
                        <label for="nomeCategoria">Descrição da Categoria</label>
                        <input type="text"  class="form-control" id="nomeCategoria" name="nomeCategoria" value="<?php echo $resultado[0]['nomeFantasia']?>" disabled>
                    </div>
                    
                    <button type="submit" class="btn btn-danger mt-3" value="excluir" name="excluir">Excluir</button>
                </form>            
                <?php 

                    include_once('footer.view.php');

                ?>  
            </div>          
        </div>
    </body>
</html>