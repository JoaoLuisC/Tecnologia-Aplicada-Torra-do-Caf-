<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Login</title>
    <link rel="icon" href="images/graos-de-cafe.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../public/css/autenticacao_style/login_style.css">
</head>
<body>
    <main class="container-fluid vh-100">
        <div class="row h-100">
            <!-- Seção de imagens a definir -->
            <section class="col-md-7 d-flex align-items-center justify-content-center">
                <div class="text-center">
                    <h1>A DEFINIR</h1>
                </div>
            </section>

            <!-- Seção de Login -->
            <section class="col-md-5 bg-green d-flex align-items-center justify-content-center">
                <div class="form-container">
                    <!-- Cabeçalho-->
                    <header class="text-center mb-4">
                        <div class="image-placeholder mb-3">
                            <img src="../../public/images/imagem_login_page_cafe.png" alt="Imagem de Login" />
                        </div>
                        <h2>Bem-vindo!</h2>
                        <p>Conecte-se ao mundo do café e tecnologia.</p>
                    </header>
                    <!-- Formulário de login -->
                    <form action="../../app/helpers/autenticar.php" method="POST">
                        <!-- Campo de E-mail -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Endereço de Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu email" required />
                        </div>

                        <!-- Campo de Senha -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Senha</label>
                            <input type="password" class="form-control" id="password" name="senha" placeholder="Digite sua senha" required />
                        </div>

                        <!-- Botão de login -->
                        <button type="submit" class="btn btn-primary w-100">Entrar</button>

                        <!-- Links para ações adicionais -->
                        <nav class="mt-3 text-center">
                            <a href="#">Esqueceu a senha?</a>
                        </nav>
                        <nav class="mt-3 text-center">
                            <a href="cadastro.php">Crie sua conta agora!</a>
                        </nav>
                    </form>

                    <!-- Mensagens de erro (se houver) -->
                    <?php
                        if (isset($_GET['erro'])) {
                            $erro = $_GET['erro'];
                            echo "<div class='alert alert-danger mt-3 text-center'>$erro</div>";
                        }
                    ?>

                </div>
            </section>
        </div>
    </main>

    <?php include "../templates/footer.php"; ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
