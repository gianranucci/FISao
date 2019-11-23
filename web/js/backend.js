/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$('#num_fecha').on('change',function(){
    var torneo = $(this).data('torneo');
    var numfecha = $(this).val();
    $(location).attr('href', '?r=partido/crear-partido-fecha&num_fecha='+numfecha+'&torneo_id='+torneo);
});


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
$('.golesV-input').on('change',function(){
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
          var goles = document.getElementById('golesvisitante');
          goles.value = respuesta; 
      }
    })
});

