function imagem1(){
    document.getElementById("foto").setAttribute("src", "imagem1.jpg");
}

function imagem2(){
    document.getElementById("foto").setAttribute("src", "imagem2.jpg");
}

function mostrarSrc(){
    var valor = document.getElementById("foto").getAttribute("src");
    console.log(valor);
}
