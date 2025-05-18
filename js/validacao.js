// Validação para formulário de cadastro
function validarCadastro(event) {
    event.preventDefault(); // evita envio automático para validar antes

    const nome = document.getElementById('nome').value.trim();
    const email = document.getElementById('email').value.trim();
    const senha = document.getElementById('senha').value;

    if (nome === '') {
        alert('Por favor, preencha o nome.');
        return false;
    }

    if (!validarEmail(email)) {
        alert('Por favor, informe um e-mail válido.');
        return false;
    }

    if (senha.length < 6) {
        alert('A senha deve ter no mínimo 6 caracteres.');
        return false;
    }

    // Se tudo estiver ok, envia o formulário
    event.target.submit();
}

// Validação para formulário de login
function validarLogin(event) {
    event.preventDefault();

    const email = document.getElementById('email').value.trim();
    const senha = document.getElementById('senha').value;

    if (!validarEmail(email)) {
        alert('Por favor, informe um e-mail válido.');
        return false;
    }

    if (senha === '') {
        alert('Por favor, informe a senha.');
        return false;
    }

    event.target.submit();
}

// Função para validar email usando regex simples
function validarEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}

// Adicionar event listeners nos formulários (executar após DOM carregado)
document.addEventListener('DOMContentLoaded', function () {
    const formCadastro = document.querySelector('form[action=""]'); // ou outro seletor mais específico
    if (formCadastro) {
        formCadastro.addEventListener('submit', validarCadastro);
    }

    const formLogin = document.querySelector('form[action="php/login.php"]');
    if (formLogin) {
        formLogin.addEventListener('submit', validarLogin);
    }
});
