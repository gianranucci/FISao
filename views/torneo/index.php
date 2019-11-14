<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TorneoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Torneos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="torneo-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Torneo', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Create Torneo Automatico', ['auto'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_torneo',
            'nombre_torneo',
            'fecha_inicio',
            'fecha_fin',
            [
                'label'=>'accion',
                'format'=>'raw',
                'value'=> function($model){
                    return yii\bootstrap4\Html::a('Crear Fechas', ['partido/crear-partido-fecha','torneo_id'=>$model->id_torneo], ['class'=>'btn btn-primary']);
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
