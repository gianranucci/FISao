<?php
/**
 * /home/pacho/yiiApps/gianFISAO/runtime/giiant/4b7e79a8340461fe629a6ac612644d03
 *
 * @package default
 */


use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use yii\helpers\StringHelper;

/**
 *
 * @var yii\web\View $this
 * @var app\modules\crud\models\Profile $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="profile-form">

    <?php $form = ActiveForm::begin([
		'id' => 'Profile',
		'layout' => 'horizontal',
		'enableClientValidation' => true,
		'errorSummaryCssClass' => 'error-summary alert alert-danger',
		'fieldConfig' => [
			'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
			'horizontalCssClasses' => [
				'label' => 'col-sm-2',
				//'offset' => 'col-sm-offset-4',
				'wrapper' => 'col-sm-8',
				'error' => '',
				'hint' => '',
			],
		],
	]
);
?>

    <div class="">
        <?php $this->beginBlock('main'); ?>

        <p>


<!-- attribute bio -->
			<?php echo $form->field($model, 'bio')->textarea(['rows' => 6]) ?>

<!-- attribute name -->
			<?php echo $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

<!-- attribute public_email -->
			<?php echo $form->field($model, 'public_email')->textInput(['maxlength' => true]) ?>

<!-- attribute gravatar_email -->
			<?php echo $form->field($model, 'gravatar_email')->textInput(['maxlength' => true]) ?>

<!-- attribute location -->
			<?php echo $form->field($model, 'location')->textInput(['maxlength' => true]) ?>

<!-- attribute website -->
			<?php echo $form->field($model, 'website')->textInput(['maxlength' => true]) ?>

<!-- attribute gravatar_id -->
			<?php echo $form->field($model, 'gravatar_id')->textInput(['maxlength' => true]) ?>

<!-- attribute timezone -->
			<?php echo $form->field($model, 'timezone')->textInput(['maxlength' => true]) ?>

<!-- attribute user_id -->
			<?php echo // generated by schmunk42\giiant\generators\crud\providers\core\RelationProvider::activeField
$form->field($model, 'user_id')->dropDownList(
	\yii\helpers\ArrayHelper::map(app\modules\crud\models\User::find()->all(), 'id', 'id'),
	[
		'prompt' => Yii::t('cruds', 'Select'),
		'disabled' => (isset($relAttributes) && isset($relAttributes['user_id'])),
	]
); ?>
        </p>
        <?php $this->endBlock(); ?>

        <?php echo
Tabs::widget(
	[
		'encodeLabels' => false,
		'items' => [
			[
				'label'   => Yii::t('models', 'Profile'),
				'content' => $this->blocks['main'],
				'active'  => true,
			],
		]
	]
);
?>
        <hr/>

        <?php echo $form->errorSummary($model); ?>

        <?php echo Html::submitButton(
	'<span class="glyphicon glyphicon-check"></span> ' .
	($model->isNewRecord ? Yii::t('cruds', 'Create') : Yii::t('cruds', 'Save')),
	[
		'id' => 'save-' . $model->formName(),
		'class' => 'btn btn-success'
	]
);
?>

        <?php ActiveForm::end(); ?>

    </div>

</div>
