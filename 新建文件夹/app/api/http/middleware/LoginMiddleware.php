<?php

declare (strict_types=1);

namespace app\api\http\middleware;


use app\common\cache\UserTokenCache;
use app\common\service\JsonService;
use app\api\service\UserTokenService;
use think\facade\Config;

class LoginMiddleware
{
    /**
     * @notes 登录验证
     * @param $request
     * @param \Closure $next
     * @return mixed|\think\response\Json
     * @author 令狐冲
     * @date 2021/7/1 17:33
     */
    public function handle($request, \Closure $next)
    {
        return $next($request);
    }

}