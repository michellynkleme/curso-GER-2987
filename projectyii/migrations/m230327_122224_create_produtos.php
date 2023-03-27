<?php

use yii\db\Migration;

/**
 * Class m230327_122224_create_produtos
 */
class m230327_122224_create_produtos extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('produtos', [
            'id' => $this->primaryKey(),
            'categoria_id' => $this->integer()->notNull(),
            'data_cadastro' => $this->dateTime()->notNull(),
            'nome' => $this->string(60),
            'descricao' => $this->text(),
            'valor' =>  $this->decimal(10, 2)->notNull(),
            'status' => $this->smallInteger(1)->notNull()->defaultValue(1),
        ]);

        $this->addForeignKey('fk_produtos_categoria_id', 'produtos', 'categoria_id', 'categoria', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_produtos_categoria_id', 'produtos');
        $this->dropTable('produtos');
    }

}
