<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property integer $id_barang
 * @property string $kode
 * @property string $nama
 * @property integer $package
 * @property double $panjang
 * @property double $lebar
 * @property double $berat
 */
class Product extends \yii\db\ActiveRecord
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
            [['kode', 'nama', 'package', 'panjang', 'lebar', 'berat'], 'required'],
            [['package'], 'integer'],
            [['panjang', 'lebar', 'berat'], 'number'],
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
            'kode' => 'Kode',
            'nama' => 'Nama',
            'package' => 'Package',
            'panjang' => 'Panjang',
            'lebar' => 'Lebar',
            'berat' => 'Berat',
        ];
    }
}
