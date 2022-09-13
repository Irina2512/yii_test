<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m220912_074502_add_new_index
 */
class m220912_074502_add_new_index extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('fk_group_id','item','group_id','group','id','CASCADE');
        $this->createIndex('inx_rating_name','item',['rating','name']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_group_id','item');
        $this->dropIndex('inx_rating_name','item');
        /*echo "m220912_074502_add_new_index reverted.\n";

        return false;*/
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220912_074502_add_new_index cannot be reverted.\n";

        return false;
    }
    */
}
