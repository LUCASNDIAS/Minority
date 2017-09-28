<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\local\models\Local */

$this->title = Yii::t('app', 'Create Local');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Locals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="local-create">

    <?= $this->render('_form', [
        'model' => $model,
        'modelsPessoas' => $modelsPessoas,
        'modelTipo' => $modelTipo
    ]) ?>

</div>
