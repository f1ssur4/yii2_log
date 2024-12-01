<?php

namespace common\modules\Logger\LoggerDrivers;

use common\models\Log;

class LoggerDBDriver extends LoggerDriverSingleton implements LoggerDriverInterface
{
    public function log(string $message): void
    {
        $logModel = new Log();

        $logModel->message = $message;
        $logModel->user_id = \Yii::$app->user->id;
        $logModel->insert();
    }
}