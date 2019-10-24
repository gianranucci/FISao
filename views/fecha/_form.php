<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Fecha */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fecha-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    $torneos = \app\models\Torneo::find()->all();
    $items = \yii\helpers\ArrayHelper::map($torneos,'id_torneo','nombre_torneo');
    ?>
    
    <?= $form->field($model, 'torneo_id')->dropDownList($items) ?>

    <?= $form->field($model, 'numero')->textInput() ?>

    <?= $form->field($model, 'estado')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
