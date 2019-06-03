<?php


use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CompetitionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Competitions List';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="content-header">
    <h1> <?= $this->title?></h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
                </div>
                <p><?php //  Html::a('Create Competition', ['create'], ['class' => 'btn btn-success']) ?></p>
                <?php // echo "<pre>"; print_r(\Yii::$app->getBaseUrl()); exit; ?>
                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'layout'       => "{items}\n{pager}",
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        // 'id',
                        'title',
                        'body:ntext',
                        [
                            'attribute' => 'budgets',
                            'value' => function ($model) {
                                return $model->budget_from.'-'.$model->budget_to;
                            },
                        ],
                        [
                            'attribute' => 'created_at',
                            'value' => function ($model) {
                                if (extension_loaded('intl')) {
                                    return Yii::t('user', '{0, date, MMMM dd, YYYY HH:mm}', [$model->created_at]);
                                } else {
                                    return date('Y-m-d G:i:s', $model->created_at);
                                }
                            },
                        ],
                        // 'updated_at',
                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>
            </div>
        </div>
    </div>
</section>
