<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\behaviors\GetDateFunctionFormatBehavior;

/**
 * ActivityCrud represents the model behind the search form of `app\models\Activity`.
 */
class ActivityCrud extends Activity
{
    public function behaviors()
    {
        //массив с поведениями
        return [
            [
                'class'=>GetDateFunctionFormatBehavior::class,
                'attribute_name' => 'date_created'
            ]

        ];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'use_notification', 'is_blocked', 'is_repeated', 'user_id', 'email'], 'integer'],
            [['title', 'startDay', 'endDay', 'body', 'date_created'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Activity::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'startDay' => $this->startDay,
            'endDay' => $this->endDay,
            'use_notification' => $this->use_notification,
            'is_blocked' => $this->is_blocked,
            'is_repeated' => $this->is_repeated,
            'date_created' => $this->date_created,
            'user_id' => $this->user_id,
            'email' => $this->email,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'body', $this->body]);

        return $dataProvider;
    }
}
