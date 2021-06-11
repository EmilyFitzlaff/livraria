<!DOCTYPE html>
    <head>
        <?php
            $title = "Alterar Livro";

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
                            $oLivro = new Controller_Livro();
        
                            $stmt = Conexao::Conectar()->prepare("SELECT e.codigo as editora_codigo,
                                                                        e.nomeFantasia as editora_descricao,
                                                                        c.codigo as categoria_codigo,
                                                                        c.descricao as categoria_descricao,
                                                                        a.codigo as autor_codigo,
                                                                        a.nome as autor_descricao,
                                                                        l.codigo as livro_codigo,
                                                                        l.descricao as livro_descricao,
                                                                        l.dataPublicacao as livro_dataPublicacao                                                          
                                                                FROM livro l
                                                                join editora e on e.codigo = l.editora_codigo
                                                                join categoria c on c.codigo = l.categoria_codigo
                                                                join autor a on a.codigo = l.autor_codigo");
                    
                            $stmt->execute();
                            
                            $resultado = $stmt->fetchAll();   
                        }
                    
                        if(isset($_POST['livro_descricao']) || isset($_POST['dataPublicacao']) || isset($_POST['autor']) || isset($_POST['categoria']) || isset($_POST['editora'])) {                    
                            $oLivro->alterarLivro($_GET['registro'], $_POST['livro_descricao'], $_POST['livro_dataPublicacao'], $_POST['autor'], $_POST['categoria'], $_POST['editora']);
                        }
                        
                    ?>
                </p>
                <form method="POST">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="livro_descricao" name="livro_descricao" value="<?php echo $resultado[0]['livro_descricao']?>">
                        <label for="livro_descricao">Descrição</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="livro_dataPublicacao" name="livro_dataPublicacao" value="<?php echo $resultado[0]['livro_dataPublicacao']?>">
                        <label for="livro_dataPublicacao">Data Publicacação</label>
                    </div>

                    <div class="form mb-3">
                        <?php
                            $oCategoria = new Controller_Categoria;
                            $oCategoria->montaSelect("Categoria", $resultado[0]['categoria_codigo'])
                        ?>
                    </div>

                    <div class="form mb-3">
                        <?php
                            $oEditora = new Controller_Editora;
                            $oEditora->montaSelect("Editora", $resultado[0]['editora_codigo'])
                        ?>
                    </div>

                    <div class="form mb-3">
                        <?php
                            $oAutor = new Controller_Autor;
                            $oAutor->montaSelect("Autor", $resultado[0]['autor_codigo'])
                        ?>
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