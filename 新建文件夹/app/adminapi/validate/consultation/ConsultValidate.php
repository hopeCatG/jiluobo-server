<?php


namespace app\adminapi\validate\consultation;


use app\common\validate\BaseValidate;


/**
 * Consult验证器
 * Class ConsultValidate
 * @package app\adminapi\validate\consultation
 */
class ConsultValidate extends BaseValidate
{

     /**
      * 设置校验规则
      * @var string[]
      */
    protected $rule = [
        'id' => 'require',
        'theme' => 'require',
        'name' => 'require',
        'email' => 'require',
        'mobile' => 'require',
        'content' => 'require',
        'type' => 'require',
        'status' => 'require',
    ];


    /**
     * 参数描述
     * @var string[]
     */
    protected $field = [
        'id' => 'id',
        'theme' => '主题',
        'name' => '姓名',
        'email' => '邮箱（必填）',
        'mobile' => '手机号（必填）',
        'content' => '咨询内容',
        'type' => '咨询类型：1-一般咨询，2-报价咨询',
        'status' => '是否已处理',
    ];


    /**
     * @notes 添加场景
     * @return ConsultValidate
     * @author skyblue
     * @date 2026/04/04 15:20
     */
    public function sceneAdd()
    {
        return $this->only(['theme','name','email','mobile','content','type','status']);
    }


    /**
     * @notes 编辑场景
     * @return ConsultValidate
     * @author skyblue
     * @date 2026/04/04 15:20
     */
    public function sceneEdit()
    {
        return $this->only(['id','theme','name','email','mobile','content','type','status']);
    }


    /**
     * @notes 删除场景
     * @return ConsultValidate
     * @author skyblue
     * @date 2026/04/04 15:20
     */
    public function sceneDelete()
    {
        return $this->only(['id']);
    }


    /**
     * @notes 详情场景
     * @return ConsultValidate
     * @author skyblue
     * @date 2026/04/04 15:20
     */
    public function sceneDetail()
    {
        return $this->only(['id']);
    }

}