var contadoritem = 0

function adicionar(){

    contadoritem++

    let novoItem = document.createElement("li")

    novoItem.textContent = contadoritem + " - " +
        document.getElementById("nome").value + " | " +
        document.getElementById("email").value + " | " +
        document.getElementById("rm").value + " | " +
        document.getElementById("telefone").value + " | " +
        document.getElementById("turma").value

    novoItem.setAttribute("id", contadoritem)

    let botao = document.createElement("button")
    botao.textContent = "remover"
    botao.setAttribute("onclick", "remover(" + contadoritem + ")")

    novoItem.appendChild(botao)

    document.getElementById("lista").appendChild(novoItem)
}

function remover(id){
    document.getElementById("lista")
        .removeChild(document.getElementById(id))
}
