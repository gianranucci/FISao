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
 * @var app\modules\crud\models\Gole $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="gole-form">

    <?php $form = ActiveForm::begin([
		'id' => 'Gole',
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


<!-- attribute partido_id -->
			<?php echo $form->field($model, 'partido_id')->textInput() ?>

<!-- attribute jugador_id -->
			<?php echo // generated by schmunk42\giiant\generators\crud\providers\core\RelationProvider::activeField
$form->field($model, 'jugador_id')->dropDownList(
	\yii\helpers\ArrayHelper::map(app\modules\crud\models\Jugador::find()->all(), 'id_jugador', 'id_jugador'),
	[
		'prompt' => Yii::t('cruds', 'Select'),
		'disabled' => (isset($relAttributes) && isset($relAttributes['jugador_id'])),
	]
); ?>

<!-- attribute equipo_id -->
			<?php echo $form->field($model, 'equipo_id')->textInput() ?>

<!-- attribute cant_goles -->
			<?php echo $form->field($model, 'cant_goles')->textInput() ?>
        </p>
        <?php $this->endBlock(); ?>

        <?php echo
Tabs::widget(
	[
		'encodeLabels' => false,
		'items' => [
			[
				'label'   => Yii::t('models', 'Gole'),
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
