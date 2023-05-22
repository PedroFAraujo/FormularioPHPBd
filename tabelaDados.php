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
?>

<!DOCTYPE html>
<!-- PÁGINA PARA MOSTRAR OS DADOS DO CLIENTE -->
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
                                <a class="navbar-brand" href="index.html">PHP - Sistema de Acesso ao Banco de Dados</a>
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
                                <?php
                                    $sql = "SELECT * FROM clientes";
                                    $result = $PDO->query($sql);
                                    $rows = $result->fetchAll();

                                    for($i=0; $i < count($rows); $i++){ ?>
                                        <tr>
                                            <td scope="col"><?php echo $rows[$i]['id']; ?></td>
                                            <td scope="col"><?php echo $rows[$i]['nome']; ?></td>
                                            <td scope="col"><?php echo $rows[$i]['endereco']; ?></td>
                                            <td scope="col"><?php echo $rows[$i]['bairro']; ?></td>
                                            <td scope="col"><?php echo $rows[$i]['cidade'];; ?></td>
                                            <td scope="col"><?php echo $rows[$i]['estado']; ?></td>
                                            <td scope="col"><?php echo $rows[$i]['cep']; ?></td>
                                        </tr>                       
                                <?php } ?>
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
