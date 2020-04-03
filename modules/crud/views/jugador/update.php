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
 * @var app\modules\crud\models\Jugador $model
 */
$this->title = Yii::t('models', 'Jugador');
$this->params['breadcrumbs'][] = ['label' => Yii::t('models', 'Jugador'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->id_jugador, 'url' => ['view', 'id_jugador' => $model->id_jugador]];
$this->params['breadcrumbs'][] = Yii::t('cruds', 'Edit');
?>
<div class="giiant-crud jugador-update">

    <h1>
        <?php echo Yii::t('models', 'Jugador') ?>
        <small>
                        <?php echo Html::encode($model->id_jugador) ?>
        </small>
    </h1>

    <div class="crud-navigation">
        <?php echo Html::a('<span class="glyphicon glyphicon-file"></span> ' . Yii::t('cruds', 'View'), ['view', 'id_jugador' => $model->id_jugador], ['class' => 'btn btn-default']) ?>
    </div>

    <hr />

    <?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>
