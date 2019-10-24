<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PartidoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="partido-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_partido') ?>

    <?= $form->field($model, 'equipolocal_id') ?>

    <?= $form->field($model, 'equipovisitante_id') ?>

    <?= $form->field($model, 'cancha_id') ?>

    <?= $form->field($model, 'fecha_inicio') ?>

    <?php // echo $form->field($model, 'liga_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
