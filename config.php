<?php

//Certifique-se de Ajustar a conexão de acordo os dados do seu banco
$db_name = 'empresa';
$db_host = 'localhost:3306';
$db_user = 'root';
$db_password = '';

$pdo = new PDO("mysql:dbname=".$db_name.";host=".$db_host,$db_user,$db_password);

$sql = $pdo->query('SELECT * FROM atividades');

$dados = $sql->fetchAll(pdo::FETCH_ASSOC);
