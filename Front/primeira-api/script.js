var divResposta = document.getElementById("resposta");

var botaohello = document.getElementById("botaohello");
botaohello.addEventListener("click", requisicaoHello);

 async function requisicaoHello() {
    var requisicao = await fetch("http://localhost/PRIMEIRA-API/hello");
    var resposta =  await requisicao.json();
    console.log(resposta);

    divResposta.innerHTML = "Status: " + resposta.status + "<br>" + "Mensagem: " + resposta.mensagem;
 }

 var botaoecho = document.getElementById("botaoecho");
 botaoecho.addEventListener("click", requisicaoEcho);

 async function requisicaoEcho() {
    var echo = document.getElementById("inputecho").value;
    var requisicao = await fetch("http://localhost/PRIMEIRA-API/echo" , {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            message :echo
        })
    });
    var resposta = await requisicao.json();
    console.log(resposta.echo.message);

    divResposta.innerHTML = "Status: " + resposta.status + "<br>" + "Mensagem: " + resposta.echo.message;
 }
