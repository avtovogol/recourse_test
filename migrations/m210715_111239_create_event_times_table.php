<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%event_times}}`.
 */
class m210715_111239_create_event_times_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%event_times}}', [
            'id' => $this->primaryKey(),
            'event_id' => $this->integer(),
            'week_day' => $this->tinyInteger(),
            'time' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%event_times}}');
    }
}
