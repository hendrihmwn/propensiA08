<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inventory_material".
 *
 * @property integer $id_inventory_material
 * @property integer $batas_min
 * @property double $total
 * @property integer $id_material
 *
 * @property Material $idMaterial
 */
class Inventory_material extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inventory_material';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['batas_min', 'total', 'id_material'], 'required'],
            [['batas_min', 'id_material'], 'integer'],
            [['total'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_inventory_material' => 'Id Inventory Material',
            'batas_min' => 'Batas Min',
            'total' => 'Total',
            'id_material' => 'Id Material',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdMaterial()
    {
        return $this->hasOne(Material::className(), ['id_material' => 'id_material']);
    }
}
