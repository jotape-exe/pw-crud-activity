<?php

function getAtividadeUserByStatus($user_id, $status) {
    require 'config.php';

    $sql = "SELECT id, nome, descricao, status, DATE_FORMAT(data_atividade, '%d-%m-%Y') as data_atividade
            FROM atividades
            WHERE id_usuario = :user_id AND status = :status";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':user_id' => $user_id, ':status' => $status));

    // criar array para armazenar as atividades
    $atividades = array();

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // adicionar cada atividade ao array
        $status_texto = '';
        if ($row['status'] == 1) {
            $status_texto = 'Concluído';
        } else {
            $status_texto = 'Pendente';
        }
        $atividade = array(
            "id" => $row["id"],
            "nome" => $row["nome"],
            "descricao" => $row["descricao"],
            "status" => $status_texto,
            "data_atividade" => $row["data_atividade"]
        );
        array_push($atividades, $atividade);
    }

    // fechar conexão
    $pdo = null;

    // retornar array de atividades
    return $atividades;
}

?>
