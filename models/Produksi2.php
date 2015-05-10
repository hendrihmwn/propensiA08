<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "produksi_2".
 *
 * @property integer $id_produksi_2
 * @property string $waktu
 * @property double $jumlah_half_product
 * @property double $jumlah_terbuat
 * @property double $waste
 * @property integer $id_user
 *
 * @property Akun $idUser
 * @property ProsesProduksi2[] $prosesProduksi2s
 */
class Produksi2 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    
    public $id_product;
    public $id_half_product;
    
    public static function tableName()
    {
        return 'produksi_2';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['waktu', 'jumlah_half_product', 'jumlah_terbuat', 'waste', 'id_user', 'id_half_product', 'id_product'], 'required'],
            [['waktu'], 'safe'],
            [['jumlah_half_product', 'jumlah_terbuat', 'waste'], 'number'],
            [['id_user'], 'integer'],
            [['id_half_product'], 'integer', 'max' => 20],
            [['id_product'], 'integer', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_produksi_2' => 'Id Produksi 2',
            'waktu' => 'Waktu',
            'jumlah_half_product' => 'Jumlah Half Product',
            'jumlah_terbuat' => 'Jumlah Product',
            'waste' => 'Waste',
            'id_user' => 'Id User',
            'id_product' => 'Kode Product',
            'id_half_product' => 'Kode Half-Product'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser()
    {
        return $this->hasOne(Akun::className(), ['id_akun' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProsesProduksi2s()
    {
        return $this->hasMany(ProsesProduksi2::className(), ['id_produksi_2' => 'id_produksi_2']);
    }
}
