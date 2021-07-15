<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%event_custom}}`.
 */
class m210715_111445_create_event_custom_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%event_custom}}', [
            'id' => $this->primaryKey(),
            'event_id' => $this->integer(),
            'date' => $this->date(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%event_custom}}');
    }
}
