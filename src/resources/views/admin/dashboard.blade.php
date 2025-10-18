<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">ようこそ</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
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
                <span class="info-box-text">ユーザー</span>
                <span class="info-box-number">{{ \Encore\Admin\Auth\Database\Administrator::count() }}</span>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-key"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">ロール</span>
                <span class="info-box-number">{{ \Encore\Admin\Auth\Database\Role::count() }}</span>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-list"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">権限</span>
                <span class="info-box-number">{{ \Encore\Admin\Auth\Database\Permission::count() }}</span>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-bars"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">メニュー</span>
                <span class="info-box-number">{{ \Encore\Admin\Auth\Database\Menu::count() }}</span>
            </div>
        </div>
    </div>
</div>

