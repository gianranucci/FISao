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
 * @var app\modules\crud\models\AuthRule $model
 */
$copyParams = $model->attributes;

$this->title = Yii::t('models', 'Auth Rule');
$this->params['breadcrumbs'][] = ['label' => Yii::t('models', 'Auth Rules'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->name, 'url' => ['view', 'name' => $model->name]];
$this->params['breadcrumbs'][] = Yii::t('cruds', 'View');
?>
<div class="giiant-crud auth-rule-view">

    <!-- flash message -->
    <?php if (\Yii::$app->session->getFlash('deleteError') !== null) : ?>
        <span class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <?php echo \Yii::$app->session->getFlash('deleteError') ?>
        </span>
    <?php endif; ?>

    <h1>
        <?php echo Yii::t('models', 'Auth Rule') ?>
        <small>
            <?php echo Html::encode($model->name) ?>
        </small>
    </h1>


    <div class="clearfix crud-navigation">

        <!-- menu buttons -->
        <div class='pull-left'>
            <?php echo Html::a(
	'<span class="glyphicon glyphicon-pencil"></span> ' . Yii::t('cruds', 'Edit'),
	[ 'update', 'name' => $model->name],
	['class' => 'btn btn-info']) ?>

            <?php echo Html::a(
	'<span class="glyphicon glyphicon-copy"></span> ' . Yii::t('cruds', 'Copy'),
	['create', 'name' => $model->name, 'AuthRule'=>$copyParams],
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

    <?php $this->beginBlock('app\modules\crud\models\AuthRule'); ?>


    <?php echo DetailView::widget([
		'model' => $model,
		'attributes' => [
			'name',
			'data',
		],
	]); ?>


    <hr/>

    <?php echo Html::a('<span class="glyphicon glyphicon-trash"></span> ' . Yii::t('cruds', 'Delete'), ['delete', 'name' => $model->name],
	[
		'class' => 'btn btn-danger',
		'data-confirm' => '' . Yii::t('cruds', 'Are you sure to delete this item?') . '',
		'data-method' => 'post',
	]); ?>
    <?php $this->endBlock(); ?>



<?php $this->beginBlock('AuthItems'); ?>
<div style='position: relative'>
<div style='position:absolute; right: 0px; top: 0px;'>
  <?php echo Html::a(
	'<span class="glyphicon glyphicon-list"></span> ' . Yii::t('cruds', 'List All') . ' Auth Items',
	['/crud/auth-item/index'],
	['class'=>'btn text-muted btn-xs']
) ?>
  <?php echo Html::a(
	'<span class="glyphicon glyphicon-plus"></span> ' . Yii::t('cruds', 'New') . ' Auth Item',
	['/crud/auth-item/create', 'AuthItem' => ['rule_name' => $model->name]],
	['class'=>'btn btn-success btn-xs']
); ?>
</div>
</div>
<?php Pjax::begin(['id'=>'pjax-AuthItems', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-AuthItems ul.pagination a, th a']) ?>
<?php echo
'<div class="table-responsive">'
	. \yii\grid\GridView::widget([
		'layout' => '{summary}<div class="text-center">{pager}</div>{items}<div class="text-center">{pager}</div>',
		'dataProvider' => new \yii\data\ActiveDataProvider([
				'query' => $model->getAuthItems(),
				'pagination' => [
					'pageSize' => 20,
					'pageParam'=>'page-authitems',
				]
			]),
		'pager'        => [
			'class'          => yii\widgets\LinkPager::className(),
			'firstPageLabel' => Yii::t('cruds', 'First'),
			'lastPageLabel'  => Yii::t('cruds', 'Last')
		],
		'columns' => [
			[
				'class'      => 'yii\grid\ActionColumn',
				'template'   => '{view} {update}',
				'contentOptions' => ['nowrap'=>'nowrap'],
				'urlCreator' => function ($action, $model, $key, $index) {
					// using the column name as key, not mapping to 'id' like the standard generator
					$params = is_array($key) ? $key : [$model->primaryKey()[0] => (string) $key];
					$params[0] = '/crud/auth-item' . '/' . $action;
					$params['AuthItem'] = ['rule_name' => $model->primaryKey()[0]];
					return $params;
				},
				'buttons'    => [

				],
				'controller' => '/crud/auth-item'
			],
			'name',
			'type',
			'description:ntext',
			'data',
			'created_at',
			'updated_at',
		]
	])
	. '</div>'
?>
<?php Pjax::end() ?>
<?php $this->endBlock() ?>


    <?php echo Tabs::widget(
	[
		'id' => 'relation-tabs',
		'encodeLabels' => false,
		'items' => [
			[
				'label'   => '<b class=""># '.Html::encode($model->name).'</b>',
				'content' => $this->blocks['app\modules\crud\models\AuthRule'],
				'active'  => true,
			],
			[
				'content' => $this->blocks['AuthItems'],
				'label'   => '<small>Auth Items <span class="badge badge-default">'. $model->getAuthItems()->count() . '</span></small>',
				'active'  => false,
			],
		]
	]
);
?>
</div>
