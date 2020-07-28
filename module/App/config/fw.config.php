<?php

$arrayCfg[] = [

    //    'APP_VERSION'     => '1.0.0',
    //    'APP_VERSION_SUB' => 'A',
    //    'APP_NAME'        => 'ERP',
    //    'APP_NICKNAME'    => 'erp',
    //
    //    'APP_MENU_VIEW_FILE' => 'layout/menu',
    //
    //    'SESSION' => true,
    //    'SESSION_MEMCACHE' => true,
    //
    //    'SUBDOMAIN' => true,
    //    'SUBDOMAIN_ROOT' => 'localhost',
    //
    //    'DB'          => true,
    //    #'DB_INIT_TABLES' => false,
    //    'DB_HOST'     => 'localhost',
    //    'DB_DATABASE' => 'erp_app_tdd',
    //    'DB_USER'     => 'root',
    //    'DB_PASSWORD' => '',
    //    #'DB_PATH_DBTABLES' => ['App'],
    //
    //    'DB_BY_SUBDOMAIN' => false,
    //    'DB_BY_SUBDOMAIN_CACHE_CONFIG' => (APP_ENV=='production')?true:false,
    //
    //    'API' => true,
    //    'API_CLASS' => '\App\API\API',
    //    'API_PATH' => 'api',
    //
    //    'APP_LAYOUT' => true,
    //
    //    'APP_WITH_AUTH' => false,
    //
    //    'AWS' => false,
    //    'AWS_ACCESS_KEY' => 'AKIAJKYQWL372MBTFODA',
    //    'AWS_SECRET_KEY' => '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',

];

$arrayConfig = array();

foreach ($arrayCfg AS $key=>$value) {
    $arrayConfig = array_merge($arrayConfig, $value);
}

return $arrayConfig;