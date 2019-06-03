<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Competition */

$this->title = 'Create Competition';
$this->params['breadcrumbs'][] = ['label' => 'Competitions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="competition-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
