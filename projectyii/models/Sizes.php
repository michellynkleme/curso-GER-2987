<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%sizes}}".
 *
 * @property int $id
 * @property string $nome
 * @property string $abreviation
 * @property int $status
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Sizes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%sizes}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'abreviation'], 'required'],
            [['status'], 'default', 'value' => null],
            [['status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['nome'], 'string', 'max' => 60],
            [['abreviation'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'abreviation' => 'Abreviação',
            'status' => 'Status',
            'created_at' => 'Criado em',
            'updated_at' => 'Atualizado em',
        ];
    }
}
