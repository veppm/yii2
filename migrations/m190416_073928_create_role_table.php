<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%role}}`.
 */
class m190416_073928_create_role_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%role}}', [
            'role_id' => $this->primaryKey(),
            'role_name'=> "ENUM('Admin','Developer', 'Designer') NOT NULL DEFAULT 'Designer' UNIQUE",
            'description' => $this->string(200)->notNull(),
        ]);

        // $this->execute('ALTER TABLE user ADD CONSTRAINT fk_role_user FOREIGN KEY (role) REFERENCES role(role_id) ON UPDATE CASCADE ON DELETE CASCADE');
    }

    
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%role}}');
    }
}
