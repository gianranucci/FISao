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
 * @var app\modules\crud\models\search\User $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="user-search">

    <?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
	]); ?>

    		<?php echo $form->field($model, 'id') ?>

		<?php echo $form->field($model, 'username') ?>

		<?php echo $form->field($model, 'email') ?>

		<?php echo $form->field($model, 'password_hash') ?>

		<?php echo $form->field($model, 'auth_key') ?>

		<?php // echo $form->field($model, 'confirmed_at') ?>

		<?php // echo $form->field($model, 'unconfirmed_email') ?>

		<?php // echo $form->field($model, 'blocked_at') ?>

		<?php // echo $form->field($model, 'registration_ip') ?>

		<?php // echo $form->field($model, 'created_at') ?>

		<?php // echo $form->field($model, 'updated_at') ?>

		<?php // echo $form->field($model, 'flags') ?>

		<?php // echo $form->field($model, 'last_login_at') ?>

    <div class="form-group">
        <?php echo Html::submitButton(Yii::t('cruds', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton(Yii::t('cruds', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
