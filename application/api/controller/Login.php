<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/12/31 0031
 * Time: 15:38
 */

namespace app\api\controller;

use datamodel\AwardRecord;
use EasyWeChat\Factory;
use logicmodel\UserLogic;
use logicmodel\WechatLogic;
use think\Controller;
use think\facade\Session;

class Login extends Controller
{
    private $userLogic;
    private $config;

    public function __construct()
    {
        parent::__construct();
        $this->userLogic = new UserLogic();
        $this->config = config('wechat.official_account.default');
    }

    public function login()
    {
        $apps = Factory::officialAccount($this->config);
        return $apps->oauth->redirect();
    }

    /**
     * 登录回调保存用户信息
     * @return string|void
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \think\exception\PDOException
     */
    public function back()
    {
        $user_info = Factory::officialAccount($this->config)->oauth->user()->toArray();
        $res = $this->userLogic->back($user_info);
        if (!$res) return "<script>alert('用户信息错误');</script>";
        $info = config('login.info') . 'user_id';
        $uid = Session::get($info);
        $user_data = (new \datamodel\User())->getById($uid);
        if (!$user_data) return "<script>alert('用户信息错误');</script>";
        return $this->redirect('/xiaokeai/home.html');
    }
    /**
     * 清除微信缓存
     * @return string
     */
    public function clearCacheUser()
    {
        $info = config('login.info') . 'user_id';
        Session::delete($info);
        return '缓存已清除';
    }
    //补发用户红包
    public function send(){
    return json((new WechatLogic())->send());
}
}