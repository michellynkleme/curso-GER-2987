<?php

use yii\db\Migration;

/**
 * Class m230328_192654_aula31_cargosfuncionarios
 */
class m230328_192654_aula31_cargosfuncionarios extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%cargos}}', [
            'id' => $this->primaryKey(),
            'nome' => $this->string(60)->notNull(),
        ]);

        $this->createTable('{{%funcionarios}}', [
            'id' => $this->primaryKey(),
            'cargo_id' => $this->string(60)->notNull(),
            'nome' => $this->string(60)->notNull(),
        ]);

        $this->batchInsert('{{%cargos}}', ['nome'], [
            ['Desenvolvedor WEB FULLSTACK'],
            ['Desenvolvedor FRONT'],
            ['Desenvolvedor BACKEND'],
            ['Analista de dados'],
            ['Gerente de projetos'],
            ['Estágiario']
        ]);

        $this->batchInsert('{{%funcionarios}}', ['nome','cargo_id'], [
            ['Michelly Narita Kuriyama', 1 ],
            ['Joãosinho da SIlva', 2],
            ['Mariasinha Salvatore', 3],
            ['Silvana Magie', 4],
            ['Felipe Babarges', 5],
            ['João Pedro Kso', 5],
            ['João Pedro Fofin', 1]
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%funcionarios}}');
        $this->dropTable('{{%cargos}}');

    }

}
