<?php
/**
 * /home/pacho/yiiApps/gianFISAO/runtime/giiant/a0a12d1bd32eaeeb8b2cff56d511aa22
 *
 * @package default
 */


use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/**
 *
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\modules\crud\models\search\Partido $searchModel
 */
$this->title = Yii::t('models', 'Partidos');
$this->params['breadcrumbs'][] = $this->title;

if (isset($actionColumnTemplates)) {
	$actionColumnTemplate = implode(' ', $actionColumnTemplates);
	$actionColumnTemplateString = $actionColumnTemplate;
} else {
	Yii::$app->view->params['pageButtons'] = Html::a('<span class="glyphicon glyphicon-plus"></span> ' . Yii::t('cruds', 'New'), ['create'], ['class' => 'btn btn-success']);
	$actionColumnTemplateString = "{view} {update} {delete}";
}
$actionColumnTemplateString = '<div class="action-buttons">'.$actionColumnTemplateString.'</div>';
?>
<div class="giiant-crud partido-index">

    <?php
//             echo $this->render('_search', ['model' =>$searchModel]);
?>


    <?php \yii\widgets\Pjax::begin(['id'=>'pjax-main', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-main ul.pagination a, th a', 'clientOptions' => ['pjax:success'=>'function(){alert("yo")}']]) ?>

    <h1>
        <?php echo Yii::t('models', 'Partidos') ?>
        <small>
            List
        </small>
    </h1>
    <div class="clearfix crud-navigation">
        <div class="pull-left">
            <?php echo Html::a('<span class="glyphicon glyphicon-plus"></span> ' . Yii::t('cruds', 'New'), ['create'], ['class' => 'btn btn-success']) ?>
        </div>

        <div class="pull-right">


            <?php echo
\yii\bootstrap\ButtonDropdown::widget(
	[
		'id' => 'giiant-relations',
		'encodeLabel' => false,
		'label' => '<span class="glyphicon glyphicon-paperclip"></span> ' . Yii::t('cruds', 'Relations'),
		'dropdown' => [
			'options' => [
				'class' => 'dropdown-menu-right'
			],
			'encodeLabels' => false,
			'items' => [
				[
					'url' => ['/crud/torneo/index'],
					'label' => '<i class="glyphicon glyphicon-arrow-left"></i> ' . Yii::t('models', 'Torneo'),
				],
				[
					'url' => ['/crud/cancha/index'],
					'label' => '<i class="glyphicon glyphicon-arrow-left"></i> ' . Yii::t('models', 'Cancha'),
				],
				[
					'url' => ['/crud/equipo/index'],
					'label' => '<i class="glyphicon glyphicon-arrow-left"></i> ' . Yii::t('models', 'Equipo'),
				],
				[
					'url' => ['/crud/equipo/index'],
					'label' => '<i class="glyphicon glyphicon-arrow-left"></i> ' . Yii::t('models', 'Equipo'),
				],

			]
		],
		'options' => [
			'class' => 'btn-default'
		]
	]
);
?>
        </div>
    </div>

    <hr />

    <div class="table-responsive">
        <?php echo GridView::widget([
		'dataProvider' => $dataProvider,
		'pager' => [
			'class' => yii\widgets\LinkPager::className(),
			'firstPageLabel' => Yii::t('cruds', 'First'),
			'lastPageLabel' => Yii::t('cruds', 'Last'),
		],
		'filterModel' => $searchModel,
		'tableOptions' => ['class' => 'table table-striped table-bordered table-hover'],
		'headerRowOptions' => ['class'=>'x'],
		'columns' => [
			[
				'class' => 'yii\grid\ActionColumn',
				'template' => $actionColumnTemplateString,
				'buttons' => [
					'view' => function ($url, $model, $key) {
						$options = [
							'title' => Yii::t('cruds', 'View'),
							'aria-label' => Yii::t('cruds', 'View'),
							'data-pjax' => '0',
						];
						return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, $options);
					}


				],
				'urlCreator' => function($action, $model, $key, $index) {
					// using the column name as key, not mapping to 'id' like the standard generator
					$params = is_array($key) ? $key : [$model->primaryKey()[0] => (string) $key];
					$params[0] = \Yii::$app->controller->id ? \Yii::$app->controller->id . '/' . $action : $action;
					return Url::toRoute($params);
				},
				'contentOptions' => ['nowrap'=>'nowrap']
			],
			// generated by schmunk42\giiant\generators\crud\providers\core\RelationProvider::columnFormat
			[
				'class' => yii\grid\DataColumn::className(),
				'attribute' => 'equipolocal_id',
				'value' => function ($model) {
					if ($rel = $model->equipolocal) {
						return Html::a($rel->id_equipo, ['/crud/equipo/view', 'id_equipo' => $rel->id_equipo, ], ['data-pjax' => 0]);
					} else {
						return '';
					}
				},
				'format' => 'raw',
			],
			// generated by schmunk42\giiant\generators\crud\providers\core\RelationProvider::columnFormat
			[
				'class' => yii\grid\DataColumn::className(),
				'attribute' => 'equipovisitante_id',
				'value' => function ($model) {
					if ($rel = $model->equipovisitante) {
						return Html::a($rel->id_equipo, ['/crud/equipo/view', 'id_equipo' => $rel->id_equipo, ], ['data-pjax' => 0]);
					} else {
						return '';
					}
				},
				'format' => 'raw',
			],
			// generated by schmunk42\giiant\generators\crud\providers\core\RelationProvider::columnFormat
			[
				'class' => yii\grid\DataColumn::className(),
				'attribute' => 'cancha_id',
				'value' => function ($model) {
					if ($rel = $model->cancha) {
						return Html::a($rel->id_cancha, ['/crud/cancha/view', 'id_cancha' => $rel->id_cancha, ], ['data-pjax' => 0]);
					} else {
						return '';
					}
				},
				'format' => 'raw',
			],
			'liga_id',
			'num_fecha',
			// generated by schmunk42\giiant\generators\crud\providers\core\RelationProvider::columnFormat
			[
				'class' => yii\grid\DataColumn::className(),
				'attribute' => 'torneo_id',
				'value' => function ($model) {
					if ($rel = $model->torneo) {
						return Html::a($rel->id_torneo, ['/crud/torneo/view', 'id_torneo' => $rel->id_torneo, ], ['data-pjax' => 0]);
					} else {
						return '';
					}
				},
				'format' => 'raw',
			],
			'fecha_inicio',
		]
	]); ?>
    </div>

</div>


<?php \yii\widgets\Pjax::end() ?>
