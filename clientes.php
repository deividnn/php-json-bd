<?php
//conexao ao banco
require_once('bd.php');
//consulta os clientes
$stmt = $DB_con->prepare("select * from cliente order by id desc");
$stmt->execute();
//verifica se tem dados na tabel cliente
if ($stmt->rowCount() > 0) {
    //percorre todos os registro
    while ($cliente = $stmt->fetch(PDO::FETCH_ASSOC)) {
        //mostra os dados salvo do cliente
        echo $cliente['id'] . "-" . $cliente['nome'] . "-" . $cliente['idade'] . "-" . $cliente['cidade'] . "<br/>";
    }
}
//fecha a conexao com o banco
$DB_con = NULL;
?>
<br/>
<a href="index.php">voltar</a>