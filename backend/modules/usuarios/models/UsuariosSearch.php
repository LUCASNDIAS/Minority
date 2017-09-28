<?php

namespace backend\modules\usuarios\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\usuarios\models\Usuarios;

/**
 * UsuariosSearch represents the model behind the search form of `backend\modules\usuarios\models\Usuarios`.
 */
class UsuariosSearch extends Usuarios
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['nome', 'empresa', 'login', 'senha', 'cnpj', 'apelido', 'foto', 'authkey', 'accesstoken', 'user_permissions', 'npm', 'guerra', 'pg'], 'safe'],
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
        $query = Usuarios::find();

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

        $query->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'empresa', $this->empresa])
            ->andFilterWhere(['like', 'login', $this->login])
            ->andFilterWhere(['like', 'senha', $this->senha])
            ->andFilterWhere(['like', 'cnpj', $this->cnpj])
            ->andFilterWhere(['like', 'apelido', $this->apelido])
            ->andFilterWhere(['like', 'foto', $this->foto])
            ->andFilterWhere(['like', 'authkey', $this->authkey])
            ->andFilterWhere(['like', 'accesstoken', $this->accesstoken])
            ->andFilterWhere(['like', 'user_permissions', $this->user_permissions])
            ->andFilterWhere(['like', 'npm', $this->npm])
            ->andFilterWhere(['like', 'guerra', $this->guerra])
            ->andFilterWhere(['like', 'pg', $this->pg]);

        return $dataProvider;
    }
}
