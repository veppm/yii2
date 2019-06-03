<?php
use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\Tabs; 
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\Role;
use yii\helpers\Url;

//Url::base();         // /myapp
//echo Url::base(true);     // http(s)://example.com/myapp - depending on current schema
//Url::base('https');  // https://example.com/myapp
//Url::base('http');   // http://example.com/myapp
//echo Url::base(); 
?>
<!-- <div class="footer">
  <div class="container-fluid">
    <div class="ft_nav_bar">
    <div class="row">
        <div class="col-md-3 text-left">
          <div class="ft_logo">
            <a href="<?=Yii::$app->homeUrl;?>">
              <img src="<?=Url::base(true) ?>/web/user-assets/images/logo_f.png" alt="logo" width="auto"></a>
            </div>
        </div>
        <div class="col-md-6 text-center">
          <ul class="nav navbar-nav ft_quick_links">
            <li><a href="<?=Url::base()?>/cms-pages/how-it-works">How it works</a></li>
            <li><a href="<?= (Yii::$app->user->isGuest) ?  Url::base().'/user/register' : Url::base().'/user/'.Yii::$app->user->getId();?>">Begin</a></li>
            <li><a href="javascript:void(0)">FAQs </a></li>
            <?php if (Yii::$app->user->isGuest) { ?>
              <li><a href="<?=Url::base()?>/user/login">Sign in</a></li>
            <?php } ?>
          </ul>
        </div>
        <div class="col-md-3 text-right">
          <ul class="footer_social_icon">
            <li><a href="javascript:void(0)"><i class="fab fa-facebook-f"></i> </a></li>
              <li><a href="javascript:void(0)#"><i class="fab fa-twitter"></i></a></li>
              <li><a href="javascript:void(0)"><i class="fab fa-linkedin-in"></i></a></li>
              <li><a href="javascript:void(0)"><i class="fab fa-pinterest-p"></i></a></li>
              <li><a href="javascript:void(0)"><i class="fab fa-instagram"></i> </a></li>
            </ul>
        </div>
        

      </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <form action="" method="post">
        <div class="form_footer">
          <div class="row">
            <div class="col-md-6">			
              <div class="form-group">
                <div class="col-75">
                  <input type="text" id="fname" name="firstname" placeholder="Name:">
                </div>
              </div>
              <div class="form-group">
                <div class="col-75">
                  <input type="text" id="email" name="email" placeholder="Email:">
                </div>
              </div>
              <div class="ft_note">Got a Question? Contact Us</div>
            </div>
            <div class="col-md-6">	
              <div class="form-group">
                <div class="col-75">
                  <textarea id="subject" name="subject" placeholder="Question:" style="/* height:150px */"></textarea>
                </div>
              </div>
              <div class="form-group">
                <input type="submit" value="Send">
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
    <div class="col-md-6">
      <ul class="nav navbar-right">
            <li><a href="javascript:void(0)">About Us </a></li>
            <li><a href="<?=Url::base()?>/cms-pages/privacy-policy">Privacy Policy </a></li>
        </ul>
      </div>
    </div>
  </div>
</div> -->
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo Url::base(true) ?>/web/user-assets/js/bootstrap.min.js"></script>
    <script src="<?php echo Url::base(true) ?>/web/user-assets/js/owl.carousel.min.js"></script>


<div class="footer">
      <div class="container-fluid">
        <div class="ft_nav_bar">
      <div class="row">
          <div class="col-lg-3 col-md-2 col-sm-12">
            <div class="ft_logo"><a href="<?=Yii::$app->homeUrl;?>">
              <img src="<?=Url::base(true) ?>/web/user-assets/images/logo_f.png" alt="logo" width="auto"></a>
            </div>
          </div>
          <div class="col-lg-9 col-md-9 col-sm-12">
            <ul class="nav navbar-nav ft_quick_links">
                  <li><a href="<?=Url::base()?>/cms-pages/how-it-works">How it works</a></li>
                  <li><a href="<?= (Yii::$app->user->isGuest) ?  Url::base().'/user/register' : Url::base().'/user/'.Yii::$app->user->getId();?>">Begin</a></li>
                  <!-- <li><a href="chakrahealing.html">Lookbook </a></li> -->
                  <li><a href="javascript:void(0)">FAQs </a></li>
                  <?php if (Yii::$app->user->isGuest) { ?>
                  <li><a href="<?=Url::base()?>/user/login">Sign in</a></li>
                  <?php } ?>
              </ul>
          </div>
          <!-- <div class="col-lg-3 col-md-2 col-sm-12">
             <ul class="footer_social_icon">
               <li><a href="#"><i class="fab fa-facebook-f"></i> </a></li>
                 <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                 <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                 <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                 <li><a href="#"><i class="fab fa-instagram"></i> </a></li>
              </ul>

          </div> -->
        </div>
        <div class="row">
          <div class="col-md-6">

            <form action="action_page.php">
            <div class="form_footer">
                <div class="row">
                <div class="col-md-6">      
                    <div class="form-group">
                    <div class="col-75">
                    <input type="text" id="fname" name="firstname" placeholder="Name:">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-75">
                    <input type="text" id="email" name="email" placeholder="Email:">
                    </div>
                  </div>

                  <div class="ft_note">Got a Question? Contact Us</div>
                    </div>
                    <div class="col-md-6">  
                  <div class="form-group">
                    <div class="col-75">
                    <textarea id="subject" name="subject" placeholder="Question:" style="/* height:150px */"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <input type="submit" value="Send">
                  </div>
                      </div>
              </div>
            </div>
            </form>
          </div>
          <div class="col-md-6">
            <ul class="nav quick_links">
                  <li><a href="javascript:void(0)">About Us </a></li>
                  <!-- <li><a href="#">Our Story </a></li>
                  <li><a href="#">Terms &amp; Conditions </a></li> -->
                  <li><a href="<?=Url::base()?>/cms-pages/privacy-policy">Privacy Policy </a></li>
              </ul>
          </div>
        </div>
      </div>
      </div>
    </div>

    
	<script type="text/javascript">
	
	$('#banner_slide_v2').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    dots:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})
</script>
</body>
</html>