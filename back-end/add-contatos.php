<?php
    include 'main.php';

    if (!isset($_SESSION['user'])) {
        http_response_code(401);
        exit();
    }

    $name = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $email = $_POST['email'];
    $numero = $_POST['numero_mostrado'];
    $user = $_SESSION['user']['USR_USER_ID'];

    $stmt = $conn->prepare('INSERT INTO CONT_contatos(CONT_NOME, CONT_ENDERECO, CONT_EMAIL , CONT_NUMERO, CONT_USER_ID,USR_CONT_FK) VALUES (?, ? , ? , ?,?,USR_CONT_FK)');
    $stmt->execute([$name, $endereco, $email, $numero, $user ]);
?>