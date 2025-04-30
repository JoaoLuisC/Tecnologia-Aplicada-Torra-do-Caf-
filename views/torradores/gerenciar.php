<?php
    include '../../app/helpers/verificar_sessao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuário</title>
    <link rel="icon" href="../../public/images/graos-de-cafe.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../public/css/torradores_style/adicionar.css">
</head>
<body>

    <?php include "../templates/navbar.php"; ?>
    
    <main class="container mt-5">

        <!-- TÍTULO -->
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h1 class="text-center">Torradores</h1>
                <p class="text-center">
                    <strong><?php echo strtoupper(htmlspecialchars($nomeUsuario)); ?></strong>, aqui você pode gerenciar seus torradores.
                </p>
            </div>
        </div>

        <!-- Adicionar / Remover -->
        <div class="row mt-5 align-items-center mb-5">
            <div class="col-md-6 text-center">
                <a href="adicionar.php" class="btn btn-outline-dark btn-lg w-100 p-4">
                    <strong>Adicionar</strong><br>
                </a>
            </div>
            <div class="col-md-6 text-center">
                <button id="btnExcluir" class="btn btn-outline-dark btn-lg w-100 p-4" data-bs-toggle="modal" data-bs-target="#confirmarExclusao" disabled>
                    <strong>Excluir</strong><br>
                </button>
            </div>
        </div>

        <!-- Modal de Confirmação -->
        <div class="modal fade" id="confirmarExclusao" tabindex="-1" aria-labelledby="confirmarExclusaoLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmarExclusaoLabel">Confirmar Exclusão</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Tem certeza de que deseja excluir os torradores selecionados?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-danger" id="confirmarExcluir">Excluir</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Torradores -->
        <div class="row mt-5">
            <?php
            $sql = "SELECT id, nome, criado_em FROM torradores WHERE usuario_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$usuarioId]);
            $torradores = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (count($torradores) > 0) {
                foreach ($torradores as $row) {
                    $torradorId = $row['id'];
                    $torradorNome = htmlspecialchars($row['nome']);
                    $criadoEm = date('d/m/Y', strtotime($row['criado_em']));
                    echo '
                    <div class="col-md-4 mb-4 position-relative">
                        <a href="editar.php?id=' . $torradorId . '" class="btn btn-outline-secondary btn-lg p-4 w-100 h-100 text-start">
                            <strong>' . $torradorNome . '</strong><br>
                            <small>Adicionado no dia ' . $criadoEm . '</small>
                        </a>
                        <input type="checkbox" class="form-check-input position-absolute top-0 end-0 m-3 torrador-checkbox" value="' . $torradorId . '">
                    </div>
                    ';
                }
            } else {
                echo '<div class="col-12 text-center"><p>Você ainda não adicionou nenhum torrador.</p></div>';
            }
            ?>
        </div>

        <!-- BOTÃO VOLTAR -->
        <div class="row mt-5 align-items-center mb-5">
            <div class="col-md-12 text-center">
                <a href="../usuario/dashboard.php" class="btn btn-outline-dark btn-lg w-100 p-4">
                    <strong>Voltar</strong><br>
                </a>
            </div>
        </div>

    </main>

    <?php include "../templates/footer.php"; ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="../../public/js/torradores_JS/view_torradores_gerenciar_exclusao.js"></script>

</body>
</html>
