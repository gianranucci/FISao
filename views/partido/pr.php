<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use kartik\datetime\DateTimePicker;

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
                        <?php
                        // echo $form->field($model, "[$i]".'fecha_inicio')->textInput() 
                        echo $form->field($model, "[$i]" .'fecha_inicio')->widget(DateTimePicker::classname(), [
                            'options' => ['placeholder' => 'Elija una fecha'],
                            'pluginOptions' => [
                                'autoclose' => true
                            ]
                        ]);
//                        echo DateTimePicker::widget([
//                            'model' => $model,
//                            'attribute' => 'fecha_inicio',
//                            'options' => ['placeholder' => 'Select issue date ...'],
//                            'pluginOptions' => [
//                                'format' => 'yy-mm-dd h:m',
//                                'todayHighlight' => true
//                            ]
//                        ]);
                        ?>
                    </td>
                    <td>
                        <?php
                        $categorias = app\models\Equipo::find()->select('categoria')->groupBy('categoria')->all();
                        $liga = app\models\Liga::find()->all();
                        $partidoL = yii\helpers\ArrayHelper::map($categorias, 'categoria', 'categoria');
                        ?>
    <?= $form->field($model, "[$i]" . 'liga_id')->dropDownList($partidoL, ['class' => 'categoria-select', 'prompt' => 'Seleccione la liga']); ?>

                    </td>
                    <td>
                        <?php
                        $equipoCat = app\models\Equipo::find()->where(['categoria' => $model->liga_id])->all();
                        $equipos = yii\helpers\ArrayHelper::map($equipoCat, 'id_equipo', 'nombre_equipo');
                        ?>
    <?= $form->field($model, "[$i]" . 'equipolocal_id')->dropDownList($equipos, ['prompt' => 'Seleccione el equipo Local']); ?>

                    </td>
                    <td>vs</td>
                    <td>

    <?= $form->field($model, "[$i]" . 'equipovisitante_id')->dropDownList($equipos, ['prompt' => 'Seleccione el equipo Visitante']); ?>

                    </td>
                    <td>
    <?= $partido->fecha->numero ?? '' ?> Fecha
                    </td>
                    <td>
                        <?php
                        $cancha = app\models\Canchas::find()->all();
                        $partidoC = yii\helpers\ArrayHelper::map($cancha, 'id_cancha', 'nombre_cancha');
                        ?>
    <?= $form->field($model, "[$i]" . 'cancha_id')->dropDownList($partidoC, ['prompt' => 'Seleccione la cancha']) ?>

                    </td>
                </tr>
<?php endforeach; ?>
        </tbody>
    </table>
    <div class="form-group">
        <input type="hidden" id="cant" value="<?= $i ?>">
        <?= Html::button('+', ['class' => 'btn btn-primary add-jugador']) ?>
    <?= Html::submitButton('Save', ['name' => 'btn-guardar', 'class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>

    <?php
    $js = " $('.categoria-select').on('change',function(){
            $('form').submit(); 
        });";
    $this->registerJs($js);
    ?>


<?php yii\widgets\Pjax::end() ?>
    <script>

    </script>


</div>
