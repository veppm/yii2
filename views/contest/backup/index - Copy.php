<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

$this->title = 'Contest Inspiration';
$this->params['breadcrumbs'][] = $this->title;
?>

<style type="text/css">
  /* #contest_form fieldset:not(:first-of-type) {
    display: none;
  } */
  .has_error {
      border:1px dotted #a94442;
  }
  h2{
    background: #ffbb8a;
    padding: 10px;
  }
</style>

<div class="container-fluid">
    <div class="row contest">
            <div class="col-md-3"></div>

            <div class="col-md-6">			
            <form id="contest_form" action=""  method="post">
                <fieldset>
                    <h2>Step 1: Inspiration</h2>
                    <br />
                    <div class="inspiration">
                        <label class="checkbox-inline">
                            <input type="checkbox" value=""  name="inspiration[]">Option 1
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" value=""  name="inspiration[]">Option 2
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" value=""  name="inspiration[]">Option 3
                        </label>
                    </div>
                   <!--  <span id="error_inspiration" class="text-danger"></span>
                    <div class="form-group">
                        <br />
                        <input type="button" name="password" class="next btn btn-info" value="Next" />
                    <div> -->
                </fieldset>

                <fieldset>
                    <h2> Step 2:  Your Building Site</h2>
                    <br />
                    <div class="building_site">
                        <label class="checkbox-inline">
                            <input type="checkbox" value=""  name="building_site[]">Option 1
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" value=""  name="building_site[]">Option 2
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" value=""  name="building_site[]">Option 3
                        </label>
                    </div>
                    <!-- <span id="error_building_site" class="text-danger"></span>
                    <div class="form-group">
                        <br>
                        <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
                        <input type="button" name="next" class="next btn btn-info" value="Next" />
                    </div> -->
                </fieldset>

                <fieldset>
                    <h2> Step 3:  Materials and Finishes</h2>
                    <br />
                    <div class="materials_finishes">
                        <label class="checkbox-inline">
                            <input type="checkbox" value=""  name="materials_finishes[]">Option 1
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" value=""  name="materials_finishes[]">Option 2
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" value=""  name="materials_finishes[]">Option 3
                        </label>
                    </div>
                    <!-- <span id="error_materials_finishes" class="text-danger"></span>
                    <div class="form-group">
                        <br>
                        <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
                        <input type="button" name="next" class="next btn btn-info" value="Next" />
                    </div> -->
                </fieldset>

                <fieldset>
                    <h2> Step 4:  Your Needs</h2>
                    <br />
                    <div class="your_needs">
                        1. Tell us about you about your situation? <br />
                            <input type="radio" value="We are wanting to downsize"  name="about_situation">We are wanting to downsize<br />
                            <input type="radio" value="We are new to the housing market"  name="about_situation">We are new to the housing market<br />
                            <input type="radio" value="This is an investment property"  name="about_situation">This is an investment property<br />
                            <input type="radio" value=">Our family is growing"  name="about_situation">Our family is growing<br />
                            <input type="radio" value="This is our retirement house"  name="about_situation">This is our retirement house<br />
                            <input type="radio" value="Holiday house"  name="your_needs">Holiday house  <br />
                            <textarea class="form-control" rows="5" name="about_situation_other"></textarea><br /><br />

                        2. Tell us about your family? <br />
                            <input type="radio" value="We are wanting to downsize"  name="about_family">We are wanting to downsize<br />
                            <input type="radio" value="We are new to the housing market"  name="about_family">We are new to the housing market<br />
                            <input type="radio" value="This is an investment property"  name="about_family">This is an investment property<br />
                            <input type="radio" value=">Our family is growing"  name="about_family">Our family is growing<br />
                            <input type="radio" value="This is our retirement house"  name="about_family">This is our retirement house<br />
                            <input type="radio" value="Holiday house"  name="about_family">Holiday house  <br />
                            <textarea class="form-control" rows="2" name="about_family_other"></textarea><br /><br />

                        3. Does your family have any specific needs?<br />
                        <textarea class="form-control" rows="2" name="family_specific_need"></textarea><br /><br />

                        4. Number of bedrooms?<br />
                            <input type="radio" value="Studio"  name="beds_no"> Studio <br />
                            <input type="radio" value="1 bedroom"  name="beds_no"> 1 bedroom<br />
                            <input type="radio" value="2 bedrooms"  name="beds_no"> 2 bedrooms<br /> 
                            <input type="radio" value="3 bedrooms"  name="beds_no"> 3 bedrooms<br /> 
                            <input type="radio" value="4 bedrooms"  name="beds_no"> 4 bedrooms<br /> 
                            <input type="radio" value="5 bedrooms or over"  name="beds_no"> 5 bedrooms or over<br /><br />

                        5. Number of bathrooms?<br />
                            <input type="radio" value="1 bathroom"  name="beds_no"> 1 bathroom<br />
                            <input type="radio" value="2 bathrooms"  name="beds_no"> 2 bathrooms<br /> 
                            <input type="radio" value="3 bathrooms"  name="beds_no"> 3 bathrooms<br /> 
                            <input type="radio" value="4 bathrooms"  name="beds_no"> 4 bathrooms<br /> 
                            <input type="radio" value="5 bathrooms or over"  name="beds_no"> 5 bathrooms or over<br /><br />

                        6. Type and number of living spaces (this includes media rooms, family rooms, and private nooks)?<br />
                        <textarea class="form-control" rows="2" name="living_spaces"></textarea><br /><br />
                        7. Any additional rooms that we have not listed?<br />
                        <textarea class="form-control" rows="2" name="additional_room"></textarea><br /><br />
                        8. Anything else we have not listed that you want to communicate to the architects?<br />
                        <textarea class="form-control" rows="2" name="communicate_architects"></textarea><br /><br />
                    </div>
                </fieldset>

                <fieldset>
                    <h2> Step 5:  Specification</h2>
                    <br />
                    <div class="specification">
                        1. What is your approximate budget? <br />
                            <input type="radio" value="<250000"  name="your_aprox_budget">under $250,000<br />
                            <input type="radio" value="250001-350000"  name="your_aprox_budget"> $250,001 - $350,000<br />
                            <input type="radio" value="55000-650000"  name="your_aprox_budget"> $550,001 - $650,000<br />

                            <input type="radio" value="650001-750000"  name="your_aprox_budget"> $650,001 - $750,000<br />
                            <input type="radio" value="This is our retirement house"  name="your_aprox_budget"> This is our retirement house<br />
                            <input type="radio" value="Holiday house"  name="your_aprox_budget"> Holiday house  <br /> <br>

                        2. When were you looking to build? <br />
                            <input type="radio" value="We are wanting to downsize"  name="looking_build"> We are wanting to downsize<br />
                            <input type="radio" value="We are new to the housing market"  name="looking_build"> We are new to the housing market<br />
                            <input type="radio" value="This is an investment property"  name="looking_build"> This is an investment property<br />
                            <input type="radio" value=">Our family is growing"  name="looking_build"> Our family is growing<br />
                            <input type="radio" value="This is our retirement house"  name="looking_build"> This is our retirement house<br />
                            <input type="radio" value="Holiday house"  name="looking_build"> Holiday house  <br /> <br >
                            

                        3.  Size of your land or other?<br />
                            <input type="radio" value="1 bathroom"  name="land_other_size"> 1 bathroom <br />
                            <input type="radio" value="2 bathrooms"  name="land_other_size"> 2 bathrooms<br /> 
                            <input type="radio" value="3 bathrooms"  name="land_other_size"> 3 bathrooms<br /> 
                            <input type="radio" value="4 bathrooms"  name="land_other_size"> 4 bathrooms<br /> 
                            <input type="radio" value="5 bathrooms or over"  name="land_other_size"> 5 bathrooms or over<br /><br />

                        4. Do you have any images, sketches or documents that may be helpful? ?<br />
                            <input type="file" name="sketches"><br />
                    </div>
                </fieldset>

               

            </form>
            </div>
        </div>
        
    </div>
</div>


<script>
$(document).ready(function(){
  var current = 1,current_step,next_step,steps;
  steps = $("fieldset").length;
  requiredText = 'This field is required';
  atleastOne  = 'Please select atleat one';
  /* $(".next").click(function(){
    $('.inspiration').removeClass('has-error-field');
    $('#text-danger').text('');

    // step-1 validation
    if (($("input[name*='inspiration']:checked").length)<=0) {
        $('#error_inspiration').text(requiredText+','+atleastOne);
        $('.inspiration').addClass('has_error');
        return false
    }

    // step-2 validation
    if (($("input[name*='building_site']:checked").length)<=0 && current>1) {
        $('#error_building_site').text(requiredText+','+atleastOne);
        $('.building_site').addClass('has_error');
        return false
    }

    current_step = $(this).parent().parent();
    next_step = $(this).parent().parent().next();
    next_step.show();
    current_step.hide();
    ++current;
  });

  $(".previous").click(function(){
    
    current_step = $(this).parent().parent();
    next_step = $(this).parent().parent().prev();
    next_step.show();
    current_step.hide();
    --current;
  });
   */
});


</script>