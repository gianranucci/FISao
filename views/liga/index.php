<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LigaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ligas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="liga-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Liga', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_liga',
            'torneo_id',
            'categoria',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
