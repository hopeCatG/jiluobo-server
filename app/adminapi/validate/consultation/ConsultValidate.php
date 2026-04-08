<?php
// +----------------------------------------------------------------------
// | likeadmin快速开发前后端分离管理后台（PHP版）
// +----------------------------------------------------------------------
// | 欢迎阅读学习系统程序代码，建议反馈是我们前进的动力
// | 开源版本可自由商用，可去除界面版权logo
// | gitee下载：https://gitee.com/likeshop_gitee/likeadmin
// | github下载：https://github.com/likeshop-github/likeadmin
// | 访问官网：https://www.likeadmin.cn
// | likeadmin团队 版权所有 拥有最终解释权
// +----------------------------------------------------------------------
// | author: likeadminTeam
// +----------------------------------------------------------------------

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
     * @author likeadmin
     * @date 2026/04/04 15:20
     */
    public function sceneAdd()
    {
        return $this->only(['theme','name','email','mobile','content','type','status']);
    }


    /**
     * @notes 编辑场景
     * @return ConsultValidate
     * @author likeadmin
     * @date 2026/04/04 15:20
     */
    public function sceneEdit()
    {
        return $this->only(['id','theme','name','email','mobile','content','type','status']);
    }


    /**
     * @notes 删除场景
     * @return ConsultValidate
     * @author likeadmin
     * @date 2026/04/04 15:20
     */
    public function sceneDelete()
    {
        return $this->only(['id']);
    }


    /**
     * @notes 详情场景
     * @return ConsultValidate
     * @author likeadmin
     * @date 2026/04/04 15:20
     */
    public function sceneDetail()
    {
        return $this->only(['id']);
    }

}