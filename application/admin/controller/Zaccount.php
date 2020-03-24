<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2020/2/26
 * Time: 15:04
 */

namespace app\admin\controller;

use logicmodel\admin\ZaccountLogic;
use validate\Zaccuontvalidate;

class Zaccount extends BaseController
{
    private $zaccountLogic;

    public function __construct()
    {
        parent::__construct();
        $this->zaccountLogic = new ZaccountLogic();
    }

    /**
     * 子账户列表
     * @param int $page
     * @param int $pagesize
     * @param string $start_time
     * @param string $end_time
     * @param string $account
     * @return \think\response\Json
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function accountList($page = 1, $pagesize = 10, $start_time = '', $end_time = '', $account = '')
    {
        return json($this->zaccountLogic->accountList($page, $pagesize, $start_time, $end_time, $account));
    }

    /**
     * 添加子账户
     * @param $sub_branch_id
     * @param $branch_id
     * @param $accuont
     * @param $password
     * @param $remark
     * @return \think\response\Json
     * @throws \app\lib\exception\ParamException
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function addAccount($sub_branch_id, $branch_id, $account, $password, $remark = '')
    {
        (new Zaccuontvalidate())->goCheck();
        return json($this->zaccountLogic->addAccount($sub_branch_id, $branch_id, $account, $password, $remark));
    }

    /**
     * 修改子账户账号
     * @param $id
     * @param $account
     * @param $remark
     * @return \think\response\Json
     * @throws \app\lib\exception\ParamException
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function updateAccount($id, $account, $remark)
    {
        (new Zaccuontvalidate())->goCheck('update');
        return json($this->zaccountLogic->updateAccount($id, $account, $remark));
    }

    /**
     * 重置子账户登录密码
     * @param $id
     * @param $password
     * @param $repassword
     * @return \think\response\Json
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function resetPassword($id, $password, $repassword)
    {
        return json($this->zaccountLogic->resetPassword($id, $password, $repassword));
    }

    /**
     * 删除子账户
     * @param $id
     * @return \think\response\Json
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function deleteAccount($id)
    {
        return json($this->zaccountLogic->deleteAccount($id));
    }

    /**
     * 获取银行列表
     * @return \think\response\Json
     */
    public function bankList()
    {
        return json($this->zaccountLogic->bankList());
    }
}