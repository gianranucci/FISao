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
 * @var app\modules\crud\models\search\SocialAccount $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="social-account-search">

    <?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
	]); ?>

    		<?php echo $form->field($model, 'id') ?>

		<?php echo $form->field($model, 'user_id') ?>

		<?php echo $form->field($model, 'provider') ?>

		<?php echo $form->field($model, 'client_id') ?>

		<?php echo $form->field($model, 'data') ?>

		<?php // echo $form->field($model, 'code') ?>

		<?php // echo $form->field($model, 'created_at') ?>

		<?php // echo $form->field($model, 'email') ?>

		<?php // echo $form->field($model, 'username') ?>

    <div class="form-group">
        <?php echo Html::submitButton(Yii::t('cruds', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton(Yii::t('cruds', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
