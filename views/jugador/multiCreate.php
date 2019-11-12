<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Jugador */

$this->title = 'Crear Jugador';
$this->params['breadcrumbs'][] = ['label' => 'Jugadors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jugador-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php yii\widgets\Pjax::begin(['id'=>'pjax-multi-jugador']) ?>

    <?php $form = ActiveForm::begin(); ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Equipo</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Categoria</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($jugadores as $i => $model): ?>
            <tr class="jugador">
                    <?php
                    $equipos = app\models\Equipo::find()->orderBy('nombre_equipo, categoria')->all();
                    $jugadores = yii\helpers\ArrayHelper::map($equipos, 'id_equipo',  function($model) {return $model['nombre_equipo']."-".$model['categoria'];});
                    ?>
                    <td>
                        <?= $form->field($model, "[$i]equipo_id")->dropDownList($jugadores, ['prompt' => 'Elija el equipo equipo'])->label(false) ?>
                    </td>
                    <td>
                        <?= $form->field($model, "[$i]nombre_jugador")->textInput(['maxlength' => true])->label(false) ?>

                    </td>
                    <td>
                        <?= $form->field($model, "[$i]apellido_jugador")->textInput(['maxlength' => true])->label(false) ?>

                    </td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="form-group">
        <input type="hidden" id="add-jugador" name="add-jugador" value=0>
        <?= Html::button('+',['class' => 'btn btn-primary add-jugador']) ?>
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
    
    <?php
    $js = "$('.add-jugador').on('click',function(){
                $('#add-jugador').val(true);
                $('form').submit();
            
        });";
    $this->registerJs($js);
    
    
    ?>
    
    
    <?php yii\widgets\Pjax::end() ?>
    <script>
        
    </script>
    

</div>
