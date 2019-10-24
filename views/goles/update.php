<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Goles */

$this->title = 'Update Goles: ' . $model->id_gol;
$this->params['breadcrumbs'][] = ['label' => 'Goles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_gol, 'url' => ['view', 'id' => $model->id_gol]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="goles-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
