<?php
// Configurações do banco de dados
$host = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'michelangelo_bd';

// Criando a conexão
$conexao = new mysqli($host, $usuario, $senha, $banco);

// Verificando a conexão
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}
?>