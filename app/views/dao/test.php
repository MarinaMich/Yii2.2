<?php

?>
<div class="row">
    <?=\app\widgets\ViewUsersListWidget\ViewUsersListWidget::widget(['users'=> $users])?>
    <div class="col-md-6">
        <pre>
            <?=print_r($activityUser);?>
        </pre>
    </div>
    <div class="col-md-6">
        <pre>
            <?=print_r($firstActivity)?>
        </pre>
    </div>
    <div class="col-md-6">
        <pre>
        <?='Кол-во активностей с уведомлениями: '.$count_notif;?>
        </pre>
    </div>

    <div class="col-md-6">
        <pre>
        <?php foreach ($activityReader as $item):?>
        <?=print_r($item)?>
        <?php endforeach;?>
            </pre>
    </div>

</div>
