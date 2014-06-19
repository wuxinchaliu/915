<?php
/**
 * class name UserLoginLog.
 * author: qilin
 * time: 14-6-11 15:05
 */

class UserLoginLog extends CActiveRecord{

    /**
     *this model is extends parent model
     * use to class::model()
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
        return '{{login_log}}';
    }

    /**
     * @param $loginLog
     * @arr include user_id login_result,username
     */
    public function addLoginLog($loginLog)
    {
        $userLog = new UserLoginLog();
        $userLog->attributes = array(
            'user_id' => $loginLog['user_id'],
            'username' => $loginLog['username'],
            'login_result' => $loginLog['login_result'],
            'login_time' => $loginLog['login_time'],
            'login_ip' => yii::app()->request->userHostAddress,
            'user_agent' => yii::app()->request->userAgent,
        );
        return $userLog->save();
    }
} 