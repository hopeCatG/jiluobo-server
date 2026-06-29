<?php


namespace app\adminapi\lists\city;


use app\adminapi\lists\BaseAdminDataLists;
use app\common\model\city\ArticleCity;
use app\common\lists\ListsSearchInterface;


/**
 * ArticleCity列表
 * Class ArticleCityLists
 * @package app\adminapi\listscity
 */
class ArticleCityLists extends BaseAdminDataLists implements ListsSearchInterface
{


    /**
     * @notes 设置搜索条件
     * @return \string[][]
     * @author skyblue
     * @date 2026/06/29 09:10
     */
    public function setSearch(): array
    {
        return [
            '=' => ['region_id', 'city_name', 'lat_lng'],
        ];
    }


    /**
     * @notes 获取列表
     * @return array
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     * @author skyblue
     * @date 2026/06/29 09:10
     */
    public function lists(): array
    {
        return ArticleCity::where($this->searchWhere)
            ->append(['cate_name','branch_name'])
            ->field(['id', 'region_id', 'city_name', 'lat_lng','cid','address'])
            ->limit($this->limitOffset, $this->limitLength)
            ->order(['id' => 'desc'])
            ->select()
            ->toArray();
    }


    /**
     * @notes 获取数量
     * @return int
     * @author skyblue
     * @date 2026/06/29 09:10
     */
    public function count(): int
    {
        return ArticleCity::where($this->searchWhere)->count();
    }

}