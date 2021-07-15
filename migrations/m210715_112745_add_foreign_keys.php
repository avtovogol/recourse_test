<?php

use yii\db\Migration;

/**
 * Class m210715_112745_add_foreign_keys
 */
class m210715_112745_add_foreign_keys extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            '[[fk-event_times-event_id]]',
            '{{%event_times}}',
            '[[event_id]]',
            '{{%events}}',
            '[[id]]',
            'CASCADE'
        );
        $this->addForeignKey(
            '[[fk-event_custom-event_id]]',
            '{{%event_custom}}',
            '[[event_id]]',
            '{{%events}}',
            '[[id]]',
            'CASCADE'
        );
        $this->addForeignKey(
            '[[fk-event_bids-event_id]]',
            '{{%event_bids}}',
            '[[event_id]]',
            '{{%events}}',
            '[[id]]',
            'CASCADE'
        );
        $this->addForeignKey(
            '[[fk-event_custom_times-custom_id]]',
            '{{%event_custom_times}}',
            '[[custom_id]]',
            '{{%event_custom}}',
            '[[id]]',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('[[fk-event_times-event_id]]', 'event_times');
        $this->dropForeignKey('[[fk-event_custom-event_id]]', 'event_custom');
        $this->dropForeignKey('[[fk-event_bids-event_id]]', 'event_bids');
        $this->dropForeignKey('[[fk-event_custom_times-custom_id]]', 'event_custom_times');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210715_112745_add_foreign_keys cannot be reverted.\n";

        return false;
    }
    */
}
