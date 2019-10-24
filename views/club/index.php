<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClubSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Clubs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="club-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Club', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_club',
            'nombre_club',
            'direccion',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
