<?php
namespace app\controller;
class IndexController extends BaseController
{
    public function initialize()
    {
        parent::initialize();
    }

    public function index()
    {
        return \think\facade\View::fetch('index');
    }
}