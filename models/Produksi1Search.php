<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Produksi1;

/**
 * Produksi1Search represents the model behind the search form about `app\models\Produksi1`.
 */
class Produksi1Search extends Produksi1
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_produksi_1', 'id_user', 'flag'], 'integer'],
            [['waktu'], 'safe'],
            [['jumlah_material', 'jumlah_terbuat', 'waste'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Produksi1::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_produksi_1' => $this->id_produksi_1,
            'waktu' => $this->waktu,
            'jumlah_material' => $this->jumlah_material,
            'jumlah_terbuat' => $this->jumlah_terbuat,
            'waste' => $this->waste,
            'id_user' => $this->id_user,
            'flag' => $this->flag,
        ]);

        return $dataProvider;
    }
}
