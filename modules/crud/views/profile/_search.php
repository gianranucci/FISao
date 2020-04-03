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
 * @var app\modules\crud\models\search\Profile $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="profile-search">

    <?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
	]); ?>

    		<?php echo $form->field($model, 'user_id') ?>

		<?php echo $form->field($model, 'name') ?>

		<?php echo $form->field($model, 'public_email') ?>

		<?php echo $form->field($model, 'gravatar_email') ?>

		<?php echo $form->field($model, 'gravatar_id') ?>

		<?php // echo $form->field($model, 'location') ?>

		<?php // echo $form->field($model, 'website') ?>

		<?php // echo $form->field($model, 'bio') ?>

		<?php // echo $form->field($model, 'timezone') ?>

    <div class="form-group">
        <?php echo Html::submitButton(Yii::t('cruds', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton(Yii::t('cruds', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
