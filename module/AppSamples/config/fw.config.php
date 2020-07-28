<?php

$arrayCfg[] = [

    //    'APP_MENU_VIEW_FILE' => 'layout/menu',
    //
    //    'SESSION' => true,
    //
    //    'SESSION_MEMCACHE' => false,
    //
    //    'SUBDOMAIN' => false,
    //    'SUBDOMAIN_ROOT' => 'localhost',
    //
    //    'DB_PATH_DBTABLES' => ['App'],
    //
    //    'DB_BY_SUBDOMAIN' => false,
    //    'DB_BY_SUBDOMAIN_CACHE_CONFIG' => (APP_ENV=='production')?true:false,
    //
    //    'API' => false,
    //    'API_CLASS' => '\App\API\API',
    //    'API_PATH' => 'api',
    //
    //    'APP_LAYOUT' => true,
    //    'APP_WITH_AUTH' => false,

];

if (APP_ENV == 'development') {

    $arrayCfg[] = [
        'DB'          => true,
        'DB_HOST'     => 'localhost',
        'DB_DATABASE' => 'fw_tst',
        'DB_USER'     => 'root',
        'DB_PASSWORD' => ''
    ];

}

$arrayConfig = [];

foreach ($arrayCfg AS $key => $value) {
    $arrayConfig = array_merge($arrayConfig, $value);
}

return $arrayConfig;