<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "akun".
 *
 * @property integer $id_akun
 * @property string $username
 * @property string $password
 * @property string $role
 */
class Akun extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'akun';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'role'], 'required'],
            [['username'], 'string', 'max' => 30],
            [['password', 'role'], 'string', 'max' => 10],
            [['username'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_akun' => 'Id Akun',
            'username' => 'Username',
            'password' => 'Password',
            'role' => 'Role',
        ];
    }
}
