<?php

use admin\components\Configs;
use yii\db\Migration;

/**
 * Class m210713_100519_init_user_profile
 */
class m210713_100519_init_user_profile extends Migration
{
    public function init()
    {
        $this->db = Configs::userDb();
        parent::init(); // TODO: Change the autogenerated stub
    }

    public function up()
    {
        $user_table = Configs::instance()->profileTable;
        $profile_table = Configs::instance()->profileTable;
        $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';

        $this->createTable($profile_table, [
            'user_id' => $this->primaryKey(),
            'full_name' => $this->string(),
            'avatar' => $this->text()->defaultValue(null),
            'cover' => $this->text()->defaultValue(null),
            'locale' => $this->string(32)->notNull(),
            'gender' => $this->smallInteger(1),
            'birthday' => $this->dateTime(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ], $tableOptions);

        $this->addForeignKey('fk_user', $profile_table, 'user_id', $user_table, 'id', 'cascade', 'cascade');
    }

    public function down()
    {
        $profile_table = Configs::instance()->profileTable;
        $this->dropForeignKey('fk_user', $profile_table);
        $this->dropTable($profile_table);
    }
}
