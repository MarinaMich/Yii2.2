<?php
/**
 * Created by PhpStorm.
 * User: bebut
 * Date: 10.03.2019
 * Time: 18:40
 */

namespace app\behaviors;


use yii\base\Behavior;

class GetDateFunctionFormatBehavior extends Behavior
{
    //настроечный параметр - название атрибута, который нужно форматировать
    public $attribute_name;

    public function getDate(){
        //переменная owner содержит в себе родителя, того кому это поведение припишим (к модели Activity)
        $date=$this->owner->{$this->attribute_name};
        return \Yii::$app->formatter->asDate($date);
    }
}