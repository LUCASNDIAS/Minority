<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\pessoas\models\Pessoas */

$this->title = Yii::t('app', 'Create Pessoas');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pessoas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pessoas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
