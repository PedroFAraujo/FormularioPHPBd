<?php
    //arquvio de conexão com o banco de dados

    //definição dos parâmetros do banco de dados
    define('MYSQL_HOST', 'localhost:3306');
    define('MYSQL_USER', 'root');
    define('MYSQL_PASSWORD', '');
    define('MYSQL_DB_NAME', 'bd_sistema');

    //conexão php com o banco de dados
    try{
        $PDO = new PDO('mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DB_NAME, MYSQL_USER, MYSQL_PASSWORD);
    }catch (PDOException $e){
        //se a conexão falhar a mensagem será exibida
        echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
    }

?>
