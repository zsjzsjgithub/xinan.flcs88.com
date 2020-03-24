<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2020/2/10
 * Time: 15:43
 */

namespace app\admin\controller;

use logicmodel\AdminLogic;
use think\facade\Request;
use validate\AdminApplyvalidate;
use validate\Checkinvalidate;

class Record extends BaseController
{
    private $adminLogic;

    public function __construct()
    {
        parent::__construct();
        $this->adminLogic = new AdminLogic();
    }

    /**
     * 退出
     * @return \think\response\Json
     */
    public function quit()
    {
        return json($this->adminLogic->quit());
    }

    /**
     * 预约办理业务需求记录
     * @param int $page
     * @param int $pagesize
     * @param string $start_time
     * @param string $end_time
     * @param string $phone
     * @param string $bank_branch
     * @return \think\response\Json
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function recordList($page = 1, $pagesize = 10, $start_time = '', $end_time = '', $phone = '', $bank_id = '')
    {
        return json($this->adminLogic->recordList($page, $pagesize, $start_time, $end_time, $phone, $bank_id));
    }

    /**
     * 修改用户办理业务需求记录
     * @param $id
     * @param $name
     * @param $phone
     * @param $type
     * @param $deposit
     * @param $get
     * @param $loan
     * @param $use_loan
     * @param $bank_type
     * @param $decript
     * @param $is_urgency
     * @param $select_time
     * @param $remark
     * @return \think\response\Json
     * @throws \app\lib\exception\ParamException
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function updateRecord($id, $name, $phone, $type, $deposit, $get, $loan, $use_loan, $bank_type, $decript, $is_urgency, $select_time, $remark)
    {
        (new AdminApplyvalidate())->goCheck();
        return json($this->adminLogic->updateRecord($id, $name, $phone, $type, $deposit, $get, $loan, $use_loan, $bank_type, $decript, $is_urgency, $select_time, $remark));
    }

    /**
     * Excel文件上传
     * @return \think\response\Json
     */
    public function fileUpload()
    {
        $file = Request::file('file');
        return json($this->adminLogic->fileUpload($file));
    }

    /**
     * 导入Excel表
     * @param $file_path
     * @return \think\response\Json
     * @throws \Exception
     */
    public function importExcel($file_path)
    {
        return json($this->adminLogic->importExcel($file_path));
    }

    /**
     * 删除记录
     * @param $ids
     * @return \think\response\Json
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function deleteRecord($ids)
    {
        return json($this->adminLogic->deleteRecord($ids));
    }

    /**
     * 疫情登记防控记录
     * @param int $page
     * @param int $pagesize
     * @param string $start_time
     * @param string $end_time
     * @param string $phone
     * @param string $sub_branch_id
     * @param string $branch_id
     * @return \think\response\Json
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function registerList($page = 1, $pagesize = 10, $start_time = '', $end_time = '', $phone = '', $sub_branch_id = '', $branch_id = '')
    {
        return json($this->adminLogic->registerList($page, $pagesize, $start_time, $end_time, $phone, $sub_branch_id, $branch_id));
    }

    /**
     * 修改疫情登记记录
     * @param $id
     * @param $name
     * @param $address
     * @param $idcard
     * @param $phone
     * @param $animal_heat
     * @param $company
     * @param $remark
     * @return \think\response\Json
     * @throws \app\lib\exception\ParamException
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function updateRegister($id, $name, $address, $idcard, $phone, $animal_heat, $company, $remark)
    {
        (new Checkinvalidate())->goCheck('update');
        return json($this->adminLogic->updateRegister($id, $name, $address, $idcard, $phone, $animal_heat, $company, $remark));
    }

    /**
     * 多选删除疫情记录
     * @param $id
     * @return \think\response\Json
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function deleteRegister($id)
    {
        return json($this->adminLogic->deleteRegister($id));
    }
}