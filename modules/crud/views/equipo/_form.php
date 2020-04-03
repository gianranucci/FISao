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
 * @var app\modules\crud\models\Equipo $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="equipo-form">

    <?php $form = ActiveForm::begin([
		'id' => 'Equipo',
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


<!-- attribute club_id -->
			<?php echo // generated by schmunk42\giiant\generators\crud\providers\core\RelationProvider::activeField
$form->field($model, 'club_id')->dropDownList(
	\yii\helpers\ArrayHelper::map(app\modules\crud\models\Club::find()->all(), 'id_club', 'id_club'),
	[
		'prompt' => Yii::t('cruds', 'Select'),
		'disabled' => (isset($relAttributes) && isset($relAttributes['club_id'])),
	]
); ?>

<!-- attribute dt_id -->
			<?php echo // generated by schmunk42\giiant\generators\crud\providers\core\RelationProvider::activeField
$form->field($model, 'dt_id')->dropDownList(
	\yii\helpers\ArrayHelper::map(app\modules\crud\models\Tecnico::find()->all(), 'id_tecnico', 'id_tecnico'),
	[
		'prompt' => Yii::t('cruds', 'Select'),
		'disabled' => (isset($relAttributes) && isset($relAttributes['dt_id'])),
	]
); ?>

<!-- attribute categoria -->
			<?php echo $form->field($model, 'categoria')->textInput() ?>

<!-- attribute nombre_equipo -->
			<?php echo $form->field($model, 'nombre_equipo')->textInput(['maxlength' => true]) ?>
        </p>
        <?php $this->endBlock(); ?>

        <?php echo
Tabs::widget(
	[
		'encodeLabels' => false,
		'items' => [
			[
				'label'   => Yii::t('models', 'Equipo'),
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