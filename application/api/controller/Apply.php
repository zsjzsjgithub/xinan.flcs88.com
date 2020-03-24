<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2020/2/10
 * Time: 16:12
 */

namespace app\api\controller;

use logicmodel\ApplyLogic;
use validate\Applyvalidate;

class Apply
{
    private $applyLogic;

    public function __construct()
    {
        $this->applyLogic = new ApplyLogic();
    }

    /**
     * h5提交业务需求
     * @param $name
     * @param $phone
     * @param $type
     * @param $deposit
     * @param $get
     * @param $loan
     * @param $bank_type
     * @param $decript
     * @param $is_urgency
     * @param $bank_branch
     * @param $select_time
     * @param $remark
     * @return \think\response\Json
     * @throws \app\lib\exception\ParamException
     */
    public function apply($name, $phone, $type, $deposit, $get, $loan,$use_loan, $bank_type, $decript, $is_urgency, $bank_id,$bank_branch, $select_time, $remark)
    {
        (new Applyvalidate())->goCheck();
        return json($this->applyLogic->apply($name, $phone, $type, $deposit, $get, $loan,$use_loan, $bank_type, $decript, $is_urgency, $bank_id,$bank_branch, $select_time, $remark));
    }

    /**
     * 银行支行列表
     * @return \think\response\Json
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function bankList(){
        return json($this->applyLogic->bankList());
    }
}