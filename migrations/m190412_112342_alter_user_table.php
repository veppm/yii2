<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m190412_112342_alter_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'role', "ENUM('0','1', '2','3') NOT NULL DEFAULT '0' COMMENT '0=>No Role, 1=> Admin, 2=> Developer, 3=> Designer'");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('role');
    }
}
