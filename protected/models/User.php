<?php
/**
 * class name User.
 * author: qilin
 * time: 14-6-8 13:05
 */

class User extends CActiveRecord{

    public $newPassword;
    public $oldPassword;
    public $confirmPassword;
    public $realname;
    public $email;
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
            'add_time'=>'添加时间'
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
} 