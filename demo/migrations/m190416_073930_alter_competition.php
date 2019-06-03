<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%competition}}`.
 */
class m190416_073930_alter_competition extends Migration
{
     /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%competition}}', 'budget_from', "double(10,2) NOT NULL DEFAULT '0.00'");
        $this->addColumn('{{%competition}}', 'budget_to', "double(10,2) NOT NULL DEFAULT '0.00'");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('budget_from');
        $this->dropColumn('budget_to');
    }
}
