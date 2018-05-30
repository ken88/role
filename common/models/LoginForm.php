<?php
namespace common\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class LoginForm extends Model
{



    public function rules()
    {
        return [
            [['username','password'], 'required'],
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login($post)
    {
        $user = User::find()->where(['username' => $post['username']])->asArray()->one();
        if (!empty($user)) {
            if ($user['password'] == md5($post['password'])) {
                $session = Yii::$app->session;
                $role = Role::find()->select('path')->where(['id'=>$user['roleId']])->one();
                $user['rolePath'] = $role->path;
                $session->set('userinfo',$user);
                return true;
            }
        }
        return $this->addErrors(['error'=>'用户名或密码错误！']);
    }


}
