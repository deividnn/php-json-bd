<?php

$DB_host = "localhost";//servidor do mysql
$DB_user = "root";//usuario do mysql
$DB_pass = "";//senha do mysql
$DB_name = "php-json-bd";//banco de dados

try {
    //cria a conexao via pdo
    $DB_con = new PDO("mysql:host={$DB_host};dbname={$DB_name};charset=utf8", $DB_user, $DB_pass);
    //configura para mostrar os erros
    $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //define utf-8 como charset padrao
    $DB_con->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'utf8'");
} catch (PDOException $e) {
    echo $e->getMessage();
}

