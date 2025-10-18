<?php

use Encore\Admin\Admin;

Admin::js('/vendor/laravel-admin/laravel-admin/laravel-admin.min.js');
Admin::css('/vendor/laravel-admin/laravel-admin/laravel-admin.min.css');

Admin::script("
    // カスタムスクリプトをここに追加
");

Admin::style("
    // カスタムスタイルをここに追加
");
