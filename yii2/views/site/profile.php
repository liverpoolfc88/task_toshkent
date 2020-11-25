<?php

/* @var $this yii\web\View */
($user)?
$this->title = $user->username.' profili':
$this->title = 'Foydalanuvchi profili';
?>

<style>
    #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #customers td, #customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #customers tr:nth-child(even){background-color: #f2f2f2;}

    #customers tr:hover {background-color: #ddd;}

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
    }
</style>
<? if (isset($user)) ?>
<table id="customers">
    <tr>
        <th>User</th>
        <th>Malumot<a href="/site/userupdate?id=<?= $user->id?>" class="btn-danger" style="float: right; padding: 5px">O`zgartirish</a></th>
    </tr>
    <tr>
        <td>username</td>
        <td><?=$user->username?></td>
    </tr>
    <tr>
        <td>email</td>
        <td><?=$user->email?></td>
    </tr>
    <tr>
        <td>qo`shilgan sana</td>
        <td><?=date('d-m-yy',$user->created_at)?></td>
    </tr>
    <tr>
        <td>o`zgartirilgan sana</td>
        <td><?=date('d-m-yy',$user->updated_at)?></td>
    </tr>

</table>
