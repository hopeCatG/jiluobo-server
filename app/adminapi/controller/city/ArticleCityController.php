<?php



namespace app\adminapi\controller\city;


use app\adminapi\controller\BaseAdminController;
use app\adminapi\lists\city\ArticleCityLists;
use app\adminapi\logic\city\ArticleCityLogic;
use app\adminapi\validate\city\ArticleCityValidate;


/**
 * ArticleCity控制器
 * Class ArticleCityController
 * @package app\adminapi\controller\city
 */
class ArticleCityController extends BaseAdminController
{

    public array $notNeedLogin = ['lists'];

    /**
     * @notes 获取列表
     * @return \think\response\Json
     * @author skyblue
     * @date 2026/06/29 09:10
     */
    public function lists()
    {
        return $this->dataLists(new ArticleCityLists());
    }


    /**
     * @notes 添加
     * @return \think\response\Json
     * @author skyblue
     * @date 2026/06/29 09:10
     */
    public function add()
    {
        $params = (new ArticleCityValidate())->post()->goCheck('add');
        $result = ArticleCityLogic::add($params);
        if (true === $result) {
            return $this->success('添加成功', [], 1, 1);
        }
        return $this->fail(ArticleCityLogic::getError());
    }


    /**
     * @notes 编辑
     * @return \think\response\Json
     * @author skyblue
     * @date 2026/06/29 09:10
     */
    public function edit()
    {
        $params = (new ArticleCityValidate())->post()->goCheck('edit');
        $result = ArticleCityLogic::edit($params);
        if (true === $result) {
            return $this->success('编辑成功', [], 1, 1);
        }
        return $this->fail(ArticleCityLogic::getError());
    }


    /**
     * @notes 删除
     * @return \think\response\Json
     * @author skyblue
     * @date 2026/06/29 09:10
     */
    public function delete()
    {
        $params = (new ArticleCityValidate())->post()->goCheck('delete');
        ArticleCityLogic::delete($params);
        return $this->success('删除成功', [], 1, 1);
    }


    /**
     * @notes 获取详情
     * @return \think\response\Json
     * @author skyblue
     * @date 2026/06/29 09:10
     */
    public function detail()
    {
        $params = (new ArticleCityValidate())->goCheck('detail');
        $result = ArticleCityLogic::detail($params);
        return $this->data($result);
    }


    public function mapLists()
    {
        $result = ArticleCityLogic::mapLists();
        return $this->data($result);
    }

}