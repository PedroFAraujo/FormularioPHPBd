<?php
    //arquivo para fazer o cadastro do cliente, enviando as informações para o banco de dados
    
    //inclui o arquivo conexao.php
    include_once("conexao.php");

    if(isset($_POST['cadastrar'])){
        //atribuição ao que o usuário escrever no formulário para as variáveis
        $nome = $_POST['nome'];
        $endereco = $_POST['endereco'];
        $bairro = $_POST['bairro'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $cep = $_POST['cep'];

        //comando SQL para as variáveis do formulário irem para o banco de dados
        $sql = "INSERT INTO clientes (nome, endereco, bairro, cidade, estado, cep) 
        VALUES (:nome, :endereco, :bairro, :cidade, :estado, :cep)";

        //prepara o PDO para a inserção no banco de dados
        $stmt = $PDO->prepare($sql);

        //passa os valores das variáveis para os nomes 
        $stmt->execute(['nome' => $nome, 'endereco' => $endereco, 'bairro' => $bairro, 'cidade' => $cidade, 'estado' => $estado, 'cep' => $cep]);

        if($stmt){
            header("Location: tabelaDados.php");
        }else{
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Não foi possivel cadastrar o cliente.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                   </div>';
        }
    }
    
    
?>