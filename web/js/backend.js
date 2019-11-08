/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$('.goles-input').on('change',function(){
    var partido = $(this).data('partido');
    var jugador = $(this).data('jugador');
    var equipo = $(this).data('equipo');
    var cantidad = $(this).val();
    $.post({
      url: '?r=goles/modificar',
      data: {
          jugador:jugador,
          partido:partido,
          cantidad:cantidad,
          equipo:equipo
      },
      success: function(respuesta){
          var goles = document.getElementById('goleslocal');
          goles.value = respuesta; 
      }
    })
});

