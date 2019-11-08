<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FechaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Fechas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fecha-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Fecha', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_fecha',
            'torneo.nombre_torneo',
            'numero',
//            'estado',
           [
                'label'=>'Partidos',
                'format'=>'raw',
                'value'=> function($model){
                    return Html::a('Ir a Partidos', ['/partido/crear-partido-por-fecha','fecha_nro'=>$model->numero], ['class'=>'btn btn-primary']);
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
