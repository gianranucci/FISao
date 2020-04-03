<?php

namespace app\modules\crud\models;

use Yii;
use \app\modules\crud\models\base\Token as BaseToken;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "token".
 */
class Token extends BaseToken
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
