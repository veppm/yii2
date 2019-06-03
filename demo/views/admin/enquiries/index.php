<?php


use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CompetitionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Contact us(Enquiries) List';
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
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'layout'       => "{items}\n{pager}",
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'name',
                        'email',
                        'message:ntext',
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
                        [
                            'class' => 'yii\grid\ActionColumn',
                            'template' => '{delete}',
                        ],
                    ],
                ]); ?>
            </div>
        </div>
    </div>
</section>


