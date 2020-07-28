<?php
/**
 * If you need an environment-specific system or application configuration,
 * there is an example in the documentation
 * @see http://framework.zend.com/manual/current/en/tutorials/config.advanced.html#environment-specific-system-configuration
 * @see http://framework.zend.com/manual/current/en/tutorials/config.advanced.html#environment-specific-application-configuration
 */

defined('ROOT_PATH') || define('ROOT_PATH', realpath(dirname(__FILE__) . '/../'));

if (!defined('APP_ENV')) {

    if (isset($_SERVER['APP_ENV'])) {

        if ($_SERVER['APP_ENV'] == 'development') {
            define('APP_ENV', 'development');
        } elseif ($_SERVER['APP_ENV'] == 'staging') {
            define('APP_ENV', 'staging');
        } else {
            define('APP_ENV', 'production');
        }

    } else {
        die('a variavel APP_ENV deve ser definida de acordo com o ambiente');
    }

}

if (APP_ENV === 'development') {
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
}

$env = APP_ENV ?: 'production';

if (APP_ENV == 'production') {

    $dir = 'data/cache_map/';

    if (file_exists($dir) == false) {
        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        }
    }
}

return [
    // Retrieve list of modules used in this application.
    'modules'                 => require __DIR__ . '/modules.config.php',

    // These are various options for the listeners attached to the ModuleManager
    'module_listener_options' => [

        // This should be an array of paths in which modules reside.
        // If a string key is provided, the listener will consider that a module
        // namespace, the value of that key the specific path to that module's
        // Module class.
        'module_paths'             => [
            __DIR__ . '/../module',
            __DIR__ . '/../vendor',
            #'./module',
            #'./vendor',
        ],

        // An array of paths from which to glob configuration files after
        // modules are loaded. These effectively override configuration
        // provided by modules themselves. Paths may use GLOB_BRACE notation.
        'config_glob_paths'        => [
            realpath(__DIR__) . '/autoload/{{,*.}global,{,*.}local}.php',
        ],

        // Whether or not to enable a configuration cache.
        // If enabled, the merged configuration will be cached and used in
        // subsequent requests.
        'config_cache_enabled'     => ($env == 'production'),

        // The key used to create the configuration cache file name.
        'config_cache_key'         => 'application.config.cache',

        // Whether or not to enable a module class map cache.
        // If enabled, creates a module class map cache which will be used
        // by in future requests, to reduce the autoloading process.
        'module_map_cache_enabled' => ($env == 'production'),

        // The key used to create the class map cache file name.
        'module_map_cache_key'     => 'application.module.cache',

        // The path in which to cache merged configuration.
        'cache_dir'                => 'data/cache_map/',

        // Whether or not to enable modules dependency checking.
        // Enabled by default, prevents usage of modules that depend on other modules
        // that weren't loaded.
        // 'check_dependencies' => true,

    ],

    // Used to create an own service manager. May contain one or more child arrays.
    //'service_listener_options' => [
    //     [
    //         'service_manager' => $stringServiceManagerName,
    //         'config_key'      => $stringConfigKey,
    //         'interface'       => $stringOptionalInterface,
    //         'method'          => $stringRequiredMethodName,
    //     ],
    // ],

    // Initial configuration with which to seed the ServiceManager.
    // Should be compatible with Laminas\ServiceManager\Config.
    // 'service_manager' => [],
];
