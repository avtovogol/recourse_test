<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%event_custom_times}}`.
 */
class m210715_112040_create_event_custom_times_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%event_custom_times}}', [
            'id' => $this->primaryKey(),
            'custom_id' => $this->integer(),
            'time' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%event_custom_times}}');
    }
}
