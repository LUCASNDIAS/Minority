<?php

namespace backend\modules\local\models;

/**
 * This is the ActiveQuery class for [[Localtipo]].
 *
 * @see Localtipo
 */
class LocaltipoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Localtipo[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Localtipo|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
