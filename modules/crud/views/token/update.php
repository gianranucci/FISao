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
 * @var app\modules\crud\models\Token $model
 */
$this->title = Yii::t('models', 'Token');
$this->params['breadcrumbs'][] = ['label' => Yii::t('models', 'Token'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->user_id, 'url' => ['view', 'user_id' => $model->user_id, 'code' => $model->code, 'type' => $model->type]];
$this->params['breadcrumbs'][] = Yii::t('cruds', 'Edit');
?>
<div class="giiant-crud token-update">

    <h1>
        <?php echo Yii::t('models', 'Token') ?>
        <small>
                        <?php echo Html::encode($model->user_id) ?>
        </small>
    </h1>

    <div class="crud-navigation">
        <?php echo Html::a('<span class="glyphicon glyphicon-file"></span> ' . Yii::t('cruds', 'View'), ['view', 'user_id' => $model->user_id, 'code' => $model->code, 'type' => $model->type], ['class' => 'btn btn-default']) ?>
    </div>

    <hr />

    <?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>
