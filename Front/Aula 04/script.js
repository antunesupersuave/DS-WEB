var contadoritem = 0

function adicionar(){

contadoritem ++
console.log(contadoritem)

let novoItem = document.createElement("li")
let novatarefa = document.getElementById("novatarefa").value

novoItem.textContent = contadoritem + " - " + novatarefa
novoItem.setAttribute('id' , contadoritem)

let botaoremover = document.createElement ("button")
botaoremover.textContent  = "remover"
botaoremover.setAttribute("onclick" , "remover("+contadoritem+")")

novoItem.appendChild(botaoremover)
document.getElementById("lista").appendChild(novoItem)
}

function remover(itemlista){
    var item = document.getElementById(itemlista)
    document.getElementById("lista").removeChild(item)
}