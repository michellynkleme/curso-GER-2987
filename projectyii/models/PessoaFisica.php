<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pessoas".
 *
 * @property int $id
 * @property string|null $cpf
 * @property string|null $sexo
 */
class PessoaFisica extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pessoa_fisica';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cpf', 'sexo'], 'string'],
        ];
    }

    public function getPessoa()
    {
        return $this->hasOne(Pessoas::class, ['id' => 'id']);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cpf' => 'CPF',
            'sexo' => 'Sexo'
        ];
    }
}
