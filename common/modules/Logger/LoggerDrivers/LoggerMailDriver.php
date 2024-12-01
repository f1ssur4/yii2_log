<?php

namespace common\modules\Logger\LoggerDrivers;

class LoggerMailDriver extends LoggerDriverSingleton implements LoggerDriverInterface
{
    public function log(string $message): void
    {
        try {
            \Yii::$app->mailer->compose()
                ->setTo($this->getToEmail())
                ->setFrom($this->getFromEmail())
                ->setSubject('Log email')
                ->setTextBody($message)
                ->send();
        } catch (\Exception $e) {
            echo "Failed to send log: " . $e->getMessage();
        }
    }

    private function getFromEmail(): string
    {
        return \Yii::$app->params['adminEmail'];
    }

    private function getToEmail(): string
    {
        return \Yii::$app->params['senderEmail'];
    }
}