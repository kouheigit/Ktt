<?php

namespace App\Consts;

class UserConst
{
    //クラス定数で値を変更できないようにしている
    const TYPE_OWNER = 0;
    const TYPE_OWNER_NAME = 'オーナー';
    const TYPE_FAMILY = 1;
    const TYPE_FAMILY_NAME = "ご家族";
    const TYPE_FRIEND = 2;
    const TYEPE_FRIEND_NAME = "お友達";
    const TYPE_INVITATION = 3;
    const TYPE_INVITATION_NAME = 'INVITATION';

    const AGREE_PRIVATE = 0;
    const AGREE_PRIVATE_NAME = "お友達";
    const AGREE_CORP =1;
    const AGREE_CORP_NAME = '法人';

    const TYPE_LIST = [

    ];


}

