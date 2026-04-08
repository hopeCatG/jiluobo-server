<?php


namespace app\adminapi\validate\subcate;


use app\common\validate\BaseValidate;


/**
 * ArticleSubcate验证器
 * Class ArticleSubcateValidate
 * @package app\adminapi\validate\subcate
 */
class ArticleSubcateValidate extends BaseValidate
{

     /**
      * 设置校验规则
      * @var string[]
      */
    protected $rule = [
        'id' => 'require',
        'article_cate_id' => 'require',
    ];


    /**
     * 参数描述
     * @var string[]
     */
    protected $field = [
        'id' => 'id',
        'article_cate_id' => '对应父表 admin_article_cate.id',
    ];


    /**
     * @notes 添加场景
     * @return ArticleSubcateValidate
     * @author skyblue
     * @date 2026/04/03 13:57
     */
    public function sceneAdd()
    {
        return $this->only(['article_cate_id']);
    }


    /**
     * @notes 编辑场景
     * @return ArticleSubcateValidate
     * @author skyblue
     * @date 2026/04/03 13:57
     */
    public function sceneEdit()
    {
        return $this->only(['id','article_cate_id']);
    }


    /**
     * @notes 删除场景
     * @return ArticleSubcateValidate
     * @author skyblue
     * @date 2026/04/03 13:57
     */
    public function sceneDelete()
    {
        return $this->only(['id']);
    }


    /**
     * @notes 详情场景
     * @return ArticleSubcateValidate
     * @author skyblue
     * @date 2026/04/03 13:57
     */
    public function sceneDetail()
    {
        return $this->only(['id']);
    }

}