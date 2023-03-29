<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "linguagem".
 *
 * @property int $id
 * @property string|null $nome
 * @property ProgramadoresLinguagem[] $programadoresLinguagens
 * @property Programadores[] $programadores
 *  */
class Linguagem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'linguagem';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome'], 'required']
        ];
    }

    public function getProgramadorLinguagens()
    {
        return $this->hasMany(ProgramadoresLinguagem::class,['linguagem_id' => 'id']);
    }

    public function getLinguagens()
    {
        return $this->hasMany(Programadores::class, ['id' => 'programador_id'])
            ->viaTable(ProgramadoresLinguagem::tableName(), ['linguagem_id' => 'id']);
    }

}
