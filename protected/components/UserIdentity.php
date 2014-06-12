<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    const ERROR_LOGIN_TRY_FAIL=101;
    public $username;
    public $failLoginCount;
    private $_id;
    /**
     * @return bool
     * 验证用户名和密码是否正确
     */
    public function __construct($username,$password)
    {
        $this->username = $username;
        $this->password = $password;
    }
    public function authenticate()
    {
        $users = User::model()->findByAttributes(array('username' => $this->username), array('select' => 'id, username, password, salt, fail_login_count, fail_login_time'));

        $timestamp = time();
        if($users->username === null){
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        }
        //用户超过登录次数之后，一天以后才可以登录
        else if($users->fail_login_count >= yii::app()->params['failLoginNum'] && $users->fail_login_time >= ($timestamp-86400)){
            $this->errorCode = self::ERROR_LOGIN_TRY_FAIL;
        }
        //用户密码检查
        else if(!$users->validatePassword($this->password)){
             if(($users->fail_login_count + 1) == yii::app()->params['failLoginNum']){
                 $this->errorCode = self::ERROR_LOGIN_TRY_FAIL;
                 $users->saveAttributes(array('fail_login_count' => $users->fail_login_count+1, 'fail_login_time' => $timestamp));
             }else{
                 $this->errorCode = self::ERROR_PASSWORD_INVALID;
                 $users->saveAttributes(array('fail_login_count' => $users->fail_login_count+1, 'fail_login_time' => $timestamp));
                 $this->failLoginCount = $users->fail_login_count+1;
             }
        }else{
            $this->_id = $users->id;
            $this->username = $users->username;
            $this->errorCode = self::ERROR_NONE;
        }
        $userId = $users == null ? null : $users->id;
        $loginResult = self::ERROR_NONE == $this->errorCode;
        UserLoginLog::addLoginLog(array('user_id'=>$userId,'username'=>$this->username,'login_result'=>$loginResult,'login_time'=>$timestamp));

        return $this->errorCode == self::ERROR_NONE;
	}
}