<?php

namespace common\modules\Logger;

use common\Enums\LoggerType;
use common\modules\Logger\LoggerFactories\DBLoggerCreator;
use common\modules\Logger\LoggerFactories\FileLoggerCreator;
use common\modules\Logger\LoggerFactories\LoggerFactory;
use common\modules\Logger\LoggerFactories\MailLoggerCreator;
use Yii;

class Logger implements LoggerInterface
{
    private string $logger_type;

    public function __construct()
    {
        $this->setType(Yii::$app->params['DEFAULT_LOGGER_TYPE']);
    }

    public function send(string $message): void
    {
        $logger = $this->getLoggerFactoryByType();
        $logger->log($message);
    }

    public function sendByLogger(string $message, string $loggerType): void
    {
        $this->setType($loggerType);

        $logger = $this->getLoggerFactoryByType();
        $logger->log($message);
    }

    public function getType(): string
    {
        return $this->logger_type;
    }

    public function setType(string $type): void
    {
        $this->logger_type = $type;
    }

    private function getLoggerFactoryByType(): LoggerFactory
    {
        switch (strtolower($this->getType())) {
            case LoggerType::MAIL->value:
                return new MailLoggerCreator();
            case LoggerType::DB->value:
                return new DBLoggerCreator();
            case LoggerType::FILE->value:
                return new FileLoggerCreator();
        }
    }
}