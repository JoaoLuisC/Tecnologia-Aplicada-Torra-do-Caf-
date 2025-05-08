<?php
    include '../../app/helpers/verificar_sessao.php';
    include '../../app/configs/conexao.php';

    if (!isset($_GET['id'])) {
        header("Location: index.php");
        exit();
    }
    $codigoConexao = uniqid('sensor_'); // Simulação de código gerado automaticamente 
    $torradorId = $_GET['id'];

    $sql = "SELECT nome FROM torradores WHERE id = ? AND usuario_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$torradorId, $usuarioId]);
    $torrador = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$torrador) {
        echo "Torrador não encontrado ou você não tem permissão.";
        exit();
    }

    $nomeTorrador = $torrador['nome'];
    
?>

<?php
    // Verifica se os dados necessários foram enviados
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $torradorId = $_GET['id'] ?? null;
        $nomeTorrador = $_POST['nomeTorrador'] ?? null;
        $codigoConexao = $_POST['codigoConexao'] ?? null;

        if (!$torradorId || !$nomeTorrador) {
            echo "Dados incompletos para atualização.";
            exit();
        }

        // Atualiza o nome do torrador e salva o código (quando houver a coluna)
        $sql = "UPDATE torradores SET nome = ? WHERE id = ? AND usuario_id = ?";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([$nomeTorrador, $torradorId, $usuarioId]);

        if ($result) {
            header("Location: ../../public/torradores/index.php?sucesso=1");
            exit();
        } else {
            echo "Erro ao atualizar o torrador.";
            exit();
        }
    } else {
        echo "Método inválido.";
        exit();
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configurar Torrador</title>
    <link rel="icon" href="../../public/images/graos-de-cafe.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../public/css/torradores_style/adicionar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>

    <?php include "../templates/navbar.php"; ?>
    
    <main class="container mt-5">

        <!-- TÍTULO -->
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h1 class="text-center">Configurar Torrador</h1>
            </div>
        </div>

        <!-- INFORMAÇÕES DO TORRADOR -->
        <div class="row mt-4">
            <div class="col-md-6 offset-md-3">
                <form id="formEditarTorrador" action="../../app/controllers/editar_torrador.php" method="POST">
                    <div class="mb-3 d-flex align-items-center">
                        <label for="nomeTorrador" class="form-label me-2 mb-0"><strong>Nome do Torrador:</strong></label>
                        <input 
                            type="text" 
                            class="form-control-plaintext" 
                            id="nomeTorrador" 
                            name="nomeTorrador" 
                            value="<?php echo htmlspecialchars($nomeTorrador); ?>" 
                            readonly
                            style="width:auto; display:inline; margin-right:10px;"
                        >
                        <button type="button" class="btn btn-link p-0" id="btnEditarNome" title="Editar nome">
                            <i class="fa fa-pencil-alt"></i>
                        </button>
                        <button type="submit" class="btn btn-success btn-sm ms-2 d-none" id="btnSalvarNome" title="Salvar">
                            <i class="fa fa-check"></i>
                        </button>
                        <button type="button" class="btn btn-secondary btn-sm ms-1 d-none" id="btnCancelarEdicao" title="Cancelar">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                    <input type="hidden" name="codigoConexao" value="<?php echo htmlspecialchars($codigoConexao); ?>">
                </form>
                <div class="alert alert-info text-center mt-3" role="alert">
                    <strong>Código de Conexão:</strong> <?php echo htmlspecialchars($codigoConexao); ?>
                </div>
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

    <?php include_once "../templates/footer.php"; ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Edição do nome do torrador
        const btnEditar = document.getElementById('btnEditarNome');
        const btnSalvar = document.getElementById('btnSalvarNome');
        const btnCancelar = document.getElementById('btnCancelarEdicao');
        const inputNome = document.getElementById('nomeTorrador');
        let nomeOriginal = inputNome.value;

        btnEditar.addEventListener('click', function() {
            inputNome.readOnly = false;
            inputNome.classList.remove('form-control-plaintext');
            inputNome.classList.add('form-control');
            btnSalvar.classList.remove('d-none');
            btnCancelar.classList.remove('d-none');
            btnEditar.classList.add('d-none');
            inputNome.focus();
        });

        btnCancelar.addEventListener('click', function() {
            inputNome.value = nomeOriginal;
            inputNome.readOnly = true;
            inputNome.classList.add('form-control-plaintext');
            inputNome.classList.remove('form-control');
            btnSalvar.classList.add('d-none');
            btnCancelar.classList.add('d-none');
            btnEditar.classList.remove('d-none');
        });

        // Ao salvar, o formulário será enviado normalmente
    </script>
</body>
</html>
