<?php

use yii\db\Migration;

/**
 * Class m241201_190249_logs
 */
class m241201_190249_logs extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('logs', [
            'log_id' => $this->primaryKey(),
            'message' => $this->string(),
            'user_id' => $this->integer()->notNull(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // some logic to rollback
    }
}
