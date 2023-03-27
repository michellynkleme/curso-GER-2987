<?php

use app\models\Clientes;
use Symfony\Component\BrowserKit\Client;
use yii\db\Migration;

/**
 * Class m230327_185305_migrate
 */
class m230327_185305_migrate extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn(Clientes::tableName(), 'foto', $this->string(60));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn(Clientes::tableName(), 'foto');
    }

}
