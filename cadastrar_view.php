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
        <form method="POST" action="cadastrar.php"  class="post-form">
            <h2>CADASTRAR ATIVIDADE</h2>
                <div class="input-div">
                    <label for="nome" class="label-dash">Nome</label>
                    <input type="text" name="nome" id="nome">
                </div>
                <div class="input-div">
                    <label for="descricao" class="label-dash">Descricao</label>
                    <input type="text" name="descricao" id="descricao" >
                </div> 

                <div class="input-div">
                    <label for="status" class="label-dash">Status</label>
                    <select id="status" name="status">
                        <option value="0" >Pendente</option> <!--<?= $atividade['status'] === '0' ? 'selected' : '' ?>--> 
                        <option value="1" >Concluida</option> <!--<?= $atividade['status'] === '1' ? 'selected' : '' ?>--> 
                    </select>
                </div> 
                <div class="input-div">
                    <label for="data_atividade" class="label-dash">Data</label>
                    <input type="date" name="data_atividade" id="data_atividade">
                </div>
            <input type="submit" value="SALVAR" class="nu-btn">
        </form>
      
    </main>
</html>


