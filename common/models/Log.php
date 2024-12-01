<?php

namespace common\models;

use yii\db\ActiveRecord;

class Log extends ActiveRecord
{
    public static function tableName()
    {
        return 'logs';
    }
}