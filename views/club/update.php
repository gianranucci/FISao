<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Club */

$this->title = 'Update Club: ' . $model->id_club;
$this->params['breadcrumbs'][] = ['label' => 'Clubs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_club, 'url' => ['view', 'id' => $model->id_club]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="club-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
