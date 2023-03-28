<?php

use yii\db\Migration;

/**
 * Class m230328_170947_alter_clientes
 */
class m230328_170947_alter_clientes extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('clientes', 'slug', $this->VARCHAR(60));
        $this->addColumn('clientes', 'code', $this->VARCHAR(10));
        $this->addColumn('clientes', 'created_at', $this->VARCHAR(10));

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('clientes', 'slug');
        $this->dropColumn('clientes', 'code');
        $this->dropColumn('clientes', 'created_at');

    }

}
