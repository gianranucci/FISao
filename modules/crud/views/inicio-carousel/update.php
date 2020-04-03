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
 * @var app\modules\crud\models\InicioCarousel $model
 */
$this->title = Yii::t('models', 'Inicio Carousel');
$this->params['breadcrumbs'][] = ['label' => Yii::t('models', 'Inicio Carousel'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->id_carousel, 'url' => ['view', 'id_carousel' => $model->id_carousel]];
$this->params['breadcrumbs'][] = Yii::t('cruds', 'Edit');
?>
<div class="giiant-crud inicio-carousel-update">

    <h1>
        <?php echo Yii::t('models', 'Inicio Carousel') ?>
        <small>
                        <?php echo Html::encode($model->id_carousel) ?>
        </small>
    </h1>

    <div class="crud-navigation">
        <?php echo Html::a('<span class="glyphicon glyphicon-file"></span> ' . Yii::t('cruds', 'View'), ['view', 'id_carousel' => $model->id_carousel], ['class' => 'btn btn-default']) ?>
    </div>

    <hr />

    <?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>
