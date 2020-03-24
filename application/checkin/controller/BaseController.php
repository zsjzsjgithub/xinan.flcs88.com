<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2020/2/28
 * Time: 16:43
 */
namespace app\checkin\controller;
use think\Controller;

class BaseController extends Controller
{
    protected $middleware=['CheckIn'];
    public function __construct()
    {
        parent::__construct();
    }
}