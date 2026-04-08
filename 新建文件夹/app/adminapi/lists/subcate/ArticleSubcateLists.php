<?php


namespace app\adminapi\lists\subcate;


use app\adminapi\lists\BaseAdminDataLists;
use app\common\model\subcate\ArticleSubcate;
use app\common\lists\ListsSearchInterface;


/**
 * ArticleSubcate列表
 * Class ArticleSubcateLists
 * @package app\adminapi\listssubcate
 */
class ArticleSubcateLists extends BaseAdminDataLists implements ListsSearchInterface
{


    /**
     * @notes 设置搜索条件
     * @return \string[][]
     * @author skyblue
     * @date 2026/04/03 13:57
     */
    public function setSearch(): array
    {
        return [
            '=' => ['article_cate_id', 'code', 'name', 'name_en'],
        ];
    }


    /**
     * @notes 获取列表
     * @return array
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     * @author skyblue
     * @date 2026/04/03 13:57
     */
    public function lists(): array
    {
        return ArticleSubcate::where($this->searchWhere)
            ->field(['id', 'article_cate_id', 'code', 'name', 'name_en', 'flag', 'is_show'])
            ->limit($this->limitOffset, $this->limitLength)
            ->order(['id' => 'desc'])
            ->select()
            ->toArray();
    }


    /**
     * @notes 获取数量
     * @return int
     * @author skyblue
     * @date 2026/04/03 13:57
     */
    public function count(): int
    {
        return ArticleSubcate::where($this->searchWhere)->count();
    }

}