<?php

namespace app\modules\api\controllers;

use yii\rest\ActiveController;

class DefaultController extends ActiveController
{
    public $modelClass = 'app\models\Noticias';


    public function actions()
    {
        $actions = parent::actions();
        unset($actions['delete'], $actions['create']);

        return $actions;
    }
}