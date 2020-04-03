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
 * @var app\modules\crud\models\Torneo $model
 */
$copyParams = $model->attributes;

$this->title = Yii::t('models', 'Torneo');
$this->params['breadcrumbs'][] = ['label' => Yii::t('models', 'Torneos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->id_torneo, 'url' => ['view', 'id_torneo' => $model->id_torneo]];
$this->params['breadcrumbs'][] = Yii::t('cruds', 'View');
?>
<div class="giiant-crud torneo-view">

    <!-- flash message -->
    <?php if (\Yii::$app->session->getFlash('deleteError') !== null) : ?>
        <span class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <?php echo \Yii::$app->session->getFlash('deleteError') ?>
        </span>
    <?php endif; ?>

    <h1>
        <?php echo Yii::t('models', 'Torneo') ?>
        <small>
            <?php echo Html::encode($model->id_torneo) ?>
        </small>
    </h1>


    <div class="clearfix crud-navigation">

        <!-- menu buttons -->
        <div class='pull-left'>
            <?php echo Html::a(
	'<span class="glyphicon glyphicon-pencil"></span> ' . Yii::t('cruds', 'Edit'),
	[ 'update', 'id_torneo' => $model->id_torneo],
	['class' => 'btn btn-info']) ?>

            <?php echo Html::a(
	'<span class="glyphicon glyphicon-copy"></span> ' . Yii::t('cruds', 'Copy'),
	['create', 'id_torneo' => $model->id_torneo, 'Torneo'=>$copyParams],
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

    <?php $this->beginBlock('app\modules\crud\models\Torneo'); ?>


    <?php echo DetailView::widget([
		'model' => $model,
		'attributes' => [
			'fecha_inicio',
			'fecha_fin',
			'nombre_torneo',
		],
	]); ?>


    <hr/>

    <?php echo Html::a('<span class="glyphicon glyphicon-trash"></span> ' . Yii::t('cruds', 'Delete'), ['delete', 'id_torneo' => $model->id_torneo],
	[
		'class' => 'btn btn-danger',
		'data-confirm' => '' . Yii::t('cruds', 'Are you sure to delete this item?') . '',
		'data-method' => 'post',
	]); ?>
    <?php $this->endBlock(); ?>



<?php $this->beginBlock('Fechas'); ?>
<div style='position: relative'>
<div style='position:absolute; right: 0px; top: 0px;'>
  <?php echo Html::a(
	'<span class="glyphicon glyphicon-list"></span> ' . Yii::t('cruds', 'List All') . ' Fechas',
	['/crud/fecha/index'],
	['class'=>'btn text-muted btn-xs']
) ?>
  <?php echo Html::a(
	'<span class="glyphicon glyphicon-plus"></span> ' . Yii::t('cruds', 'New') . ' Fecha',
	['/crud/fecha/create', 'Fecha' => ['torneo_id' => $model->id_torneo]],
	['class'=>'btn btn-success btn-xs']
); ?>
</div>
</div>
<?php Pjax::begin(['id'=>'pjax-Fechas', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-Fechas ul.pagination a, th a']) ?>
<?php echo
'<div class="table-responsive">'
	. \yii\grid\GridView::widget([
		'layout' => '{summary}<div class="text-center">{pager}</div>{items}<div class="text-center">{pager}</div>',
		'dataProvider' => new \yii\data\ActiveDataProvider([
				'query' => $model->getFechas(),
				'pagination' => [
					'pageSize' => 20,
					'pageParam'=>'page-fechas',
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
					$params[0] = '/crud/fecha' . '/' . $action;
					$params['Fecha'] = ['torneo_id' => $model->primaryKey()[0]];
					return $params;
				},
				'buttons'    => [

				],
				'controller' => '/crud/fecha'
			],
			'id_fecha',
			'numero',
			'estado',
		]
	])
	. '</div>'
?>
<?php Pjax::end() ?>
<?php $this->endBlock() ?>


<?php $this->beginBlock('Ligas'); ?>
<div style='position: relative'>
<div style='position:absolute; right: 0px; top: 0px;'>
  <?php echo Html::a(
	'<span class="glyphicon glyphicon-list"></span> ' . Yii::t('cruds', 'List All') . ' Ligas',
	['/crud/liga/index'],
	['class'=>'btn text-muted btn-xs']
) ?>
  <?php echo Html::a(
	'<span class="glyphicon glyphicon-plus"></span> ' . Yii::t('cruds', 'New') . ' Liga',
	['/crud/liga/create', 'Liga' => ['torneo_id' => $model->id_torneo]],
	['class'=>'btn btn-success btn-xs']
); ?>
</div>
</div>
<?php Pjax::begin(['id'=>'pjax-Ligas', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-Ligas ul.pagination a, th a']) ?>
<?php echo
'<div class="table-responsive">'
	. \yii\grid\GridView::widget([
		'layout' => '{summary}<div class="text-center">{pager}</div>{items}<div class="text-center">{pager}</div>',
		'dataProvider' => new \yii\data\ActiveDataProvider([
				'query' => $model->getLigas(),
				'pagination' => [
					'pageSize' => 20,
					'pageParam'=>'page-ligas',
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
					$params[0] = '/crud/liga' . '/' . $action;
					$params['Liga'] = ['torneo_id' => $model->primaryKey()[0]];
					return $params;
				},
				'buttons'    => [

				],
				'controller' => '/crud/liga'
			],
			'id_liga',
			'categoria',
		]
	])
	. '</div>'
?>
<?php Pjax::end() ?>
<?php $this->endBlock() ?>


<?php $this->beginBlock('Partidos'); ?>
<div style='position: relative'>
<div style='position:absolute; right: 0px; top: 0px;'>
  <?php echo Html::a(
	'<span class="glyphicon glyphicon-list"></span> ' . Yii::t('cruds', 'List All') . ' Partidos',
	['/crud/partido/index'],
	['class'=>'btn text-muted btn-xs']
) ?>
  <?php echo Html::a(
	'<span class="glyphicon glyphicon-plus"></span> ' . Yii::t('cruds', 'New') . ' Partido',
	['/crud/partido/create', 'Partido' => ['torneo_id' => $model->id_torneo]],
	['class'=>'btn btn-success btn-xs']
); ?>
</div>
</div>
<?php Pjax::begin(['id'=>'pjax-Partidos', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-Partidos ul.pagination a, th a']) ?>
<?php echo
'<div class="table-responsive">'
	. \yii\grid\GridView::widget([
		'layout' => '{summary}<div class="text-center">{pager}</div>{items}<div class="text-center">{pager}</div>',
		'dataProvider' => new \yii\data\ActiveDataProvider([
				'query' => $model->getPartidos(),
				'pagination' => [
					'pageSize' => 20,
					'pageParam'=>'page-partidos',
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
					$params[0] = '/crud/partido' . '/' . $action;
					$params['Partido'] = ['torneo_id' => $model->primaryKey()[0]];
					return $params;
				},
				'buttons'    => [

				],
				'controller' => '/crud/partido'
			],
			'id_partido',
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
			'fecha_inicio',
			'liga_id',
			'num_fecha',
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
				'label'   => '<b class=""># '.Html::encode($model->id_torneo).'</b>',
				'content' => $this->blocks['app\modules\crud\models\Torneo'],
				'active'  => true,
			],
			[
				'content' => $this->blocks['Fechas'],
				'label'   => '<small>Fechas <span class="badge badge-default">'. $model->getFechas()->count() . '</span></small>',
				'active'  => false,
			],
			[
				'content' => $this->blocks['Ligas'],
				'label'   => '<small>Ligas <span class="badge badge-default">'. $model->getLigas()->count() . '</span></small>',
				'active'  => false,
			],
			[
				'content' => $this->blocks['Partidos'],
				'label'   => '<small>Partidos <span class="badge badge-default">'. $model->getPartidos()->count() . '</span></small>',
				'active'  => false,
			],
		]
	]
);
?>
</div>
