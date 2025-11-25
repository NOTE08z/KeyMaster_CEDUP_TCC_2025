function validaSenha(elemento, quantidadeMinima, limiteTexto){
if(elemento.value.length < quantidadeMinima ){
    limiteTexto.style.display = "block";
}
else{
limiteTexto.style.display = "none";    
}
elemento.addEventListener("blur", function(){
limiteTexto.style.display = "none";
});
}
function checkBox(elemento, checkbox){
  if (checkbox.checked == true){
    elemento.type = "text";
  }
  else{
    elemento.type = "password";
  }
}
