<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\JugadorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jugador-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_jugador') ?>

    <?= $form->field($model, 'equipo_id') ?>

    <?= $form->field($model, 'nombre_jugador') ?>

    <?= $form->field($model, 'categoria') ?>

    <?= $form->field($model, 'apellido_jugador') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
