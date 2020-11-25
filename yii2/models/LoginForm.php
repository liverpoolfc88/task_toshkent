<?php

namespace app\models;

use Yii;
use mdm\admin\models\form\Login as LoginModel;


/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class LoginForm extends LoginModel
{
    const SCENARIO_LOGIN = 'login';

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['login'] = ['username', 'password' ];

        return $scenarios;

    }
    public function loginn()
    {
        if ($this->validate()) {
            return Yii::$app->getUser()->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        } else {
            return false;
        }
    }
}

//
//namespace app\models;
//
//use Yii;
//use yii\base\Model;
//
///**
// * LoginForm is the model behind the login form.
// *
// * @property-read User|null $user This property is read-only.
// *
// */
//class LoginForm extends Model
//{
//    public $username;
//    public $password;
//    public $rememberMe = true;
//
//    private $_user = false;
//
//    const SCENARIO_LOGIN = 'login';
//
//
//    /**
//     * @return array the validation rules.
//     */
//    public function rules()
//    {
//        return [
//            // username and password are both required
//            [['username', 'password'], 'required'],
//            // rememberMe must be a boolean value
//            ['rememberMe', 'boolean'],
//            // password is validated by validatePassword()
//            ['password', 'validatePassword'],
//        ];
//    }
//
//    public function scenarios()
//    {
//        $scenarios = parent::scenarios();
//        $scenarios['login'] = ['username', 'password' ];
//
//        return $scenarios;
//
//    }
//
//    /**
//     * Validates the password.
//     * This method serves as the inline validation for password.
//     *
//     * @param string $attribute the attribute currently being validated
//     * @param array $params the additional name-value pairs given in the rule
//     */
//    public function validatePassword($attribute, $params)
//    {
//        if (!$this->hasErrors()) {
//            $user = $this->getUser();
//
//            if (!$user || !$user->validatePassword($this->password)) {
//                $this->addError($attribute, 'Incorrect username or password.');
//            }
//        }
//    }
//
//    /**
//     * Logs in a user using the provided username and password.
//     * @return bool whether the user is logged in successfully
//     */
//    public function login()
//    {
//        if ($this->validate()) {
//            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
//        }
//        return false;
//    }
//
//    /**
//     * Finds user by [[username]]
//     *
//     * @return User|null
//     */
//    public function getUser()
//    {
//        if ($this->_user === false) {
//            $this->_user = User::findByUsername($this->username);
//        }
//
//        return $this->_user;
//    }
//}
