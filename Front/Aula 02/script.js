function somarNumeros(num1,num2) {
    return num1 + num2;
}

let resultado = somarNumeros(5,10)
//alert(resultado)
console.log(resultado)

let dataAtual = new Date()
console.log(dataAtual.toISOString)

let ano = dataAtual.getFullYear();
let mes = dataAtual.getMonth();
let dia = dataAtual.getDate();
let hora = dataAtual.getHours();
let minuto = dataAtual.getMinutes();
let segundo = dataAtual.getSeconds();

console.log(`${dia}/${mes}/${ano} ${hora}:${minuto}:${segundo}`);

//outro exemplo de date 

let hoje = new Date();
let diasParaAdicionar = 7;

// cria uma nova data apartir da data atual

let novaData = new Date(hoje)
novaData.setDate(novaData.getDate() + diasParaAdicionar);

console.log('Data depois de uma semana: ' + novaData.toLocaleDateString());



let data1 = new Date('2025-03-19');
let data2 = new Date ('2025-03-25');

let diferencaMs = data2 - data1
let diferencaDias = diferencaMs / (1000 * 60 * 60 * 24);
console.log(`Diferença: ${diferencaDias} dias`);

// manipulando o DOM

document.getElementById("conteudo").innerHTML = "<p>Olá, mundo!</p>";

var valor = document.getElementById("conteudo").innerHTML;
console.log(valor);

// Img

document.getElementById("foto").setAttribute("src", "imagem.jpg");

//alterando propriedades css

document.getElementById("conteudo").style.backgroundColor ="lightblue"
document.getElementById("foto").style.width = "680px"

//criando uma função para uma funçáo

function mudaTamanho(){
    document.getElementById("foto").style.width = "1000px"
}