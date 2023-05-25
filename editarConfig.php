<?php
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

    $id = "";
    $nome = "";
    $endereco = "";
    $bairro = "";
    $cidade = "";
    $estado = "";
    $cep = "";

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        //GET method: Mostrar os dados do cliente

        /*estrutura de decisão para saber se tem o valor do id
          se o id não existir irá redirecionar para a página de exibição da tabela*/
        if( !isset($_GET["id"])){
            header("Location: /tabelaDados.php");
            exit;
        }

        $id= $_GET["id"];

        //leitura da linha da tabela do banco de dados do cliente selecionado
        $sql = "SELECT * FROM clientes WHERE id=$id"; //codigo sql que permite ler os dados do cliente do id especifico
        $result = $PDO->query($sql); //execução do codigo sql
        $row = $result->fetch_assoc(); //leitura da linha dos dados do cliente

        /*estrutura de decisão para saber se há dados no banco de dados
          se não houver dados irá redirecionar para a página de exibição da tabela*/
          if (!$row){
            header("Location: tabelaDados.php");
            exit;
          }
        
        //atribuição das variáveis para os dados da linha 
        $id = $row['id'];
        $nome = $row['nome'];
        $endereco = $row['endereco'];
        $bairro = $row['bairro'];
        $cidade = $row['cidade'];
        $estado = $row['estado'];
        $cep = $row['cep'];

    }else{
        //POST method: Atualizar os dados do cliente

    }

?>