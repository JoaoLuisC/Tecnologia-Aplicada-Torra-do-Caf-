<?php
session_start();
require 'conexao.php';

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario_nome'])) {
    header('Location: login.php');
    exit;
}

$nomeUsuario = $_SESSION['usuario_nome'];
$usuarioId = $_SESSION['usuario_id']; 


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuário</title>
    <link rel="icon" href="images/graos-de-cafe.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="home.php">
                <img src="images/michelangeloTXT.png" alt="Logo" style="height: 40px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item me-3"><a class="nav-link" href="login.php">Entrar</a></li>
                    <li class="nav-item me-3"><a class="nav-link" href="cadastro.php">Cadastro</a></li>
                    <li class="nav-item me-3"><a class="nav-link" href="#">Torras</a></li>
                </ul>
            </div>
        </div>
    </nav>

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
                <a href="usuario.php" class="btn btn-outline-dark btn-lg w-100 p-4">
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
                        <a href="sensor.php?id=' . $torradorId . '" class="btn btn-outline-secondary btn-lg p-4 w-100 h-100 text-start">
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
                <a href="usuario.php" class="btn btn-outline-dark btn-lg w-100 p-4">
                    <strong>Voltar</strong><br>
                </a>
            </div>
        </div>

    </main>

    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2025 - Desenvolvido por João Luís Cardoso.</p>
        <p>&copy; IFSULDEMINAS - Campus Machado</p>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        const checkboxes = document.querySelectorAll('.torrador-checkbox');
        const btnExcluir = document.getElementById('btnExcluir');
        const confirmarExcluir = document.getElementById('confirmarExcluir');

        // Habilitar/desabilitar botão "Excluir" com base nos checkboxes
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', () => {
                const algumSelecionado = Array.from(checkboxes).some(cb => cb.checked);
                btnExcluir.disabled = !algumSelecionado;
            });
        });

        // Confirmar exclusão
        confirmarExcluir.addEventListener('click', () => {
            const idsSelecionados = Array.from(checkboxes)
                .filter(cb => cb.checked)
                .map(cb => cb.value);

            if (idsSelecionados.length > 0) {
                fetch('excluir_torradores.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ ids: idsSelecionados })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        location.reload(); // Recarregar a página após exclusão
                    } else {
                        alert('Erro ao excluir torradores.');
                    }
                })
                .catch(error => console.error('Erro:', error));
            }
        });
    </script>

</body>
</html>
