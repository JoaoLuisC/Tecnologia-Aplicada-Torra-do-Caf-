<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once '../configs/conexao.php';

    session_start();
    $usuarioId = $_SESSION['usuario_id'] ?? null; // Ajuste conforme sua lógica de autenticação
    $nomeTorrador = trim($_POST['nomeTorrador']);

    if (!empty($nomeTorrador) && !empty($usuarioId)) {
        $stmt = $conn->prepare("INSERT INTO torradores (usuario_id, nome) VALUES (:usuario_id, :nome)");
        $stmt->bindParam(':usuario_id', $usuarioId, PDO::PARAM_INT);
        $stmt->bindParam(':nome', $nomeTorrador);

        if ($stmt->execute()) {
            header("Location: ../../views/torradores/gerenciar.php?sucesso=1");
            exit();
        } else {
            header("Location: ../../views/torradores/adicionar.php?erro=1");
            exit();
        }
    } else {
        header("Location: ../../views/torradores/adicionar.php?erro=2");
        exit();
    }
} else {
    header("Location: ../../views/torradores/adicionar.php");
    exit();
}
?>
