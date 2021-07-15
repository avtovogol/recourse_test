<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%event_bids}}`.
 */
class m210715_112144_create_event_bids_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%event_bids}}', [
            'id' => $this->primaryKey(),
            'event_id' => $this->integer(),
            'date' => $this->date(),
            'time' => $this->string(),
            'name' => $this->string(),
            'contact' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%event_bids}}');
    }
}
