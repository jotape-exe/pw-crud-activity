<?php

require 'config.php';

//Função Update Incompleta(TEST)
function update($pdo, $id, $nome = null, $descricao = null, $status = null) {
    $set = [];

    if ($nome !== null) {
        $set[] = "nome = :nome";
    }

    if ($descricao !== null) {
        $set[] = "descricao = :descricao";
    }

    if ($status !== null) {
        $set[] = "status = :status";
    }

    if (count($set) === 0) {
        // Nenhum atributo foi informado para atualização
        return;
    }

    $setClause = implode(", ", $set);

    $sql = $pdo->prepare("UPDATE atividades SET {$setClause} WHERE id = :id");
    $sql->bindValue(':id', $id);

    if ($nome !== null) {
        $sql->bindValue(':nome', $nome);
    }

    if ($descricao !== null) {
        $sql->bindValue(':descricao', $descricao);
    }

    if ($status !== null) {
        $sql->bindValue(':status', $status);
    }

    $sql->execute();
}
