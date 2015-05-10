<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inventory_product".
 *
 * @property integer $id_inventory_product
 * @property integer $batas_min
 * @property double $total
 * @property integer $id_product
 *
 * @property Product $idProduct
 */
class Inventory_product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inventory_product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['batas_min', 'total', 'id_product'], 'required'],
            [['batas_min', 'id_product'], 'integer'],
            [['total'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_inventory_product' => 'Id Inventory Product',
            'batas_min' => 'Batas Min',
            'total' => 'Total',
            'id_product' => 'Id Product',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProduct()
    {
        return $this->hasOne(Product::className(), ['id_product' => 'id_product']);
    }
}
