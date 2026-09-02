


function confirmarExclusao() {
    return confirm("Deseja realmente excluir este participante?")
}


const formCadastro = document.querySelector("form")

formCadastro.addEventListener("submit", function(e) {

    const nome = document.querySelector("#nome").value.trim()
    const email = document.querySelector("#email").value.trim()
    const telefone = document.querySelector("#telefone").value.trim()

    if (nome === "" || email === "" || telefone === "") {
        alert("Preencha todos os campos.")
        e.preventDefault()
    }

})