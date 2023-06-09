<?php 

namespace app\controllers;

use app\classes\filters\TempoAcaoFilter;
use yii\base\Controller;
use yii\filters\AccessControl;

class FiltrosController extends Controller 
{
    public function behaviors()
    {
        return [
            'tempoacao' => [
                'class' => TempoAcaoFilter::className(),
                'message' => 'olha só o tanto que demorou'
            ],
            'acess'=> [
                'class'=> AccessControl::className(),
                'only' => ['create', 'update'],
                'rules' => [
                    ['allow' => false]
                ]
            ]
        ];
    }

    public function actionIndex()
    {
        return 'Listagem';
    }

    public function actionCreate()
    {
        return 'Novo';
    }
    public function actionUpdate()
    {
        return 'Atualizar';
    }
    public function actionDelete()
    {
        return 'Apagar';
    }


}

?>