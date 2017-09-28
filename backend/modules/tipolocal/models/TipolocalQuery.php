<?php

namespace backend\modules\tipolocal\models;

/**
 * This is the ActiveQuery class for [[Tipolocal]].
 *
 * @see Tipolocal
 */
class TipolocalQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Tipolocal[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Tipolocal|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
