<?php

use yii\db\Migration;

/**
 * Class m240618_043758_OrderMigrate
 */
class m240618_043758_OrderMigrate extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('orders', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'product_id' => $this->integer()->notNull(),
            'order_id' => $this->integer()->notNull(),
            'date' => $this->string()->notNull(),
            'full_price' => $this->integer()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240618_043758_OrderMigrate cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240618_043758_OrderMigrate cannot be reverted.\n";

        return false;
    }
    */
}
