<?php
session_start();
require __DIR__ . '/../configs/conexao.php';

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario_nome'])) {
    header('Location: views/login.php');
    exit;
}

$nomeUsuario = $_SESSION['usuario_nome'];
$usuarioId = $_SESSION['usuario_id']; 
?>