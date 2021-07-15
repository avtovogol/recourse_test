<?php

use yii\db\Migration;

/**
 * Class m210715_132058_add_test_data
 */
class m210715_132058_add_test_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('events', [
            'name' => 'Событие 1',
            'description' => 'Описание события 1'
        ]);
        $this->insert('events', [
            'name' => 'Событие 2',
            'description' => 'Описание события 2'
        ]);
        $this->insert('events', [
            'name' => 'Событие 3',
            'description' => 'Описание события 3'
        ]);
        $this->insert('events', [
            'name' => 'Событие 4',
            'description' => 'Описание события 4'
        ]);
        $this->batchInsert('event_times', [
            'event_id',
            'week_day',
            'time',
        ], [
            [1, 1, '9:00'],
            [2, 2, '10:00'],
            [3, 3, '11:00'],
            [4, 4, '12:00'],
            [4, 1, '10:00'],
        ]);
        $this->insert('event_bids', [
            'event_id' => '1',
            'date' => '2021-07-12',
            'name' => 'Иван',
            'time' => '9:00',
            'contact' => 'контакты Ивана'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210715_132058_add_test_data cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210715_132058_add_test_data cannot be reverted.\n";

        return false;
    }
    */
}
