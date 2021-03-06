<?php
/**
 * Created by PhpStorm.
 * User: bebut
 * Date: 06.03.2019
 * Time: 19:47
 */

namespace app\models;



use yii\data\ActiveDataProvider;

class ActivitySearch extends Activity
{
    public function getDataProvider(){
        $query = Activity::find();

       $provider = new ActiveDataProvider(
            [
                'query' => $query,
                //кол-во выводимых строк на странице
                'pagination' => [
                    'pageSize'=>10
                ],
                'sort' => [
                    'defaultOrder'=>
                        [
                            'startDay'=>SORT_DESC
                        ]
                ]

        ]);

        /**
         * Вернет массив моделей для текущей страницы
         */
        $provider->getModels();

        /** Сколько всего элементов */
        $provider->getTotalCount();

        /** Сколько элементов на странице */
        $provider->count;

        /** получить массив id моделей текущей страницы */
        $provider->getKeys();

//        $query->andFilterWhere(['user_id'=>2]);
       return $provider;
    }
}