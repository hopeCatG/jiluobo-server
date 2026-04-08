<?php


namespace app\common\model\article;

use app\common\model\BaseModel;
use think\model\concern\SoftDelete;

/**
 * 资讯分类管理模型
 * Class ArticleCate
 * @package app\common\model\article;
 */
class ArticleSubcate extends BaseModel
{
    use SoftDelete;

    protected $deleteTime = 'delete_time';




}