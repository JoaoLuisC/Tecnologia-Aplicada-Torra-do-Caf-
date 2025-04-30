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
                <h1 class="text-center">Adicionando Torrador</h1>
            </div>
        </div>

        <!-- FORMULÁRIO PARA ADICIONAR TORRADOR -->
        <div class="row mt-4">
            <div class="col-md-6 offset-md-3">
            
                <!-- CÓDIGO GERADO AUTOMATICAMENTE -->
                <div class="alert alert-info text-center mb-3" role="alert">
                    <strong>Código de Conexão:</strong> 
                    <?php
                        // Simulação de código gerado automaticamente
                        $codigoConexao = uniqid('sensor_');
                        echo $codigoConexao;
                    ?>
                </div>

                <form action="../../app/controllers/adicionar_torrador.php" method="POST">
                    <div class="mb-3">
                        <label for="nomeTorrador" class="form-label">Nome do Torrador</label>
                        <input type="text" class="form-control" id="nomeTorrador" name="nomeTorrador" placeholder="Digite o nome do torrador" required>
                    </div>
                    <input type="hidden" name="codigoConexao" value="<?php echo $codigoConexao; ?>">
                    <button type="submit" class="btn btn-primary w-100">Adicionar Torrador</button>
                </form>
            </div>
        </div>     

        <!-- BOTÃO VOLTAR -->
        <div class="row mt-5 align-items-center justify-content-center mb-5">
            <div class="col-md-6 text-center">
                <a onclick="history.back()" class="btn btn-outline-dark btn-lg w-100 p-4">
                    <strong>Voltar</strong><br>
                </a>
            </div>
        </div>

    </main>

    <?php include "../templates/footer.php"; ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>



