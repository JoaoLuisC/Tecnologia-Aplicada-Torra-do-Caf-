<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario</title>
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

        <!-- TITULO -->
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h1 class="text-center">Bem-vindo, [Nome do Usuário]</h1>
                <p class="text-center">Aqui você pode gerenciar seus sensores e torras.</p>
            </div>
        </div>

        <!-- SENSORES -->
        <div class="row mt-5">
            <!-- Lateral: Adicionar e Gerenciar Sensores -->
            <div class="col-md-3 d-flex flex-column gap-3">
                <a href="adicionar_sensores.php" class="btn btn-outline-success btn-lg p-4">
                    <strong>Adicionar - Sensor</strong><br>
                    <small>Conecte um novo sensor ao sistema</small>
                </a>
                <a href="gerenciar_sensores.php" class="btn btn-outline-primary btn-lg p-4">
                    <strong>Gerenciar Sensores</strong><br>
                    <small>Visualize e edite sensores existentes</small>
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
                <a href="adicionar_torras.php" class="btn btn-outline-success btn-lg p-4">
                    <strong>Adicionar Torra</strong><br>
                    <small>Cadastre uma nova torra de café</small>
                </a>
                <a href="gerenciar_torras.php" class="btn btn-outline-primary btn-lg p-4">
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
            <a href="configuracoes.php" class="btn btn-outline-dark btn-lg w-100 p-4">
                <strong>Configurações</strong><br>
                <small>Preferências da conta</small>
            </a>
            </div>

            <!-- Campo de busca -->
            <div class="col-md-4">
            <a href="configuracoes.php" class="btn btn-outline-dark btn-lg w-100 p-4">
                <strong>Buscar Torras</strong><br>
                <small>Encontre a torra perfeita</small>
            </a>
            </div>

            <!-- Botão Sair -->
            <div class="col-md-4">
            <a href="logout.php" class="btn btn-outline-danger btn-lg w-100 p-4">
                <strong>Sair da Conta</strong><br>
                <small>Encerrar sessão</small>
            </a>
            </div>
        </div>

    </main>

    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2025 - Desenvolvido por João Luís Cardoso.</p>
        <p>&copy; IFSULDEMINAS - Campus Machado</p>
    </footer>
</body>
</html>