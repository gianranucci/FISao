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
 * @var app\modules\crud\models\AuthItemChild $model
 */
$copyParams = $model->attributes;

$this->title = Yii::t('models', 'Auth Item Child');
$this->params['breadcrumbs'][] = ['label' => Yii::t('models', 'Auth Item Children'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->parent, 'url' => ['view', 'parent' => $model->parent, 'child' => $model->child]];
$this->params['breadcrumbs'][] = Yii::t('cruds', 'View');
?>
<div class="giiant-crud auth-item-child-view">

    <!-- flash message -->
    <?php if (\Yii::$app->session->getFlash('deleteError') !== null) : ?>
        <span class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <?php echo \Yii::$app->session->getFlash('deleteError') ?>
        </span>
    <?php endif; ?>

    <h1>
        <?php echo Yii::t('models', 'Auth Item Child') ?>
        <small>
            <?php echo Html::encode($model->parent) ?>
        </small>
    </h1>


    <div class="clearfix crud-navigation">

        <!-- menu buttons -->
        <div class='pull-left'>
            <?php echo Html::a(
	'<span class="glyphicon glyphicon-pencil"></span> ' . Yii::t('cruds', 'Edit'),
	[ 'update', 'parent' => $model->parent, 'child' => $model->child],
	['class' => 'btn btn-info']) ?>

            <?php echo Html::a(
	'<span class="glyphicon glyphicon-copy"></span> ' . Yii::t('cruds', 'Copy'),
	['create', 'parent' => $model->parent, 'child' => $model->child, 'AuthItemChild'=>$copyParams],
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

    <?php $this->beginBlock('app\modules\crud\models\AuthItemChild'); ?>


    <?php echo DetailView::widget([
		'model' => $model,
		'attributes' => [
			// generated by schmunk42\giiant\generators\crud\providers\core\RelationProvider::attributeFormat
			[
				'format' => 'html',
				'attribute' => 'parent',
				'value' => ($model->parent0 ?
					Html::a('<i class="glyphicon glyphicon-list"></i>', ['/crud/auth-item/index']).' '.
					Html::a('<i class="glyphicon glyphicon-circle-arrow-right"></i> '.$model->parent0->name, ['/crud/auth-item/view', 'name' => $model->parent0->name, ]).' '.
					Html::a('<i class="glyphicon glyphicon-paperclip"></i>', ['create', 'AuthItemChild'=>['parent' => $model->parent]])
					:
					'<span class="label label-warning">?</span>'),
			],
			// generated by schmunk42\giiant\generators\crud\providers\core\RelationProvider::attributeFormat
			[
				'format' => 'html',
				'attribute' => 'child',
				'value' => ($model->child0 ?
					Html::a('<i class="glyphicon glyphicon-list"></i>', ['/crud/auth-item/index']).' '.
					Html::a('<i class="glyphicon glyphicon-circle-arrow-right"></i> '.$model->child0->name, ['/crud/auth-item/view', 'name' => $model->child0->name, ]).' '.
					Html::a('<i class="glyphicon glyphicon-paperclip"></i>', ['create', 'AuthItemChild'=>['child' => $model->child]])
					:
					'<span class="label label-warning">?</span>'),
			],
		],
	]); ?>


    <hr/>

    <?php echo Html::a('<span class="glyphicon glyphicon-trash"></span> ' . Yii::t('cruds', 'Delete'), ['delete', 'parent' => $model->parent, 'child' => $model->child],
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
				'label'   => '<b class=""># '.Html::encode($model->parent).'</b>',
				'content' => $this->blocks['app\modules\crud\models\AuthItemChild'],
				'active'  => true,
			],
		]
	]
);
?>
</div>
