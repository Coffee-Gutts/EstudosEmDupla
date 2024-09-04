<?php

    $nome = $_POST['name'];
    $idade = $_POST['age'];
    $email = $_POST['email'];
    $numero = $_POST['phone'];

    $server = 'localhost';
    $usuario = 'root';   // ver vídeo https://www.youtube.com/watch?v=ZmaBaS5VroQ minuto 37:00 caso tenha duvidas
    $senha = '';
    $nome_bancodedados = 'testebancodedados';

    $connectar = new mysqli($server, $usuario, $senha,$nome_bancodedados);

    // verificar conexao
    if($connectar ->connection_error){
        die("Não foi possível conectar ao banco de dados: ".$connectar->connect_error);
    }

    $smtp = $connectar->prepare("INSERT INTO login (nome, idade, email, numero) VALUES(?,?,?,?)");
    $smpt->bind_param("ssss", $nome, $idade, $email, $numero);

    if($smtp->execute()){
        echo "Dados enviados com sucesso";
    }
    else{
        echo "Erro, os dados não foram enviados".$smpt->error;
    }

    $smpt->close();
    $connectar->close();
?>