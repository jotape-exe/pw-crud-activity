<?php

require 'config.php';
require 'atualizar.php';

// Verifica se o ID da atividade foi informado na URL
$id = filter_input(INPUT_GET, 'id');
if (!$id) {
    header('Location: index.php');
    exit;
}

// Carrega os dados da atividade do banco
$sql = $pdo->prepare('SELECT * FROM atividades WHERE id = :id');
$sql->bindValue(':id', $id);
$sql->execute();

getAtividadeUserByStatus($user_id, $status);

if (!$sql->rowCount()) {
    // Não encontrou a atividade com o ID informado
    header('Location: index.php');
    exit;
}

$atividade = $sql->fetch(PDO::FETCH_ASSOC);

// Verifica o status e define o texto formatado correspondente
if ($atividade['status'] == 1) {
    $status_texto = 'Concluído';
} else {
    $status_texto = 'Pendente';
}

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Extrai os dados do formulário
    $nome = filter_input(INPUT_POST, 'nome');
    $descricao = filter_input(INPUT_POST, 'descricao');
    $status = filter_input(INPUT_POST, 'status');
    $data_atividade = filter_input(INPUT_POST, 'data_atividade');

    // Atualiza os dados da atividade no banco
    update($pdo, $id, $nome, $descricao, $status, $data_atividade);

    $atividade = $sql->fetch(PDO::FETCH_ASSOC);

}

?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./assets/styles/global.css">
        <link rel="stylesheet" href="./assets/styles/table.css">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        
        <title>DASHBOARD</title>
    </head>
<body>
    <header>
        <img src="./assets/img/cis-logo.png" alt="">
    </header>
    <main>
        <section class="section-menu">
            <ul class="left-menu">
                <li class="item-left-menu">
                    <a href="index.php">CONSULTAR</a>
                </li>
                <li class="item-left-menu">
                    <a href="">CONFIGURAÇÃO</a>
                </li>
                <li class="item-left-menu">
                    <a href="">SAIR</a> 
                </li>
            </ul>
        </section>
        
        <form method="POST" action="atualizar.php"  class="post-form">
            <h2>EDITAR ATIVIDADE</h2>
            <input type="hidden" name="id" value="<?=$usuarioObj['id'];?>">
                <div class="input-div">
                    <label for="nome" class="label-dash">Nome</label>
                    <input type="text" name="nome" id="nome" value="<?= $atividade['nome'];?>">
                </div>
                <div class="input-div">
                    <label for="descricao" class="label-dash">Descricão</label>
                    <input type="text" name="descricao" id="descricao" value="<?= $atividade['descricao'];?>" >
                </div> 
                <div class="input-div">
                    <label for="status" class="label-dash">Status</label>
                    <select id="status" name="status">
                        <option value="<?=$status_texto;?>"><?= $status_texto;?></option>
                    </select>
                </div> 
                <div class="input-div">
                    <label for="data_atvd" class="label-dash">Data</label>
                    <input type="date" name="data_atvd" id="data_atvd" value="<?= $atividade['data_atividade'];?>">
                </div>
            <input type="submit" value="ATUALIZAR" class="nu-btn">
        </form>
      
    </main>
</html>