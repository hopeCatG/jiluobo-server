<?php



namespace app\adminapi\controller\subcate;


use app\adminapi\controller\BaseAdminController;
use app\adminapi\lists\subcate\ArticleSubcateLists;
use app\adminapi\logic\subcate\ArticleSubcateLogic;
use app\adminapi\validate\subcate\ArticleSubcateValidate;


/**
 * ArticleSubcate控制器
 * Class ArticleSubcateController
 * @package app\adminapi\controller\subcate
 */
class ArticleSubcateController extends BaseAdminController
{


    /**
     * @notes 获取列表
     * @return \think\response\Json
     * @author skyblue
     * @date 2026/04/03 13:57
     */
    public function lists()
    {
        return $this->dataLists(new ArticleSubcateLists());
    }


    /**
     * @notes 添加
     * @return \think\response\Json
     * @author skyblue
     * @date 2026/04/03 13:57
     */
    public function add()
    {
        $params = (new ArticleSubcateValidate())->post()->goCheck('add');
        $result = ArticleSubcateLogic::add($params);
        if (true === $result) {
            return $this->success('添加成功', [], 1, 1);
        }
        return $this->fail(ArticleSubcateLogic::getError());
    }


    /**
     * @notes 编辑
     * @return \think\response\Json
     * @author skyblue
     * @date 2026/04/03 13:57
     */
    public function edit()
    {
        $params = (new ArticleSubcateValidate())->post()->goCheck('edit');
        $result = ArticleSubcateLogic::edit($params);
        if (true === $result) {
            return $this->success('编辑成功', [], 1, 1);
        }
        return $this->fail(ArticleSubcateLogic::getError());
    }


    /**
     * @notes 删除
     * @return \think\response\Json
     * @author skyblue
     * @date 2026/04/03 13:57
     */
    public function delete()
    {
        $params = (new ArticleSubcateValidate())->post()->goCheck('delete');
        ArticleSubcateLogic::delete($params);
        return $this->success('删除成功', [], 1, 1);
    }


    /**
     * @notes 获取详情
     * @return \think\response\Json
     * @author skyblue
     * @date 2026/04/03 13:57
     */
    public function detail()
    {
        $params = (new ArticleSubcateValidate())->goCheck('detail');
        $result = ArticleSubcateLogic::detail($params);
        return $this->data($result);
    }


}