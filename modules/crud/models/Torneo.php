<?php

namespace app\modules\crud\models;

use Yii;
use \app\modules\crud\models\base\Torneo as BaseTorneo;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "torneo".
 */
class Torneo extends BaseTorneo
{

    public function behaviors()
    {
        return ArrayHelper::merge(
            parent::behaviors(),
            [
                # custom behaviors
            ]
        );
    }

    public function rules()
    {
        return ArrayHelper::merge(
            parent::rules(),
            [
                # custom validation rules
            ]
        );
    }
}
