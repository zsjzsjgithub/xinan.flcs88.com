<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2020/3/5
 * Time: 15:09
 */
namespace app\admin\controller;
use logicmodel\AdminLogic;

class Task
{
    private $adminLogic;
    public function __construct()
    {
        $this->adminLogic=new AdminLogic();
    }

    /**
     * 定时任务，有新的预约信息，会定时发短信提醒子账户
     * @param $token
     * @return \think\response\Json
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \think\exception\PDOException
     */
    public function timingSms($token){
        return json($this->adminLogic->timingSms($token));
    }
}