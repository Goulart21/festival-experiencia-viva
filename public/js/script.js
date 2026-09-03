


function confirmarExclusao() {
    return confirm("Deseja realmente excluir este participante?")
}


const formCadastro = document.querySelector("form")

formCadastro.addEventListener("submit", function (e) {

    const nome = document.querySelector("#nome").value.trim()
    const email = document.querySelector("#email").value.trim()
    const telefone = document.querySelector("#telefone").value.trim()

    if (nome === "" || email === "" || telefone === "") {
        alert("Preencha todos os campos.")
        e.preventDefault()
    }

})

telefone.addEventListener("input", function () {

    let valor = telefone.value.replace(/\D/g, "")

    if (valor.lenght <= 10) {

        valor = valor.replace(/^(\d{2})(\d)/g, "($1) $2");
        valor = valor.replace(/(\d{4})(\d)/, "$1-$2");

    }

    else {

        valor = valor.replace(/^(\d{2})(\d)/g, "($1) $2");
        valor = valor.replace(/(\d{5})(\d)/, "$1-$2");
    }

    telefone.value = valor
})