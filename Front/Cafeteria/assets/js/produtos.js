var divResposta = document.getElementById("resposta")

var inputNome = document.getElementById("nome")
var inputPreco = document.getElementById("preco")
var inputCategoria = document.getElementById("categoria")

document.getElementById('botaoEnviar').addEventListener('click', postProduto)

document.addEventListener('DOMContentLoaded', () => {
    getProdutos()
    carregarCategorias()
})

async function getProdutos() {
    var requisicao = await fetch("http://localhost/cafeteria-api/produtos")
    var resposta = await requisicao.json()

    const linhas = (resposta.data || []).map(item => `
        <tr>
            <td>${item.nome}</td>
            <td>R$ ${item.preco ?? '-'}</td>
            <td>${item.categoria ?? 'Sem categoria'}</td>
            <td><button onclick="deleteProduto(${item.id})">Deletar</button></td>
        </tr>
    `).join("");

    divResposta.innerHTML = `
        <table class="sua-classe">
            <thead>
                <tr>
                    <th colspan="4"><center>Produtos Cadastrados</center></th>
                </tr>
                <tr>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Categoria</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody>
                ${linhas}
            </tbody>
        </table>
    `;
}

async function postProduto() {
    var requisicao = await fetch("http://localhost/cafeteria-api/produtos", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            nome: inputNome.value,
            preco: inputPreco.value,
            categoria_id: inputCategoria.value
        })
    })

    var resposta = await requisicao.json()
    console.log(resposta)

    inputNome.value = ""
    inputPreco.value = ""
    inputCategoria.value = ""

    getProdutos()
}

async function deleteProduto(id) {
    var requisicao = await fetch("http://localhost/cafeteria-api/produtos/" + id, {
        method: "DELETE"
    })

    var resposta = await requisicao.json()
    console.log(resposta)

    getProdutos()
}

async function carregarCategorias() {
    var requisicao = await fetch("http://localhost/cafeteria-api/categorias")
    var resposta = await requisicao.json()

    inputCategoria.innerHTML = `
        <option value="">Selecione uma categoria</option>
        ${resposta.data.map(cat => `
            <option value="${cat.id}">${cat.nome}</option>
        `).join("")}
    `
}