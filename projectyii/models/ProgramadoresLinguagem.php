<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "programadores_linguagem".
 *
 * @property string|null $programadorId
 * @property string|null $linguagemId
 */
class ProgramadoresLinguagem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'programadores_linguagem';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['programador_id', 'linguagem_id'], 'required'],
        ];
    }

    public function getProgramador()
    {
        return $this->hasOne(Programadores::class, ['id' => 'programador_id']);

    }

    public function getLinguagem()
    {
        return $this->hasOne(Linguagem::class, ['id' => 'linguagem_id']);

    }

}
