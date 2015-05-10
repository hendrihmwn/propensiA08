<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property integer $id_product
 * @property string $kode
 * @property string $nama
 * @property integer $package
 * @property double $panjang
 * @property double $lebar
 * @property double $berat
 * @property integer $flag
 *
 * @property Inventory[] $inventories
 * @property Pemesanan[] $pemesanans
 * @property ProduksiHalfProduct[] $produksiHalfProducts
 * @property Produksi2[] $idProduksi2s
 * @property ProduksiProduct[] $produksiProducts
 * @property ProsesProduksi1[] $prosesProduksi1s
 */
class Halfproduct extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode', 'nama', 'package', 'panjang', 'lebar', 'berat', 'flag'], 'required'],
            [['package', 'flag'], 'integer'],
            [['panjang', 'lebar', 'berat'], 'number','min'=>1],
            [['kode'], 'string', 'max' => 10],
            [['nama'], 'string', 'max' => 20],
            [['kode', 'package'], 'unique', 'targetAttribute' => ['kode', 'package'], 'message' => 'The combination of Kode and Package has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_product' => 'Id Product',
            'kode' => 'Kode *',
            'nama' => 'Nama *',
            'package' => 'Package',
            'panjang' => 'Panjang (cm) *',
            'lebar' => 'Lebar (cm) *',
            'berat' => 'Berat (kg) *',
            'flag' => 'Flag',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInventories()
    {
        return $this->hasMany(Inventory::className(), ['id_product' => 'id_product']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPemesanans()
    {
        return $this->hasMany(Pemesanan::className(), ['id_product' => 'id_product']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduksiHalfProducts()
    {
        return $this->hasMany(ProduksiHalfProduct::className(), ['id_half_product' => 'id_product']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProduksi2s()
    {
        return $this->hasMany(Produksi2::className(), ['id_produksi_2' => 'id_produksi_2'])->viaTable('produksi_product', ['id_product' => 'id_product']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduksiProducts()
    {
        return $this->hasMany(ProduksiProduct::className(), ['id_product' => 'id_product']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProsesProduksi1s()
    {
        return $this->hasMany(ProsesProduksi1::className(), ['id_product' => 'id_product']);
    }
}
