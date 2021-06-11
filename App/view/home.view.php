<!DOCTYPE html>
    <head>
        <?php
            $title = "Página Inicial";

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
                
            </div>
            <?php 
                include_once('footer.view.php');
            ?>            
        </div>
    </body>
</html>