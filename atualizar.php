<?php

require 'config.php';
//Função Update Incompleta(TEST)
function atualizarAtividade(PDO $pdo, $id)
{
    $nome = filter_input(INPUT_POST, 'nome');
    $descricao = filter_input(INPUT_POST, 'descricao');
    $status = filter_input(INPUT_POST, 'status');
    $data_atividade = filter_input(INPUT_POST, 'data_atividade');

    $sql = $pdo->prepare("UPDATE atividades SET nome=:nome, descricao=:descricao, status=:status, data_atividade=:data_atividade WHERE id=:id");
    $sql->bindValue(':nome', $nome);
    $sql->bindValue(':descricao', $descricao);
    $sql->bindValue(':status', $status);
    $sql->bindValue(':data_atividade', $data_atividade);
    $sql->bindValue(':id', $id);

    $sql->execute();
}






