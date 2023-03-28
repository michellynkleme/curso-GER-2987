<?php

namespace app\models;

use Yii;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use app\behaviors\GenerateClientCode;

/**
 * This is the model class for table "{{%clientes}}".
 *
 * @property int $id
 * @property string $nome
 * @property string|null $foto
 * @property string $slug
 * @property string $code
 * @property string $createdAt
 * @property string $updatedAt
 */
class Clientes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%clientes}}';
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class'=> TimestampBehavior::class
            ],
            'sluggable' => [
                'class' => SluggableBehavior::class,
                'attribute' => 'nome',
            ],
            'codeGenerator' => [
                'class' => GenerateClientCode::class
            ] 
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome'], 'required'],
            [['nome', 'foto'], 'string', 'max' => 60],
            [['code'], 'string', 'max' => 40],
            [['slug'], 'string', 'max' => 60],
            [['created_at', 'updated_at'], 'integer'],
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
            'foto' => 'Foto',
            'slug' => 'Slug',
            'code' => 'Código',
            'createdAt' => 'Criado em',
            'updatedAt' => 'Atualização em'
        ];
    }
}
