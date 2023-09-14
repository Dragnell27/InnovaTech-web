console.log(jsVariable);

var pagar = document.getElementById("pagar");
var total = (jsVariable)*100;
pagar.value = total;

var letras = "ABCDEFGHIJKLMNOPQRSTUVWZabcdefghijklmnopqrstuvwxyz123456789";
referencia = '';

for(let i =0; i<12; i++){
    const generador = Math.floor(Math.random()*letras.length);
    referencia += letras.charAt(generador);
}
var rfe = document.getElementById("reference");
rfe.value = referencia;


var cadenaConcatenada = referencia+total+"COPtest_integrity_xh3X1tevWpLr1SgvMeWgAbgZupELw3wB";
var firma = document.getElementById("firma");
firma.value = cadenaConcatenada;
