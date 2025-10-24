<?php

namespace App\Consts;

class AddOrderConst
{
    const STATUS_ORDER = 0;
    const STATUS_ORDER_NAME ='申込中';
    const STATUS_RESERVED = 1;
    const STATUS_RESERVED_NAME ='申込中';
    const STATUS_CANCELED = 9;
    const STATUS_CANCELED_NAME = 'キャンセル';

    const STATUS_LIST = [
        self::STATUS_ORDER =>self::STATUS_ORDER_NAME,
        self::STATUS_RESERVED =>self::STATUS_RESERVED_NAME,
        self::STATUS_CANCELED => self::STATUS_CANCELED_NAME,
    ];

    const PAYMENT_OWNER = 0;
    const PAYMENT_OWNER_NAME = 'オーナーにまとめて請求';
    const PAYMENT_OTHER = 1;
    const PAYMENT_OTHER_NAME = 'クレジッットカードで都度支払';

    const PAYMENT_LIST = [
        self::PAYMENT_OWNER => self::PAYMENT_OWNER_NAME,
        self::PAYMENT_OTHER => self::PAYMENT_OTHER_NAME,
    ];

    const PAYMENT_STATUS_UNPAID = 0;
    const PAYMENT_STATUS_UNPAID_NAME = '未決済';
    const PAYMENT_STATUS_PAID = 1;
    const PAYMENT_STATUS_PAID_NAME = '決済完了';
    const PAYMENT_STATUS_CANCELED = 2;
    const PAYMENT_STATUS_CANCELED_NAME ='決済取消完了';
    const PAYMENT_STATUS_ERROR = 9;
    const PAYMENT_STATUS_ERROR_NAME = '決済失敗';

    const PAYMENT_STATUS_LIST = [
        self::PAYMENT_STATUS_UNPAID => self::PAYMENT_STATUS_UNPAID_NAME,
        self::PAYMENT_STATUS_PAID => self::PAYMENT_STATUS_PAID_NAME,
        self::PAYMENT_STATUS_CANCELED =>self::PAYMENT_STATUS_CANCELED_NAME,
    ];

}
