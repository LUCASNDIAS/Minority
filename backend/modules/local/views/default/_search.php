<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\local\models\LocalSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="local-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'dono') ?>

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'cnpj') ?>

    <?= $form->field($model, 'end_cep') ?>

    <?php // echo $form->field($model, 'end_rua') ?>

    <?php // echo $form->field($model, 'end_nro') ?>

    <?php // echo $form->field($model, 'end_cpl') ?>

    <?php // echo $form->field($model, 'end_bairro') ?>

    <?php // echo $form->field($model, 'end_cidade') ?>

    <?php // echo $form->field($model, 'end_uf') ?>

    <?php // echo $form->field($model, 'end_lat') ?>

    <?php // echo $form->field($model, 'end_long') ?>

    <?php // echo $form->field($model, 'fachada') ?>

    <?php // echo $form->field($model, 'hora_inicio') ?>

    <?php // echo $form->field($model, 'hora_fim') ?>

    <?php // echo $form->field($model, 'cia') ?>

    <?php // echo $form->field($model, 'observacoes') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
