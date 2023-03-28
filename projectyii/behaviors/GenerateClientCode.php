<?php

namespace app\behaviors;

use yii\base\Event;
use yii\db\ActiveRecord;
use yii\base\Behavior;

class GenerateClientCode extends Behavior
{
    public function events()
    {
        return [
            ActiveRecord::EVENT_AFTER_INSERT => 'run',
            ActiveRecord::EVENT_AFTER_UPDATE => 'run',
        ];
    }

    public function run(Event $event)
    {
        $this->owner->code = \Yii::$app->security->generateRandomString();
    }
}

?>