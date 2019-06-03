<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%competition}}`.
 */
class m190416_073929_create_competition extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%competition}}', [
            'id'                   => $this->primaryKey(),
            'user_id'              => $this->integer()->notNull()->unsigned(),
            'title'                => $this->string(200)->notNull(),
            'body'                 => $this->text()->null(),
            'created_at'           => $this->integer()->null(),
            'updated_at'           => $this->integer()->null()
        ]);
        
         $this->createTable('{{%competition_comment}}', [
            'id'              => $this->primaryKey(),
            'user_id'         => $this->integer()->notNull(),
            'competition_id'  => $this->integer()->notNull()->unsigned(),
            'body'            => $this->string(255)->null(),
            'created_at'      => $this->integer()->null(),
            'updated_at'      => $this->integer()->null()
        ]);

        $this->createTable('{{%competition_rating}}', [
            'id'              => $this->primaryKey(),
            'user_id'         => $this->integer()->notNull(),
            'competition_id'  => $this->integer()->notNull()->unsigned(),
            'rating'          => $this->integer(11)->notNull()->defaultValue(0),
            'created_at'      => $this->integer()->null(),
            'updated_at'      => $this->integer()->null()
        ]);

        // $this->execute('ALTER TABLE competition ADD CONSTRAINT fk_competition_user FOREIGN KEY (user_id) REFERENCES user(id) ON UPDATE CASCADE ON DELETE CASCADE');
        // $this->execute('ALTER TABLE competition_comment ADD CONSTRAINT fk_competition_comment FOREIGN KEY (competition_id) REFERENCES competition(id) ON UPDATE CASCADE ON DELETE CASCADE');
        // $this->execute('ALTER TABLE competition_rating ADD CONSTRAINT fk_competition_rating FOREIGN KEY (competition_id) REFERENCES competition(id) ON UPDATE CASCADE ON DELETE CASCADE'); 
    }

    
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%competition}}');
        $this->dropTable('{{%competition_comment}}');
        $this->dropTable('{{%competition_rating}}');
    }
}
