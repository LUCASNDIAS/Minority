<?php

namespace backend\modules\local\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\local\models\Local;

/**
 * LocalSearch represents the model behind the search form of `backend\modules\local\models\Local`.
 */
class LocalSearch extends Local
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['dono', 'nome', 'cnpj', 'end_cep', 'end_rua', 'end_nro', 'end_cpl', 'end_bairro', 'end_cidade', 'end_uf', 'end_lat', 'end_long', 'fachada', 'hora_inicio', 'hora_fim', 'cia', 'observacoes'], 'safe'],
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
        $query = Local::find();

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
        ]);

        $query->andFilterWhere(['like', 'dono', $this->dono])
            ->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'cnpj', $this->cnpj])
            ->andFilterWhere(['like', 'end_cep', $this->end_cep])
            ->andFilterWhere(['like', 'end_rua', $this->end_rua])
            ->andFilterWhere(['like', 'end_nro', $this->end_nro])
            ->andFilterWhere(['like', 'end_cpl', $this->end_cpl])
            ->andFilterWhere(['like', 'end_bairro', $this->end_bairro])
            ->andFilterWhere(['like', 'end_cidade', $this->end_cidade])
            ->andFilterWhere(['like', 'end_uf', $this->end_uf])
            ->andFilterWhere(['like', 'end_lat', $this->end_lat])
            ->andFilterWhere(['like', 'end_long', $this->end_long])
            ->andFilterWhere(['like', 'fachada', $this->fachada])
            ->andFilterWhere(['like', 'hora_inicio', $this->hora_inicio])
            ->andFilterWhere(['like', 'hora_fim', $this->hora_fim])
            ->andFilterWhere(['like', 'cia', $this->cia])
            ->andFilterWhere(['like', 'observacoes', $this->observacoes]);

        return $dataProvider;
    }
}
