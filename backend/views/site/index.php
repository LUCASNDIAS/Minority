<?php

use yii\helpers\Html;
use yii\db\Query;
/* @var $this yii\web\View */

$this->title = Yii::$app->params['titulo'];
// var_dump(Yii::$app->user->identity->attributes['nome']);

?>
<div class="site-index">

    <div class="jumbotron">
        <h2><?= Yii::$app->user->identity['guerra']?></h2>

        <p class="lead">Use o menu ao para navegar pelo sistema e, caso tenha d&uacute;vidas ou sugest&otilde;es,
            entre em contato pelo<br />e-mail: <?= Yii::$app->params['supportEmail']; ?> ou pelo telefone:
<?= Yii::$app->params['adminTelefone']; ?>.</p>

       <!-- <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p> -->
    </div>

    <div class="body-content">
   
           <div class="row">
            <div class="col-lg-4" align="center">
                <h2>Locais</h2>

                <p>Cadastre e consulte locais da área da Unidade.</p>

                <p>
                <?= Html::a('Buscar', '@web/local/default/index', array('class'=>'btn btn-default'));?>
                <?= Html::a('Cadastrar', '@web/local/default/create', array('class'=>'btn btn-default'));?>
                </p>
            </div>
            <div class="col-lg-4" align="center">
                <h2>Minority Report</h2>

                <p>Visualize no mapa os principais locais da Unidade.</p>

                <p>
                <?= Html::a('Visualizar', '@web/mapa/', array('class'=>'btn btn-default', 'target' => '_blank'));?>
                </p>
            </div>
            <div class="col-lg-4" align="center">
                <h2>Pessoas</h2>

                <p>Cadastre e consulte pessoas que residem e/ou trabalham na área do 48º BPM.</p>

                <p>
                <?= Html::a('Buscar', '@web/pessoas/default/index', array('class'=>'btn btn-default'));?>
                <?= Html::a('Adicionar', '@web/pessoas/default/create', array('class'=>'btn btn-default'));?>
                </p>
            </div>
        </div>

    </div>
</div>
