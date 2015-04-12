<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "supplier".
 *
 * @property integer $Id_supplier
 * @property string $nama
 * @property string $alamat
 * @property string $contact
 */
class Supplier extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'supplier';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'alamat', 'contact'], 'required'],
            [['nama'], 'string', 'max' => 30],
            [['alamat', 'contact'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id_supplier' => 'Id Supplier',
            'nama' => 'Nama',
            'alamat' => 'Alamat',
            'contact' => 'Contact',
        ];
    }
}
