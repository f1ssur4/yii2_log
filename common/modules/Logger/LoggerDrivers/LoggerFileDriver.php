<?php

namespace common\modules\Logger\LoggerDrivers;

class LoggerFileDriver extends LoggerDriverSingleton implements LoggerDriverInterface
{
    public function log(string $message): void
    {
        $logFile = \Yii::getAlias(
            \Yii::$app->params['CUSTOM_LOG_FILE_ALIAS']
        );

        $message = date('Y-m-d H:i:s') . " - " . $message . PHP_EOL;

        file_put_contents($logFile, $message, FILE_APPEND);
    }
}