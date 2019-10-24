<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Goles */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="goles-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'partido_id')->textInput() ?>

    <?= $form->field($model, 'jugador_id')->textInput() ?>

    <?= $form->field($model, 'equipo_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
