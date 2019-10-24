<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Equipo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="equipo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'categoria')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'nombre_equipo')->textInput(['maxlength' => true]) ?>
    <?php
        $clubs = app\models\Club::find()->all();
        $equipos = yii\helpers\ArrayHelper::map($clubs,'id_club', 'nombre_club');
    ?>
    <?= $form->field($model, 'club_id')->dropDownList($equipos,['prompt'=>'Elija nombre del club']); ?>
    <?php
        $tecnicos = app\models\Tecnico::find()->all();
        $equipos = yii\helpers\ArrayHelper::map($tecnicos,'id_tecnico', 'nombre_tecnico');
    ?>
    <?= $form->field($model, 'dt_id')->dropDownList($equipos,['prompt'=>'Elija el nombre del Dt']);?>
    
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
