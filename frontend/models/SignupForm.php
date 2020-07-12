<?php
namespace frontend\models;

use frontend\models\Tblprofile;
use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
//    public $email;
    public $password;
    public $roles;
    public $name;
    public $lastname;
    public $address;
    public $id_user_reagent;
    public $women_men;
    public $tel;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            [['username','lastname','name','tel'], 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

//            ['email', 'trim'],
//            ['email', 'required'],
//            ['email', 'email'],
//            ['email', 'string', 'max' => 255],
//            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['roles', 'string', 'max' => 255],
            ['name', 'string', 'max' => 255],

            ['lastname', 'string', 'max' => 255],
            ['address', 'string'],

            ['password', 'required'],
            ['password', 'string', 'min' => 5],
            [['tel'],'integer'],
            ];
    }

    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();

        $user->username = $this->username;
//        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $auth = Yii::$app->authManager;
        $authorRole = $auth->getRole('user');
        $user->save();
        $auth->assign($authorRole, $user->getId());
        $Profile= new Tblprofile();
        $Profile->name=$this->name;
        $Profile->lastname=$this->lastname;
        $Profile->address=$this->address;
        $Profile->user_id=$user->getId();
        $Profile->tel=$this->tel;
        $Profile->role='user';
        if($Profile->save()){

            return $user;
        }else{
             $user->delete();
            return null;
        }

//        return $user->save() ? $user : null;
    }
}
