<?php


namespace app\adminapi\validate\city;


use app\common\validate\BaseValidate;


/**
 * ArticleCity验证器
 * Class ArticleCityValidate
 * @package app\adminapi\validate\city
 */
class ArticleCityValidate extends BaseValidate
{

     /**
      * 设置校验规则
      * @var string[]
      */
    protected $rule = [
        'id' => 'require',
        'region_id' => 'require',
        'city_name' => 'require',
    ];


    /**
     * 参数描述
     * @var string[]
     */
    protected $field = [
        'id' => 'id',
        'region_id' => '区域',
        'city_name' => '网点名',
    ];


    /**
     * @notes 添加场景
     * @return ArticleCityValidate
     * @author skyblue
     * @date 2026/06/29 09:10
     */
    public function sceneAdd()
    {
        return $this->only(['region_id','city_name']);
    }


    /**
     * @notes 编辑场景
     * @return ArticleCityValidate
     * @author skyblue
     * @date 2026/06/29 09:10
     */
    public function sceneEdit()
    {
        return $this->only(['id','region_id','city_name']);
    }


    /**
     * @notes 删除场景
     * @return ArticleCityValidate
     * @author skyblue
     * @date 2026/06/29 09:10
     */
    public function sceneDelete()
    {
        return $this->only(['id']);
    }


    /**
     * @notes 详情场景
     * @return ArticleCityValidate
     * @author skyblue
     * @date 2026/06/29 09:10
     */
    public function sceneDetail()
    {
        return $this->only(['id']);
    }

}