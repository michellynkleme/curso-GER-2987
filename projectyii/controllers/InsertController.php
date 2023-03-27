<?php

namespace app\controllers;

use app\models\Clientes;
use yii\web\Controller;

class InsertController extends Controller
{
    public function actionIndex()
    {
        $clientes = [
            ['nome' => 'Michelly Narita2'],
            ['nome' => 'Kleberson Sena2'],
            ['nome' => 'Joao Pedro P2'],
            ['nome' => 'Cácliaso RUbel2'],
            ['nome' => 'Ciara Lovel2'],
            ['nome' => 'WHinderson Nunes2'],
        ];

        \Yii::$app->db
            ->createCommand()
            ->batchInsert(Clientes::tableName(), ['nome'], $clientes)
            ->execute();
        /*
        foreach($clientes as $cliente)
        {
            $row = new Clientes();
            $row->nome = $cliente['nome'];
            $row->save();
        }
        echo 'ok ; */
    }
}