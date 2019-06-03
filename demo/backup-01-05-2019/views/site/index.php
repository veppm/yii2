<?php

/* @var $this yii\web\View */
use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\Tabs; 
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\Role;
use yii\helpers\Url;

$this->title = 'Home';
?>


<div class="section_second">
	<div class="container-fluid">
		<div class="row">
			<div class="circle_box">
  			<div class="col-md-3">
  				<div class="first_row">
  					<div class="inside_content">
  						<h1>01</h1>
  						<h2>Create your Brief</h2>
  						
  					</div>
  				</div>
  			</div>
	  			<div class="col-md-3">
	  				<div class="first_row">
	  					
	  					<div class="inside_content" id="inside_content_id1">
  						<h1>02</h1>
  						<h2>Post your Contest</h2>
  						
  					</div>
  				</div>
  			</div>
  			<div class="col-md-3">
  				<div class="first_row">
  					
  					<div class="inside_content" id="inside_content_id">
  						<h1>03</h1>
  						<h2>Choose your favourite design</h2>
  						
  					</div>
  				</div>
  			</div>
  			<div class="col-lg-6 col-md-12 col-sm-12">
  				<div class="second_row">
  				 <p>The process is super easy! The brief is indepth to give our design community a clear understanding of your vision. When all entries are submitted, you choose your favourite concept design and connect with architect to go through the building stage. </p>
  					<!-- <p class="learn_link">Learn More <span> + </span></p>  -->
  				</div>
  			</div>	
			</div>
		</div>
	</div>
</div>


<div class="section_fourth">
	<div class="container">
		<div class="row">
			<div class="content_box">
  			<div class="col-md-6">
			<div class="content_inside_box">
  					<h2>Start a Contest</h2>
  					<p class="mr-btm">To start own contest, follow the step by brief and and hit post!</p>
  					<!-- <button type="button"  class="banner_btn btn-defult btn-xs">Begin</button>  -->
            <a href="<?= (Yii::$app->user->isGuest) ?  Url::base().'/user/login' : Url::base().'/user/'.Yii::$app->user->getId();?>" class="banner_btn btn-defult btn-xs">Begin</a>

					</div>
				</div>
				<div class="col-md-6">
  				<div class="content_inside_box">
  					<h2>Architects, Join</h2>
  					<p class="mr-btm">If you want to enter the contest and submit your best design, sign up</p>
  					<!-- <button type="button" class="banner_btn btn-defult btn-xs"></button> -->

            <?php // if (!Yii::$app->user->isGuest) {  ?>
            <a href="<?= (Yii::$app->user->isGuest) ?  Url::base().'/user/register' : Url::base().'/user/'.Yii::$app->user->getId();?>" class="banner_btn btn-defult btn-xs">Sign Up</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
