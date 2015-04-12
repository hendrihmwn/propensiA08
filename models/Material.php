<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "material".
 *
 * @property integer $id_barang
 * @property string $kode
 * @property string $nama
 * @property double $tebal
 * @property string $jenis_plat
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
            [['kode', 'nama', 'tebal', 'jenis_plat'], 'required'],
            [['tebal'], 'number'],
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
            'kode' => 'Kode',
            'nama' => 'Nama',
            'tebal' => 'Tebal',
            'jenis_plat' => 'Jenis Plat',
        ];
    }
}
