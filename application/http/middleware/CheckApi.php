<?php

namespace app\http\middleware;

use app\lib\exception\LoginException;
use comservice\Response;
use datamodel\User;
use think\facade\Session;

class CheckApi
{
    public function handle($request, \Closure $next)
    {
        $info = config('login.info') . 'user_id';
        if (!Session::has($info)) throw new LoginException();
        $uid = Session::get($info);
        if (empty($uid) || $uid <= 0) throw new LoginException();
        //$uid=8;
        $userInfo = (new User())->getById($uid);
        if (!$userInfo) return json(Response::fail('用户信息错误'));
        $request->_user_id = $userInfo['id'];
        $request->_user_info = $userInfo;
        return $next($request);
    }
}
