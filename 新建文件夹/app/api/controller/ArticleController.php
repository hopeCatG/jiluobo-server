<?php


namespace app\api\controller;


use app\api\lists\article\ArticleCollectLists;
use app\api\lists\article\ArticleLists;
use app\api\logic\ArticleLogic;
use think\facade\Db;

/**
 * 文章管理
 * Class ArticleController
 * @package app\api\controller
 */
class ArticleController extends BaseApiController
{

    public array $notNeedLogin = ['lists', 'cate', 'detail','continentsData'];


    /**
     * @notes 文章列表
     * @return \think\response\Json
     * @author 段誉
     * @date 2022/9/20 15:30
     */
    public function lists()
    {
        return $this->dataLists(new ArticleLists());
    }


    /**
     * @notes 文章分类列表
     * @return \think\response\Json
     * @author 段誉
     * @date 2022/9/20 15:30
     */
    public function cate()
    {
        return $this->data(ArticleLogic::cate());
    }


    /**
     * @notes 收藏列表
     * @return \think\response\Json
     * @author 段誉
     * @date 2022/9/20 16:31
     */
    public function collect()
    {
        return $this->dataLists(new ArticleCollectLists());
    }


    /**
     * @notes 文章详情
     * @return \think\response\Json
     * @author 段誉
     * @date 2022/9/20 17:09
     */
    public function detail()
    {
        $id = $this->request->get('id/d');
        $result = ArticleLogic::detail($id, $this->userId);
        return $this->data($result);
    }


    /**
     * @notes 加入收藏
     * @return \think\response\Json
     * @author 段誉
     * @date 2022/9/20 17:01
     */
    public function addCollect()
    {
        $articleId = $this->request->post('id/d');
        ArticleLogic::addCollect($articleId, $this->userId);
        return $this->success('操作成功');
    }


    /**
     * @notes 取消收藏
     * @return \think\response\Json
     * @author 段誉
     * @date 2022/9/20 17:01
     */
    public function cancelCollect()
    {
        $articleId = $this->request->post('id/d');
        ArticleLogic::cancelCollect($articleId, $this->userId);
        return $this->success('操作成功');
    }
    
    
   public function continentsData()
{
    // 查询所有大洲
   $continents = Db::name('article_cate')
    ->where([
        'is_show' => 1,
    ])
    ->whereNull('delete_time')
    ->select()
    ->toArray();

    // 查询所有子类
    $subCategories = Db::name('article_subcate')
        ->field('id,name,name_en,flag,article_cate_id,code')
         ->where([
        'is_show' => 1,
    ])
    ->whereNull('delete_time')
        ->select()
        ->toArray();

    // 查询每个子类下文章数量（offices）
    $officesData = Db::name('article')
        ->where('is_show',1)
        ->field('article_subcate_id, COUNT(*) as offices')
        ->group('article_subcate_id')
        ->select()
        ->toArray();

    // 按 article_subcate_id 组装 offices
    $officesGrouped = [];
    foreach ($officesData as $item) {
        $officesGrouped[$item['article_subcate_id']] = (int)$item['offices'];
    }

    // 按 article_cate_id 分组子类，并挂载 offices
    $subGrouped = [];
    foreach ($subCategories as $sub) {
        $sub['offices'] = $officesGrouped[$sub['id']] ?? 0;
        $subGrouped[$sub['article_cate_id']][] = $sub;
    }

    // 给每个大洲挂载对应子类
    foreach ($continents as &$continent) {
        $continent['countriesData'] = $subGrouped[$continent['id']] ?? [];
    }

    return $this->data($continents);
}


}