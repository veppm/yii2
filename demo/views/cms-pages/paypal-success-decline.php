<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use app\models\ContestForm;

$this->title = 'Payment Detail Page';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container-fluid">
    <div class="payment-content-section">
        <div class="row">
            <div class="col-md-12">
                <div class="contest-section">
                    <div class="content">
                        <?php if(\Yii::$app->request->get('success')==true && \Yii::$app->request->get('paymentId')!='') { ?>
                            <div class="alert alert-success" role="alert">Your payment has been processed!!</div>
                        <?php }  else if(\Yii::$app->request->get('success')==false) { ?>
                             <div class="alert alert-warning" role="alert">Your payment has been declined!!</div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
   $('html, body').animate({scrollTop:$(document).height()}, 'slow');
</script>



