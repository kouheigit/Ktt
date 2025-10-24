<?php

namespace App\Consts;

class ServiceConst
{
    const TYPE_SAMEDAY = 0;
    const TYPE_SAME_NAME ='当日予約';
    const TYPE_PREORDER = 1;
    const TYPE_PREORDER_NAME ='事前予約';

    const TYPE_LIST = [
        self::TYPE_SAMEDAY =>  self::TYPE_SAME_NAME,
        self::TYPE_PREORDER => self::TYPE_PREORDER_NAME,
    ];

    const STATUS_NOT_ACCEPTED = 0;
    const STATUS_NOT_ACCEPTED_NAME= '予約不可';
    const STATUS_APPLYING = 1;
    const STATUS_APPLYING_NAME = '予約可能';

    const STATUS_LIST = [
        self::STATUS_NOT_ACCEPTED => self::STATUS_NOT_ACCEPTED_NAME,
        self::STATUS_APPLYING=>self::STATUS_APPLYING_NAME,
    ];

}
