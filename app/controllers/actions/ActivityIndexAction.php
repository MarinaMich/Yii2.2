<?php
/**
 * Created by PhpStorm.
 * User: bebut
 * Date: 07.03.2019
 * Time: 0:09
 */

namespace app\controllers\actions;


use app\components\ActivityComponent;
use yii\base\Action;

class ActivityIndexAction extends Action
{
    public function  run(){
        /** @var ActivityComponent $comp */
        $comp=\Yii::$app->activity;

        $dataprovider=$comp->getSearchProvider(\Yii::$app->request->queryParams);
        return $this->controller->render('index', ['provider'=>$dataprovider]);
    }
}