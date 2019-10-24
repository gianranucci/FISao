<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Liga */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="liga-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php
        $torneo = app\models\Torneo::find()->all();
        $liga = yii\helpers\ArrayHelper::map($torneo,'id_torneo', 'nombre_torneo');
    ?>
    <?= $form->field($model, 'torneo_id')->dropDownList($liga,['prompt'=>'Seleccione un torneo']); ?>
    

    <?= $form->field($model, 'categoria')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
