<?php
    session_start();

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

    //atribuição ao que o usuário escrever no formulário para as variáveis
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $cep = $_POST['cep'];

    //passa o valor da variável para a sessão atual
    $_SESSION['nome'] = $nome;
    $_SESSION['endereco'] = $endereco;
    $_SESSION['bairro'] = $bairro;
    $_SESSION['cidade'] = $cidade;
    $_SESSION['estado'] = $estado;
    $_SESSION['cep'] = $cep;

    //comando SQL para as variáveis do formulário irem para o banco de dados
    $sql = "INSERT INTO clientes (nome, endereco, bairro, cidade, estado, cep) 
    VALUES (:nome, :endereco, :bairro, :cidade, :estado, :cep)";

    //prepara o PDO para a inserção no banco de dados
    $stmt = $PDO->prepare($sql);

    //passa os valores das variáveis para os nomes 
    $stmt->execute(['nome' => $nome, 'endereco' => $endereco, 'bairro' => $bairro, 'cidade' => $cidade, 'estado' => $estado, 'cep' => $cep]);

    //redirecionamento para a página tabelaDados.php
    header("Location: tabelaDados.php");

    exit();

?>
