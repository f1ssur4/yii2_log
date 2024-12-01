<?php

namespace frontend\controllers;

use common\modules\Logger\Logger;
use Yii;
use yii\base\InlineAction;
use yii\web\Controller;

/**
 * Site controller
 */
class LogController extends Controller
{
    public Logger $logger;

    public function __construct($id, $module, $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->logger = new Logger();
    }

    /**
     * createAction method rewrote for using actions without "action" prefix: as required in the test task.
     * To simplify, method moved to this LogController
     * instead of Creating parent Controller wrapper and put method there.
    */
    public function createAction($id)
    {
        if ($id === '') {
            $id = $this->defaultAction;
        }

        $actionMap = $this->actions();
        if (isset($actionMap[$id])) {
            return Yii::createObject($actionMap[$id], [$id, $this]);
        }

        if (preg_match('/^(?:[a-z0-9_]+-)*[a-z0-9_]+$/', $id)) {
//            $methodName = 'action' . str_replace(' ', '', ucwords(str_replace('-', ' ', $id)));
            $methodName = lcfirst(
                str_replace(' ', '', ucwords(str_replace('-', ' ', $id)))
            );
            if (method_exists($this, $methodName)) {
                $method = new \ReflectionMethod($this, $methodName);
                if ($method->isPublic() && $method->getName() === $methodName) {
                    return new InlineAction($id, $this, $methodName);
                }
            }
        }

        return null;
    }

    /**
     *	Sends a log message to the default logger.
     */
    public function log()
    {
        $this->logger->send('default logger');
    }

    /**
     *	Sends a log message to a special logger.
     *
     *	@param string $type
     */
    public function logTo(string $type)
    {
        $this->logger->sendByLogger($type . ' logger', $type);
    }

    /**
     *	Sends a log message to all loggers.
     */
    public function logToAll()
    {
        $this->logger->sendByLogger('mail-loggers', 'mail');
        $this->logger->sendByLogger('db-loggers', 'db');
        $this->logger->sendByLogger('file-loggers', 'file');
    }

}
