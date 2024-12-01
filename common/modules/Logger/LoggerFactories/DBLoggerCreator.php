<?php

namespace common\modules\Logger\LoggerFactories;

use common\modules\Logger\LoggerDrivers\LoggerDriverInterface;
use common\modules\Logger\LoggerDrivers\LoggerDBDriver;

class DBLoggerCreator extends LoggerFactory
{
    public function getLoggerInstance(): LoggerDriverInterface
    {
        return LoggerDBDriver::getInstance();
    }
}