<?php


namespace app\adminapi\logic\city;


use app\common\model\city\ArticleCity;
use app\common\logic\BaseLogic;
use think\facade\Db;


/**
 * ArticleCity逻辑
 * Class ArticleCityLogic
 * @package app\adminapi\logic\city
 */
class ArticleCityLogic extends BaseLogic
{


    /**
     * @notes 添加
     * @param array $params
     * @return bool
     * @author skyblue
     * @date 2026/06/29 09:10
     */
    public static function add(array $params): bool
    {
        Db::startTrans();
        try {
            ArticleCity::create([
                'region_id' => $params['region_id'],
                'city_name' => $params['city_name'],
                'cid' => $params['cid'],
                'address' => $params['address'],
                'lat_lng' => $params['lat_lng']
            ]);

            Db::commit();
            return true;
        } catch (\Exception $e) {
            Db::rollback();
            self::setError($e->getMessage());
            return false;
        }
    }


    /**
     * @notes 编辑
     * @param array $params
     * @return bool
     * @author skyblue
     * @date 2026/06/29 09:10
     */
    public static function edit(array $params): bool
    {
        Db::startTrans();
        try {
            ArticleCity::where('id', $params['id'])->update([
                'region_id' => $params['region_id'],
                'city_name' => $params['city_name'],
                'cid' => $params['cid'],
                'address' => $params['address'],
                'lat_lng' => $params['lat_lng']
            ]);

            Db::commit();
            return true;
        } catch (\Exception $e) {
            Db::rollback();
            self::setError($e->getMessage());
            return false;
        }
    }


    /**
     * @notes 删除
     * @param array $params
     * @return bool
     * @author skyblue
     * @date 2026/06/29 09:10
     */
    public static function delete(array $params): bool
    {
        return ArticleCity::destroy($params['id']);
    }


    /**
     * @notes 获取详情
     * @param $params
     * @return array
     * @author skyblue
     * @date 2026/06/29 09:10
     */
    public static function detail($params): array
    {
        return ArticleCity::findOrEmpty($params['id'])->toArray();
    }

    public static function mapLists()
    {

    }
}