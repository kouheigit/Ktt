<?php

namespace App\Consts;

class NewsConst
{
    const TYPE_VIEW_NOW = 0;
    const TYPE_VIEW_NOW_NAME = 'すぐに表示';
    const TYPE_VIEW_STARTDATE = 1;
    const TYPE_VIEW_STARTDATE_NAME ='開始日時で表示';
    const TYPE_VIEW_EWNDDATE = 2;
    const TYPE_VIEW_ENDDATE_NAME = '開始・終了の間は表示';

    const TYPE_LIST = [
        self::TYPE_VIEW_NOW =>self::TYPE_VIEW_NOW_NAME,
        self::TYPE_VIEW_STARTDATE=>self::TYPE_VIEW_STARTDATE_NAME,
        self::TYPE_VIEW_EWNDDATE=>self::TYPE_VIEW_ENDDATE_NAME,
    ];

    const STATUS_HIDDEN = 0;
    const STATUS_HIDDEN_NAME ='非表示';
    const STATUS_SHOW = 1;
    const STATUS_SHOW_NAME = 1;

    const STATUS_LIST = [
        self::STATUS_HIDDEN => self::STATUS_HIDDEN_NAME,
        self::STATUS_SHOW =>  self::STATUS_SHOW_NAME,
    ];
}
