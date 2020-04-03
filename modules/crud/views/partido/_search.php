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
 * @var app\modules\crud\models\search\Partido $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="partido-search">

    <?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
	]); ?>

    		<?php echo $form->field($model, 'id_partido') ?>

		<?php echo $form->field($model, 'equipolocal_id') ?>

		<?php echo $form->field($model, 'equipovisitante_id') ?>

		<?php echo $form->field($model, 'cancha_id') ?>

		<?php echo $form->field($model, 'fecha_inicio') ?>

		<?php // echo $form->field($model, 'liga_id') ?>

		<?php // echo $form->field($model, 'num_fecha') ?>

		<?php // echo $form->field($model, 'torneo_id') ?>

    <div class="form-group">
        <?php echo Html::submitButton(Yii::t('cruds', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton(Yii::t('cruds', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
