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
            'equipolocal.nombre_equipo',
            'equipovisitante.nombre_equipo',
            'cancha.nombre_cancha',
            'fecha_inicio',
            
                     [
                'label'=>'Goles',
                'format'=>'raw',
                'value'=> function($model){
                    return Html::a('Cargar Goles', ['/partido/cargar-goles','id'=>$model->id_partido], ['class'=>'btn btn-primary']);
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
