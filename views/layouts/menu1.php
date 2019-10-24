<?php 
use app\assets\AppAsset;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
AppAsset::register($this);
?>
<?php
            NavBar::begin([
                'brandLabel' => Yii::$app->name,
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => 'Home', 'url' => ['/site/index']],
                    ['label' => 'About', 'url' => ['/site/about']],
                    ['label' => 'Contacto', 'url' => ['/site/contact']],
                    Yii::$app->user->isGuest ?
                            ['label' => 'Sign in', 'url' => ['/user/security/login']] :
                            ['label' => 'Sign out (' . Yii::$app->user->identity->username . ')',
                        'url' => ['/user/security/logout'],
                        'linkOptions' => ['data-method' => 'post']],
                    ['label' => 'Register', 'url' => ['/user/registration/register'], 'visible' => Yii::$app->user->isGuest]
                ],
            ]);
            NavBar::end();
            ?>

