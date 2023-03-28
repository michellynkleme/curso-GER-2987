<?php 
namespace app\models;

use Behat\Gherkin\Node\TableNode;
use yii\db\ActiveRecord;

/**
 * Class Funcionarios
 * @package app\models
 * 
 * @property int $id
 * @property int $cargo_id
 * @property string $nome
 * @property Cargos $cargo
 * 
 */
class Funcionarios extends ActiveRecord
{
    public static function TableName()
    {
        return 'funcionarios';
    }

    public function rules()
    {
        return [
            [['nome', 'cargo_id'], 'required'],
            ['nome', 'string', 'max'=>60],
            ['cargo_id', 'integer']
        ];
    }
    public function getCargo()
    {
        return $this->hasOne(Cargos::class, ['id' => 'cargo_id']);
    }
}


?>