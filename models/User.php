<?php

namespace app\models;
use mdm\admin\models\User as UserModel;

class User extends UserModel
{

    public function beforeSave($insert){
        if($insert){
            $u = UserModel::find()->all();
            if ($u->count() < 2){

                $u->role = 'admin';
            }
            $u->role = 'klient';
        }
        return parent::beforeSave($insert);
    }

}
