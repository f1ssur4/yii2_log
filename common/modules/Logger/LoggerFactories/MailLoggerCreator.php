<?php

namespace common\modules\Logger\LoggerFactories;

use common\modules\Logger\LoggerDrivers\LoggerDriverInterface;
use common\modules\Logger\LoggerDrivers\LoggerMailDriver;

class MailLoggerCreator extends LoggerFactory
{
    public function getLoggerInstance(): LoggerDriverInterface
    {
        return LoggerMailDriver::getInstance();
    }
}