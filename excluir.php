<?php

require('config.php');

function deleteAtividade($pdo, $id) 
{
    $sql = $pdo->prepare('DELETE FROM atividades WHERE id = :id');
    $sql->bindValue(':id', $id);
    $sql->execute();
}

$id = filter_input(INPUT_GET, 'id');

if($id){
    deleteAtividade($pdo, $id);
}

//Deve ser tratado no frontend
header('Location: index.php');
