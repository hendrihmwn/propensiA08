<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Produksi2;

/**
 * Produksi2Search represents the model behind the search form about `app\models\Produksi2`.
 */
class Produksi2Search extends Produksi2
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_produksi_2', 'id_user'], 'integer'],
            [['waktu'], 'safe'],
            [['jumlah_half_product', 'jumlah_terbuat', 'waste'], 'number'],
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
        $query = Produksi2::find();

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
            'id_produksi_2' => $this->id_produksi_2,
            'waktu' => $this->waktu,
            'jumlah_half_product' => $this->jumlah_half_product,
            'jumlah_terbuat' => $this->jumlah_terbuat,
            'waste' => $this->waste,
            'id_user' => $this->id_user,
        ]);

        return $dataProvider;
    }
}
