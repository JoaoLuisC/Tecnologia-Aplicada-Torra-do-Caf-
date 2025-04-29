<?php
    session_start();

    // Verifica se o usuário está logado
    if (!isset($_SESSION['usuario_nome'])) {
        header('Location: ../autenticacao/login.php');
        exit;
    }

    $nomeUsuario = $_SESSION['usuario_nome'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario</title>
    <link rel="icon" href="../../public/images/graos-de-cafe.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
    <?php include '../templates/navbar.php'; ?>

    <main class="container mt-5">

        <!-- TITULO -->
        <div class="row">
            <div class="col-md-6 offset-md-3">
            <h1 class="text-center">Bem-vindo, <?php echo htmlspecialchars($nomeUsuario); ?></h1>
                <p class="text-center">Aqui você pode gerenciar seus sensores e torras.</p>
            </div>
        </div>

        <!-- SENSORES -->
        <div class="row mt-5">
            <!-- Lateral: Adicionar e Gerenciar Sensores -->
            <div class="col-md-3 d-flex flex-column gap-3">
                <a href="../torradores/adicionar.php" class="btn btn-outline-success btn-lg p-4">
                    <strong>Adicionar - Torrador</strong><br>
                    <small>Conecte um novo Torrador ao sistema</small>
                </a>
                <a href="../torradores/gerenciar.php" class="btn btn-outline-primary btn-lg p-4">
                    <strong>Gerenciar Torradores</strong><br>
                    <small>Visualize e edite seus torradores existentes</small>
                </a>
            </div>

            <!-- Últimos Sensores -->
            <div class="col-md-3">
                <a href="sensor.php?id=1" class="btn btn-outline-secondary btn-lg p-4 w-100 h-100 text-start">
                    <strong>Michelangelo - Cafeteria</strong><br>
                    <small>
                        torrador probatino
                        </br>
                        Adicionado no dia 28/03/2025
                    </small>
                </a>
            </div>
            <div class="col-md-3">
                <a href="sensor.php?id=2" class="btn btn-outline-secondary btn-lg p-4 w-100 h-100 text-start">
                    <strong>Michelangelo - Provas sensoriais</strong><br>
                    <small>
                        torrador RodBell
                        </br>
                        Adicionado no dia 10/02/2025
                    </small>
                </a>
            </div>
            <div class="col-md-3">
                <a href="sensor.php?id=3" class="btn btn-outline-secondary btn-lg p-4 w-100 h-100 text-start">
                    
                </a>
            </div>

        </div>

        <!-- TORRAS -->
        <div class="row mt-5">
            <!-- Lateral: Adicionar e Gerenciar Torras -->
            <div class="col-md-3 d-flex flex-column gap-3">
                <a href="../torras/adicionar.php" class="btn btn-outline-success btn-lg p-4">
                    <strong>Adicionar Torra</strong><br>
                    <small>Cadastre uma nova torra de café</small>
                </a>
                <a href="../torras/gerenciar.php" class="btn btn-outline-primary btn-lg p-4">
                    <strong>Gerenciar Torras</strong><br>
                    <small>Visualize e edite suas torras</small>
                </a>
            </div>

            <!-- Últimas Torras -->
            <div class="col-md-3">
                <a href="torra.php?id=1" class="btn btn-outline-secondary btn-lg p-4 w-100 h-100 text-start">
                    <strong>Torra 7</strong><br>
                    <small>
                        15:35 - 15/04/2025
                        </br>
                        Michelangelo - Cafeteria
                        </br>
                        Finalidade: Espresso
                        </br>
                        Graos Arabicos
                    </small>
                </a>
            </div>
            <div class="col-md-3">
                <a href="torra.php?id=2" class="btn btn-outline-secondary btn-lg p-4 w-100 h-100 text-start">
                    <strong>Torra 6</strong><br>
                    <small>
                        08:35 - 10/04/2025
                        </br>
                        Michelangelo - Cafeteria
                        </br>
                        Finalidade: Filtro
                        </br>
                        Graos Burbon
                    </small>
                </a>
            </div>
            <div class="col-md-3">
                <a href="torra.php?id=3" class="btn btn-outline-secondary btn-lg p-4 w-100 h-100 text-start">
                    <strong>Torra 5</strong><br>
                    <small>
                        16:55 - 02/04/2025
                        </br>
                        Michelangelo - Provas Sensoriais
                        </br>
                        Finalidade: Amostra
                        </br>
                        Graos Burbon
                    </small>
                </a>
            </div>
        </div>

        <!-- CONTA -->
        <div class="row mt-5 align-items-center mb-5">
            <!-- Botão Configurações -->
            <div class="col-md-4">
            <a href="configurar.php" class="btn btn-outline-dark btn-lg w-100 p-4">
                <strong>Configurações</strong><br>
                <small>Preferências da conta</small>
            </a>
            </div>

            <!-- Campo de busca -->
            <div class="col-md-4">
            <a href="#" class="btn btn-outline-dark btn-lg w-100 p-4">
                <strong>Buscar Torras</strong><br>
                <small>Encontre a torra perfeita</small>
            </a>
            </div>

            <!-- Botão Sair -->
            <div class="col-md-4">
            <a href="#" class="btn btn-outline-danger btn-lg w-100 p-4">
                <strong>Sair da Conta</strong><br>
                <small>Encerrar sessão</small>
            </a>
            </div>
        </div>

    </main>

    <?php include '../templates/footer.php'; ?>
</body>
</html>