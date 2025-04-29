<?php
$host = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'michelangelo_bd';

try {
    // Estabelecendo a conexão
    $conn = new PDO("mysql:host=$host;dbname=$banco", $usuario, $senha);
    
    // Definindo o modo de erro do PDO para exceções
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    
} catch (PDOException $e) {
    echo "Falha na conexão: " . $e->getMessage();
}
?>
