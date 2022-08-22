$(document).ready(function () {
    $('.contato').mask('(00) 0 0000-0000');
    // $('.valor').mask("#.##0,00", { reverse: true });
    // $(".valor").mask('R$ 000.000.000.000.000,00', {reverse: true, placeholder: "R$ 0,00"});  
});


/* VALOR DO SERVIÇO */
const valor = document.querySelector('#valor');

valor.addEventListener("keypress", function (e) {

    if (checkChar(e)) {
        e.preventDefault();
        alert('Atenção: Para informar centavos utilize o ponto! Ex: 1999.99 = R$ 1.999,99');
    }

});

/* FUNÇÃO RESPONSÁVEL POR VERIFICAR O USO DA VÍRGULA NO CAMPO VALOR */
function checkChar(e) {
    const char = String.fromCharCode(e.keyCode);
    const pattern = '[,]';
    if (char.match(pattern)) {
        return true;
    }
}

