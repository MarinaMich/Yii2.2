<?php
/**
 * Created by PhpStorm.
 * User: bebut
 * Date: 06.03.2019
 * Time: 12:08
 */

namespace app\widgets\ViewUsersListWidget;


use yii\bootstrap\Widget;

class ViewUsersListWidget extends Widget
{
    public $users;

    public function init()
    {
        parent::init();
        //если данных нет, виджет не сработает
        if(empty($this->users)){
            throw new \Exception('Need param users');
        }
    }

    public function run()
    {
       return $this->render('index',['users'=>$this->users]);
    }
}