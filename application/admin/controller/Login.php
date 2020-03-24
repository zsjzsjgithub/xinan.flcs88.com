<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2020/2/10
 * Time: 15:35
 */

namespace app\admin\controller;

use logicmodel\AdminLogic;

class Login
{
    private $adminLogic;

    public function __construct()
    {
        $this->adminLogic = new AdminLogic();
    }

    /**
     * 登录
     * @param $name
     * @param $password
     * @return \think\response\Json
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function login($name, $password)
    {//dump(md5('xinan2020..*8790'));die;
        return json($this->adminLogic->login($name, $password));
    }
}