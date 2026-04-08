<?php


namespace app\adminapi\lists\consultation;


use app\adminapi\lists\BaseAdminDataLists;
use app\common\model\consultation\Consult;
use app\common\lists\ListsSearchInterface;


/**
 * Consult列表
 * Class ConsultLists
 * @package app\adminapi\listsconsultation
 */
class ConsultLists extends BaseAdminDataLists implements ListsSearchInterface
{


    /**
     * @notes 设置搜索条件
     * @return \string[][]
     * @author skyblue
     * @date 2026/04/04 15:20
     */
    public function setSearch(): array
    {
        return [
            '=' => ['theme', 'name', 'email', 'mobile', 'type', 'status'],
        ];
    }


    /**
     * @notes 获取列表
     * @return array
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     * @author skyblue
     * @date 2026/04/04 15:20
     */
    public function lists(): array
    {
        return Consult::where($this->searchWhere)
            ->field(['id', 'theme', 'name', 'email', 'mobile', 'content', 'type', 'status'])
            ->limit($this->limitOffset, $this->limitLength)
            ->order(['id' => 'desc'])
            ->select()
            ->toArray();
    }


    /**
     * @notes 获取数量
     * @return int
     * @author skyblue
     * @date 2026/04/04 15:20
     */
    public function count(): int
    {
        return Consult::where($this->searchWhere)->count();
    }

}