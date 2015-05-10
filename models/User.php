<?php

namespace app\models;

use Yii;
use \yii\web\IdentityInterface;

/**
 * This is the model class for table "akun".
 *
 * @property integer $id_akun
 * @property string $username
 * @property string $password
 * @property string $role
 */
class user extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public $authKey = 'UsbersaMitraLogam';
   
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
    public function getId(){
        return $this->id_akun;
    }
    
    public static function findIdentity($id){
        return User::findOne(['id_akun'=>$id]);
    }
    
    public static function findByUsername($username)
    {
            
        if($hasil=User::findOne(['username' => $username])){
           
            return $hasil;

        }
        return null;
    }
    
    public function validatePassword($password,$username)
    {   
        $valid=User::findOne(['username' => $username , 'password' => md5($password), 'flag' => 1]);
        if(count($valid)==0){
            return false;
        }
        else{
            return true;
        }
    }
    
    public function getAuthKey()
    {
        return $this->authKey;
    }
    
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }


}
