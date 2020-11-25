<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\User;

AppAsset::register($this);

$u = User::find()->count();
//var_dump($u); die();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>


<div class="wrap">

<style>
    .nav{
        background-color: #0b2e13;

    }
</style>

    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'nav navbar-inverse navbar-fixed-top',

        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
//            ['label' => 'Biz haqimizda', 'url' => ['/site/about']],
//            ['label' => 'Post', 'url' => ['/post/index']],
//            ['label' => 'Profile', 'url' => ['/user/profile']],
//            ['label' => 'Aloqa', 'url' => ['/site/contact']],

            (isset(Yii::$app->user->identity) && Yii::$app->user->identity->role == 'admin') ?
            (['label' => 'Admin', 'url' => ['rbac/user']]) :
                (''),

//            ['label' => 'Rbac', 'url' => ['/rbac']],




            Yii::$app->user->isGuest ? (
                ['label' => 'Kirish', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Chiqish (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            ),

            ($u == 0 && Yii::$app->user->isGuest) ? (
            ['label' => "Ro`yxatdan o`tish", 'url' => ['/site/signup']]
            ) : (''),
         Yii::$app->user->isGuest ? (''):
        (['label' => 'Profile', 'url' => ['/site/profile']])

        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
