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
 * @var app\modules\crud\models\Liga $model
 */
$this->title = Yii::t('models', 'Liga');
$this->params['breadcrumbs'][] = ['label' => Yii::t('models', 'Liga'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->id_liga, 'url' => ['view', 'id_liga' => $model->id_liga]];
$this->params['breadcrumbs'][] = Yii::t('cruds', 'Edit');
?>
<div class="giiant-crud liga-update">

    <h1>
        <?php echo Yii::t('models', 'Liga') ?>
        <small>
                        <?php echo Html::encode($model->id_liga) ?>
        </small>
    </h1>

    <div class="crud-navigation">
        <?php echo Html::a('<span class="glyphicon glyphicon-file"></span> ' . Yii::t('cruds', 'View'), ['view', 'id_liga' => $model->id_liga], ['class' => 'btn btn-default']) ?>
    </div>

    <hr />

    <?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>
