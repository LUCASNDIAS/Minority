<?php

namespace backend\modules\local\models;

/**
 * This is the ActiveQuery class for [[Localatividade]].
 *
 * @see Localatividade
 */
class LocalatividadeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Localatividade[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Localatividade|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
