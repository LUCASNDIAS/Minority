<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\telefones\models\Telefones */

$this->title = Yii::t('app', 'Create Telefones');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Telefones'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="telefones-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
