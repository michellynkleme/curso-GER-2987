<?php

use app\models\Sizes;
use yii\grid\GridView;

$this->title = '';
?>

<div class="jumbotron">
    <h1>Cores</h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'attribute' => 'id',
                'header' => 'Código',
                'headerOptions' => [
                    'style' => 'text-align: right; width: 70px'
                ],
                'contentOptions' => [
                    'style' => 'text-align: right;'
                ]
            ],
            'id',
            'created_at',
            'abreviation',
            [
                'attribute' => 'name',
                'content' => function(Sizes $model, $key, $index, $column) {
                    return $model->nome . "({$model->abreviation})";
                }
            ]

            ]
        ]);
    ?>

</div>