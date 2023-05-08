<?php
    //Chamada para o arquivo que verifica se o usuário está logado.
    include("../../configuration/user-session.php");

    //Chama o arquivo de conexão com o BD.
    include("../../configuration/connection.php");

    //Variáveis que irão receber os dados via POST do formulário.
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $dataNascimento = $_POST["dataNascimento"];
    $genero = $_POST["genero"];
    $logradouro = $_POST["logradouro"];
    $celular = $_POST["celular"];

    //Instrução SQL de inserção de dados no BD.
    $SQL = "INSERT INTO cliente (nome, 
                                 cpf, 
                                 data_nascimento, 
                                 telefone, 
                                 genero, 
                                 endereco,                  
                                 ativo)
            VALUES ('" . $nome . "', 
                    '" . $cpf . "', 
                    '" . $dataNascimento . "', 
                    '" . $telefone . "', 
                    '" . $genero . "', 
                    '" . $endereco . "', 
                    1);";

    //Faz a tentativa de inserção dos dados no BD.
    if (mysqli_query($connect, $SQL)) {
        
        //Encerra a conexão com o BD.
        mysqli_close($connect);

        //Cria uma variável de retorno usando a sessão.
        $_SESSION['retorno'] = "Cliente cadastro cadastrado com sucesso!!!";

        //Redireciona o usuário.
        header("location: ../dashboard.php");
    } else {
        //Encerra a conexão com o BD.
        mysqli_close($connect);

        //Cria uma variável de retorno usando a sessão.
        $_SESSION['retorno'] = "Não foi possível cadastrar o Cliente!!!";

        //Redireciona o usuário.
        header("location: form-create-client.php");
    }
?>