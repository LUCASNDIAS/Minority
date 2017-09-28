<?php

namespace backend\modules\pessoas\models;

/**
 * This is the ActiveQuery class for [[Pessoas]].
 *
 * @see Pessoas
 */
class PessoasQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Pessoas[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Pessoas|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
