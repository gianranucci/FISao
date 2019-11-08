<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Partido */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="partido-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php
        $equipoA = app\models\Equipo::find()->all();
        $partido = yii\helpers\ArrayHelper::map($equipoA,'id_equipo', 'nombre_equipo');
    ?>
    <?= $form->field($model, 'equipolocal_id')->dropDownList($partido,['prompt'=>'Seleccione el equipo Local']); ?>
    <?php
        $equipoB = app\models\Equipo::find()->all();
        $partidoB = yii\helpers\ArrayHelper::map($equipoA,'id_equipo', 'nombre_equipo');
    ?>
    <?= $form->field($model, 'equipovisitante_id')->dropDownList($partidoB,['prompt'=>'Seleccione el equipo Visitante']); ?>
    <?php
        $cancha = app\models\Canchas::find()->all();
        $partidoC = yii\helpers\ArrayHelper::map($cancha,'id_cancha', 'nombre_cancha');
    ?>
    <?= $form->field($model, 'cancha_id')->dropDownList($partidoC,['prompt'=>'Seleccione la cancha']) ?>
    <?= $form->field($model, 'fecha_inicio')->textInput() ?>
    <?php
        $liga = app\models\Liga::find()->all();
        $categorias = app\models\Equipo::find()->select('categoria')->groupBy(['categoria'])->all();
        $partidoL = yii\helpers\ArrayHelper::map($categorias,'categoria', 'categoria');
    ?>
    <?= $form->field($model, 'liga_id')->dropDownList($partidoL,['prompt'=>'Seleccione la liga']); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
