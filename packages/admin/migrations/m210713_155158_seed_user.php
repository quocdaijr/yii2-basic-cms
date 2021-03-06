<?php

use admin\components\Configs;
use admin\constants\Constant;
use yii\db\Migration;
use function Ramsey\Uuid\v4;

/**
 * Class m210713_155158_seed_user
 */
class m210713_155158_seed_user extends Migration
{
    public function init()
    {
        $this->db = Configs::userDb();
        parent::init(); // TODO: Change the autogenerated stub
    }

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $user_table = Configs::instance()->profileTable;
        $profile_table = Configs::instance()->profileTable;

        $this->insert($user_table, [
            'id' => 1,
            'uuid' => v4(),
            'username' => 'webmaster',
            'email' => 'webmaster@example.com',
            'phone' => '0797113505',
            'password_hash' => Yii::$app->getSecurity()->generatePasswordHash('webmaster'),
            'auth_key' => Yii::$app->getSecurity()->generateRandomString(),
            'status' => Constant::STATUS_USER_ACTIVE,
            'created_at' => (new DateTime())->format("Y-m-d H:i:s"),
            'updated_at' => (new DateTime())->format("Y-m-d H:i:s")
        ]);
        $this->insert($user_table, [
            'id' => 2,
            'uuid' => v4(),
            'username' => 'manager',
            'email' => 'manager@example.com',
            'phone' => '0797113505',
            'password_hash' => Yii::$app->getSecurity()->generatePasswordHash('manager'),
            'auth_key' => Yii::$app->getSecurity()->generateRandomString(),
            'status' => Constant::STATUS_USER_ACTIVE,
            'created_at' => (new DateTime())->format("Y-m-d H:i:s"),
            'updated_at' => (new DateTime())->format("Y-m-d H:i:s")
        ]);
        $this->insert($user_table, [
            'id' => 3,
            'uuid' => v4(),
            'username' => 'user',
            'email' => 'user@example.com',
            'phone' => '0797113505',
            'password_hash' => Yii::$app->getSecurity()->generatePasswordHash('user'),
            'auth_key' => Yii::$app->getSecurity()->generateRandomString(),
            'status' => Constant::STATUS_USER_ACTIVE,
            'created_at' => (new DateTime())->format("Y-m-d H:i:s"),
            'updated_at' => (new DateTime())->format("Y-m-d H:i:s")
        ]);

        $this->insert($profile_table, [
            'user_id' => 1,
            'locale' => Yii::$app->sourceLanguage,
            'full_name' => 'Keylor Navas',
            'gender' => Constant::USER_GENDER_MALE,
            'created_at' => (new DateTime())->format("Y-m-d H:i:s"),
            'updated_at' => (new DateTime())->format("Y-m-d H:i:s")
        ]);
        $this->insert($profile_table, [
            'user_id' => 2,
            'locale' => Yii::$app->sourceLanguage,
            'full_name' => 'Cristiano Ronaldo',
            'gender' => Constant::USER_GENDER_MALE,
            'created_at' => (new DateTime())->format("Y-m-d H:i:s"),
            'updated_at' => (new DateTime())->format("Y-m-d H:i:s")
        ]);
        $this->insert($profile_table, [
            'user_id' => 3,
            'locale' => Yii::$app->sourceLanguage,
            'full_name' => 'Lionel Messi',
            'gender' => Constant::USER_GENDER_MALE,
            'created_at' => (new DateTime())->format("Y-m-d H:i:s"),
            'updated_at' => (new DateTime())->format("Y-m-d H:i:s")
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210713_155158_seed_user cannot be reverted.\n";

        return false;
    }
}
