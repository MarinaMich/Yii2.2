<?php

namespace app\controllers;


use app\base\BaseController;
use app\components\DAOComponent;

class DaoController extends BaseController
{
    public function actionTest(){

        /** @var DAOComponent $dao */
        $dao=\Yii::$app->dao;

        $dao->insertTest();

        $users=$dao->getAllUsers();
        $activityUser=$dao->getActivityUser();

        $firstActivity=$dao->getFirstActivity();
        $countNotif=$dao->countNotificationActivity();

      //  $allActivityUser=$dao->getAllActivityUser(1);
        $activityReader=$dao->getActivityReader();

        return $this->render('test',['users'=>$users,'activityUser'=>$activityUser,
            'firstActivity'=>$firstActivity,'count_notif'=>$countNotif,
          /*  'allActivityUser'=>$allActivityUser,*/'activityReader'=>$activityReader]);
    }
}