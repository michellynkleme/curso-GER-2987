<?php

use yii\db\Migration;

/**
 * Class m230329_123307_linguagem_programadores_aula33
 */
class m230329_123307_linguagem_programadores_aula33 extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%linguagem}}', [
            'id' => $this->primaryKey(),
            'nome' => $this->string(60)->notNull(),
        ]);

        $this->createTable('{{%programadores}}', [
            'id' => $this->primaryKey(),
            'nome' => $this->string(60)->notNull(),
            'github' => $this->string(60)->notNull(),
        ]);

        $this->createTable('{{%programadores_linguagem}}', [
            'programador_id' => $this->integer(11),
            'linguagem_id' => $this->integer(11),
        ]);

        $this->batchInsert('{{%linguagem}}', ['nome'], [
            ['PHP'],
            ['Node.js'],
            ['Angular'],
            ['Java'],
            ['C#'],
            ['Ruby']
        ]);

        $this->batchInsert('{{%programadores}}', ['nome', 'github'], [
            ['Michelly', '@michelly_nk'],
            ['Thiago', '@thiago'],
            ['Roberto','@robertinho'],
            ['Marielly','@mariolly'],
            ['Bruna', '@bruninha'],
            ['Josimar','@josemar']
        ]);

        $this->batchInsert('{{%programadores_linguagem}}', ['programador_id', 'linguagem_id'], [
            ['1','1'],
            ['2','3'],
            ['3','4'],
            ['4','2'],
            ['5','5'],
            ['6','6']
        ]);

        $this->addForeignKey(
            'fk-programadores_linguagem-programador_id',
            'programadores_linguagem',
            'programador_id',
            'programadores',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-programadores_linguagem-linguagem_id',
            'programadores_linguagem',
            'linguagem_id',
            'linguagem',
            'id',
            'CASCADE'
        );
        

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%linguagem}}');
        $this->dropTable('{{%programadores}}');
        $this->dropTable('{{%programadores_linguagem}}');

    }
}
