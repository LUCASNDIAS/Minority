<?php

namespace backend\modules\mapa\controllers;

use yii\web\Controller;

/**
 * Default controller for the `mapa` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->renderPartial('index');
    }
}
