<?php
/**
 * /home/pacho/yiiApps/gianFISAO/runtime/giiant/d4b4964a63cc95065fa0ae19074007ee
 *
 * @package default
 */


use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use dmstr\bootstrap\Tabs;

/**
 *
 * @var yii\web\View $this
 * @var app\modules\crud\models\Partido $model
 */
$copyParams = $model->attributes;

$this->title = Yii::t('models', 'Partido');
$this->params['breadcrumbs'][] = ['label' => Yii::t('models', 'Partidos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->id_partido, 'url' => ['view', 'id_partido' => $model->id_partido]];
$this->params['breadcrumbs'][] = Yii::t('cruds', 'View');
?>
<div class="giiant-crud partido-view">

    <!-- flash message -->
    <?php if (\Yii::$app->session->getFlash('deleteError') !== null) : ?>
        <span class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <?php echo \Yii::$app->session->getFlash('deleteError') ?>
        </span>
    <?php endif; ?>

    <h1>
        <?php echo Yii::t('models', 'Partido') ?>
        <small>
            <?php echo Html::encode($model->id_partido) ?>
        </small>
    </h1>


    <div class="clearfix crud-navigation">

        <!-- menu buttons -->
        <div class='pull-left'>
            <?php echo Html::a(
	'<span class="glyphicon glyphicon-pencil"></span> ' . Yii::t('cruds', 'Edit'),
	[ 'update', 'id_partido' => $model->id_partido],
	['class' => 'btn btn-info']) ?>

            <?php echo Html::a(
	'<span class="glyphicon glyphicon-copy"></span> ' . Yii::t('cruds', 'Copy'),
	['create', 'id_partido' => $model->id_partido, 'Partido'=>$copyParams],
	['class' => 'btn btn-success']) ?>

            <?php echo Html::a(
	'<span class="glyphicon glyphicon-plus"></span> ' . Yii::t('cruds', 'New'),
	['create'],
	['class' => 'btn btn-success']) ?>
        </div>

        <div class="pull-right">
            <?php echo Html::a('<span class="glyphicon glyphicon-list"></span> '
	. Yii::t('cruds', 'Full list'), ['index'], ['class'=>'btn btn-default']) ?>
        </div>

    </div>

    <hr/>

    <?php $this->beginBlock('app\modules\crud\models\Partido'); ?>


    <?php echo DetailView::widget([
		'model' => $model,
		'attributes' => [
			// generated by schmunk42\giiant\generators\crud\providers\core\RelationProvider::attributeFormat
			[
				'format' => 'html',
				'attribute' => 'equipolocal_id',
				'value' => ($model->equipolocal ?
					Html::a('<i class="glyphicon glyphicon-list"></i>', ['/crud/equipo/index']).' '.
					Html::a('<i class="glyphicon glyphicon-circle-arrow-right"></i> '.$model->equipolocal->id_equipo, ['/crud/equipo/view', 'id_equipo' => $model->equipolocal->id_equipo, ]).' '.
					Html::a('<i class="glyphicon glyphicon-paperclip"></i>', ['create', 'Partido'=>['equipolocal_id' => $model->equipolocal_id]])
					:
					'<span class="label label-warning">?</span>'),
			],
			// generated by schmunk42\giiant\generators\crud\providers\core\RelationProvider::attributeFormat
			[
				'format' => 'html',
				'attribute' => 'equipovisitante_id',
				'value' => ($model->equipovisitante ?
					Html::a('<i class="glyphicon glyphicon-list"></i>', ['/crud/equipo/index']).' '.
					Html::a('<i class="glyphicon glyphicon-circle-arrow-right"></i> '.$model->equipovisitante->id_equipo, ['/crud/equipo/view', 'id_equipo' => $model->equipovisitante->id_equipo, ]).' '.
					Html::a('<i class="glyphicon glyphicon-paperclip"></i>', ['create', 'Partido'=>['equipovisitante_id' => $model->equipovisitante_id]])
					:
					'<span class="label label-warning">?</span>'),
			],
			// generated by schmunk42\giiant\generators\crud\providers\core\RelationProvider::attributeFormat
			[
				'format' => 'html',
				'attribute' => 'cancha_id',
				'value' => ($model->cancha ?
					Html::a('<i class="glyphicon glyphicon-list"></i>', ['/crud/cancha/index']).' '.
					Html::a('<i class="glyphicon glyphicon-circle-arrow-right"></i> '.$model->cancha->id_cancha, ['/crud/cancha/view', 'id_cancha' => $model->cancha->id_cancha, ]).' '.
					Html::a('<i class="glyphicon glyphicon-paperclip"></i>', ['create', 'Partido'=>['cancha_id' => $model->cancha_id]])
					:
					'<span class="label label-warning">?</span>'),
			],
			'liga_id',
			'num_fecha',
			// generated by schmunk42\giiant\generators\crud\providers\core\RelationProvider::attributeFormat
			[
				'format' => 'html',
				'attribute' => 'torneo_id',
				'value' => ($model->torneo ?
					Html::a('<i class="glyphicon glyphicon-list"></i>', ['/crud/torneo/index']).' '.
					Html::a('<i class="glyphicon glyphicon-circle-arrow-right"></i> '.$model->torneo->id_torneo, ['/crud/torneo/view', 'id_torneo' => $model->torneo->id_torneo, ]).' '.
					Html::a('<i class="glyphicon glyphicon-paperclip"></i>', ['create', 'Partido'=>['torneo_id' => $model->torneo_id]])
					:
					'<span class="label label-warning">?</span>'),
			],
			'fecha_inicio',
		],
	]); ?>


    <hr/>

    <?php echo Html::a('<span class="glyphicon glyphicon-trash"></span> ' . Yii::t('cruds', 'Delete'), ['delete', 'id_partido' => $model->id_partido],
	[
		'class' => 'btn btn-danger',
		'data-confirm' => '' . Yii::t('cruds', 'Are you sure to delete this item?') . '',
		'data-method' => 'post',
	]); ?>
    <?php $this->endBlock(); ?>



    <?php echo Tabs::widget(
	[
		'id' => 'relation-tabs',
		'encodeLabels' => false,
		'items' => [
			[
				'label'   => '<b class=""># '.Html::encode($model->id_partido).'</b>',
				'content' => $this->blocks['app\modules\crud\models\Partido'],
				'active'  => true,
			],
		]
	]
);
?>
</div>
