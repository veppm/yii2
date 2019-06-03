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
	<div class="circle-parent">
        <div class="circle-1">
        	<!-- <img src="<?=Url::base(true) ?>/web/user-assets/images/shape_1.png" alt="shape_1" class="shape_img"> -->
        </div>
        <div class="circle-2"></div>
        <div class="circle-3"></div>
   	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="circle_box">
  			<div class="col-md-3 col-sm-3">
  				<div class="first_row">
  					<div class="inside_content">
  						<h1>1</h1>
  						<h2>Create your Brief</h2>
  						
  					</div>
  				</div>
  			</div>
	  			<div class="col-md-3 col-sm-3">
	  				<div class="first_row">
	  					
	  					<div class="inside_content" id="inside_content_id1">
  						<h1>2</h1>
  						<h2>Post your Contest</h2>
  						
  					</div>
  				</div>
  			</div>
  			<div class="col-md-3 col-sm-3">
  				<div class="first_row">
  					
  					<div class="inside_content" id="inside_content_id">
  						<h1>3</h1>
  						<h2>Choose your <!-- favourite --> design</h2>
  						
  					</div>
  				</div>
  			</div>
  			<div class="col-lg-6 col-md-12 col-sm-12">
  				<div class="second_row">
  				 <p>The process is super easy! The brief is indepth to give our design community a clear understanding of your vision. When all entries are submitted, you choose your favourite concept design and connect with architect to go through the building stage. </p>
  					<p class="learn_link" id="learn_link_id">Learn More <span> + </span></p> 
  				</div>
  			</div>	
			</div>
		</div>
	</div>
</div>

<div class="toggle_content" style="display:none;">
  <div class="container-fluid">
    <div class="row">
      <div class="in_toggle" >
        <div class="col-md-4">
          <div class="toggle_1">
            <h2>  <span>1</span> Create your brief</h2>
             <p> Tell us what you want in a dream home by completing the brief. This first step gives our architects and designers a clear  understanding of what you want! </p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="toggle_2" >
            <h2><span> 2</span> Post your competition </h2>
           <p> Start a competition to design your dream home by posting your competition. This will be seen by hundreds of architects and designers from our arkotte community.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="toggle_3">
            <h2><span> 3 </span> Choose your design  </h2>
            <p> Choose your favourite entry and work together to tweak  the design and go through the building process. Your  choosen architect will guide you through this!</p>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<div class="section_fourth">
  <div class="circle-parent">
        <div class="circle-3"></div>
    </div>
	<div class="container">
		<div class="row">
			<div class="content_box">
        <!-- <div class="col-md-2">
        </div> -->
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



<script type="text/javascript">
$('.learn_link').click(function(){
	if($('.learn_link').attr('id')=='learn_link_id'){
		$('.toggle_content').show();
		$('.learn_link').attr('id','learn_link');
		$('.learn_link span').text('-');

	} else{
		$('.toggle_content').hide();
		$('.learn_link').attr('id','learn_link_id');
		$('.learn_link span').text('+');
	}
});
</script>