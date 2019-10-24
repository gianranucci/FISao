<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Torneo */

$this->title = 'Update Torneo: ' . $model->id_torneo;
$this->params['breadcrumbs'][] = ['label' => 'Torneos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_torneo, 'url' => ['view', 'id' => $model->id_torneo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="torneo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
