<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\pessoas\models\Pessoas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pessoas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'dono')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cpf')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rg')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'end_cep')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'end_rua')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'end_nro')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'end_cpl')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'end_bairro')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'end_cidade')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'end_uf')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'residente')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'local_id')->textInput() ?>

    <?= $form->field($model, 'local_cargo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'foto')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
