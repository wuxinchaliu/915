<?php
/**
 * class name Category.
 * author: qilin
 * time: 14-6-18 19:05
 */

class Category extends CActiveRecord{

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
        return '{{category}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('cate_name,parent_id,cate_desc,is_enable', 'required', 'on' => 'insert, update'),
            array('cate_name', 'unique'),
            array('url', 'length', 'max'=>'250'),
            array('cate_name,cate_desc,parent_id', 'safe', 'on' => 'search'),
        );
    }
    /**
     * Declares attribute labels.
     */
    public function attributeLabels()
    {
        return array(
            'cate_name' => '分类名',
            'cate_desc' => '描述',
            'is_enable' => '是否有效',
            'sort' => '排序',
            'url' => '外部链接',
            'parent_id' => '顶级分类',
            'second_id' => '二级分类'
        );
    }

    /*
     * 获得顶级分类
     */
    public static function getCategoryById($cid=0)
    {
        $row = array();
        $cates = Category::model()->findAll('parent_id=:parent_id',array(':parent_id'=>$cid));
        foreach($cates as $obj){
            $row[$obj->cid] = $obj->cate_name;
        }
        return $row;
    }

    public static function getAllCategory($cid=0)
    {

    }
    /**
     *
     */
    public function search()
    {
        $criteria = new CDbCriteria();

        $criteria->compare('cate_name', $this->cate_name,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }


}
