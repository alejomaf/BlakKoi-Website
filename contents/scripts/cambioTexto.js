/*Inicio cambio de texto*/

var x=1;
$('#content').load('../generic-views/generic-views.html #inicio');
function temporizador(){
  cambiarTexto(x);
  if(x==4)x=1;else x++;
}
setInterval(temporizador,10000);

function cambiarTexto(aux2){
  var modal = document.getElementById('texttop'+aux2);
  var borrar;
  if(aux2==1){
  borrar=document.getElementById('texttop4');
  }else{
  borrar=document.getElementById('texttop'+(aux2-1));
  }
  borrar.style.display="none";
  modal.style.display="block";
}

