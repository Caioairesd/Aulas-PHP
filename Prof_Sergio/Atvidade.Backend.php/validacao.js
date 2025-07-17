// Executar mascaras
function mascara(o, f) //Define o objeto e chama a função
{
    objeto = o
    funcao = f
    setTimeout("executaMascara()", 1)

}

function executaMascara() {
    objeto.value = funcao(objeto.value)

}


function catjogo(variavel) {
    variavel = variavel.replace(/\d/g, "")


    return variavel
}

