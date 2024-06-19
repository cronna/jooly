<?php

use yii\db\Migration;

/**
 * Class m240614_111438_secMigrate
 */
class m240614_111438_secMigrate extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('products', 'img', 
            $this->string()->notNull()
        );
        $this->addColumn('categories', 'img', 
            $this->string()->notNull()
        );
        $this->dropColumn('categories', 'description');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240614_111438_secMigrate cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240614_111438_secMigrate cannot be reverted.\n";

        return false;
    }
    */
}
