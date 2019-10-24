<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Jugador */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jugador-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php
        $equipos = app\models\Equipo::find()->all();
        $jugadores = yii\helpers\ArrayHelper::map($equipos,'id_equipo', 'nombre_equipo');
    ?>
    <?= $form->field($model, 'equipo_id')->dropDownList($jugadores,['prompt'=>'Elija el equipo equipo']) ?>

    <?= $form->field($model, 'nombre_jugador')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'categoria')->textInput() ?>

    <?= $form->field($model, 'apellido_jugador')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
