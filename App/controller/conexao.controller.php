<?php

    /**
     * @var Connection classe para conexão com o banco de dados
     */
    Class Conexao extends PDO {
        public static function Conectar() {
            $user = "root";
            $password = '';
            $host = "localhost";
            $port = 3306;
            $dbname = "mydb";
            
            $connection = new PDO("mysql:host={$host}; 
                                         port={$port}; 
                                         dbname={$dbname}; 
                                         user={$user}; 
                                         password={$password}");
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connection;
        }
    }

    /**
     * Função para retornar os dados do banco de dados
     */
    function executeQuery($sql) {
        $stmt = Conexao::Conectar()->prepare($sql);
        return $stmt->execute();
    }
?>