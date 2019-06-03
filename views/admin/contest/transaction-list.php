<?php


use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

$this->title = 'Transaction List with Contest';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="content-header">
    <h1> <?= $this->title?></h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
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
                        'order_id',
                        [
                           'attribute'=>'contest_title',
                            'value' => function ($model) {
                               return '
                                    <a  href="' . Url::to(['/admin/contest/contest-information', 'contest-proposal' => $model['id']]). '">'.ucfirst(Yii::t('user', $model['contest_title'])).'</a>';
                            },
                            'format' => 'raw', 
                        ],
                        [
                            'attribute' => 'user_id',
                            'label' => 'Username',
                            'value' => function ($model) {
                                return $model['username'];
                            },
                        ],
                        'design_package',
                        'transaction_id:ntext',
                        [
                            'label' => 'Paid Amount',
                            'value' => 'transaction_amount',
                        ],
                        [
                            'attribute'=>'payment_status',
                            'filter'=>["pending"=>"Pending","success"=>"Success"],
                            'value' => function ($model) {
                                if($model['payment_status']!='success'){
                                    return '<div class="text-center">
                                        <span class="btn btn-xs btn-danger">' . Yii::t('user', 'Pending') . '</span>
                                    </div>';
                                } else {
                                    return '<div class="text-center">
                                        <span class="btn btn-xs btn-success">' . Yii::t('user', 'Success') . '</span>
                                    </div>';
                                }   
                            },
                            'format' => 'raw',

                        ],
                        [
                            'attribute' => 'payment_date',
                            'value' => function ($model) {
                                if (extension_loaded('intl')) {
                                    return ($model['payment_date']) ? Yii::t('user', '{0, date, MMMM dd, YYYY HH:mm}', [$model['payment_date']]) : 'Not Set';
                                } else {
                                    return date('Y-m-d G:i:s', $model['payment_date']);
                                }
                            },
                        ],
                    ],
                ]); ?>
            </div>
        </div>
    </div>
</section>
