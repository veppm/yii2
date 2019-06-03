<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Competition */

$this->title = 'Update Competition: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Competitions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<section class="content-header">
    <h1> <?= $this->title?> <?= Html::a('Go Back', ['index'], ['class' => 'btn btn-info', 'style'=>'float:right;']) ?>  </h1> 
</section>
<section class="content">
    <div class="row">
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
                </div>
                <div class="panel-body">
                    <?= $this->render('../_form', [
                        'model' => $model,
                    ]) ?>
                </div>
             </div>
        </div>
    </div>
</section>
            
