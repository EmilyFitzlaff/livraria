<!DOCTYPE html>
    <head>
        <?php
            $title = "Consultar Categorias";

            require_once('../autoload.php');
            require_once('head.view.php');
        ?>
    </head>
    <body>
        <div class='container-fluid'>
            <?php
                require_once('menu.view.php');

                $oCategoria = new Controller_Categoria();
                $aDados = $oCategoria->returnSelectAll();
            ?>
            <div class="container">
                <p class="lead mt-5">
                    <?php echo $title; ?>

                    <button type="button" class="btn btn-success mb-2 float-end"">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
                        <a href="categoria-cadastro.view.php" style="color: white; text-decoration: none;">Cadastrar Categoria</a>
                    </button>
                </p>
                <?php
                    if(empty($aDados)) {
                        echo setVazio();
                    } else {
                ?>
                <table class="table table-bordered table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Código</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Observação</th>
                            <th scope="col">Ações Disponíves</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach ($aDados as $oObjeto) {
                        ?>
                        <tr>
                            <td scope="row"><?php echo $oObjeto->getCodigo();?></td>
                            <td><?php echo $oObjeto->getDescricao(); ?></td>
                            <td><?php echo $oObjeto->getObservacao(); ?></td>
                            <td>
                                <button type="button" class="btn btn-success">
                                    <a href='categoria-alterar.view.php?acao=alterar&registro=<?php echo $oObjeto->getCodigo()?>' class="green" style="color: white; text-decoration: none;">Alterar</a>
                                </button>
                                <button type="button" class="btn btn-danger">                        
                                    <a href='categoria-excluir.view.php?acao=deletar&registro=<?php echo $oObjeto->getCodigo()?>' class="red" style="color: white; text-decoration: none;">Excluir</a>
                                </button>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <?php } 
                include_once('footer.view.php');
            ?>            
        </div>
    </body>
</html>