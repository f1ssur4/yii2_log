<?php

namespace common\modules\Logger\LoggerDrivers;

class LoggerDriverSingleton
{
    private static array $instances;

    public static function getInstance(): static
    {
        $class = static::class;

        if (!isset(self::$instances[$class])) {
            self::$instances[$class] = new static();
        }

        return self::$instances[$class];
    }

    protected function __construct()
    {
    }

    private function __clone()
    {
    }

    public function __wakeup()
    {
    }
}