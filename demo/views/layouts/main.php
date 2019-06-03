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
AppAsset::register($this);

?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
  <meta charset="<?= Yii::$app->charset ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <?= Html::csrfMetaTags() ?>
  <title> <?= Yii::$app->name.' | '.Html::encode($this->title) ?> </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon" sizes="57x57" href="<?php echo Url::base(true) ?>/user-assets/images/ark_favi.png">

<!-- admin header layout -->
<?php if(Role::getRoleName()==='admin') { ?>
    <?= $this->render('@app/views/layouts/admin_header.php')  ?>
    <?= $this->render('@app/views/layouts/admin_sidebar.php')  ?>
<?php } ?>

<!-- user header layout -->
<?php if(Role::getRoleName()!=='admin') { ?>
    <?php 
    
    $controlerName = \Yii::$app->controller->id; 
    // echo $this->render('@app/views/layouts/frontend/header.php'); 
    if($controlerName!='site'){  // contest
        echo $this->render('@app/views/layouts/frontend/header-contest.php');
    } else {
        echo $this->render('@app/views/layouts/frontend/header.php'); 
    }
    
    
    ?>
<?php } ?>


<?php $this->beginBody() ?>
    <!-- Admin main section content -->
    <?php if(Role::getRoleName()==='admin') { ?>
        <div class="content-wrapper">
            <section class="content-header">
                <?=Alert::widget() ?>
            </section>
            <?= $content ?>
        </div>
        <!-- user footer layout -->
        <?= $this->render('@app/views/layouts/admin_footer.php')  ?>
    <?php } ?>


    <!-- user main section content -->
    <?php if(Role::getRoleName()!=='admin') { ?>
        <?=(count(Yii::$app->session->getAllFlashes())>0) ? '<section class="content-header custom-alert-padding">'.Alert::widget().'</section>' : '';?>
        <div class="">
        <?=$content ?>
        </div>

        <!-- user footer layout -->
        <?= $this->render('@app/views/layouts/frontend/footer.php')  ?>
    <?php } ?>
    <!-- common js -->
    <script src="<?php echo Url::base(true) ?>/assets/9632f2d6/yii.js"></script>
    <script src="<?php echo Url::base(true) ?>/assets/9632f2d6/yii.gridView.js"></script>
    <script src="<?php echo Url::base(true) ?>/assets/9632f2d6/yii.captcha.js"></script>
    <script src="<?php echo Url::base(true) ?>/assets/9632f2d6/yii.validation.js"></script>
    <script src="<?php echo Url::base(true) ?>/assets/9632f2d6/yii.activeForm.js"></script>
    <script src="<?php echo Url::base(true) ?>/assets/39db931e/jquery.pjax.js"></script>

<?php $this->endBody() ?>
<?php $this->endPage() ?>
