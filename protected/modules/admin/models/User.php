<?php
/**
 * class name User.
 * author: qilin
 * time: 14-6-8 13:05
 */

class User extends CActiveRecord{

    public $password;
    public $newPassword;
    public $oldPassword;
    public $confirmPassword;
    public $realname;
    public $email;
    public $fail_login_count;
    public $fail_login_time;
    public $add_time;
    public $salt;
    public $oldHashPassword;
    /**
     *
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
    /**
     * 定义表名称
     */
    public function tableName()
    {
        return '{{admin_user}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('username,password,realname,confirmPassword,email', 'required', 'on' => 'insert, update'),
            array('username,email', 'unique'),
            array('password', 'compare', 'compareAttribute'=>'confirmPassword','message'=>'二次密码必须一致', 'on'=>'insert'),
            array('realname', 'length', 'max' => 50),
            //array('start_time', 'compare', 'compareAttribute' => 'end_time', 'operator' => '<', 'message' => '开始日期必须小于结束日期'),
            array('username', 'safe', 'on' => 'search'),
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
            'confirmPassword' => '确认密码',
            'realname' => '真实名',
            'email' => '邮箱',
            'add_time'=>'添加时间',
            'last_time'=>'上次登录时间',
            'fail_login_count'=>'失败的登陆次数'
        );
    }
    /**
     *
     */
    public function getUserByUsername($username)
    {
        $user = self::model()->findByPk($username, array('select'=>'username,password,salt'));
        if($user->username == null){
            return false;
        }else{
            return $user;
        }
    }

    /**
     *
     */
    public function search()
    {
        $criteria = new CDbCriteria();

        $criteria->compare('username', $this->username,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }
    /**
     * @param $password
     * @return bool
     * 密码加密验证
     */
    public function validatePassword($password)
    {
        return Utils::pbkdf2('sha256', $password, $this->salt, 10000) === $this->password;
    }

    /**
     * Generates the password hash by PBKDF2.
     * @param string $password
     * @param string $salt
     * @return string hash
     */
    public function hashPassword($password, $salt)
    {
        return Utils::pbkdf2('sha256', $password, $salt, 10000);
    }

    /**
     * Generates a salt that can be used to generate a password hash.
     *
     * @param int $length 随机字符串长度
     * @return string the salt
     */
    public function generateSalt($length = 22)
    {
        return Yii::app()->getSecurityManager()->generateRandomString($length);
    }

    /**
     * 保存之前来生成密码，在validate之后执行
     * @author zhangchao
     */
    public function beforeSave()
    {
        parent::beforeSave();
        if ($this->isNewRecord)
            $this->add_time = time();

        if ($this->password == '') {
            $this->password = $this->oldHashPassword;
        } else {
            $this->salt = $this->generateSalt(22);
            $this->password = $this->hashPassword($this->password, $this->salt);
            // 新密码有效期一年，并清除登录错误次数和时间

            $this->fail_login_count = 0;
            $this->fail_login_time = 0;
        }
        return true;
    }
    public function afterFind()
    {
        parent::afterFind();
        $this->oldHashPassword = $this->password;
    }
}
