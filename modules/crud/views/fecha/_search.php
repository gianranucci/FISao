<?php
/**
 * /home/pacho/yiiApps/gianFISAO/runtime/giiant/eeda5c365686c9888dbc13dbc58f89a1
 *
 * @package default
 */


use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 *
 * @var yii\web\View $this
 * @var app\modules\crud\models\search\Fecha $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="fecha-search">

    <?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
	]); ?>

    		<?php echo $form->field($model, 'id_fecha') ?>

		<?php echo $form->field($model, 'torneo_id') ?>

		<?php echo $form->field($model, 'numero') ?>

		<?php echo $form->field($model, 'estado') ?>

    <div class="form-group">
        <?php echo Html::submitButton(Yii::t('cruds', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton(Yii::t('cruds', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
