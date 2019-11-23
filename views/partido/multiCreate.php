<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Jugador */


$this->title = "Partidos de la $num_fecha  ";
$this->params['breadcrumbs'][] = ['label' => 'Partidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partido-create">

    <?php
    $fechas = app\models\Partido::find()->select(['num_fecha'])->where(['torneo_id'=>$torneo_id])->groupBy(['num_fecha'])->all();
    $items = \yii\helpers\ArrayHelper::map($fechas, 'num_fecha', 'num_fecha');
    echo Html::dropDownList('num_fecha', $num_fecha, $items, ['id'=>'num_fecha','data-torneo'=>$torneo_id, 'class'=>'form-control']);
    ?>
    
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
                <th>Borrar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($partidos as $i => $model): ?>
                <tr class="partido">

                    <td>
                        <?php
                        echo $form->field($model, "[$i]" .'fecha_inicio')->widget(DateTimePicker::classname(), [
                            'options' => ['placeholder' => 'Elija una fecha'],
                            'pluginOptions' => [
                                'autoclose' => true
                            ]
                        ])->label(false); ?>
                    </td>
                    <td>
                        <?php
                        $categorias = app\models\Equipo::find()->select('categoria')->groupBy('categoria')->all();
//                        $liga = app\models\Liga::find()->all();
//                        $equiposPorCategoria = app\models\Equipo::find()->where(['categoria' => $model->liga_id]);
                        $categoriasMapeadas = yii\helpers\ArrayHelper::map($categorias, 'categoria', 'categoria');
                        ?>
                        <?= $form->field($model, "[$i]" . 'liga_id')->dropDownList($categoriasMapeadas, ['class' => 'categoria-select form-control', 'prompt' => 'Seleccione la liga'])->label(false); ?>

                    </td>
                    <td>
                        <?php
                        $equiposPorCategoria = app\models\Equipo::find()->where(['categoria' => $model->liga_id])->all();
                        $equipos = yii\helpers\ArrayHelper::map($equiposPorCategoria, 'id_equipo', 'nombre_equipo');
                        ?>
                        <?= $form->field($model, "[$i]" . 'equipolocal_id')->dropDownList($equipos, ['prompt' => 'Seleccione el equipo Local'])->label(false); ?>

                    </td>
                    <td>vs</td>
                    <td>
                        <?php
                        ?>
                        <?= $form->field($model, "[$i]" . 'equipovisitante_id')->dropDownList($equipos, ['prompt' => 'Seleccione el equipo Visitante'])->label(false); ?>

                    </td>
                    <td>
                        <?= $model->num_fecha ?? '' ?> Fecha
                    </td>
                    <td>
                        <?php
                        $cancha = app\models\Canchas::find()->all();
                        $partidoC = yii\helpers\ArrayHelper::map($cancha, 'id_cancha', 'nombre_cancha');
                        ?>
                        <?= $form->field($model, "[$i]" . 'cancha_id')->dropDownList($partidoC, ['prompt' => 'Seleccione la cancha'])->label(false) ?>

                    </td>
                    <td>
                        <?=
                        Html::a('Borrar', ['delete', 'id' => $model->id_partido], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => 'Esta seguro que desea borrarlo?',
                                'method' => 'post',
                            ],
                        ])
                        ?>
                    </td>
                </tr>
<?php endforeach; ?>
        </tbody>
    </table>
    <div class="form-group">
        <input type="hidden" id="add-partido" name="add-partido" value=0>
        <?= Html::button('+', ['class' => 'btn btn-primary add-partido']) ?>
    <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
      <?= Html::a('Terminar', ['/partido/index'], ['class'=>'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

    <?php
    $js = " $('.categoria-select').on('change',function(){
            $('form').submit();
        });
        $('.add-partido').on('click',function(){
            $('#add-partido').val(true);
            $('form').submit();
            
        });
        

";
    $this->registerJs($js);
    ?>


<?php yii\widgets\Pjax::end() ?>
    <script>

    </script>


</div>
