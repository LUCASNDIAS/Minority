<?php

namespace backend\modules\atividade\models;

/**
 * This is the ActiveQuery class for [[Atividade]].
 *
 * @see Atividade
 */
class AtividadeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Atividade[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Atividade|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
