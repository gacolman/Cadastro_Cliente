<?php

$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "BDROUPAS";

$conexao = new mysqli($host, $usuario, $senha, $banco);

if ($conexao->connect_error) {
die("Erro de conexão: " . $conexao->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$nome = $_POST['nomecliente'];
$cpf = $_POST['cpfcliente'];
$email = $_POST['emailcliente'];
$telefone = $_POST['telefonecliente'];


$sql = "INSERT INTO TBCLIENTE(NOME_CLIENTE,CPF_CLIENTE,TELEFONE_CLIENTE,EMAIL_CLIENTE)VALUES('$nome','$cpf','$telefone','$email')";

$stmt = $conexao->prepare($sql);

if ($stmt->execute()) {
echo "Cliente cadastrado com sucesso!";
} else {
echo "Erro ao cadastrar cliente: " . $stmt->error;
}

$stmt->close();
}

$conexao->close();

?>