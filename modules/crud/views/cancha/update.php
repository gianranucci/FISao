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
 * @var app\modules\crud\models\Cancha $model
 */
$this->title = Yii::t('models', 'Cancha');
$this->params['breadcrumbs'][] = ['label' => Yii::t('models', 'Cancha'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->id_cancha, 'url' => ['view', 'id_cancha' => $model->id_cancha]];
$this->params['breadcrumbs'][] = Yii::t('cruds', 'Edit');
?>
<div class="giiant-crud cancha-update">

    <h1>
        <?php echo Yii::t('models', 'Cancha') ?>
        <small>
                        <?php echo Html::encode($model->id_cancha) ?>
        </small>
    </h1>

    <div class="crud-navigation">
        <?php echo Html::a('<span class="glyphicon glyphicon-file"></span> ' . Yii::t('cruds', 'View'), ['view', 'id_cancha' => $model->id_cancha], ['class' => 'btn btn-default']) ?>
    </div>

    <hr />

    <?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>
