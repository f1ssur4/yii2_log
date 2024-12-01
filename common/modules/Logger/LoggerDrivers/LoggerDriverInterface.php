<?php

namespace common\modules\Logger\LoggerDrivers;

interface LoggerDriverInterface
{
    /**
     *	Log message.
     *
     *	@param string $message
     *
     *	@return void
     */
    public function log(string $message): void;
}