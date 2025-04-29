<?php
require_once '../configs/conexao.php';

function redirecionaComErro($mensagem) {
    echo "<script>alert('$mensagem'); window.history.back();</script>";
    exit;
}

// Verifica se veio pelo método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = trim($_POST['firstName']);
    $sobrenome = trim($_POST['lastName']);
    $email = trim($_POST['email']);
    $confirmEmail = trim($_POST['confirmEmail']);
    $senha = trim($_POST['password']);
    $confirmSenha = trim($_POST['confirmPassword']);

    if (empty($nome) || empty($sobrenome) || empty($email) || empty($confirmEmail) || empty($senha) || empty($confirmSenha)) {
        redirecionaComErro("Todos os campos são obrigatórios!");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        redirecionaComErro("E-mail inválido.");
    }

    if ($email !== $confirmEmail) {
        redirecionaComErro("Os e-mails digitados não conferem.");
    }

    if (strlen($senha) < 8) {
        redirecionaComErro("A senha deve ter no mínimo 8 caracteres.");
    }

    if ($senha !== $confirmSenha) {
        redirecionaComErro("As senhas digitadas não conferem.");
    }

    $sql_verifica = "SELECT id FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql_verifica);
    if ($stmt) {
        $stmt->execute([$email]);
        if ($stmt->rowCount() > 0) {
            redirecionaComErro("Este e-mail já está cadastrado.");
        }
    } else {
        redirecionaComErro("Erro no banco de dados.");
    }

    $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nome, sobrenome, email, senha) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        if ($stmt->execute([$nome, $sobrenome, $email, $senhaCriptografada])) {
            echo "<script>alert('Cadastro realizado com sucesso!'); window.location.href = 'login.php';</script>";
            exit;
        } else {
            redirecionaComErro("Erro ao cadastrar: " . implode(", ", $stmt->errorInfo()));
        }
    } else {
        redirecionaComErro("Erro no banco de dados.");
    }
} else {
    redirecionaComErro("Requisição inválida.");
}
?>
