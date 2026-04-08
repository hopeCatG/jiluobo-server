<?php


namespace app\common\model\subcate;


use app\common\model\BaseModel;
use think\model\concern\SoftDelete;


/**
 * ArticleSubcate模型
 * Class ArticleSubcate
 * @package app\common\model\subcate
 */
class ArticleSubcate extends BaseModel
{
    use SoftDelete;
    protected $name = 'article_subcate';
    protected $deleteTime = 'delete_time';

    
}