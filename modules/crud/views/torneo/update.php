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
 * @var app\modules\crud\models\Torneo $model
 */
$this->title = Yii::t('models', 'Torneo');
$this->params['breadcrumbs'][] = ['label' => Yii::t('models', 'Torneo'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->id_torneo, 'url' => ['view', 'id_torneo' => $model->id_torneo]];
$this->params['breadcrumbs'][] = Yii::t('cruds', 'Edit');
?>
<div class="giiant-crud torneo-update">

    <h1>
        <?php echo Yii::t('models', 'Torneo') ?>
        <small>
                        <?php echo Html::encode($model->id_torneo) ?>
        </small>
    </h1>

    <div class="crud-navigation">
        <?php echo Html::a('<span class="glyphicon glyphicon-file"></span> ' . Yii::t('cruds', 'View'), ['view', 'id_torneo' => $model->id_torneo], ['class' => 'btn btn-default']) ?>
    </div>

    <hr />

    <?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>
