<?php
    include "usuario.php";
    include "usuarioDAO.php";

    $nome = filter_input(INPUT_GET ,'nome');
    $email = filter_input(INPUT_GET ,'email');
    $senha = filter_input(INPUT_GET ,'senha');
    $cad = filter_input(INPUT_GET ,'cad');

    $usuario = new usuario();
    $usuarioDAO = new usuarioDAO();

    $usuario->setNome($nome);
    $usuario->setEmail($email);
    $usuario->setSenha($senha);

    if($cad=="Cadastrar"){
        echo $usuarioDAO->cadastrar($usuario);
    }else if($cad=="Deletar"){
        echo $usuarioDAO->deletar($usuario);
    }else if($cad=="Atualizar"){
        echo $usuarioDAO->atualizar($usuario);
    }else if($cad=="Consultar"){
        echo $usuarioDAO->consultar();
    }