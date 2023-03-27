<?php

use yii\db\Migration;

/**
 * Class m230327_120807_create_categoria
 */
class m230327_120807_create_categoria extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('categorias', [
            'id' => $this->primaryKey(),
            'nome' => $this->string(60)->notNull(),
            'data_cadastro' => $this->dateTime()->notNull(),
        ]);

        $this->insert('categorias', [
            'nome' => 'categoria padrao',
            'data_cadastro' => date('Y-m-d H:i:s')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('categorias');        
        return false;
    }

}
