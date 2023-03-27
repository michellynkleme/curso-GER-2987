<?php 

namespace app\models;

use yii\base\Model;

class CadastroForm extends Model
{
    public $nome;
    public $email;
    public $idade;
    public $site;
    public $datanascimento;
    public $dataInicial;
    public $dataFinal;   

    public function rules()
    {
        return [
            [['nome', 'email','idade','site','datanascimento','dataInicial','dataFinal'], 'required'],
            ['nome', 'string', 'min' => 5, 'max' => 60],
            ['email', 'email'],
            ['idade', 'integer', 'min'=>1, 'max'=>10],
            ['site', 'url']
        ];
    }
    public function attributeLabels()
    {
        return [
            'nome' => 'Nome',
            'email' => 'E-mail',
            'idade' => 'idade',
            'site' => 'Site',
            'datanascimento' => 'Data de nascimento',
            'dataInicial' => 'Data Inicial',
            'dataFinal' => 'Data Final',
        ];
    }

}
