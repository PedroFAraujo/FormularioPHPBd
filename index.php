<?php 
    //$conexao = mysql_connect("localhost", "root" , "") or die ("Erro de conexão"); //A ordem do mysql_connect é: endereço, usuário e senha
    //mysql_select_db("bd_sistema" , $conexao); //Acessa o banco de dados com nome BD_SISTEMA usando a conexão feita

    define('MYSQL_HOST', 'localhost:3306');
    define('MYSQL_USER', 'root');
    define('MYSQL_PASSWORD', '');
    define('MYSQL_DB_NAME', 'bd_sistema');

    try{
        $PDO = new PDO('mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DB_NAME, MYSQL_USER, MYSQL_PASSWORD);
    }catch (PDOException $e){
        echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="styleDados.css">
        <title>PHP - Sistema de Acesso ao BD</title>
    </head>
    <body>
        <div class="container" id="container">
                <div class="row">
                    <div class="col">
                        <nav class="navbar navbar-expand-lg bg-body-tertiary, fundo">
                            <div class="container-fluid">
                                <a class="navbar-brand" href="index.php">PHP - Sistema de Acesso ao Banco de Dados</a>
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col titles">
                        <h1>Clientes</h1>
                    </div>
                </div>
            <div class="row">
                <div class="col boxDados">
                    <div class="table-responsive">
                        <table class="table table-borderless" id="tabela">
                            <thead>
                                <tr class="headerTable">
                                    <th scope="col">Id</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Endereço</th>
                                    <th scope="col">Bairro</th>
                                    <th scope="col">Cidade</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">CEP</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <?php
                                            $sql = "SELECT * FROM clientes";
                                            $result = $PDO->query($sql);
                                            $rows = $result->fetchAll();
                                            
                                            echo $rows[0]['id'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            $sql = "SELECT * FROM clientes";
                                            $result = $PDO->query($sql);
                                            $rows = $result->fetchAll();
                                            
                                            echo $rows[0]['nome'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            $sql = "SELECT * FROM clientes";
                                            $result = $PDO->query($sql);
                                            $rows = $result->fetchAll();
                                            
                                            echo $rows[0]['endereco'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            $sql = "SELECT * FROM clientes";
                                            $result = $PDO->query($sql);
                                            $rows = $result->fetchAll();
                                            
                                            echo $rows[0]['bairro'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            $sql = "SELECT * FROM clientes";
                                            $result = $PDO->query($sql);
                                            $rows = $result->fetchAll();
                                            
                                            echo $rows[0]['cidade']; 
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            $sql = "SELECT * FROM clientes";
                                            $result = $PDO->query($sql);
                                            $rows = $result->fetchAll();
                                            
                                            echo $rows[0]['estado']; 
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            $sql = "SELECT * FROM clientes";
                                            $result = $PDO->query($sql);
                                            $rows = $result->fetchAll();
                                            
                                            echo $rows[0]['cep'];
                                        ?>
                                    </td>
                                    <td>
                                        
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p></p>
                </div>
            </div>
        </div>
    </body>
</html>