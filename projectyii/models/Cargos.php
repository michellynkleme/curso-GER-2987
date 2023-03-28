<?php 
namespace app\models;

use Behat\Gherkin\Node\TableNode;
use yii\db\ActiveRecord;

/**
 * Class Cargos
 * @package app\models
 * 
 * @property int $id
 * @property string $nome
 * 
 */
class Cargos extends ActiveRecord
{
    public static function TableName()
    {
        return 'cargos';
    }

    public function rules()
    {
        return [
            ['nome', 'required'],
            ['nome', 'string', 'max'=>60]
        ];
    }
    public function getFuncionarios()
    {
        return $this->hasMany(Funcionarios::class, ['cargo_id' => 'id']);
    }
}


?>