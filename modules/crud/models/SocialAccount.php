<?php

namespace app\modules\crud\models;

use Yii;
use \app\modules\crud\models\base\SocialAccount as BaseSocialAccount;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "social_account".
 */
class SocialAccount extends BaseSocialAccount
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
