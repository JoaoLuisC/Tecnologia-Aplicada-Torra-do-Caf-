// Alternar visibilidade da senha
document.getElementById('togglePassword1').addEventListener('click', function() {
    var passwordField = document.getElementById('password');
    var icon = this.querySelector('i');
    if (passwordField.type === "password") {
        passwordField.type = "text";
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        passwordField.type = "password";
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
});

document.getElementById('togglePassword2').addEventListener('click', function() {
    var confirmPasswordField = document.getElementById('confirmPassword');
    var icon = this.querySelector('i');
    if (confirmPasswordField.type === "password") {
        confirmPasswordField.type = "text";
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        confirmPasswordField.type = "password";
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
});

// Função para mostrar mensagens de erro
function mostrarErro(mensagem) {
    const alerta = document.getElementById('alertaErro');
    alerta.textContent = mensagem;
    alerta.classList.remove('d-none');
}

// Validação do formulário antes de enviar
document.getElementById('formCadastro').addEventListener('submit', function(event) {
    const nome = document.getElementById('firstName').value.trim();
    const sobrenome = document.getElementById('lastName').value.trim();
    const email = document.getElementById('email').value.trim();
    const confirmEmail = document.getElementById('confirmEmail').value.trim();
    const senha = document.getElementById('password').value;
    const confirmSenha = document.getElementById('confirmPassword').value;

    // Validações
    if (!nome || !sobrenome || !email || !confirmEmail || !senha || !confirmSenha) {
        mostrarErro("Todos os campos são obrigatórios.");
        event.preventDefault();
        return;
    }

    if (email !== confirmEmail) {
        mostrarErro("Os emails não coincidem.");
        event.preventDefault();
        return;
    }

    if (senha.length < 8) {
        mostrarErro("A senha deve ter no mínimo 8 caracteres.");
        event.preventDefault();
        return;
    }

    if (senha !== confirmSenha) {
        mostrarErro("As senhas não coincidem.");
        event.preventDefault();
        return;
    }

    // Se tudo passar, remove alerta antes de enviar
    const alerta = document.getElementById('alertaErro');
    alerta.classList.add('d-none');
});
