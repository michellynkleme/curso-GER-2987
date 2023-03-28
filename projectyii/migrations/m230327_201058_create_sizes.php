<?php

use yii\db\Migration;

/**
 * Class m230327_201058_create_sizes
 */
class m230327_201058_create_sizes extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%sizes}}', [
            'id' => $this->primaryKey(),
            'nome' => $this->string(60)->notNull(),
            'abreviation' => $this->string(10)->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),

        ]);

        $now = new DateTime;
        $now = $now->format('Y-m-d H:i:s');

        $this->batchInsert('{{%sizes}}', ['nome', 'abreviation', 'created_at', 'updated_at'], [
            ['Pequeno', 'P', $now, $now],
            ['Médio', 'M', $now, $now],
            ['Grande', 'G', $now, $now],
            ['Extra Grande', 'GG', $now, $now],
            ['Extra big grande', 'GGG', $now, $now],
            ['Extra Pequeno', 'PP', $now, $now],

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%sizes}}');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230327_201058_create_sizes cannot be reverted.\n";

        return false;
    }
    */
}
