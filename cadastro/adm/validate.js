function validar() {
    // Validação do campo "nome"
    var nome = document.getElementById("nome").value;
    if (!nome.match(/^[A-Za-zÀ-ÖØ-öø-ÿ\s']+$/)) {
        alert("O nome deve conter apenas letras e acentos.");
        return false;
    }

    // Validação do campo "email"
    var email = document.getElementById("email").value;
    if (!email.match(/^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/)) {
        alert("Digite um email válido no formato example@gmail.com.");
        return false;
    }

    // Validação do campo "senha"
    var senha = document.getElementById("senha").value;
    if (!senha.match(/^(?=.*[A-Z]).{6,}$/)) {
        alert("A senha deve ter no mínimo 6 caracteres, incluindo pelo menos 1 letra maiúscula.");
        return false;
    }

    // Validação do campo "rg"
    var rg = document.getElementById("rg").value;
    if (!rg.match(/^\d{7}$/)) {
        alert("O RG deve ter exatamente 7 dígitos numéricos.");
        return false;
    }

    // Validação do campo "cpf"
    var cpf = document.getElementById("cpf").value;
    if (!cpf.match(/^\d{11}$/)) {
        alert("O CPF deve ter exatamente 11 dígitos numéricos.");
        return false;
    }

    // Validação da data de nascimento
    var dataNasc = document.getElementById("data_nasc").value;
    var dataAtual = new Date();
    var dataLimite = new Date(dataAtual.getFullYear() - 18, dataAtual.getMonth(), dataAtual.getDate());
    if (new Date(dataNasc) > dataLimite) {
        alert("Você deve ter pelo menos 18 anos de idade.");
        return false;
    }

    // Envie o formulário se todos os campos forem válidos
    document.forms["form"].submit();
}
