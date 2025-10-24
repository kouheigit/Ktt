<?php

namespace App\Consts;

class ReservationConst
{
    const STATUS_NOT_ACCEPTED = 0;
    const STATUS_NOT_ACCEPTED_NAME = '予約不可';
    const STATUS_APPLYING = 1;
    const STATUS_APPLYING_NAME = '未確定';
    const STATUS_UNDER_RESERVATION = 2;


    const STATUS_UNDER_RESERVATION_NAME = '申込中';
    const STATUS_RESERVED = 3;
    const STATUS_RESERVED_NAME = '確定済み';
    const STATUS_INVITATION = 4;
    const STATUS_INVITATION_NAME = '招待';
    const STATUS_UNDER_RELEASE = 6;
    const STATUS_UNDER_RELEASE_NAME ='リリース申請中';
    const STATUS_RELEASED = 7;
    const STATUS_RELEASE_NAME = 'リリース済';
    const STATUS_CANCELING = 8;
    const STATUS_CANCELING_NAME ='キャンセル中';
    const STATUS_CANCELED = 9;
    const STATUS_CANCELED_NAME = 'キャンセル';


    const PAYMENT_OWNER = 0;
    const PAYMENT_ONEWR_NAME ='オーナーにまとめて請求';
    const PAYMENT_OTHER = 1;
    const PAYMENT_OTHER_NAME = 'クレジットカードで都度支払';
    const STATUS_LIST = [
        self::STATUS_NOT_ACCEPTED => self::STATUS_NOT_ACCEPTED_NAME,
        self::STATUS_APPLYING => self::STATUS_APPLYING_NAME,
        self::STATUS_UNDER_RESERVATION => self::STATUS_UNDER_RESERVATION_NAME,
        self::STATUS_RESERVED=>self::STATUS_RESERVED_NAME,
        self::STATUS_CANCELED => self::STATUS_CANCELED_NAME,
    ];
    const PAYMENT_LIST = [
        self::PAYMENT_OWNER =>self::PAYMENT_OWNER_NAME,
        self::PAYMENT_OTHER => self::PAYMENT_OTHER_NAME,

    ];
    
}
