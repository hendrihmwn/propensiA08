<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "supplier".
 *
 * @property integer $id_supplier
 * @property string $nama
 * @property string $alamat
 * @property string $contact
 * @property integer $flag
 *
 * @property Penyuplaian[] $penyuplaians
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
            [['nama', 'alamat', 'contact', 'flag'], 'required'],
            [['flag'], 'integer'],
            [['nama'], 'string', 'max' => 30],
            [['alamat', 'contact'], 'string', 'max' => 50],
            [['nama'], 'unique'],
            [['nama'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_supplier' => 'Id Supplier',
            'nama' => 'Nama *',
            'alamat' => 'Alamat *',
            'contact' => 'Contact *',
            'flag' => 'Flag',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPenyuplaians()
    {
        return $this->hasMany(Penyuplaian::className(), ['id_supplier' => 'id_supplier']);
    }
}
