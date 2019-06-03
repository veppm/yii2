<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\Tabs; 
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\Role;

use yii\helpers\Url;

?>


<nav class="navbar" role="navigation">
  <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
      </button>
      <div class="logo">
         <a href="<?=Yii::$app->homeUrl;?>"><img src="<?php echo Url::base(true) ?>/user-assets/images/logo_w.png" alt="logo" width="auto" class="responsive_logo"></a>
      </div>
  </div>
  <div class="navbar-collapse collapse">
    <ul class="nav navbar-nav navbar-right">
      <?php if (!Yii::$app->user->isGuest) {  ?>
        <li><a href="<?=Url::base()?>/contest/">Contest</a></li>
      <?php } ?>
      <li><a href="<?=Url::base()?>/cms-pages/how-it-works">How it works</a></li>
      <li><a href="<?= (Yii::$app->user->isGuest) ?  Url::base().'/user/login' : Url::base().'/user/'.Yii::$app->user->getId();?>">Begin</a></li>
      <!-- <li><a href="javascript:void(0)">Lookbook </a></li> -->
      <li><a href="javascript:void(0)">Contact </a></li>
      <li>
        <?php if (Yii::$app->user->isGuest) { ?>
          <a href="<?=Url::base()?>/user/login"><span>Sign in</span></a>
        <?php } else { ?>
          <?= Html::a('Logout ('. Yii::$app->user->identity->username . ')', ['/user/logout'],['data-method'=>'post']) ?>
        <?php } ?>
      </li>
      <?php if (!Yii::$app->user->isGuest) {  ?>
        <li>
          <?php // echo  Html::a('Contest', ['/contest/index'],['class'=>'']) ?>
            <a href="<?=Url::base().'/user/'.Yii::$app->user->getId();?>"><span>Dashboard</span></a>
        </li>
      <?php } ?>
    </ul>
  </div>
</nav>