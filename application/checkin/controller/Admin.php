<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2020/2/28
 * Time: 16:45
 */

namespace app\checkin\controller;

use logicmodel\checkin\CheckinLogic;

class Admin extends BaseController
{
    private $checkinLogic;

    public function __construct()
    {
        parent::__construct();
        $this->checkinLogic = new CheckinLogic();
    }

    /**
     * 子账户获取用户登记列表
     * @param int $page
     * @param int $pagesize
     * @return \think\response\Json
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function registerList($page = 1, $pagesize = 10)
    {
        return json($this->checkinLogic->registerList($page, $pagesize));
    }

    /**
     * 子账户删除登记记录
     * @param $id
     * @return \think\response\Json
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function deleteRegister($id)
    {
        return json($this->checkinLogic->deleteRegister($id));
    }

    /**
     * 退出
     * @return \think\response\Json
     */
    public function quit()
    {
        return json($this->checkinLogic->quit());
    }

    /**
     * h5展示预约记录
     * @param int $page
     * @param int $pagesize
     * @return \think\response\Json
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function businessRecord($page = 1, $pagesize = 10)
    {
        return json($this->checkinLogic->businessRecord($page, $pagesize));
    }

    /**
     * 删除预约记录
     * @param $id
     * @return \think\response\Json
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function deleteBusiness($id)
    {
        return json($this->checkinLogic->deleteBusiness($id));
    }

}