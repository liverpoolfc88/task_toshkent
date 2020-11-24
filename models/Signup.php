<?

namespace app\models;

use mdm\admin\components\UserStatus;
use mdm\admin\models\Assignment;
use mdm\admin\models\form\Signup as SignupForm;
use mdm\admin\models\User as UserModel;
use Yii;
use yii\helpers\ArrayHelper;

class Signup extends SignupForm

{

    public function signup1()
    {;
        if ($this->validate()) {
            $class = Yii::$app->getUser()->identityClass ? : 'mdm\admin\models\User';
            $user = new $class();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->role = 'admin';
            $user->setPassword($this->password);
            $user->generateAuthKey();
            $user->status = ArrayHelper::getValue(Yii::$app->params, 'user.defaultStatus', UserStatus::ACTIVE);
            if ($user->save()) {
//                $assignment  = new Assignment();

                return $user;
            }
        }

        return null;
    }

//    public function beforeSave($insert){
//        if($insert){
//            $u = UserModel::find()->count();
//            $us = new \app\modules\models\User();
//            if ($u < 2){
//                $us->role = 'admin';
//            }
//            $us->role = 'klient';
//        }
//        return parent::beforeSave($insert);
//    }
}
