<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "proses_produksi_1".
 *
 * @property integer $id_material
 * @property integer $id_produksi_1
 * @property integer $id_product
 *
 * @property Material $idMaterial
 * @property Produksi1 $idProduksi1
 * @property Product $idProduct
 */
class ProsesProduksi1 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'proses_produksi_1';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_material', 'id_produksi_1', 'id_product'], 'required'],
            [['id_material', 'id_produksi_1', 'id_product'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_material' => 'Id Material',
            'id_produksi_1' => 'Id Produksi 1',
            'id_product' => 'Id Product',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdMaterial()
    {
        return $this->hasOne(Material::className(), ['id_material' => 'id_material']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProduksi1()
    {
        return $this->hasOne(Produksi1::className(), ['id_produksi_1' => 'id_produksi_1']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProduct()
    {
        return $this->hasOne(Product::className(), ['id_product' => 'id_product']);
    }
}
