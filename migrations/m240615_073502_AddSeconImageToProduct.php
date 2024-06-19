<?php

use yii\db\Migration;

/**
 * Class m240615_073502_AddSeconImageToProduct
 */
class m240615_073502_AddSeconImageToProduct extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('products', 'img2', 
            $this->string()->notNull()
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240615_073502_AddSeconImageToProduct cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240615_073502_AddSeconImageToProduct cannot be reverted.\n";

        return false;
    }
    */
}
