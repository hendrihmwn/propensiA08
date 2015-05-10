<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "produksi_1".
 *
 * @property integer $id_produksi_1
 * @property string $waktu
 * @property double $jumlah_material
 * @property double $jumlah_terbuat
 * @property double $waste
 * @property integer $id_user
 * @property integer $flag
 *
 * @property Akun $idUser
 * @property ProsesProduksi1[] $prosesProduksi1s
 */
class Produksi1 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $id_material;
    public $id_half_product;

    public static function tableName()
    {
        return 'produksi_1';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['waktu', 'jumlah_material', 'jumlah_terbuat', 'waste', 'id_user', 'flag', 'id_material', 'id_half_product'], 'required'],
            [['waktu'], 'safe'],
            [['jumlah_material', 'jumlah_terbuat', 'waste'], 'number'],
            [['id_user', 'flag'], 'integer'],
            [['id_material'], 'integer', 'max' => 20],
            [['id_half_product'], 'integer', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_produksi_1' => 'Id Produksi 1',
            'waktu' => 'Waktu',
            'jumlah_material' => 'Jumlah Material',
            'jumlah_terbuat' => 'Jumlah Half-Product Terbuat',
            'waste' => 'Sisa Produksi',
            'id_user' => 'Id User',
            'flag' => 'Flag',
            'id_material' => 'Kode Material',
            'id_half_product' => 'Kode Half Produk',
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
    public function getProsesProduksi1s()
    {
        return $this->hasMany(ProsesProduksi1::className(), ['id_produksi_1' => 'id_produksi_1']);
    }
}
