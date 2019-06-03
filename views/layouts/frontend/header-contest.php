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

use app\models\Profile;

use yii\helpers\Url;



//Url::base();         // /myapp

//echo Url::base(true);     // http(s)://example.com/myapp - depending on current schema

//Url::base('https');  // https://example.com/myapp

//Url::base('http');   // http://example.com/myapp

//echo Url::base(); 



$case = Yii::$app->controller->id.'-'.Yii::$app->controller->action->id;



// echo "====".$case;

$bottomText = '';

$heading   = '';

switch ($case) {
  case 'security-login':
    $heading = 'Login';
    $bottomText = "Get a custom design you’ll love with our global platform of architects and designers.";
    break;
  case 'contest-index':
    $heading    = 'Inspiration';
    $bottomText = 'Choose what designs inspire and excite you. This will help our designers understand what you want in your dream home';
    break; 
  case 'contest-browse-contest':
    $heading    = 'Browse Contest';
    $bottomText = 'Enter as many contests as you would like, entry is free';
    break;  
  case 'profile-show':
    $heading    = ucfirst(Html::encode($this->title)); // ucfirst(\Yii::$app->user->identity->username);
    $bottomText = 'Welcome to your dashboard';
    break; 
  default:
      $heading    = Html::encode($this->title);
      $bottomText = '';
      break;  

}



?>



    <?= $this->render('@app/views/layouts/frontend/includes/css.php')  ?>

    

  </head>

  <body>



  <!-- Main Header section -->

  <!--  Yii::$app->controller->action->id -->

  <div class="section_second <?=(in_array(Yii::$app->controller->id,['contest','cms-pages'])) ? 'main_header_insp' : 'main_header_dashboard';?>" id="arkotte_<?=Yii::$app->controller->action->id?>">	
    <div class="circle-parent">
     <!--    <div class="circle-1"> -->
          <!-- <img src="<?=Url::base(true) ?>/web/user-assets/images/shape_1.png" alt="shape_1" class="shape_img"> -->
        <!-- </div> -->
        <div class="circle-2"></div>
        <div class="circle-3"></div>
    </div>

		<div class="container-fluid">

		

      <?= $this->render('@app/views/layouts/frontend/includes/nav-header.php')  ?>



			<div class="dashboard_banner_content">

				<h1 id="heading-text"> <?=$heading ?></h1>

				<p  id="bottom-multi-text"> <?=(empty($this->params['breadcrumbs']['bottom-text'])) ? $bottomText : $this->params['breadcrumbs']['bottom-text']; ?></p>

				<!-- <button type="button" class="banner_btn btn-defult btn-xs">Begin</button> -->

			</div>

		</div>



  
	</div>

    <?php if(Yii::$app->controller->id.'-'.Yii::$app->controller->action->id==='contest-index') { ?>

      <div class="checkout-wrap ">

        <ul class="checkout-bar">

          <li data-page="first" data-seq="1" id="seq1" class="progress_bar visited danda-bar first"></li>

            <li data-page="second" data-seq="2" id="seq2" class="progress_bar second danda-bar"></li>

            <li data-page="third" data-seq="3" id="seq3" class="progress_bar third danda-bar"></li>

            <li data-page="fourth" data-seq="4" id="seq4" class="progress_bar fourth"></li>

            <li data-page="fifth" data-seq="5" id="seq5" class="progress_bar fifth"></li>

            <li data-page="sixth" data-seq="6" id="seq6" class="progress_bar sixth"></li>

            <li data-page="seventh" data-seq="7" id="seq7" class="progress_bar seventh"></li>

        </ul>



        <div id="error_inspiration"></div>

      </div>

    <?php } ?>


  <!-- / Main Header section -->





