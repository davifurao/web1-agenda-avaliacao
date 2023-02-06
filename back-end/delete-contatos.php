<?php

    include 'main.php';

    if (!isset($_SESSION['user'])) {
        http_response_code(401);
        exit();
    }

    $id = $_POST['id'];

    $stmt = $conn->prepare('DELETE FROM CON_contatos WHERE ALI_ID = ? AND ALI_USER_ID = ?');
    $stmt->execute([
        $id,
        $_SESSION['user']['USER_ID']
    ])

?>