<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Torneo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="torneo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre_torneo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha_inicio')->textInput() ?>

    <?= $form->field($model, 'fecha_fin')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
