<?php
    // Segurança da sessão
    include '../helpers/verificar_sessao.php';

    // Conexão com o banco
    include '../configs/conexao.php';

    // Define o header para JSON
    header('Content-Type: application/json');

    // Lê o corpo da requisição
    $input = json_decode(file_get_contents('php://input'), true);

    if (!isset($input['ids']) || !is_array($input['ids'])) {
        echo json_encode(['success' => false, 'message' => 'IDs inválidos.']);
        exit;
    }

    $ids = $input['ids'];

    try {
        // Inicia transação
        $conn->beginTransaction();

        // Prepara delete (verifica se é do usuário)
        $placeholders = implode(',', array_fill(0, count($ids), '?'));
        $sql = "DELETE FROM torradores WHERE id IN ($placeholders) AND usuario_id = ?";
        $stmt = $conn->prepare($sql);

        // Junta os IDs e o ID do usuário para o bind
        $params = array_merge($ids, [$usuarioId]);
        $stmt->execute($params);

        $conn->commit();

        echo json_encode(['success' => true]);
    } catch (Exception $e) {
        $conn->rollBack();
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }
?>

