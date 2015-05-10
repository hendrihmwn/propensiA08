<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "proses_produksi_2".
 *
 * @property integer $id_produksi_2
 * @property integer $id_half_product
 * @property integer $id_product
 *
 * @property Produksi2 $idProduksi2
 * @property Product $idHalfProduct
 * @property Product $idProduct
 */
class ProsesProduksi2 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'proses_produksi_2';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_produksi_2', 'id_half_product', 'id_product'], 'required'],
            [['id_produksi_2', 'id_half_product', 'id_product'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_produksi_2' => 'Id Produksi 2',
            'id_half_product' => 'Id Half Product',
            'id_product' => 'Id Product',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProduksi2()
    {
        return $this->hasOne(Produksi2::className(), ['id_produksi_2' => 'id_produksi_2']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdHalfProduct()
    {
        return $this->hasOne(Product::className(), ['id_product' => 'id_half_product']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProduct()
    {
        return $this->hasOne(Product::className(), ['id_product' => 'id_product']);
    }
}
