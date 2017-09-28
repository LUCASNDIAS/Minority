<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\tipolocal\models\Tipolocal */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Tipolocal',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tipolocals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="tipolocal-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
