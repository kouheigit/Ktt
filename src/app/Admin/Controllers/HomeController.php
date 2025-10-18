<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Layout\Content;
use Encore\Admin\Facades\Admin;

class HomeController extends Controller
{
    public function index(Content $content)
    {
        return $content
            ->header('ダッシュボード')
            ->description('管理画面ホーム')
            ->body($this->dashboard());
    }

    protected function dashboard()
    {
        return <<<HTML
<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">ようこそ</h3>
    </div>
    <div class="box-body">
        <p>Laravel Admin ダッシュボードへようこそ！</p>
        <p>このダッシュボードから、アプリケーションの管理を行うことができます。</p>
    </div>
</div>

<div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">管理ユーザー</span>
                <span class="info-box-number">{$this->getUserCount()}</span>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-key"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">ロール</span>
                <span class="info-box-number">{$this->getRoleCount()}</span>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-list"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">権限</span>
                <span class="info-box-number">{$this->getPermissionCount()}</span>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-bars"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">メニュー</span>
                <span class="info-box-number">{$this->getMenuCount()}</span>
            </div>
        </div>
    </div>
</div>
HTML;
    }

    protected function getUserCount()
    {
        return \Encore\Admin\Auth\Database\Administrator::count();
    }

    protected function getRoleCount()
    {
        return \Encore\Admin\Auth\Database\Role::count();
    }

    protected function getPermissionCount()
    {
        return \Encore\Admin\Auth\Database\Permission::count();
    }

    protected function getMenuCount()
    {
        return \Encore\Admin\Auth\Database\Menu::count();
    }
}
