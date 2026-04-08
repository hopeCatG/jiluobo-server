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
     * @author likeadmin
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
     * @author likeadmin
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
     * @author likeadmin
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
     * @author likeadmin
     * @date 2026/04/04 15:20
     */
    public static function detail($params): array
    {
        return Consult::findOrEmpty($params['id'])->toArray();
    }
}