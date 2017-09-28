<?php

namespace backend\modules\veiculos\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\veiculos\models\Veiculos;

/**
 * VeiculosSearch represents the model behind the search form of `backend\modules\veiculos\models\Veiculos`.
 */
class VeiculosSearch extends Veiculos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'pessoa_id', 'local_id'], 'integer'],
            [['placa', 'marca', 'modelo', 'cor'], 'safe'],
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
        $query = Veiculos::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'pessoa_id' => $this->pessoa_id,
            'local_id' => $this->local_id,
        ]);

        $query->andFilterWhere(['like', 'placa', $this->placa])
            ->andFilterWhere(['like', 'marca', $this->marca])
            ->andFilterWhere(['like', 'modelo', $this->modelo])
            ->andFilterWhere(['like', 'cor', $this->cor]);

        return $dataProvider;
    }
}
