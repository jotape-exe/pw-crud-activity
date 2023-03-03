<?php

require 'config.php';

function getUsuario(PDO $pdo, $id)
{
    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();

    return $sql->fetchAll(PDO::FETCH_ASSOC);
}