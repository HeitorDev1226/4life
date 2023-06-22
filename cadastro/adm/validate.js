function validar(){
    var nome = document.getElementById("nome");
    if(nome.value == "" ){
        alert("nome não informado");
        nome.focus();
    }
}