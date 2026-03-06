// adiciona um evento ao formulário quando ele for enviado
document.getElementById("formulario").addEventListener("submit", function(e){

e.preventDefault(); // impede o envio do formulário até validar tudo

// Pegando valores digitados nos campos do formulário
let nome = document.getElementById("nome").value;
let email = document.getElementById("email").value;
let senha = document.getElementById("senha").value;
let confirmaSenha = document.getElementById("confirma-senha").value;
let cpf = document.getElementById("cpf").value;
let telefone = document.getElementById("telefone").value;
let cep = document.getElementById("cep").value;
let data = document.getElementById("data-nascimento").value;
let valor = document.getElementById("valor").value;
let url = document.getElementById("url").value;
let cartao = document.getElementById("cartao").value;

let erro = false; // variável que verifica se existe algum erro

// VALIDAÇÃO DO NOME

let regexNome = /^[A-Za-zÀ-ú\s]{3,}$/; // aceita apenas letras e espaços, mínimo 3 caracteres

if(!regexNome.test(nome)){ // test verifica se o valor corresponde ao padrão da regex
document.getElementById("erro-nome").innerText = "Nome inválido"; // mostra mensagem de erro
erro = true; // marca que existe erro
}else{
document.getElementById("erro-nome").innerText = ""; // limpa mensagem se estiver correto
}

// VALIDAÇÃO DO EMAIL

let regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // padrão básico de email

if(!regexEmail.test(email)){ // verifica se o email segue o padrão
document.getElementById("erro-email").innerText = "Email inválido";
erro = true;
}else{
document.getElementById("erro-email").innerText = "";
}

// VALIDAÇÃO DA SENHA

let regexSenha = /^(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%]).{8,}$/;
// exige:
// pelo menos 1 letra maiúscula
// pelo menos 1 número
// pelo menos 1 caractere especial
// mínimo 8 caracteres

if(!regexSenha.test(senha)){ // verifica se atende aos critérios
document.getElementById("erro-senha").innerText = "Senha fraca";
erro = true;
}
else if(senha !== confirmaSenha){ // verifica se as duas senhas são iguais
document.getElementById("erro-senha").innerText = "Senhas não compatíveis";
erro = true;
}
else{
document.getElementById("erro-senha").innerText = "";
}

// CPF

let regexCPF = /^\d{3}\.\d{3}\.\d{3}\-\d{2}$/; // formato: 000.000.000-00

if(!regexCPF.test(cpf)){
document.getElementById("erro-cpf").innerText = "CPF inválido";
erro = true;
}else{
document.getElementById("erro-cpf").innerText = "";
}

// TELEFONE

let regexTelefone = /^\(\d{2}\)\s\d{4,5}\-\d{4}$/;
// formato aceito:
// (11) 9999-9999
// (11) 99999-9999

if(!regexTelefone.test(telefone)){ // verifica se segue o padrão
document.getElementById("erro-telefone").innerText = "Telefone inválido";
erro = true;
}else{
document.getElementById("erro-telefone").innerText = "";
}

// CEP

let regexCEP = /^\d{5}\-\d{3}$/; // formato: 00000-000

if(!regexCEP.test(cep)){
document.getElementById("erro-cep").innerText = "CEP inválido";
erro = true;
}else{
document.getElementById("erro-cep").innerText = "";
}

// DATA

let regexData = /^\d{2}\/\d{2}\/\d{4}$/; // formato da data 

if(!regexData.test(data)){
document.getElementById("erro-data").innerText = "Data inválida";
erro = true;
}else{
document.getElementById("erro-data").innerText = "";
}

// VALOR

let regexValor = /^\d{1,3}(\.\d{3})*,\d{2}$/;
// aceita valores como:
// 123,45
// 1.234,56
// 12.345,67

if(!regexValor.test(valor)){
document.getElementById("erro-valor").innerText = "Valor inválido";
erro = true;
}else{
document.getElementById("erro-valor").innerText = "";
}

// URL

let regexURL = /^https?:\/\/.+/; // exige que comece com http:// ou https://

if(!regexURL.test(url)){
document.getElementById("erro-url").innerText = "URL inválida";
erro = true;
}else{
document.getElementById("erro-url").innerText = "";
}

//  CARTÃO

cartao = cartao.replaceAll(" ",""); // remove os espaços digitados no número do cartao

let regexCartao = /^\d{16}$/; // exige 16 numeros

if(!regexCartao.test(cartao)){
document.getElementById("erro-cartao").innerText = "Cartão inválido";
erro = true;
}else{
document.getElementById("erro-cartao").innerText = "";
}

// RESULTADO FINAL

if(!erro){ // se nenhuma validação falhou
document.getElementById("resultado").innerHTML =
"<h3>Cadastro realizado com sucesso!</h3>"; // mostra mensagem de sucesso
}

});