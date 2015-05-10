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
 * @property integer $flag
 *
 * @property LogKegiatan[] $logKegiatans
 * @property PembelianMaterial[] $pembelianMaterials
 * @property Penjualan[] $penjualans
 * @property Pesan[] $pesans
 * @property Produksi1[] $produksi1s
 * @property Produksi2[] $produksi2s
 */
class Akun extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $old_password;
    public $confirm_password;
    public $new_password;
    public $retype_password;
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
            [['username', 'password', 'role', 'flag','old_password','new_password','retype_password', 'confirm_password'], 'required'],
            [['flag'], 'integer'],
            [['username'], 'string', 'max' => 30],
            [['password'], 'string', 'max' => 255],
            [['old_password'],'string', 'max' => 255],
            [['new_password'],'string', 'max' => 255],
            array('confirm_password','compare','compareAttribute'=>'password','message'=>'Confirm password dan password tidak sama'),
            array('retype_password','compare','compareAttribute'=>'new_password','message'=>'Retype password dan New password tidak sama'),
            [['role'], 'string', 'max' => 10],
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
            'username' => 'Username *',
            'password' => 'Password *',
            'confirm_password'=>'Confirm password *',
            'new_password'=>'New password *',
            'old_password'=>'Old password *',
            'retype_password'=>'Retype password *',
            'role' => 'Role *',
            'flag' => 'Flag',
           
      
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLogKegiatans()
    {
        return $this->hasMany(LogKegiatan::className(), ['id_user' => 'id_akun']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPembelianMaterials()
    {
        return $this->hasMany(PembelianMaterial::className(), ['id_user' => 'id_akun']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPenjualans()
    {
        return $this->hasMany(Penjualan::className(), ['id_user' => 'id_akun']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPesans()
    {
        return $this->hasMany(Pesan::className(), ['id_user' => 'id_akun']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduksi1s()
    {
        return $this->hasMany(Produksi1::className(), ['id_user' => 'id_akun']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduksi2s()
    {
        return $this->hasMany(Produksi2::className(), ['id_user' => 'id_akun']);
    }
}
