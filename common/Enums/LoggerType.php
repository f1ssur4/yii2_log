<?php

namespace common\Enums;

enum LoggerType: string
{
    case FILE = 'file';
    case MAIL = 'mail';
    case DB = 'db';
}