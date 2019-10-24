<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tecnico */

$this->title = 'Update Tecnico: ' . $model->id_tecnico;
$this->params['breadcrumbs'][] = ['label' => 'Tecnicos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tecnico, 'url' => ['view', 'id' => $model->id_tecnico]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tecnico-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
