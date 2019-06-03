<?php



/* @var $this \yii\web\View */

/* @var $content string */



use yii\helpers\Html;

use yii\helpers\Url;



//Url::base();         // /myapp

//echo Url::base(true);     // http(s)://example.com/myapp - depending on current schema

//Url::base('https');  // https://example.com/myapp

//Url::base('http');   // http://example.com/myapp

//echo Url::base(); 

?>

  <?= $this->render('@app/views/layouts/frontend/includes/css.php')  ?>



  </head>

  <body>



  <!-- Main Header section -->

  <div class="main_header" id="arkotte_<?=Yii::$app->controller->action->id?>">	

    <div class="container-fluid">

      <?= $this->render('@app/views/layouts/frontend/includes/nav-header.php')  ?>

      <div class="banner_content">

        <h1>Build the Feeling</h1>

        <p class="mr-btm">Get a custom design you’ll love with our global  platform of architects and designers.</p>

        <!--  <button type="button" class="banner_btn btn-defult btn-xs">Begin</button> -->

        <a href="<?= (Yii::$app->user->isGuest) ?  Url::base().'/user/login' : Url::base().'/user/'.Yii::$app->user->getId();?>" class="banner_btn btn-defult btn-xs">Begin</a>

      </div>

    </div>

  </div>

  <!-- / Main Header section -->





