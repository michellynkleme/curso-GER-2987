<?php

use yii\db\Migration;

/**
 * Class m230329_113813_pessoa_fisica_aula32
 */
class m230329_113813_pessoa_fisica_aula32 extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%pessoa_fisica}}', [
            'id' => $this->primaryKey(),
            'cpf' => $this->string(11)->notNull(),
            'sexo' => $this->string(1)->notNull(),
        ]);

        $this->batchInsert('{{%pessoa_fisica}}', ['cpf', 'sexo'], [
            ['71702932001','F'],
            ['71702932001', 'F'],
            ['77381279029', 'M'],
            ['61774673002', 'M'],
            ['22742220020', 'M'],
            ['20710487096', 'M']
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%pessoa_fisica}}');

    }
}
