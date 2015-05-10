<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "material".
 *
 * @property integer $id_material
 * @property string $kode
 * @property string $nama
 * @property double $tebal
 * @property string $jenis_plat
 * @property integer $flag
 *
 * @property InventoryMaterial[] $inventoryMaterials
 * @property Penyuplaian[] $penyuplaians
 * @property ProsesProduksi1[] $prosesProduksi1s
 */
class Material extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'material';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode', 'nama', 'tebal', 'jenis_plat', 'flag'], 'required'],
            [['tebal'], 'number','min'=>1],
            [['flag'], 'integer'],
            [['kode'], 'string', 'max' => 10],
            [['nama', 'jenis_plat'], 'string', 'max' => 20],
            [['kode'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_material' => 'Id Material',
            'kode' => 'Kode *',
            'nama' => 'Nama *',
            'tebal' => 'Tebal (cm) *',
            'jenis_plat' => 'Jenis Plat *',
            'flag' => 'Flag',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInventoryMaterials()
    {
        return $this->hasMany(InventoryMaterial::className(), ['id_material' => 'id_material']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPenyuplaians()
    {
        return $this->hasMany(Penyuplaian::className(), ['id_material' => 'id_material']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProsesProduksi1s()
    {
        return $this->hasMany(ProsesProduksi1::className(), ['id_material' => 'id_material']);
    }
}
