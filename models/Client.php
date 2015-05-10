<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "client".
 *
 * @property integer $id_client
 * @property string $no_plant
 * @property integer $gate
 * @property string $nama
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
            [['no_plant', 'gate', 'nama', 'alamat', 'contact', 'flag'], 'required'],
            [['gate', 'flag'], 'integer'],
            [['no_plant'], 'string', 'max' => 10],
            [['nama'], 'string', 'max' => 30],
            [['alamat', 'contact'], 'string', 'max' => 50],
            [['no_plant', 'gate'], 'unique', 'targetAttribute' => ['no_plant', 'gate'], 'message' => 'The combination of No Plant and Gate has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_client' => 'Id Client',
            'no_plant' => 'No Plant',
            'gate' => 'Gate',
            'nama' => 'Nama',
            'alamat' => 'Alamat',
            'contact' => 'Contact',
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
