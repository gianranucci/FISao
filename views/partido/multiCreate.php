<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Jugador */

$this->title = 'Crear Jugador';
$this->params['breadcrumbs'][] = ['label' => 'Jugadors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partido-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php yii\widgets\Pjax::begin(['id' => 'pjax-multi-partido']) ?>

    <?php $form = ActiveForm::begin(); ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Fecha y hora</th>
                <th>Categoria</th>
                <th>Equipo</th>
                <th>vs</th>
                <th>Equipo</th>
                <th>Nro de Fecha</th>
                <th>Cancha</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($partidos as $i => $model): ?>
                <tr class="partido">

                    <td>
                        <?= $form->field($model, "[$i]".'fecha_inicio')->textInput() ?>
                    </td>
                    <td>
                        <?php
                        $categorias = app\models\Equipo::find()->select('categoria')->groupBy('categoria')->all();
                        $liga = app\models\Liga::find()->all();
                        $partidoL = yii\helpers\ArrayHelper::map($categorias, 'categoria', 'categoria');
                        ?>
                        <?= $form->field($model, "[$i]".'liga_id')->dropDownList($partidoL, ['class'=>'categoria-select','prompt' => 'Seleccione la liga']); ?>

                    </td>
                    <td>
                        <?php
                        $equipoA = app\models\Equipo::find()->where(['categoria'=>$categoria])->all();
                        $partido = yii\helpers\ArrayHelper::map($equipoA, 'id_equipo', 'nombre_equipo');
                        ?>
                        <?= $form->field($model, "[$i]".'equipolocal_id')->dropDownList($partido, ['prompt' => 'Seleccione el equipo Local']); ?>

                    </td>
                    <td>vs</td>
                    <td>
                        <?php
                        $equipoB = app\models\Equipo::find()->all();
                        $partidoB = yii\helpers\ArrayHelper::map($equipoA, 'id_equipo', 'nombre_equipo');
                        ?>
                        <?= $form->field($model, "[$i]".'equipovisitante_id')->dropDownList($partidoB, ['prompt' => 'Seleccione el equipo Visitante']); ?>

                    </td>
                    <td>
                        <?= $partido->fecha->numero ?? '' ?> Fecha
                    </td>
                    <td>
                        <?php
                        $cancha = app\models\Canchas::find()->all();
                        $partidoC = yii\helpers\ArrayHelper::map($cancha, 'id_cancha', 'nombre_cancha');
                        ?>
                        <?= $form->field($model, "[$i]".'cancha_id')->dropDownList($partidoC, ['prompt' => 'Seleccione la cancha']) ?>

                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="form-group">
        <input type="hidden" id="cant" value="<?= $i ?>">
        <?= Html::button('+', ['class' => 'btn btn-primary add-jugador']) ?>
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>

    <?php
    $js = " $('.categoria-select').on('change',function(){
            var categoria = $(this).children('option:selected').val();
            $.pjax.reload({
            type:'POST',
            container:'#pjax-multi-partido',
            data:{categoria:categoria}
            });
            
        });";
    $this->registerJs($js);
    ?>


    <?php yii\widgets\Pjax::end() ?>
    <script>

    </script>


</div>
