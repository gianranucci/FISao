<?php
//use yii\bootstrap4\ActiveForm;
?>
<div class="row">
    <div class="col-sm-6 tabla-local">
         <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Equipo Local</th>
                    <th><input disabled value="<?= $partido->equipolocal->golesPartido($partido->id_partido) ?>" id="goleslocal"></th>
                    <!--<th></th>-->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($partido->equipolocal->jugadors as $jugador): ?>
                    <tr>
                        <td>
                            <?= $jugador->nombre_jugador ?>
                        </td>
                        <td>
                            <input value="<?= $jugador->golesPartido($partido->id_partido) ?>" data-equipo="<?=$partido->equipolocal_id?>" data-partido="<?=$partido->id_partido?>" name="<?= $jugador->id_jugador ?>" data-jugador="<?= $jugador->id_jugador ?>" class="goles-input" type="number">
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>

<script>

</script>

<?php
$js = "$('.goles-input').on('change',function(){
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
          alert(respuesta);
      }
    })
});";
//$this->registerJs($js);

?>
