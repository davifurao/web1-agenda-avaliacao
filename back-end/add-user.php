<?php
    require 'main.php';

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $stmt = $conn->prepare('INSERT INTO USR_usuarios (USR_USER_ID, USR_NOME, USR_EMAIL , USR_SENHA) VALUES (null,?, ?, ?)');
    $stmt->execute([$username, $email, $password ]);
    $userID = $conn->lastInsertId();

    http_response_code(201);
?>