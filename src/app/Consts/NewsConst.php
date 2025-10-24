<?php

namespace App\Consts;

class NewsConst
{
    const TYPE_VIEW_NOW = 0;
    const TYPE_VIEW_NOW_NAME = 'すぐに表示';
    const TYPE_VIEW_STARTDATE = 1;
    const TYPE_VIEW_STARTDATE_NAME = '開始日時で表示';
    const TYPE_VIEW_EWNDDATE = 2;
    const TYPE_VIEW_ENDDATE_NAME = '開始・終了の間は表示';

    const TYPE_LIST = [
        self::TYPE_VIEW_NOW => self::TYPE_VIEW_NOW_NAME,
        self::TYPE_VIEW_STARTDATE => self::TYPE_VIEW_STARTDATE_NAME,
        self::TYPE_VIEW_EWNDDATE => self::TYPE_VIEW_ENDDATE_NAME,
    ];

    const STATUS_HIDDEN = 0;
    const STATUS_HIDDEN_NAME = '非表示';
    const STATUS_SHOW = 1;
    const STATUS_SHOW_NAME = '表示';

    const STATUS_LIST = [
        self::STATUS_HIDDEN => self::STATUS_HIDDEN_NAME,
        self::STATUS_SHOW => self::STATUS_SHOW_NAME,
    ];


    const TAB_1 = 0;
    const TAB_1_NAME = '事前予約のお料理';
    const TAB_2 = 1;
    const TAB_2_NAME = '事前予約のサービス';
    const TAB_3 = 2;
    const TAB_3_NAME = 'ご利用当日のサービス';
    const TAB_4 = 3;
    const TAB_4_NAME = '付帯サービス';


    const TAB_LIST = [
        self::TAB_1 => self::TAB_1_NAME,
        self::TAB_2 => self::TAB_2_NAME,
        self::TAB_3 => self::TAB_3_NAME,
        self::TAB_4 => self::TAB_4_NAME,
    ];

}
