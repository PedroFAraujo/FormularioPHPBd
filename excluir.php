<?php
    //arquivo para deletar os registros no banco de dados

    //inclui o arquivo conexao.php
    include_once("conexao.php");

    if(isset($_GET['id'])){ //GET para conseguir acessar os parâmetros e variáveis da url

        $id = $_GET['id']; //acessando o id pela url usando o método GET e atribuindo a variável $id

        $sql = "DELETE FROM clientes WHERE id = $id"; //comando SQL para deletar o registro do id específico

        //executação do comando SQL
        $result = $PDO->query($sql);

        //estrutura de decisão: se houver sucesso na remoção do registro do banco de dados irá redirecionar para a página tabelaDados.php 
        if($result){
            header("Location: tabelaDados.php");
        }

    } 
?>