<?php


use yii\helpers\Html;
use dektrium\user\helpers\Timezone;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use app\models\ContestForm;



$this->title = 'Contest Inspiration';
$this->params['breadcrumbs'][] = $this->title;
?>


<style type="text/css">
    #contest_form .tab_div:not(:first-of-type) {
        display: none;
    } 
    .check{
        opacity:0.5;
        color:#996; 
    }

    .error_inspiration{
        padding: 10px;
        border: 2px dotted red;
        width: 50%;
        margin: auto;
        background: #ffe2ce;
        color: red;
    }


</style>

 <?php $form = ActiveForm::begin([
        'id'=>'contest_form',
        'options'=>[
            'enctype'=>'multipart/form-data',
        ],
        //'enableAjaxValidation' => true,
        'enableClientValidation' => true,
        'validateOnBlur' => true,
    ]); 
?>

<?= $form->errorSummary($model); ?>
<!-- <form id="contest_form"> -->
<?php // echo $form->field($model, 'status[]')->checkboxList(['a' => 'Item A', 'b' => 'Item B', 'c' => 'Item C']);?>

<?php //  $form->field($model, 'file')->fileInput() ?>
    <div class="tabbing-content">
        <div id="first" class="tab_div">
            <div class="container-fluid">
                <div class="gellery">
                    <div class="row">

                        <?php 
                        echo "<pre>";
                        print_r($model);
                        exit;

                        ?>

                        <?php for ($i=1; $i <=9; $i++) { ?>
                        <div class="col-md-4">
                            <div class="gellery-img">
                                <label>
                                    <img src="<?=Url::base(true)?>/user-assets/images/gallery_img_<?= $i ?>.jpg" alt="inspiration<?=$i?>" class="inspiration-img img-responsive <?=(!empty($model->inspiration) && in_array('images/gallery_img_'.$i.'.jpg', $model->inspiration)) ? 'check' : '';?>">

                                    <input type="checkbox" name="ContestForm[inspiration][]" id="inspiration_<?= $i ?>" value="images/gallery_img_<?= $i ?>.jpg" class="hidden inspiration" autocomplete="off" <?=(!empty($model->inspiration) && in_array('images/gallery_img_'.$i.'.jpg',$model->inspiration)) ? "checked='checked'" : '';?>>
                                </label>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="btn">
                            <button type="button" class="banner_btn progress_bar" data-page="second" data-seq="2">Continue</button>
                        </div>
                    </div> 
                </div>
            </div>
           <!--  <div style="width: 100%;">
                <div  style="width: auto; float: right;">
                    <span class="second">
                        <a href="#" class="second">Continue</a>
                    </span>
                </div>
            </div> -->
        </div>
        <div id="second" class="tab_div">
            <div class="container-fluid">
                <div class="gellery">
                    <div class="row">
                        <?php for ($i=9; $i >=1; $i--) { ?>
                        <div class="col-md-4">
                            <div class="gellery-img">
                                <label>
                                    <img src="<?=Url::base(true)?>/user-assets/images/gallery_img_<?= $i ?>.jpg" alt="building-site<?=$i?>" class="building-site-img img-responsive <?=(!empty($model->building_site) && in_array('images/gallery_img_'.$i.'.jpg', $model->building_site)) ? 'check' : '';?>">
                                    <input type="checkbox" name="ContestForm[building_site][]" id="building_site_<?=$i?>" value="images/gallery_img_<?= $i ?>.jpg" class="hidden building_site" autocomplete="off" <?=(!empty($model->building_site) && in_array('images/gallery_img_'.$i.'.jpg', $model->building_site)) ? 'checked="checked"' : '';?>>
                                </label>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <div class="btn">
                <button type="button" class="banner_btn progress_bar" data-page="third" data-seq="3">Continue</button>
            </div>
            <!-- <span class="third" style="width: 100%; float:right">
                <a href="#" class="third">Continue</a>
            </span> -->
        </div>
        <div id="third" class="tab_div">
            <div class="container-fluid">
                <div class="gellery">
                    <div class="row">
                        <?php for ($i=1; $i <=9; $i++) { ?>
                        <div class="col-md-4">
                            <div class="gellery-img">
                                <label>
                                    <img src="<?=Url::base(true)?>/user-assets/images/gallery_img_<?= $i ?>.jpg" alt="materials-finishes<?=$i?>" class="materials-finishes-img img-responsive <?=(!empty($model->materials_finishes) && in_array('images/gallery_img_'.$i.'.jpg', $model->materials_finishes)) ? 'check' : '';?>">
                                    <input type="checkbox" name="ContestForm[materials_finishes][]" id="materials_finishes<?=$i?>" value="images/gallery_img_<?= $i ?>.jpg" class="hidden materials_finishes" autocomplete="off" <?=(!empty($model->materials_finishes) && in_array('images/gallery_img_'.$i.'.jpg', $model->materials_finishes)) ? 'checked="checked"' : '';?>>
                                </label>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <div class="btn">
                <button type="button" class="banner_btn progress_bar" data-page="fourth" data-seq="4">Continue</button>
            </div>
        </div>
        <div id="fourth" class="tab_div">
            <div class="container-fluid">
                <div class="user_form"> 
                    <div class="h2_heading">
                        <h2>1. Tell us about you about your situation?</h2>
                    </div>  
                    <div class="row">
                        <div class="col-md-12">

                            <?php $aboutSituwations =  [
                                    'We are wanting to downsize',
                                    'Our family is growing',
                                    'We are new to the housing marke',
                                    'This is our retirement house',
                                    'This is an investment propert',
                                    'Holiday house'
                                ]; 
                            ?>
                            <?php foreach ($aboutSituwations as $aboutSituwation) { ?>
                            <div class="col-md-5">
                                <label  class="radio">
                                    <input type="radio" value="<?=$aboutSituwation?>"  name="ContestForm[about_situation]" class="hidden about_situation"  
                                    <?=($model->about_situation==$aboutSituwation) ? 'checked="checked"' : '';?>>
                                    <div class="label about_situation">
                                        <span for="about_situation"><?=$aboutSituwation?></span> <br>
                                    </div>
                                </label>
                            </div>
                            <?php  } ?>

                            <div class="col-md-10">
                                <div class="">
                                    <textarea rows="10" name="ContestForm[about_situation_other]" class="form-control other-textbox" placeholder="E.g. Other needs that has not been listed."><?=$model->about_situation_other;?></textarea>
                                </div>
                            </div>
                        </div> 
                    </div>

                    <div class="h2_heading">
                        <h2>2. Tell us about your family?</h2>
                    </div>  
                    <div class="row">
                        <div class="col-md-12">
                            <?php $aboutFamilys =  [
                                    'Just myself',
                                    'Parents, the kids and the grandparents',
                                    'Myself and my partner',
                                    'Grandparents & occasionally the grandkids',
                                    'The parents and the kids',
                                    'Myself and roommates'
                                ]; 
                            ?>
                            <?php foreach ($aboutFamilys as $aboutFamily) { ?>
                                <div class="col-md-5">
                                    <label class="radio">
                                        <input type="radio" value="<?=$aboutFamily?>" name="ContestForm[about_family]" class="hidden about_family" <?=($model->about_family==$aboutFamily) ? 'checked="checked"' : '';?>> 
                                        <div class="label about_family">
                                            <span for="about_family"><?=$aboutFamily?></span> <br>
                                        </div>
                                    </label>
                                </div>
                            <?php } ?>

                            <div class="col-md-10">
                                <div class="">
                                    <textarea rows="10" name="ContestForm[about_family_other]" class="form-control other-textbox" placeholder="E.g. Just myself with my girlfriend that visits and my 2 dogs"><?=$model->about_family_other;?></textarea>
                                </div>
                            </div>
                        </div> 
                    </div>

                    <div class="h2_heading">
                        <h2>3. Does your family have any specific needs?</h2>
                    </div>  
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-10">
                                <div class="">
                                    <textarea rows="10"  name="ContestForm[family_specific_need]" class="form-control other-textbox family_specific_need" placeholder="E.g. My husband needs a seperate workshop for his tools and boat and my grandparents"><?=$model->family_specific_need;?></textarea>
                                </div>
                            </div>
                        </div> 
                    </div>

                    <div class="h2_heading">
                        <h2>4. Number of bedrooms?</h2>
                    </div>  
                    <div class="row">
                        <div class="col-md-12">
                            <?php $bedsnos =  [
                                    'Studio',
                                    '3 bedrooms',
                                    '1 bedroom',
                                    '4 bedrooms',
                                    '2 bedrooms',
                                    '5 bedrooms or over'
                                ]; 
                            ?>
                            <?php foreach ($bedsnos as $bedsno) { ?>
                            <div class="col-md-5">
                                <label class="radio">
                                    <input type="radio" value="<?=$bedsno?>" name="ContestForm[beds_no]" class="hidden beds_no" <?=($model->beds_no==$bedsno) ? 'checked="checked"' : '';?>> 
                                    <div class="label beds_no">
                                        <span for="beds_no"><?=$bedsno?></span> <br>
                                    </div>
                                </label>
                            </div>
                            <?php } ?>
                        </div> 
                    </div>

                    <div class="h2_heading">
                        <h2>5. Number of bathrooms?</h2>
                    </div>  
                    <div class="row">
                        <div class="col-md-12">
                             <?php $bathroomsnos =  [
                                    '1 bathroom',
                                    '4 bathrooms',
                                    '2 bedrobathroomsom',
                                    '5 bathrooms or over',
                                    '3 bathrooms',
                                    
                                ]; 
                            ?>
                            <?php foreach ($bathroomsnos as $bathroomsno) { ?>

                            <div class="col-md-5">
                                <label class="radio">
                                    <input type="radio" value="<?=$bathroomsno?>" name="ContestForm[bathrooms_no]" class="hidden bathrooms_no"> 
                                    <div class="label bathrooms_no" <?=($model->bathrooms_no==$bathroomsno) ? 'checked="checked"' : '';?>>
                                        <span for="bathrooms_no"><?=$bathroomsno?></span> <br>
                                    </div>
                                </label>
                            </div>
                            <?php } ?>
                        </div> 
                    </div>

                    <div class="h2_heading">
                        <h2>6. Type and number of living spaces (this includes media rooms, family rooms, and private nooks)?</h2>
                    </div>  
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-10">
                                <div class="">
                                    <textarea rows="10" name="ContestForm[living_spaces]" class="form-control other-textbox living_spaces" placeholder="E.g. We would like a living room for guest and entertaining and a seperate family room that doubles as a media room."><?=$model->living_spaces;?></textarea>
                                </div>
                            </div>
                        </div> 
                    </div>

                    <div class="h2_heading">
                        <h2>7. Any additional rooms that we have not listed?</h2>
                    </div>  
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-10">
                                <div class="">
                                    <textarea rows="10" name="ContestForm[additional_room]" class="form-control other-textbox additional_room" placeholder="E.g. We want a large study for the adults and a play area for the kids outside."><?=$model->additional_room;?></textarea>
                                </div>
                            </div>
                        </div> 
                    </div>

                    <div class="h2_heading">
                        <h2>8. Anything else we have not listed that you want to communicate to the architects?</h2>
                    </div>  
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-10">
                                <div class="">
                                    <textarea rows="10" name="ContestForm[communicate_architects]" class="form-control other-textbox communicate_architects" placeholder="E.g. We really want the living spaces to look out onto a courtyard that has heaps of landscaping!"><?=$model->communicate_architects;?></textarea>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="btn">
                <button type="button" class="banner_btn progress_bar" data-page="fifth" data-seq="5">Continue</button>
            </div>
        </div>
        <div id="fifth" class="tab_div">
            <div class="container-fluid">
                <div class="container-fluid">
                <div class="user_form"> 
                    <div class="h2_heading">
                        <h2>1. What is your approximate budget?</h2>
                    </div>  
                    <div class="row">
                        <div class="col-md-12">

                             <?php $approximateBudjets =  [
                                    '<250000',
                                    '550001-650000',
                                    '250001-350000',
                                    '650001-750000',
                                    '350001-450000',
                                    '>750000',
                                ]; 
                            ?>
                            <?php foreach ($approximateBudjets as $approximateBudjet) { ?>
                                <div class="col-md-5">
                                    <label class="radio">
                                        <input type="radio" value="<?=$approximateBudjet?>" name="ContestForm[approximate_budjet]" class="hidden approximate_budjet" <?=($model->approximate_budjet==$approximateBudjet) ? 'checked="checked"' : '';?>> 
                                        <div class="label approximate_budjet">
                                            <span for="approximate_budjet"><?=ContestForm::getBudget($approximateBudjet);?> </span> <br>
                                        </div>
                                    </label>
                                </div>
                            <?php } ?>
                        </div> 
                    </div>

                    <div class="h2_heading">
                        <h2>2. When were you looking to build?</h2>
                    </div>  
                    <div class="row">
                        <div class="col-md-12">
                             <?php $lookingBuilds =  [
                                    'Right away!',
                                    '6 months',
                                    'In the next few weeks',
                                    '9 Months',
                                    'In 3 months',
                                    '>12 months',
                                ]; 
                            ?>
                            <?php foreach ($lookingBuilds as $lookingBuild) { ?>
                                <div class="col-md-5">
                                    <label class="radio">
                                        <input type="radio" value="<?=$lookingBuild;?>" name="ContestForm[looking_build]" class="hidden looking_build" <?=($model->looking_build==$lookingBuild) ? 'checked="checked"' : '';?>> 
                                        <div class="label looking_build">
                                            <label for="looking_build"><?=$lookingBuild;?></label> <br>
                                        </div>
                                    </label>
                                </div>
                            <?php } ?>
                        </div> 
                    </div>

                    <div class="h2_heading">
                        <h2>3. Size of your land or other?</h2>
                    </div>  
                    <div class="row">
                        <div class="col-md-12">
                            <?php $landOtherSizes =  [
                                    '1 bathroom',
                                    '4 bathrooms',
                                    '2 bathrooms',
                                    '5 bathrooms or over',
                                    '3 bathrooms'
                                ]; 
                            ?>
                            <?php foreach ($landOtherSizes as $landOtherSize) { ?>
                                <div class="col-md-5">
                                    <label class="radio">
                                        <input type="radio" value="<?=$landOtherSize;?>" name="ContestForm[land_other_size]" class="hidden land_other_size" <?=($model->land_other_size==$landOtherSize) ? 'checked="checked"' : '';?>> 
                                        <div class="label land_other_size">
                                            <span for="land_other_size"><?=$landOtherSize;?></span> <br>
                                        </div>
                                    </label>
                                </div>
                            <?php } ?>
                        </div> 
                    </div>

                    <div class="h2_heading">
                        <h2>3. Do you have any images, sketches or documents that may be helpful? </h2>
                    </div> 
                    <div class="row"> 
                        <div class="col-md-12">
                            <div class="col-md-10">
                                <div class="box__input">
                                    <input class="box__file" type="file" name="ContestForm[sketches]" id="sketches" required class="sketches">
                                    <label for="file"><strong>Choose a file</strong><span class="box__dragndrop"> or drag it here</span>.</label>
                                    <!-- <textarea rows="10" name="about_situation_other" class="form-control other-textbox" placeholder="E.g. Other needs that has not been listed."></textarea> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>

            <div class="btn">
                <button type="button" class="banner_btn progress_bar" data-page="sixth" data-seq="6">Continue</button>
            </div>
        </div>
        <div id="sixth" class="tab_div">
            <div class="container-fluid">
                <div class="h2_heading">
                    <h2>Choose your design package </h2>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="colored_box">
                            <div class="col-md-4">
                                <div class="box_1">
                                    <h2>Concept Design $599.00</h2>
                                    <p>+ Full money back guarantee <br>+ Expect ~ 8 personalised  <br>concept designs</p>
                                </div>
                                <div class="colored_btn1">
                                        <button type="button" class="banner_btn progress_bar" data-page="seventh" data-seq="7">Continue</button>
                                    </div>
                            </div>

                            <div class="col-md-8">
                                <div class="box_2">
                                    <h2>Concept Design to Build $1,199.00</h2>
                                    <p>+ Full money back guarantee  <br>+ Expect ~ 15 personalised concept designs  <br>+</p>
                                </div>
                                 <div class="colored_btn2">
                                    <button type="button" class="banner_btn progress_bar" data-page="seventh" data-seq="7">Continue</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="h2_heading">
                    <h2>Contest title? </h2>
                    <h3>Write a descriptive contest title to attract more designers. This is the first thing designers will see.</h3>
                    <div class="">
                        <textarea rows="10" name="ContestForm[contest_title]" class="form-control other-textbox contest_title" placeholder="E.g. Design our contemporary beach house!"><?=$model->contest_title;?></textarea> 
                    </div>
                </div>  
                
                <div class="h2_heading">
                    <h2>Promote your contest - $100 </h2>
                    <h3>Boost the number of designs you recieve in your contest with a highlight over your contest.</h3>
                    <?php $promote_contest = 'Yes please, promote my contest'; ?>
                    <label class="radio">
                        <input type="checkbox" value="<?=$promote_contest;?>" name="ContestForm[promote_contest]" class="hidden promote_contest" <?=($model->promote_contest==$promote_contest) ? 'checked="checked"' : '';?>> 
                        <div class="label promote_contest">
                            <label for="promote_contest"><?=$promote_contest;?></label> <br>
                        </div>
                    </label>
                </div> 
                

                <div class="h2_heading">
                    <h2>Guaranteed Contest Option - free! </h2>
                    <h3>By chossing this option, you’re letting designers know that you’re all in and fully committed </h3>
                    <h3>to choosing a concept design. You won’t be able to request a refund but you will:</h3>
                    <div class="guarantee-option">
                        <p>+ Have more designers participating </p>
                        <p>+ Have top level architects submitting a design concept</p>
                        <p>+ Receive 50% more designs on average </p>
                        <p>+ Wider range of creativity</p>
                    </div>
                    <?php $guaranteed_contest_option = 'Yes please, make my contest guaranteed'; ?>
                    <label class="radio">
                        <input type="checkbox" value="<?=$guaranteed_contest_option;?>" name="ContestForm[guaranteed_contest_option]" class="hidden guaranteed_contest_option" <?=($model->guaranteed_contest_option==$guaranteed_contest_option) ? 'checked="checked"' : '';?>> 
                        <div class="label guaranteed_contest_option">
                            <label for="guaranteed_contest_option"><?=$guaranteed_contest_option;?></label> <br>
                        </div>
                    </label>
                </div> 

                <div class="h2_heading">
                    <h2>Duration</h2>
                    <h3>How long do you want your competition to run for? </h3>
                    <div class="radio_bottom">

                         <?php $contestDurations =  [
                                    'Standard 14 days',
                                    '21 days',
                                    '28 days',
                                ]; 
                            ?>
                        <?php foreach ($contestDurations as $contestDuration) { ?>
                            <label class="control control--radio"> <?=$contestDuration;?> 
                                <input type="radio" value="<?=$contestDuration;?>" name="ContestForm[contest_duration]" class="contest_duration"
                                <?=($model->contest_duration==$contestDuration) ? 'checked="checked"' : '';?>>
                                <div class="radio_bottom_indicator"></div>
                            </label>
                        <?php } ?>
                     </div>
                </div> 
            </div>

            <div class="btn">
                <button type="button" class="banner_btn progress_bar" data-page="seventh" data-seq="7">Continue</button>
            </div>
        </div>
        <div id="seventh" class="tab_div">
            <div class="container-fluid">
                <div class="payment_section">
                    <div class="container-fluid">
                        <div class="row">   
                            <div class="col-md-12"> 
                                <h2 class="summary-head">Summary</h2>
                                <div class="payment_heading">
                                    <div class="col-md-4">  
                                    </div>
                                    <div class="col-md-8">
                                        <div class="payment_para">
                                            <p class="pull-left para_1">Concept Design to Build</p> 
                                            <p class="pull-right para_2">$1,199.000</p>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12"> 
                                <div class="payment_heading1">
                                    <div class="col-md-4">  
                                    </div>
                                    <div class="col-md-8">
                                        <div class="payment_para1" >
                                            <p class="pull-left para_1">GST</p> 
                                            <p class="pull-right para_2">$230.00</p>
                                        </div>  
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12"> 
                                <div class="payment_heading1">
                                    <div class="col-md-4">  
                                    </div>
                                    <div class="col-md-8">
                                        <div class="payment_para" style="padding: 60px 0;" >
                                            <p class="pull-left para_1">Total</p>   
                                            <p class="pull-right para_2">$1,429.00</p>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="contact_details">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <div class="and_finally">
                                    <h2>Contact Details</h2>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="name"><b>Full Name</b></label>
                                <input type="text" placeholder="JOHN SMITH" name="ContestForm[name]" class="name" value="<?=$model->name;?>">
                                <?php // echo Html::error($model,'name', ['class' => 'error']); ?>   
                            </div>

                            <div class="col-md-4">
                                <label for="email"><b>Email Address</b></label>
                                <input type="text" placeholder="johnsmith@hotmail.com" name="ContestForm[email]"  class="email" value="<?=$model->email;?>">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="col-md-4">
                            </div>

                            <div class="col-md-4">
                                <label for="phone" class="phone-text"><b>Phone Number</b></label>
                                <input type="text" placeholder="+614 0696 0040" name="ContestForm[phone]" class="phone" value="<?=$model->phone;?>">

                            </div>

                             <div class="col-md-4">
                            </div>
                        </div>
                    </div>
                </div>
                

                <div class="about_arkotte">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <div class="and_finally">
                                    <h2>And finally...</h2>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="radio_finally">
                                    <h2 class="about">How did you hear about Arkotte?</h2>

                                    <?php $hear_about_arkottes =  [
                                            'Search Engine (e.g. Google)',
                                            'Referred by Friend',
                                            'Pinterest',
                                            'Instagram',
                                            'Another Website',
                                            "I’ve used Arkotte before",
                                            'Other'
                                        ]; 
                                    ?>
                                    <?php foreach ($hear_about_arkottes as $hear_about_arkotte) { ?>
                                        <label class="control control--radio"> <?=$hear_about_arkotte?>
                                            <input type="radio" value="<?=$hear_about_arkotte?>" name="ContestForm[hear_about_arkotte]" class="hear_about_arkotte" <?=($model->hear_about_arkotte==$hear_about_arkotte) ? 'checked="checked"' : '';?>>
                                            <div class="radio_bottom_indicator"></div>
                                        </label>
                                    <?php } ?>

                                 </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="btn">
                <button type="submit" class="banner_btn" id="submit_button">Continue</button>
            </div>
        </div>
    </div> 
<!-- </form> -->
<?php ActiveForm::end(); ?>

<script type="text/javascript">
    $heading = [
        'Inspiration',
        'Your Building Site',
        'Materials and Finishes',
        'Your Needs',
        'Specification',
        'Design Package',
        'Your Details'
    ];

    $bottomText = [
        'Choose what designs inspire and excite you. This will help our designers understand what you want in your dream home. ',
        'Choose a photo that best describes where your dream home will be built',
        'The materials and finishes will have an  impact on the overall atmosphere of your home',
        'Let’s start by telling us what you like. As we know, all families are unique, this questionaire helps our architects understand your family better',
        'Choose what designs inspire and excite you. This will help our designers understand what you want in your dream home',
        'Which design package do you want? All packages come with a 100% money-back guarantee',
        'Final step to starting your contest!'
    ];

    $('#heading-text').html($heading[0]); 
    $('#bottom-multi-text').html($bottomText[0]); 

    var requiredText = 'This field is required';
    var requiredText2 = 'field is required';
    var atleastOne  = ' Please select atleat one';
    var requiredField  = "Required fields can't be blank";



    $('.progress_bar').click(function(){
        var seq = $(this).attr('data-seq');
        // console.log(seq);
        /* form validation */
        $('#error_inspiration').html('');
        $('#error_inspiration').removeClass('error_inspiration');

        /*if(inspirationVal(requiredText2, atleastOne, seq)===false){
            return false;
        }

        if(building_site(requiredText2, atleastOne,seq)===false){
            return false;
        }

        if(materials_finishes(requiredText2, atleastOne, seq)===false){
            return false;
        }
        
        if(your_needs(requiredField, seq)===false){
            return false;
        }
        if(specification(requiredField, seq)===false){
            return false;
        }
        if(design_ackage(requiredField, seq)===false){
            return false;
        }*/

        //  Active/DeactiveProcess bar
        $('.progress_bar').removeClass('visited');
        for(i=1; i<=seq; i++ ){
            $('[id="seq'+ i +'"]').addClass('visited');
            // Change Heading text
            //console.log(i);
            $('#heading-text').html($heading[i-1]); 
            $('#bottom-multi-text').html($bottomText[i-1]);
        }

        var tabIndex = $(this).attr('data-page');
        $('.tab_div').hide();
        $('#'+tabIndex).show();
    });

    
   


/* form validation before submit */
// step-1 validation
$('#submit_button').click(function (e) {
    $('#error_inspiration').html('');
    $('#error_inspiration').removeClass('error_inspiration');

    /*if(inspirationVal(requiredText2, atleastOne)===false){
        return false;
    }
    if(building_site(requiredText2, atleastOne)===false){
        return false;
    }
    if(materials_finishes(requiredText2, atleastOne)===false){
        return false;
    }

    if(your_needs(requiredField)===false){
        return false;
    }

    if(specification(requiredField)===false){
        return false;
    }

    if(design_ackage(requiredField)===false){
        return false;
    }

    if(design_ackage(requiredField)===false){
        return false;
    } 
*/
    if(your_details(requiredField)===false){
        return false;
    }
});


function inspirationVal(requiredText, atleastOne, seq=8) {
   if(($('.inspiration:checkbox:checked').length)<1 && seq>1){
        $('#error_inspiration').html('Inspiration '+requiredText+','+atleastOne);
        $('#error_inspiration').addClass('error_inspiration');
         $(window).scrollTop(0);
        return false
    }
    return true;
}

function building_site(requiredText, atleastOne, seq=8) {
   if(($('.building_site:checkbox:checked').length)<1 && seq>2){
        $('#error_inspiration').html('Your building site '+requiredText+','+atleastOne);
        $('#error_inspiration').addClass('error_inspiration');
         $(window).scrollTop(0);
        return false
    }
    return true;
}

function materials_finishes(requiredText, atleastOne, seq=8) {
   if(($('.materials_finishes:checkbox:checked').length)<1 && seq>3){
        $('#error_inspiration').html('Materials and finishes '+requiredText+','+atleastOne);
        $('#error_inspiration').addClass('error_inspiration');
        $(window).scrollTop(0);
        return false
    }
    return true;
}

function your_needs(requiredText, seq=8) {
    if(($('.about_situation:radio:checked').length)<1 && seq>4){
        $('#error_inspiration').html(requiredText);
        $('#error_inspiration').addClass('error_inspiration');
        $(window).scrollTop(0);
        return false
    }

    if(($('.about_family:radio:checked').length)<1 && seq>4){
        $('#error_inspiration').html(requiredText);
        $('#error_inspiration').addClass('error_inspiration');
        $(window).scrollTop(0);
        return false
    }

    if($('.family_specific_need').val()=='' && seq>4){
        $('#error_inspiration').html(requiredText);
        $('#error_inspiration').addClass('error_inspiration');
        $(window).scrollTop(0);
        return false
    }

    if(($('.beds_no:radio:checked').length)<1 && seq>4){
        $('#error_inspiration').html(requiredText);
        $('#error_inspiration').addClass('error_inspiration');
        $(window).scrollTop(0);
        return false
    }
    if(($('.bathrooms_no:radio:checked').length)<1 && seq>4){
            $('#error_inspiration').html(requiredText);
            $('#error_inspiration').addClass('error_inspiration');
            $(window).scrollTop(0);
            return false
        }

    if($('.living_spaces').val()=='' && seq>4){
        $('#error_inspiration').html(requiredText);
        $('#error_inspiration').addClass('error_inspiration');
        $(window).scrollTop(0);
        return false
    }

    if($('.additional_room').val()=='' && seq>4){
        $('#error_inspiration').html(requiredText);
        $('#error_inspiration').addClass('error_inspiration');
        $(window).scrollTop(0);
        return false
    }

    if($('.communicate_architects').val()=='' && seq>4){
        $('#error_inspiration').html(requiredText);
        $('#error_inspiration').addClass('error_inspiration');
        $(window).scrollTop(0);
        return false
    }
    return true;
}


function specification(requiredText, seq=8) {
    if(($('.approximate_budjet:radio:checked').length)<1 && seq>5){
        $('#error_inspiration').html(requiredText);
        $('#error_inspiration').addClass('error_inspiration');
        $(window).scrollTop(0);
        return false
    }

    if(($('.looking_build:radio:checked').length)<1 && seq>5){
        $('#error_inspiration').html(requiredText);
        $('#error_inspiration').addClass('error_inspiration');
        $(window).scrollTop(0);
        return false
    }

    if(($('.land_other_size:radio:checked').length)<1 && seq>5){
        $('#error_inspiration').html(requiredText);
        $('#error_inspiration').addClass('error_inspiration');
        $(window).scrollTop(0);
        return false
    }

    if($('#sketches').val()=='' && seq>5){
        $('#error_inspiration').html(requiredText);
        $('#error_inspiration').addClass('error_inspiration');
        $(window).scrollTop(0);
        return false
    }
    return true;
}

function design_ackage(requiredText, seq=8) {
    if($('#contest_title').val()=='' && seq>6){
        $('#error_inspiration').html(requiredText);
        $('#error_inspiration').addClass('error_inspiration');
        $(window).scrollTop(0);
        return false
    }

    if(($('.contest_duration:radio:checked').length)<1 && seq>6){
        $('#error_inspiration').html(requiredText);
        $('#error_inspiration').addClass('error_inspiration');
        $(window).scrollTop(0);
        return false
    }
    return true;
}

function your_details(requiredText) {
    if($('.name').val()=='' || $('.email').val()=='' || $('.phone').val()==''){
        $('#error_inspiration').html(requiredText);
        $('#error_inspiration').addClass('error_inspiration');
        $(window).scrollTop(0);
        return false
    }

    if(($('.hear_about_arkotte:radio:checked').length)<1){
        $('#error_inspiration').html(requiredText);
        $('#error_inspiration').addClass('error_inspiration');
        $(window).scrollTop(0);
        return false
    }

    /*if(!confirm('Are you sure you want to continue?')) {
        return false;
    } else {
        return true;
    }*/
    return true;
}





$(document).ready(function(e){
    var message = "Sorry, you can't select more than eights!!";
    // Inspiration checked images 
    $(".inspiration-img").click(function(){
        // step-1 validation
        if (($("input[name*='inspiration']:checked").length)>7) {
            if($(this).next('input[type=checkbox]').is(":checked")===true){
                $(this).toggleClass("check");
            } else {
                alert(message);
                $(this).next('input[type=checkbox]').prop('checked', false);
                return false;
            }
        } else {
            $(this).toggleClass("check");
        } 
    });
    // Your Building Site
    $(".building-site-img").click(function(){
        // step-2 validation
        if (($("input[name*='building_site']:checked").length)>7) {
            if($(this).next('input[type=checkbox]').is(":checked")===true){
                // $(this).next('input[type=checkbox]').prop('checked', false);
                $(this).toggleClass("check");
            } else {
                alert(message);
                $(this).next('input[type=checkbox]').prop('checked', false);
                return false;
            }
        } else {
            $(this).toggleClass("check");
        } 
    });

    // Materials and Finishes
    $(".materials-finishes-img").click(function(){ 
    // step-3 validation
        if (($("input[name*='materials_finishes']:checked").length)>7) {
            if($(this).next('input[type=checkbox]').is(":checked")===true){
                // $(this).next('input[type=checkbox]').prop('checked', false);
                $(this).toggleClass("check");
            } else {
                alert(message);
                $(this).next('input[type=checkbox]').prop('checked', false);
                return false;
            }
        } else {
            $(this).toggleClass("check");
        }  
    });   
});

</script>