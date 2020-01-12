/*Funcion que hace aparecer y desaparecer la barra de busqueda*/

function aparecerBarra(){
    var cuadrado=document.getElementById("square");
    var barra=document.getElementById("sidebar");

    if(barra.style.width!="0%"){
        barra.style.width="0%";
        cuadrado.style.width="100%";
        }
    else {
        barra.style.width="100%";
        cuadrado.style.width="0%";
        }
    
  }
  
  function cargar(aux){
    /*Estamos cargando en el elemento square el elemento con id= "servicios" de servicios.html
    para adaptar los estilos recomiendo hacerlo primero manualmente para dejar preparada la
    inserción de código */
    $('#square').empty();
    $('#square').slideToggle(800);
    setTimeout(function(){$('#square').load('../generic-views/generic-views.html '+aux);},800);
    $('#square').slideToggle(800);
  }
  function cargarZon(aux){
    $('#square').empty();
    $('#square').slideToggle(800);
    setTimeout(function(){$('#square').load('../special-views/zonaPersonal.html '+aux);},800);
    $('#square').slideToggle(800);
  }
  function cargarAdm(aux){
    $('#square').empty();
    $('#square').slideToggle(800);
    setTimeout(function(){$('#square').load('../special-views/admin-view.html '+aux);},800);
    $('#square').slideToggle(800);
  }

  function cargarCont(aux){
    $('#square').empty();
    $('#square').slideToggle(800);
    setTimeout(function(){$('#square').load(aux);},800);
    $('#square').slideToggle(800);
  }
  function cargarSquareAdmin(aux){
    $('#square').empty();
    $('#square').slideToggle(800);
    setTimeout(function(){$('#square').load(aux);},800);
    $('#square').slideToggle(800);
  }

  function cargarProy(aux){
    idProyecto(aux);
    $('#square').empty();
    $('#square').slideToggle(800);
    setTimeout(function(){$('#square').load("proyecto.php");},800);
    $('#square').slideToggle(800);
  }



  /*Secuencia del cambio de fondo de pantalla*/

  var bgImageArray = ["fondo1.jpg", "fondo2.jpg", "fondo3.jpg", "fondo4.jpg"],
  base = "../../images/fondos/";
  secs = 7;
  bgImageArray.forEach(function(img){
      new Image().src = base + img; 
      // caches images, avoiding white flash between background replacements
  });

  function backgroundSequence() {
    window.clearTimeout();
    var k = 0;
    for (i = 0; i < bgImageArray.length; i++) {
      setTimeout(function(){ 
        var aux=document.getElementById('backgroundImages');
        aux.style.background = "url(" + base + bgImageArray[k] + ") no-repeat center center";
        aux.style.backgroundSize ="cover";
      if ((k + 1) == bgImageArray.length) { setTimeout(function() { backgroundSequence() }, (secs * 1000))} else { k++; }			
      }, (secs * 1000) * i)	
    }
  }
  backgroundSequence();

 