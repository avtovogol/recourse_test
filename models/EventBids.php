<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "event_bids".
 *
 * @property int $id
 * @property int|null $event_id
 * @property string|null $date
 * @property string|null $time
 * @property string|null $name
 * @property string|null $contact
 *
 * @property Events $event
 */
class EventBids extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'event_bids';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['event_id'], 'integer'],
            [['date', 'time'], 'safe'],
            [['name', 'contact'], 'string', 'max' => 255],
            [['event_id'], 'exist', 'skipOnError' => true, 'targetClass' => Events::className(), 'targetAttribute' => ['event_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'event_id' => 'Event ID',
            'date' => 'Date',
            'time' => 'Time',
            'name' => 'Name',
            'contact' => 'Contact',
        ];
    }

    /**
     * Gets query for [[Event]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEvent()
    {
        return $this->hasOne(Events::className(), ['id' => 'event_id']);
    }
}
