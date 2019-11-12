<?php

//use yii\bootstrap4\ActiveForm;
use app\assets\EstilosAsset;

//EstilosAsset::register($this);
?>
<div class="row">
    <div class="col-sm-6 tabla-local">
        <table class="table table-bordered table-responsive">
            <thead>
                <tr>
                    <th><h3><?= $partido->equipolocal->nombre_equipo ?></h3></th>
                    <th><input class="marcador" disabled value="<?= $partido->equipolocal->golesPartido($partido->id_partido) ?>" id="goleslocal"></th>
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
                            <input value="<?= $jugador->golesPartido($partido->id_partido) ?>" data-equipo="<?= $partido->equipolocal_id ?>" data-partido="<?= $partido->id_partido ?>" name="<?= $jugador->id_jugador ?>" data-jugador="<?= $jugador->id_jugador ?>" class="goles-input" min="0" pattern="^[0-9]+" type="number">
                        </td>
                    </tr>
<?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="col-sm-6 tabla-local">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>
                        <h3> <?= $partido->equipovisitante->nombre_equipo ?></h3></th>
                    <th><input disabled value="<?= $partido->equipovisitante->golesPartido($partido->id_partido) ?>" class="goles-input marcador" id="golesvisitante"></th>

                </tr>
            </thead>
            <tbody>
                        <?php foreach ($partido->equipovisitante->jugadors as $jugador): ?>
                    <tr>
                        <td>
    <?= $jugador->nombre_jugador  ?>
                        </td>
                        <td>
                            <input value="<?= $jugador->golesPartido($partido->id_partido) ?>" data-equipo="<?= $partido->equipovisitante_id ?>" data-partido="<?= $partido->id_partido ?>" name="<?= $jugador->id_jugador ?>" data-jugador="<?= $jugador->id_jugador ?>" class="golesV-input" min="0" pattern="^[0-9]+" type="number">
                        </td>
                    </tr>
<?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
