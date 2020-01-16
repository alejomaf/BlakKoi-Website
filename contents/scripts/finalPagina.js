/*Botones activos*/

    // Coge el cuadro del contenido
    var btnContainer = document.getElementById("cambioActivo");

    // Coge todos los botones de la clase boton dentro del div
    var btns = btnContainer.getElementsByClassName("boton");

    btnContainer.getElementsByClassName("active")[0].addEventListener("click", cambioBotones);
    // Va cambiando los botones
    for (var i = 0; i < btns.length; i++) {
      btns[i].addEventListener("click", cambioBotones);
    }
    function cambioBotones(){
        var current = document.getElementsByClassName("active");
        current[0].className = current[0].className.replace("active", "boton");
        this.className += " active";
      }


      (function($) {

        "use strict";

        var fullHeight = function() {

          $('.js-fullheight').css('height', $(window).height());
          $(window).resize(function(){
            $('.js-fullheight').css('height', $(window).height());
          });

        };
        fullHeight();

        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });

        })(jQuery);