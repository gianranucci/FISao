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
 * @var app\modules\crud\models\Equipo $model
 */
$this->title = Yii::t('models', 'Equipo');
$this->params['breadcrumbs'][] = ['label' => Yii::t('models', 'Equipo'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->id_equipo, 'url' => ['view', 'id_equipo' => $model->id_equipo]];
$this->params['breadcrumbs'][] = Yii::t('cruds', 'Edit');
?>
<div class="giiant-crud equipo-update">

    <h1>
        <?php echo Yii::t('models', 'Equipo') ?>
        <small>
                        <?php echo Html::encode($model->id_equipo) ?>
        </small>
    </h1>

    <div class="crud-navigation">
        <?php echo Html::a('<span class="glyphicon glyphicon-file"></span> ' . Yii::t('cruds', 'View'), ['view', 'id_equipo' => $model->id_equipo], ['class' => 'btn btn-default']) ?>
    </div>

    <hr />

    <?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>
