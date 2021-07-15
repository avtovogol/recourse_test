<?php

namespace app\controllers;

use app\models\Events;
use yii\web\Controller;

class EventsController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * @param string $date
     * @return \yii\web\Response
     */
    public function actionIndex(string $date)
    {
        return $this->asJson(Events::findMapByDate($date));
    }
}
