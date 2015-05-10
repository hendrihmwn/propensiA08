<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pesan".
 *
 * @property integer $id_pesan
 * @property string $judul
 * @property string $waktu
 * @property string $isi
 * @property integer $id_supervisor
 * @property integer $id_user
 *
 * @property Akun $idSupervisor
 * @property Akun $idUser
 */
class Pesan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pesan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['judul', 'waktu', 'isi', 'id_supervisor', 'id_user'], 'required'],
            [['waktu'], 'safe'],
            [['isi'], 'string'],
            [['id_supervisor', 'id_user'], 'integer'],
            [['judul'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pesan' => 'Id Pesan',
            'judul' => 'Judul',
            'waktu' => 'Waktu',
            'isi' => 'Isi',
            'id_supervisor' => 'Id Supervisor',
            'id_user' => 'Id User',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdSupervisor()
    {
        return $this->hasOne(Akun::className(), ['id_akun' => 'id_supervisor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser()
    {
        return $this->hasOne(Akun::className(), ['id_akun' => 'id_user']);
    }
}
