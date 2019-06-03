<?php


use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CompetitionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Competitions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="competition-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Competition', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?php // echo "<pre>"; print_r(\Yii::$app->getBaseUrl()); exit; ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'title',
            'body:ntext',
            'created_at',
            //'updated_at',
            //'budget_from',
            //'budget_to',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
