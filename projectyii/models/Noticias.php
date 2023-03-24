<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "noticias".
 *
 * @property int $id
 * @property string|null $titulo
 * @property string|null $cabeca
 * @property string|null $corpo
 * @property bool|null $status
 */
class Noticias extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'noticias';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['titulo', 'cabeca', 'corpo'], 'string'],
            [['status'], 'boolean'],
        ];
    }

    /**
     * {@inheritdoc}qwqwdqwd
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'titulo' => 'Titulo',
            'cabeca' => 'Cabeca',
            'corpo' => 'Corpo',
            'status' => 'Status',
        ];
    }

    public function fields()
    {
        return [
            'id',
            'title' => 'titulo',
            'status' => function(Noticias $model) {
                return ($model->status == '1' ? 'ativo' : 'inativo');
            }
        ];
    }
}
