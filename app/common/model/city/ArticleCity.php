<?php


namespace app\common\model\city;


use app\common\model\BaseModel;
use app\common\model\article\ArticleSubcate;
use app\common\model\article\ArticleCate;

/**
 * ArticleCity模型
 * Class ArticleCity
 * @package app\common\model\city
 */
class ArticleCity extends BaseModel
{
    
    protected $name = 'article_city';

    /**
     * @notes  获取分类名称
     * @param $value
     * @param $data
     * @return string
     * @author heshihu
     * @date 2022/2/22 9:53
     */
    public function getCateNameAttr($value, $data)
    {
        return ArticleCate::where('id', $data['cid'])->value('name');
    }

    /**
     * @notes  获取二级分类名称
     */
    public function getBranchNameAttr($value, $data)
    {
        return ArticleSubcate::where('id', $data['region_id'])->value('name');
    }
    
}