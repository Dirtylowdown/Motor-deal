<?php
    //Verifica se a sessão de usuário existe.
    if(!isset($_SESSION)){

        //Caso ela não exista, cria a sessão de usuário.
        session_start();

        // Apaga a variavel de sessão do usuario
        unset($_SESSION["UsuarioEmail"]);
        
        // destroi a Sessão do usuario.
        session_destroy();

        //Redireciona o usuario para a área publica do website.
        header("location: ../index.php");
    }
?>