<?php

namespace app\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\Expression;

/**
 * This is the model class for table "events".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 *
 * @property EventBids[] $eventBids
 * @property EventCustom[] $eventCustoms
 * @property EventTimes[] $eventTimes
 */
class Events extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'events';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
        ];
    }

    /**
     * Gets query for [[EventBids]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEventBids()
    {
        return $this->hasMany(EventBids::className(), ['event_id' => 'id']);
    }

    /**
     * Gets query for [[EventCustoms]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEventCustoms()
    {
        return $this->hasMany(EventCustom::className(), ['event_id' => 'id']);
    }

    /**
     * Gets query for [[EventTimes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEventTimes()
    {
        return $this->hasMany(EventTimes::className(), ['event_id' => 'id']);
    }

    /**
     * @param string $date
     * @return array
     */
    public static function findMapByDate(string $date): array
    {
        $date = date('Y-m-d', strtotime($date));
        $dayOfWeek = date('w', strtotime($date));


        return self::find()
            ->alias('e')
            ->select([
                new Expression(':date as date',['date' => $date]),
                'et.time', 'e.name as eventName',
                new Expression('IF(ISNULL(eb.id), \'true\', \'false\') as isFree')
            ])
            ->joinWith(['eventTimes as et' => function (ActiveQuery $query) use ($dayOfWeek) {
                return $query
                    ->andWhere(['et.week_day' => $dayOfWeek]);
            }], false)
            ->joinWith(['eventBids as eb' => function (ActiveQuery $query) use ($date) {
                return $query
                    ->andOnCondition('eb.time = et.time')
                    ->andOnCondition(['eb.date' => $date]);
            }], false)
            ->asArray()
            ->all();
    }
}
