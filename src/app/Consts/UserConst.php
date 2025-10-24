<?php

namespace App\Consts;

class UserConst
{
    const TYPE_OWNER = 0;
    const TYPE_OWNER_NAME = 'オーナー';
    const TYPE_FAMILY = 1;
    const TYPE_FAMILY_NAME = "ご家族";
    const TYPE_FRIEND = 2;
    const TYPE_FRIEND_NAME = "お友達";
    const TYPE_INVITATION = 3;
    const TYPE_INVITATION_NAME = 'INVITATION';

    const AGREE_PRIVATE = 0;
    const AGREE_PRIVATE_NAME = '個人';
    const AGREE_CORP = 1;
    const AGREE_CORP_NAME = '法人';

    /*使い方
@use(App\Consts\UserConst)
{{-- その後は短く書ける --}}
@foreach(UserConst::TYPE_LIST as $value => $label)
 <option value="{{ $value }}">{{ $label }}</option>
@endforeach
     */

    const TYPE_LIST = [
        self::TYPE_OWNER => self::TYPE_OWNER_NAME,
        self::TYPE_FAMILY => self::TYPE_FAMILY_NAME,
        self::TYPE_FRIEND => self::TYPE_FRIEND_NAME,
        self::TYPE_INVITATION => self::TYPE_INVITATION_NAME,
    ];

    const AGREE_LIST = [
        self::AGREE_PRIVATE => self::AGREE_PRIVATE_NAME,
        self::AGREE_CORP => self::AGREE_CORP_NAME,
    ];
}
