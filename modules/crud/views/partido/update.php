<?php
/**
 * /home/pacho/yiiApps/gianFISAO/runtime/giiant/fcd70a9bfdf8de75128d795dfc948a74
 *
 * @package default
 */


use yii\helpers\Html;

/**
 *
 * @var yii\web\View $this
 * @var app\modules\crud\models\Partido $model
 */
$this->title = Yii::t('models', 'Partido');
$this->params['breadcrumbs'][] = ['label' => Yii::t('models', 'Partido'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->id_partido, 'url' => ['view', 'id_partido' => $model->id_partido]];
$this->params['breadcrumbs'][] = Yii::t('cruds', 'Edit');
?>
<div class="giiant-crud partido-update">

    <h1>
        <?php echo Yii::t('models', 'Partido') ?>
        <small>
                        <?php echo Html::encode($model->id_partido) ?>
        </small>
    </h1>

    <div class="crud-navigation">
        <?php echo Html::a('<span class="glyphicon glyphicon-file"></span> ' . Yii::t('cruds', 'View'), ['view', 'id_partido' => $model->id_partido], ['class' => 'btn btn-default']) ?>
    </div>

    <hr />

    <?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>
