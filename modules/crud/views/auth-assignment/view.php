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
 * @var app\modules\crud\models\AuthAssignment $model
 */
$copyParams = $model->attributes;

$this->title = Yii::t('models', 'Auth Assignment');
$this->params['breadcrumbs'][] = ['label' => Yii::t('models', 'Auth Assignments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->item_name, 'url' => ['view', 'item_name' => $model->item_name, 'user_id' => $model->user_id]];
$this->params['breadcrumbs'][] = Yii::t('cruds', 'View');
?>
<div class="giiant-crud auth-assignment-view">

    <!-- flash message -->
    <?php if (\Yii::$app->session->getFlash('deleteError') !== null) : ?>
        <span class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <?php echo \Yii::$app->session->getFlash('deleteError') ?>
        </span>
    <?php endif; ?>

    <h1>
        <?php echo Yii::t('models', 'Auth Assignment') ?>
        <small>
            <?php echo Html::encode($model->item_name) ?>
        </small>
    </h1>


    <div class="clearfix crud-navigation">

        <!-- menu buttons -->
        <div class='pull-left'>
            <?php echo Html::a(
	'<span class="glyphicon glyphicon-pencil"></span> ' . Yii::t('cruds', 'Edit'),
	[ 'update', 'item_name' => $model->item_name, 'user_id' => $model->user_id],
	['class' => 'btn btn-info']) ?>

            <?php echo Html::a(
	'<span class="glyphicon glyphicon-copy"></span> ' . Yii::t('cruds', 'Copy'),
	['create', 'item_name' => $model->item_name, 'user_id' => $model->user_id, 'AuthAssignment'=>$copyParams],
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

    <?php $this->beginBlock('app\modules\crud\models\AuthAssignment'); ?>


    <?php echo DetailView::widget([
		'model' => $model,
		'attributes' => [
			// generated by schmunk42\giiant\generators\crud\providers\core\RelationProvider::attributeFormat
			[
				'format' => 'html',
				'attribute' => 'item_name',
				'value' => ($model->itemName ?
					Html::a('<i class="glyphicon glyphicon-list"></i>', ['/crud/auth-item/index']).' '.
					Html::a('<i class="glyphicon glyphicon-circle-arrow-right"></i> '.$model->itemName->name, ['/crud/auth-item/view', 'name' => $model->itemName->name, ]).' '.
					Html::a('<i class="glyphicon glyphicon-paperclip"></i>', ['create', 'AuthAssignment'=>['item_name' => $model->item_name]])
					:
					'<span class="label label-warning">?</span>'),
			],
			'user_id',
		],
	]); ?>


    <hr/>

    <?php echo Html::a('<span class="glyphicon glyphicon-trash"></span> ' . Yii::t('cruds', 'Delete'), ['delete', 'item_name' => $model->item_name, 'user_id' => $model->user_id],
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
				'label'   => '<b class=""># '.Html::encode($model->item_name).'</b>',
				'content' => $this->blocks['app\modules\crud\models\AuthAssignment'],
				'active'  => true,
			],
		]
	]
);
?>
</div>
