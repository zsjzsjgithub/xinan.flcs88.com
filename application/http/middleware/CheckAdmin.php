<?php

namespace app\http\middleware;

use app\lib\exception\LoginException;
use comservice\Response;
use datamodel\Admin;
use enum\CommonEnum;
use think\facade\Session;

class CheckAdmin
{
    public function handle($request, \Closure $next)
    {
        if (!Session::has('admin_id'))throw new LoginException();
        $admin_id=Session::get('admin_id');
        $where['is_del']=CommonEnum::$undeleted;
        $where['id']=$admin_id;
        $data=(new Admin())->getByWhere($where);
        if (!$data)return json(Response::fail());
      //  $admin_id=1;
       $request->_admin_id=$admin_id;
       $request->_admin_role_id=$data['role_id'];
        $request->_admin_role_id=1;
       return $next($request);
    }
}
