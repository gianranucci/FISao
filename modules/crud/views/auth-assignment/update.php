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
 * @var app\modules\crud\models\AuthAssignment $model
 */
$this->title = Yii::t('models', 'Auth Assignment');
$this->params['breadcrumbs'][] = ['label' => Yii::t('models', 'Auth Assignment'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->item_name, 'url' => ['view', 'item_name' => $model->item_name, 'user_id' => $model->user_id]];
$this->params['breadcrumbs'][] = Yii::t('cruds', 'Edit');
?>
<div class="giiant-crud auth-assignment-update">

    <h1>
        <?php echo Yii::t('models', 'Auth Assignment') ?>
        <small>
                        <?php echo Html::encode($model->item_name) ?>
        </small>
    </h1>

    <div class="crud-navigation">
        <?php echo Html::a('<span class="glyphicon glyphicon-file"></span> ' . Yii::t('cruds', 'View'), ['view', 'item_name' => $model->item_name, 'user_id' => $model->user_id], ['class' => 'btn btn-default']) ?>
    </div>

    <hr />

    <?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>
