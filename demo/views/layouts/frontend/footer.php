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

use yii\widgets\ActiveForm;



//Url::base();         // /myapp

//echo Url::base(true);     // http(s)://example.com/myapp - depending on current schema

//Url::base('https');  // https://example.com/myapp

//Url::base('http');   // http://example.com/myapp

//echo Url::base(); 

?>

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

                  <!-- <li><a href="<?=Url::base()?>/cms-pages/how-it-works">How it works</a></li> -->

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

             <?=Yii::$app->session->getFlash('contactusmsg'); ?>

            <?php $form = ActiveForm::begin([

                'id'=>'contact_form',

                'options' =>['name'=> 'contact_form'],

                'action'=> Url::base().'/site/contact',

                // 'enableAjaxValidation' => true,

                // 'validateOnBlur' => true,

              ]); 

            ?>



            <?php //  $form->errorSummary($model); ?>

            <div class="form_footer" id="contactus">

              <div class="row">

                <div class="col-md-6">      

                  <div class="form-group">

                    <div class="col-75">

                      <input type="text" id="name" name="ContactForm[name]" placeholder="Name:">

                      <p class="contact-error"></p>

                    </div>

                  </div>

                  <div class="form-group">

                    <div class="col-75">

                    <input type="text" id="email" name="ContactForm[email]" placeholder="Email:">

                    <p class="contact-error"></p>

                    </div>

                  </div>

                  <div class="ft_note">Got a Question? Contact Us</div>

                </div>

                <div class="col-md-6">  

                  <div class="form-group">

                    <div class="col-75">

                    <textarea name="ContactForm[message]" id="message" placeholder="Question:"></textarea>

                    <p class="contact-error"></p>

                    </div>

                  </div>

                  <div class="form-group">

                    <input type="submit" value="Send" id="contactus_submit">

                  </div>

                </div>

              </div>

            </div>

            <?php ActiveForm::end(); ?>

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



  <!-- Include all compiled plugins (below), or include individual files as needed -->

  <script src="<?php echo Url::base(true) ?>/web/user-assets/js/bootstrap.min.js"></script>

  <script src="<?php echo Url::base(true) ?>/web/user-assets/js/owl.carousel.min.js"></script>



  <script type="text/javascript">

    // Wait for the DOM to be ready



      



    $('#contactus_submit').click(function(e) {

      // Initializing Variables With Form Element Values

      var name    = $('#name').val();

      var email   = $('#email').val();

      var message = $('#message').val();



      // Initializing Variables With Regular Expressions

      var name_regex = /^[a-zA-Z]+$/;

      var email_regex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

      // To Check Empty Form Fields.

      // $('.form_footer .error').text('');

      $('.form_footer .contact-error').text('');

      if (name.length == 0 &&  email.length == 0 && message.length == 0) {

        $('.form_footer .contact-error').text("This field is required"); 

        $('#name').focus();

        return false;

      }



      if (name.length == 0) {

        $('#name').next('.contact-error').text("This field is required"); 

        $('#name').focus();

        return false;

      }



      if (email.length == 0) {

        $('#email').next('.contact-error').text("This field is required"); 

        $('#email').focus();

        return false;

      }



      if (!email_regex.test(email) ) {

        $('#email').next('.contact-error').text("Please enter validate email"); 

        $('#email').focus();

        return false;

      }



      if (message.length == 0) {

        $('#message').next('.contact-error').text("This field is required"); 

        $('#message').focus();

        return false;

      } 



      if (message.length>200) {

        $('#message').next('.contact-error').text("Question can't allow more than 200 characters"); 

        $('#message').focus();

        return false;

      }

    });



    // Hide alert box

    // $(".custom-alert-padding").show().delay(4000).fadeOut();



    // Smooth scroll 

    $(document).ready(function(){

      // Add smooth scrolling to all links

      $("a").on('click', function(event) {

        if (this.hash !== "") {

          // Prevent default anchor click behavior

          event.preventDefault();



          // Store hash

          var hash = this.hash;



          // Using jQuery's animate() method to add smooth page scroll

          // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area

          $('html, body').animate({

            scrollTop: $(hash).offset().top

          }, 800, function(){



            // Add hash (#) to URL when done scrolling (default click behavior)

            window.location.hash = hash;

          });

        } // End if

      });

    });









  </script>

    

	<script type="text/javascript">

	

	/*$('#banner_slide_v2').owlCarousel({

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

  })*/

</script>

</body>

</html>