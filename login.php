<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Login</title>
    <link rel="icon" href="images/graos-de-cafe.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/login_style.css">
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
                            <img src="images\imagem_login_page_cafe.png" alt="Imagem de Login" />
                        </div>
                        <h2>Bem-vindo!</h2>
                        <p>Conecte-se ao mundo do café e tecnologia.</p>
                    </header>
                    <!-- Formulário de login -->
                    <form action="autenticar.php" method="POST">
                        <div class="mb-3">
                            <label for="email" class="form-label">Endereço de Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu email" required />
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Senha</label>
                            <input type="password" class="form-control" id="password" name="senha" placeholder="Digite sua senha" required />
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Entrar</button>

                        <nav class="mt-3 text-center">
                            <a href="#">Esqueceu a senha?</a>
                        </nav>
                        <nav class="mt-3 text-center">
                            <a href="cadastro.php">Crie sua conta agora!</a>
                        </nav>
                    </form>
                </div>
            </section>
        </div>

    </main>

    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2025 - Desenvolvido por João Luís Cardoso.</p>
        <p>&copy; IFSULDEMINAS - Campus Machado</p>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
