<?php

function getAtividadeUserByStatus($user_id, $status) {
    require 'config.php';

    $sql = "SELECT id, nome, descricao, status
            FROM atividades
            WHERE id_usuario = :user_id AND status = :status";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':user_id' => $user_id, ':status' => $status));

    // criar array para armazenar as atividades
    $atividades = array();

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // adicionar cada atividade ao array
        $atividade = array(
        "id" => $row["id"],
        "nome" => $row["nome"],
        "descricao" => $row["descricao"],
        "status" => $row["status"]
        );
        array_push($atividades, $atividade);
    }

    // fechar conexão
    $pdo = null;

    // retornar array de atividades
    return $atividades;
}
?>
