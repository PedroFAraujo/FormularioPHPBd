<?php
    //inclui o arquivo conexao.php
    include_once("conexao.php");
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
        <title>Tabela</title>
    </head>
    <body>
        <div class="container" id="container">
        <div class="row">
                    <div class="col">
                        <nav class="navbar navbar-expand-lg bg-body-tertiary, fundo">
                            <div class="container-fluid">
                                <a id="titleNav" class="navbar-brand" href="index.php">PHP - Sistema de Cadastro ao Banco de Dados</a>
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarNav">
                                    <ul class="navbar-nav">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="link-header" aria-current="page" href="index.php">Cadastrar</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="tabelaDados.php">Consultar</a>
                                        </li>
                                    </ul>
                                </div>
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
                        <table class="table" id="tabela">
                            <thead>
                                <tr class="headerTable">
                                    <th scope="col titleTable">Id</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Endereço</th>
                                    <th scope="col">Bairro</th>
                                    <th scope="col">Cidade</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">CEP</th>
                                    <th scope="col">Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php
                                    $sql = "SELECT * FROM clientes";
                                    $result = $PDO->query($sql);
                                    $rows = $result->fetchAll();

                                    for($i=0; $i < count($rows); $i++){
                                        
                                        //atribuição dos valores das variáveis com as linhas dos registros 
                                        $id = $rows[$i]['id'];
                                        $nome = $rows[$i]['nome'];
                                        $endereco = $rows[$i]['endereco'];
                                        $bairro = $rows[$i]['bairro']; 
                                        $cidade = $rows[$i]['cidade']; 
                                        $estado = $rows[$i]['estado']; 
                                        $cep = $rows[$i]['cep'];   
                                        
                                        //imprime a tabela na tela
                                        echo '<tr>
                                                 <td>'.$id.'</td>
                                                 <td>'.$nome.'</td>
                                                 <td>'.$endereco.'</td>
                                                 <td>'.$bairro.'</td>
                                                 <td>'.$cidade.'</td>
                                                 <td>'.$estado.'</td>
                                                 <td>'.$cep.'</td>
                                                 <td>
                                                    <button class="btn btn-primary"><a class="text-light" href="editar.php?id='.$id.'">Editar</a></button>
                                                    <button class="btn btn-danger"><a class="text-light" href="excluir.php?id='.$id.'">Excluir</a></button>
                                                </td>
                                              </tr>';
                                    }
                                ?>
                                
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
