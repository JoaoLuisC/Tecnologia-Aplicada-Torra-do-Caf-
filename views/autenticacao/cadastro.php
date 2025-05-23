<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="icon" href="../../public/images/graos-de-cafe.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../public/css/autenticacao_style/cadastro_style.css">
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

            <!-- Seção de Cadastro -->
            <section class="col-md-5 bg-green d-flex align-items-center justify-content-center">
                <div class="form-container">
                    <!-- Cabeçalho -->
                    <header class="text-center mb-4">
                        <div class="image-placeholder mb-3">
                            <img src="../../public/images/imagem_login_page_cafe.png" alt="Imagem de Cadastro" />
                        </div>
                        <h2>Crie sua conta</h2>
                        <p>Junte-se ao mundo do café e tecnologia.</p>
                    </header>

                    <!-- Alerta de Erros -->
                    <div id="alertaErro" class="alert alert-danger d-none" role="alert"></div>

                    <!-- Formulário de cadastro -->
                    <form method="POST" action="../../app/controllers/processa_cadastro.php" id="formCadastro">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="firstName" class="form-label">Nome</label>
                                <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Digite seu nome" required />
                            </div>
                            <div class="col-md-6">
                                <label for="lastName" class="form-label">Sobrenome</label>
                                <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Digite seu sobrenome" required />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="email" class="form-label">Endereço de Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu email" required />
                            </div>
                            <div class="col-md-6">
                                <label for="confirmEmail" class="form-label">Confirmação de Email</label>
                                <input type="email" class="form-control" id="confirmEmail" name="confirmEmail" placeholder="Confirme seu email" required />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="password" class="form-label">Senha</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Digite sua senha" required />
                                    <button type="button" class="btn btn-outline-secondary" id="togglePassword1">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="confirmPassword" class="form-label">Confirmação de Senha</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirme sua senha" required />
                                    <button type="button" class="btn btn-outline-secondary" id="togglePassword2">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Cadastrar</button>

                        <nav class="mt-3 text-center">
                            <a href="login.php">Já tem uma conta? Faça seu login</a>
                        </nav>
                    </form>

                </div>
            </section>
        </div>
    </main>

    <?php include '../templates/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../public/js/autenticacao_JS/cadastro.js"></script>
    
</body>
</html>
