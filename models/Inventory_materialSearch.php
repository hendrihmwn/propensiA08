<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Inventory_material;

/**
 * Inventory_materialSearch represents the model behind the search form about `app\models\Inventory_material`.
 */
class Inventory_materialSearch extends Inventory_material
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_inventory_material', 'batas_min', 'id_material'], 'integer'],
            [['total'], 'number'],
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
        $query = Inventory_material::find();

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
            'id_inventory_material' => $this->id_inventory_material,
            'batas_min' => $this->batas_min,
            'total' => $this->total,
            'id_material' => $this->id_material,
        ]);

        return $dataProvider;
    }
}
