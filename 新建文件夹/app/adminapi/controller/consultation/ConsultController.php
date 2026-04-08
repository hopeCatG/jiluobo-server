<?php



namespace app\adminapi\controller\consultation;


use app\adminapi\controller\BaseAdminController;
use app\adminapi\lists\consultation\ConsultLists;
use app\adminapi\logic\consultation\ConsultLogic;
use app\adminapi\validate\consultation\ConsultValidate;


/**
 * Consult控制器
 * Class ConsultController
 * @package app\adminapi\controller\consultation
 */
class ConsultController extends BaseAdminController
{


    /**
     * @notes 获取列表
     * @return \think\response\Json
     * @author skyblue
     * @date 2026/04/04 15:20
     */
    public function lists()
    {
        return $this->dataLists(new ConsultLists());
    }


    /**
     * @notes 添加
     * @return \think\response\Json
     * @author skyblue
     * @date 2026/04/04 15:20
     */
    public function add()
    {
        $params = (new ConsultValidate())->post()->goCheck('add');
        $result = ConsultLogic::add($params);
        if (true === $result) {
            return $this->success('添加成功', [], 1, 1);
        }
        return $this->fail(ConsultLogic::getError());
    }


    /**
     * @notes 编辑
     * @return \think\response\Json
     * @author skyblue
     * @date 2026/04/04 15:20
     */
    public function edit()
    {
        $params = (new ConsultValidate())->post()->goCheck('edit');
        $result = ConsultLogic::edit($params);
        if (true === $result) {
            return $this->success('编辑成功', [], 1, 1);
        }
        return $this->fail(ConsultLogic::getError());
    }


    /**
     * @notes 删除
     * @return \think\response\Json
     * @author skyblue
     * @date 2026/04/04 15:20
     */
    public function delete()
    {
        $params = (new ConsultValidate())->post()->goCheck('delete');
        ConsultLogic::delete($params);
        return $this->success('删除成功', [], 1, 1);
    }


    /**
     * @notes 获取详情
     * @return \think\response\Json
     * @author skyblue
     * @date 2026/04/04 15:20
     */
    public function detail()
    {
        $params = (new ConsultValidate())->goCheck('detail');
        $result = ConsultLogic::detail($params);
        return $this->data($result);
    }


}