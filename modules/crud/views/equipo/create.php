<?php
/**
 * /home/pacho/yiiApps/gianFISAO/runtime/giiant/fccccf4deb34aed738291a9c38e87215
 *
 * @package default
 */


use yii\helpers\Html;

/**
 *
 * @var yii\web\View $this
 * @var app\modules\crud\models\Equipo $model
 */
$this->title = Yii::t('models', 'Equipo');
$this->params['breadcrumbs'][] = ['label' => Yii::t('models', 'Equipos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud equipo-create">

    <h1>
        <?php echo Yii::t('models', 'Equipo') ?>
        <small>
                        <?php echo Html::encode($model->id_equipo) ?>
        </small>
    </h1>

    <div class="clearfix crud-navigation">
        <div class="pull-left">
            <?php echo             Html::a(
	Yii::t('cruds', 'Cancel'),
	\yii\helpers\Url::previous(),
	['class' => 'btn btn-default']) ?>
        </div>
    </div>

    <hr />

    <?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>
