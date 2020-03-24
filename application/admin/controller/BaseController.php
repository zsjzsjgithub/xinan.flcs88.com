<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2020/2/10
 * Time: 15:45
 */
namespace app\admin\controller;
use think\Controller;

class BaseController extends Controller
{
    protected $middleware=['CheckAdmin'];
    public function __construct()
    {
        parent::__construct();
    }
}