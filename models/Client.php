<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "client".
 *
 * @property integer $id_client
 * @property string $nama
 * @property string $no_plant
 * @property integer $gate
 * @property string $alamat
 * @property string $contact
 * @property integer $flag
 *
 * @property Pemesanan[] $pemesanans
 */
class Client extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'client';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'no_plant', 'gate', 'alamat', 'contact', 'flag'], 'required'],
            [['gate', 'flag'], 'integer'],
            [['nama'], 'string', 'max' => 30],
            [['no_plant'], 'string', 'max' => 10],
            [['alamat', 'contact'], 'string', 'max' => 50],
            [['nama', 'no_plant', 'gate'], 'unique', 'targetAttribute' => ['nama', 'no_plant', 'gate'], 'message' => 'The combination of Nama, No Plant and Gate has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_client' => 'Id Client',
            'nama' => 'Nama *',
            'no_plant' => 'No Plant *',
            'gate' => 'Gate *',
            'alamat' => 'Alamat *',
            'contact' => 'Contact *',
            'flag' => 'Flag',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPemesanans()
    {
        return $this->hasMany(Pemesanan::className(), ['id_client' => 'id_client']);
    }
}
