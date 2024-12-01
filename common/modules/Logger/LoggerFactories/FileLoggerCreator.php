<?php

namespace common\modules\Logger\LoggerFactories;

use common\modules\Logger\LoggerDrivers\LoggerDriverInterface;
use common\modules\Logger\LoggerDrivers\LoggerFileDriver;

class FileLoggerCreator extends LoggerFactory
{
    public function getLoggerInstance(): LoggerDriverInterface
    {
        return LoggerFileDriver::getInstance();
    }
}