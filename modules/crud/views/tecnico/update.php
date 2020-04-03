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
 * @var app\modules\crud\models\Tecnico $model
 */
$this->title = Yii::t('models', 'Tecnico');
$this->params['breadcrumbs'][] = ['label' => Yii::t('models', 'Tecnico'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->id_tecnico, 'url' => ['view', 'id_tecnico' => $model->id_tecnico]];
$this->params['breadcrumbs'][] = Yii::t('cruds', 'Edit');
?>
<div class="giiant-crud tecnico-update">

    <h1>
        <?php echo Yii::t('models', 'Tecnico') ?>
        <small>
                        <?php echo Html::encode($model->id_tecnico) ?>
        </small>
    </h1>

    <div class="crud-navigation">
        <?php echo Html::a('<span class="glyphicon glyphicon-file"></span> ' . Yii::t('cruds', 'View'), ['view', 'id_tecnico' => $model->id_tecnico], ['class' => 'btn btn-default']) ?>
    </div>

    <hr />

    <?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>
