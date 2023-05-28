<?php
    //arquivo para realizar a atualização dos dados do cliente

    //inclui o arquivo conexao.php
    include_once("conexao.php");

    $id = $_GET['id']; //acessando o id pela url usando o método GET e atribuindo a variável $id

    $sqlSelect = "SELECT * FROM clientes WHERE id = $id"; //comando sql que exibe as informações apenas do registro específico

    //executação do comando SQL
    $result = $PDO->query($sqlSelect);

    //Atribuindo o resultado dos objetos a variável $result e depois a variável $row
    $row = $result->fetchObject();

    if(isset($_POST['editar'])){

        //atribuição ao que o usuário escrever no formulário para as variáveis
        $nome = $_POST['nome'];
        $endereco = $_POST['endereco'];
        $bairro = $_POST['bairro'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $cep = $_POST['cep'];

        /*comando SQL para editar os registros do id específico
          o conteúdo das variáveis serão os novos registros e irão para seu campo específico no banco de dados*/
        $sql = "UPDATE clientes SET nome='$nome', endereco='$endereco', bairro='$bairro', cidade='$cidade', estado='$estado', cep='$cep' WHERE id = $id";

        //executação do comando SQL
        $result = $PDO->query($sql);

        if($result){
            header("Location: tabelaDados.php");
        }else{
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Não foi possivel cadastrar o cliente.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                   </div>';
        }
    }
     
?>

<!DOCTYPE html>
<!-- PÁGINA PARA EDITAR O CADASTRO DO CLIENTE -->
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="style.css">
        <title>Cadastro</title>
    </head>
    <body>
        <main>
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
                        <h1>Editar</h1>
                        <p>Sistema Utilizado para editar cadastro</p>
                    </div>
                </div>
                <div class="row" id="row-form">
                    <div class="col">
                        <form method="POST">
                            <div class="mb-3">
                                <label for="Nome" class="form-label">Nome:</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1 nome" name="nome" value="<?php echo $row->nome; ?>" autocomplete="off" required>
                            </div>
                            <div class="mb-3">
                                <label for="endereco" class="form-label">Endereco: </label>
                                <input type="text" class="form-control" id="exampleFormControlInput1 endereco" name="endereco" value="<?php echo $row->endereco; ?>" autocomplete="off" required>
                            </div>
                            <div class="mb-3">
                                <label for="bairro" class="form-label">Bairro: </label>
                                <input type="text" class="form-control" id="exampleFormControlInput1 bairro" name="bairro" value="<?php echo $row->bairro; ?>" autocomplete="off" required>
                            </div>
                            <div class="mb-3">
                                <label for="cidade" class="form-label">Cidade: </label>
                                <input type="text" class="form-control" id="exampleFormControlInput1 cidade" name="cidade" value="<?php echo $row->cidade; ?>" autocomplete="off" required>
                            </div>
                            <div class="mb-3">
                                <label for="estado" class="form-label">Estado: </label>
                                <select class="form-select" name="estado" value="<?php echo $row->estado; ?>" autocomplete="off" id="estado" aria-label="Default select example">
                                    <option value="SP">SP</option>
                                    <option value="RJ">RJ</option>
                                    <option value="MG">MG</option>
                                    <option value="ES">ES</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="cep" class="form-label">CEP: </label>
                                <input type="number" class="form-control" id="exampleFormControlInput1 cep" name="cep" value="<?php echo $row->cep; ?>" autocomplete="off" placeholder="xxxxx-xxx" required>
                            </div>
                            <input type="submit" value="Editar" name="editar" id="cadastrar">
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>

