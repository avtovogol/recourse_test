<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "event_custom_times".
 *
 * @property int $id
 * @property int|null $custom_id
 * @property string|null $time
 *
 * @property EventCustom $custom
 */
class EventCustomTimes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'event_custom_times';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['custom_id'], 'integer'],
            [['time'], 'string', 'max' => 255],
            [['custom_id'], 'exist', 'skipOnError' => true, 'targetClass' => EventCustom::className(), 'targetAttribute' => ['custom_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'custom_id' => 'Custom ID',
            'time' => 'Time',
        ];
    }

    /**
     * Gets query for [[Custom]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCustom()
    {
        return $this->hasOne(EventCustom::className(), ['id' => 'custom_id']);
    }
}
