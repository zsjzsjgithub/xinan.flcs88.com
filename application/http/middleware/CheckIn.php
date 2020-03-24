<?php

namespace app\http\middleware;

use app\lib\exception\LoginException;
use comservice\GetRedis;
use datamodel\Zaccount;
use enum\CommonEnum;
use think\facade\Request;


class CheckIn
{
    public function handle($request, \Closure $next)
    {
        $token = Request::header('token');
        if (empty($token)) throw new LoginException();
        $appid = '1573..';
        $redis = GetRedis::getRedis();
        $info = $token . $appid;
        $user_id = $redis->getItem($info);
        if (!$user_id) throw new LoginException();
        $where['is_del'] = CommonEnum::$undeleted;
        $where['id'] = $user_id;
        $field = ['id', 'status','is_sub_branch','sub_branch_id'];
        $data = (new Zaccount())->getByWhere($where, $field);
        if (!$data) return json(\comservice\Response::fail('该账号不存在'));
        if ($data['status'] == 0) return json(\comservice\Response::fail('该账号已被禁用'));
        $request->_user_id = $user_id;
        $request->_is_sub_branch=$data['is_sub_branch'];
        $request->_sub_branch_id=$data['sub_branch_id'];
        return $next($request);
    }
}
