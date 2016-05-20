<?php
//conexao do banco
require_once('bd.php');

//verifica se a requisicao veio via get
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    // recuperar dados dos parametros da url
    //http://localhost/php-json-bd/cliente-get.php?nome=teste&idade=23&cidade=lavras
    $nome = $_GET['nome'];
    $idade = $_GET['idade'];
    $cidade = $_GET['cidade'];

    try {
        //insere o cliente no banco
        $stmt = $DB_con->prepare("INSERT INTO cliente (nome, idade, cidade) "
                . "VALUES (:nome, :idade, :cidade);");
        $stmt->bindparam(":nome", $nome);
        $stmt->bindparam(":idade", $idade);
        $stmt->bindparam(":cidade", $cidade);
        $stmt->execute();

        //resultado do cliente adicionado
        $resultado = array(
            "nome" => $nome,
            "idade" => $idade,
            "cidade" => $cidade);

        //json montado com o status e dados do cliente
        $json = array("status" => 1, "msg" => "cliente adicionado!", "cliente" => $resultado);
    } catch (PDOException $e) {
        //json montado caso de erro
        $json = array("status" => $e->getMessage(), "msg" => "erro ao adicionar cliente!");
    }
} else {
    //json montado caso requisicao seja diferente do get
    $json = array("status" => 0, "msg" => "requisicao nao aceita");
}
//fecha a conexao com o banco
$DB_con = NULL;
//define que o cabecalho da resposta sera um json
header('Content-type: application/json');
echo json_encode($json);

