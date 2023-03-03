<?php
require 'config.php';
require 'getAtividadeUserByStatus.php';

//Armazena as atividades do usuário
$lista = [];

if($sql->rowCount() > 0){
    //Aqui você deve cadastrar um usuário manualmente no MySQL para testar o método
    $lista = getAtividadeUserByStatus(1, 0);
}

?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./assets/styles/global.css">
        <link rel="stylesheet" href="./assets/styles/table.css">

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
                    <a href="">CONSULTAR</a>
                </li>
                <li class="item-left-menu">
                    <a href="">CONFIGURAÇÃO</a>
                </li>
                <li class="item-left-menu">
                    <a href="">SAIR</a> 
                </li>
            </ul>
        </section>
        
        <div action="" class="post-form">
            <h3>ATIVIDADES</h3>
            <table class="tabela" >
                <tr class="linha-head">
                    <td id="id_user">id</td>
                    <td>Nome</td>
                    <td>Descricao</td>
                    <td>Status</td>
                    <td class="action">Action</td>
                </tr>
                <?php foreach($lista as $usuarioObj):?>
                    <tr class="linha-type-one">
                    <td id="id_user"><?=$usuarioObj['id'];?></td>
                    <td><?=$usuarioObj['nome'];?></td>
                    <td><?=$usuarioObj['descricao'];?></td>
                    <td><?=$usuarioObj['status'];?></td>
                    <td>
                        <a href="atualizar_view.php?id=<?=$usuarioObj['id'];?>">
                            <span class="material-symbols-outlined edit">edit</span>
                        </a> 
                        <a href="excluir.php?id=<?=$usuarioObj['id'];?>">
                            <span class="material-symbols-outlined delete">delete</span>
                        </a>    
                    </td>
                </tr>
                <?php endforeach?>
            </table>
            <a class="nu-btn"  href="cadastrar_view.php">NOVA ATIVIDADE</a>
        </div>
        
    </main>
</html>