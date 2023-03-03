<?php
require 'config.php';

function criarAtividade(PDO $pdo, $id_usuario)
{
    $nome = filter_input(INPUT_POST, 'nome');
    $descricao = filter_input(INPUT_POST, 'descricao');
    $status = filter_input(INPUT_POST, 'status');
    $data_atividade = filter_input(INPUT_POST, 'data_atividade');

    $sql = $pdo->prepare("INSERT INTO atividades (nome, descricao, status, id_usuario, data_atividade) VALUES (:nome, :descricao, :status, :id_usuario, :data_atividade)");

    $sql->bindValue(':nome', $nome);
    $sql->bindValue(':descricao', $descricao);
    $sql->bindValue(':status', $status);
    $sql->bindValue(':id_usuario', $id_usuario);
    $sql->bindValue(':data_atividade', $data_atividade);


    $sql->execute();

    header('Location: index.php');
}

criarAtividade($pdo, 1);
