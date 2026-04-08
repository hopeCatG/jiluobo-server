<?php


namespace app\common\model\consultation;


use app\common\model\BaseModel;
use think\model\concern\SoftDelete;


/**
 * Consult模型
 * Class Consult
 * @package app\common\model\consultation
 */
class Consult extends BaseModel
{
    use SoftDelete;
    protected $name = 'consult';
    protected $deleteTime = 'delete_time';

    
}