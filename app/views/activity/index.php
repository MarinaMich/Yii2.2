<?php
/**
 * Created by PhpStorm.
 * User: bebut
 * Date: 07.03.2019
 * Time: 10:54
 */
?>
<div class="row">
    <div class="col-md-12">
        <?=\yii\grid\GridView::widget([
            'dataProvider' => $provider,
            'tableOptions' => [
                'class'=>'table table-striped table-bordered table-hover'
            ],
            'rowOptions'=>function($model, $key, $index, $grid){
                $class=$index%2?'odd':'even';
                return[
                    'class'=>$class,
                    'index'=>$index,
                    'key'=>$key
                ];
            },
          'layout'=> "{pager}\n{items}\n{summary}\n{pager}",
            'columns'=>[
                    //порядковый номер
                    ['class'=>\yii\grid\SerialColumn::class],
                'id',
                //название будет выводиться ссылкой
                [
                    'attribute'=> 'title',
                    'value'=> function($model){
                        return \yii\helpers\Html::a(\yii\helpers\Html::encode($model->title),['/activity/view','id'=>$model->id]);
                    },
                    'format'=> 'html'
                ],
                [
                    'attribute' => 'startDay',
                    'value' => function($model){
                    return Yii::$app->formatter->asDate($model->startDay);
                    }
                ],
                   [   'attribute' => 'endDay',
                'value' => function($model){
                    return Yii::$app->formatter->asDate($model->endDay);
                }
                ],
                [
                    'attribute' => 'user_id',
                    'label' => 'email',
                    'value' => function($model){
                        return $model->user->email;
                    }
                ],
                [
                    'label' => 'Дата создания',
                    'attribute' => 'date_created',
                    'value' => function($model){
                        return $model->getDate();
                    }
                ]

            ]
        ]);?>
    </div>
</div>