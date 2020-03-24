<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/12/31 0031
 * Time: 17:21
 */
namespace app\api\controller;
use think\Controller;
class BaseController extends Controller
{
    protected $middleware=['CheckApi'];
    public function __construct()
    {
        parent::__construct();
    }
    public function wechatPay(){

    }
}