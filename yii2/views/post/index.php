<?php
/* @var $this yii\web\View */
?>
<h1>post/index</h1>

<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p>
    <? if(count($model)): ?>
        <? foreach ($model as $value):?>
            <div class="post">
                <h3><?=$value->title ?></h3>
                <p>
                    <?=$value->description ?>
                </p>
            </div>
        <? endforeach; ?>
    <? endif; ?>

<style>
    .post{
        background-color: lightgoldenrodyellow;
    }
</style>