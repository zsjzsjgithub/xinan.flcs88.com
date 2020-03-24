<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2020/2/28
 * Time: 15:52
 */

namespace app\checkin\controller;

use logicmodel\checkin\CheckinLogic;

class Login
{
    private $checkinLogic;

    public function __construct()
    {
        $this->checkinLogic = new CheckinLogic();
    }

    /**
     * 登录
     * @param $account
     * @param $password
     * @return \think\response\Json
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function login($account, $password,$code)
    {
        return json($this->checkinLogic->login($account, $password,$code));
    }

    /**
     * 发送手机短信验证码
     * @param $phone
     * @return \think\response\Json
     */
    public function sendSms($phone){
        return json($this->checkinLogic->sendSms($phone));
    }

    /**
     * 判断该账号是否是支行的账号（是，登录时候才可以选择）
     * @param $account
     * @return \think\response\Json
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function isSubbranch($account){
       return json($this->checkinLogic->isSubbranch($account));
    }
}