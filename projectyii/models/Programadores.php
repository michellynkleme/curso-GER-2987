<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "programadores".
 *
 * @property int $id
 * @property string|null $nome
 * @property string|null $github
 * @property ProgramadoresLinguagem[] $programadoresLinguagens
 * @property Linguagem[] $linguagem
 */
class Programadores extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'programadores';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'github'], 'required']
        ];
    }

    public function getProgramadorLinguagens()
    {
        return $this->hasMany(ProgramadoresLinguagem::class,['programador_id' => 'id']);
    }

    public function getLinguagens()
    {
        return $this->hasMany(Linguagem::class, ['id' => 'linguagem_id'])
            ->viaTable(ProgramadoresLinguagem::tableName(), ['programador_id' => 'id']);
    }

}
