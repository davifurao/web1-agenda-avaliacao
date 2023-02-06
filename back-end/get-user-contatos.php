<?php
    include 'main.php';

    if (!isset($_SESSION['user'])) {
        http_response_code(401);
        exit();
    }

    $stmt = $conn->query('SELECT * FROM CONT_contatos WHERE CONT_USER_ID = ' . $_SESSION['user']['USER_ID']);
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($data);
?>