<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "event_custom".
 *
 * @property int $id
 * @property int|null $event_id
 * @property string|null $date
 *
 * @property Events $event
 * @property EventCustomTimes[] $eventCustomTimes
 */
class EventCustom extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'event_custom';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['event_id'], 'integer'],
            [['date'], 'safe'],
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

    /**
     * Gets query for [[EventCustomTimes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEventCustomTimes()
    {
        return $this->hasMany(EventCustomTimes::className(), ['custom_id' => 'id']);
    }
}
