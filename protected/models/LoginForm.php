<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginForm extends CFormModel
{
    public $username;
    public $password;
    public $rememberMe;
    public $verifyCode;
    private $_identity;

    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules()
    {
        return array(
            // username and password are required
            array('username, password', 'required', 'on' => 'login'),
            array('username, password, verifyCode', 'filter', 'filter' => 'trim'),
            // rememberMe needs to be a boolean
            array('rememberMe', 'boolean'),
            // password needs to be authenticated
            array('password', 'authenticate', 'on' => 'login'),
            array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
        );
    }

    /**
    * Declares attribute labels.
     */
    public function attributeLabels()
    {
        return array(
            'username' => '用户名',
            'password' => '密码',
            'verifyCode' => '验证码',
            'rememberMe'=>'记住我',
        );
    }

    /**
     * Authenticates the password.
     * This is the 'authenticate' validator as declared in rules().
     */
    public function authenticate($attribute,$params)
    {
        if(!$this->hasErrors())
        {
            $this->_identity=new UserIdentity($this->username, $this->password);
            if(!$this->_identity->authenticate()){
                if($this->_identity->errorCode == UserIdentity::ERROR_USERNAME_INVALID){
                    $this->addError('username', '用户名不存在');
                }
                else if($this->_identity->errorCode == UserIdentity::ERROR_PASSWORD_INVALID){
                    $this->addError('password', '密码不正确');
                }
                else if($this->_identity->errorCode == UserIdentity::ERROR_LOGIN_TRY_FAIL){
                    $this->addError('password', '您已经输入了'.$this->_identity->failLoginCount.'次密码，一天内不能登录');
                }else{
                    $this->addError('login', '未知错误');
                }
            }
        }
    }

    /**
     * Logs in the user using the given username and password in the model.
     * @return boolean whether login is successful
     */
    public function login()
    {
        if($this->_identity===null)
        {
            $this->_identity=new UserIdentity($this->username,$this->password);
            $this->_identity->authenticate();
        }
        if($this->_identity->errorCode === UserIdentity::ERROR_NONE)
        {
            $duration=$this->rememberMe ? 3600*24*2 : 0; // 2 days
            Yii::app()->user->login($this->_identity,$duration);
            User::model()->saveAttributes(array('last_time'=>time(), 'fail_login_time'=>0, 'fail_login_count'=>0));
            return true;
        }
        else
            return false;
    }
}
