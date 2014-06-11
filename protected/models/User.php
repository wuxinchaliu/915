<?php
/**
 * class name User.
 * author: qilin
 * time: 14-6-8 13:05
 */

class User extends CActiveRecord{

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

    public function validatePassword($password)
    {
        return Utils::pbkdf2('sha256', $password, $this->salt, 10000) === $this->password;
    }
} 