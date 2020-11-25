<?

namespace app\models;

use mdm\admin\components\UserStatus;
use \yii\web\Response;
use mdm\admin\models\Assignment;
use mdm\admin\models\form\Signup as SignupForm;
use mdm\admin\models\User as UserModel;
use Yii;
use yii\helpers\ArrayHelper;

class Signup extends SignupForm

{
    const SCENARIO_CREATE = 'create';

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['create'] = ['username','email', 'password','retypePassword' ];

        return $scenarios;

    }


}
