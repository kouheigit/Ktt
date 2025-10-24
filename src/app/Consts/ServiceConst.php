<?php

namespace App\Consts;

class ServiceConst
{
    const TYPE_SAMEDAY = 0;
    const TYPE_SAMEDAY_NAME = '当日予約';
    const TYPE_PREORDER = 1;
    const TYPE_PREORDER_NAME = '事前予約';

    const TYPE_LIST = [
        self::TYPE_SAMEDAY => self::TYPE_SAMEDAY_NAME,
        self::TYPE_PREORDER => self::TYPE_PREORDER_NAME,
    ];

    const STATUS_NOT_ACCEPTED = 0;
    const STATUS_NOT_ACCEPTED_NAME = '予約不可';
    const STATUS_APPLYING = 1;
    const STATUS_APPLYING_NAME = '予約可能';

    const STATUS_LIST = [
        self::STATUS_NOT_ACCEPTED => self::STATUS_NOT_ACCEPTED_NAME,
        self::STATUS_APPLYING => self::STATUS_APPLYING_NAME,
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
