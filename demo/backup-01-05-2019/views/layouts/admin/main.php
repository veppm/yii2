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

<!-- admin header layout -->
<?php if(Role::getRoleName()==='admin') { ?>
    <?= $this->render('@app/views/layouts/admin_header.php')  ?>
    <?= $this->render('@app/views/layouts/admin_sidebar.php')  ?>
<?php } ?>

<!-- header layout -->
<?php if(Role::getRoleName()!=='admin') { ?>
    <?= $this->render('@app/views/layouts/frontend/header.php')  ?>
<?php } ?>

<?php $this->beginBody() ?>
    <?php if(Role::getRoleName()==='admin') { ?>
        <!-- main section content -->
        <div class="content-wrapper">
            <?=Alert::widget() ?>
            <?= $content ?>
        </div>
        <?= $this->render('@app/views/layouts/admin_footer.php')  ?>
    <?php } ?>
    

    <!-- footer layout -->
    <?php if(Role::getRoleName()!=='admin') { ?>
        <div>
        <?=$content ?>
        </div>
        <?= $this->render('@app/views/layouts/frontend/footer.php')  ?>
    <?php } ?>
<?php $this->endBody() ?>

