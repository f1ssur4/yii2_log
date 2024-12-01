<?php

namespace common\modules\Logger\LoggerFactories;

use common\modules\Logger\LoggerDrivers\LoggerDriverInterface;

abstract class LoggerFactory
{
    abstract function getLoggerInstance(): LoggerDriverInterface;

    public function log(string $message): void
    {
        $logger = $this->getLoggerInstance();
        $logger->log($message);
    }
}