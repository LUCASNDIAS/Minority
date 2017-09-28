<?php

namespace backend\modules\telefones\models;

/**
 * This is the ActiveQuery class for [[Telefones]].
 *
 * @see Telefones
 */
class TelefonesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Telefones[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Telefones|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
