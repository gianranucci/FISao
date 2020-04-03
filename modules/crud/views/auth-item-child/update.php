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
 * @var app\modules\crud\models\AuthItemChild $model
 */
$this->title = Yii::t('models', 'Auth Item Child');
$this->params['breadcrumbs'][] = ['label' => Yii::t('models', 'Auth Item Child'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->parent, 'url' => ['view', 'parent' => $model->parent, 'child' => $model->child]];
$this->params['breadcrumbs'][] = Yii::t('cruds', 'Edit');
?>
<div class="giiant-crud auth-item-child-update">

    <h1>
        <?php echo Yii::t('models', 'Auth Item Child') ?>
        <small>
                        <?php echo Html::encode($model->parent) ?>
        </small>
    </h1>

    <div class="crud-navigation">
        <?php echo Html::a('<span class="glyphicon glyphicon-file"></span> ' . Yii::t('cruds', 'View'), ['view', 'parent' => $model->parent, 'child' => $model->child], ['class' => 'btn btn-default']) ?>
    </div>

    <hr />

    <?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>
