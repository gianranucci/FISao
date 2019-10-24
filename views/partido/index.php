<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PartidoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Partidos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partido-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Partido', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_partido',
            'equipolocal_id',
            'equipovisitante_id',
            'cancha_id',
            'fecha_inicio',
            //'liga_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
