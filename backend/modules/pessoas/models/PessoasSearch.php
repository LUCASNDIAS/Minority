<?php

namespace backend\modules\pessoas\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\pessoas\models\Pessoas;

/**
 * PessoasSearch represents the model behind the search form of `backend\modules\pessoas\models\Pessoas`.
 */
class PessoasSearch extends Pessoas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'local_id'], 'integer'],
            [['dono', 'nome', 'cpf', 'rg', 'end_cep', 'end_rua', 'end_nro', 'end_cpl', 'end_bairro', 'end_cidade', 'end_uf', 'residente', 'local_cargo', 'foto'], 'safe'],
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
        $query = Pessoas::find();

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
            'local_id' => $this->local_id,
        ]);

        $query->andFilterWhere(['like', 'dono', $this->dono])
            ->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'cpf', $this->cpf])
            ->andFilterWhere(['like', 'rg', $this->rg])
            ->andFilterWhere(['like', 'end_cep', $this->end_cep])
            ->andFilterWhere(['like', 'end_rua', $this->end_rua])
            ->andFilterWhere(['like', 'end_nro', $this->end_nro])
            ->andFilterWhere(['like', 'end_cpl', $this->end_cpl])
            ->andFilterWhere(['like', 'end_bairro', $this->end_bairro])
            ->andFilterWhere(['like', 'end_cidade', $this->end_cidade])
            ->andFilterWhere(['like', 'end_uf', $this->end_uf])
            ->andFilterWhere(['like', 'residente', $this->residente])
            ->andFilterWhere(['like', 'local_cargo', $this->local_cargo])
            ->andFilterWhere(['like', 'foto', $this->foto]);

        return $dataProvider;
    }
}
