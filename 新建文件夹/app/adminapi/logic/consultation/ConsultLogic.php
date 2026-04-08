<?php


namespace app\adminapi\logic\consultation;


use app\common\model\consultation\Consult;
use app\common\logic\BaseLogic;
use think\facade\Db;


/**
 * Consult逻辑
 * Class ConsultLogic
 * @package app\adminapi\logic\consultation
 */
class ConsultLogic extends BaseLogic
{


    /**
     * @notes 添加
     * @param array $params
     * @return bool
     * @author skyblue
     * @date 2026/04/04 15:20
     */
    public static function add(array $params): bool
    {
        Db::startTrans();
        try {
            Consult::create([
                'theme' => $params['theme'],
                'name' => $params['name'],
                'email' => $params['email'],
                'mobile' => $params['mobile'],
                'content' => $params['content'],
                'type' => $params['type'],
                'status' => $params['status']
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
     * @date 2026/04/04 15:20
     */
    public static function edit(array $params): bool
    {
        Db::startTrans();
        try {
            Consult::where('id', $params['id'])->update([
                'theme' => $params['theme'],
                'name' => $params['name'],
                'email' => $params['email'],
                'mobile' => $params['mobile'],
                'content' => $params['content'],
                'type' => $params['type'],
                'status' => $params['status']
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
     * @date 2026/04/04 15:20
     */
    public static function delete(array $params): bool
    {
        return Consult::destroy($params['id']);
    }


    /**
     * @notes 获取详情
     * @param $params
     * @return array
     * @author skyblue
     * @date 2026/04/04 15:20
     */
    public static function detail($params): array
    {
        return Consult::findOrEmpty($params['id'])->toArray();
    }
}