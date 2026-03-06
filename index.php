<?php

// Đường dẫn đến folder đồ án
$app_path = dirname(__FILE__);
define('APPPATH', $app_path);

// Đường dẫn đến folder config
$config_path = 'config';
define('CONFIGPATH',APPPATH.DIRECTORY_SEPARATOR.$config_path);

// Đường dẫn đến folder core
$core_path = 'core';
define('COREPATH',APPPATH.DIRECTORY_SEPARATOR.$core_path);

// Đường dẫn đến folder helper
$helper_path = 'helper';
define('HELPERPATH',APPPATH.DIRECTORY_SEPARATOR.$helper_path);

// Đường dẫn đến folder layout
$layout_path = 'layout';
define('LAYOUTPATH',APPPATH.DIRECTORY_SEPARATOR.$layout_path);

// Đường dẫn đến folder libraries
$libraries_path = 'libraries';
define('LIBPATH',APPPATH.DIRECTORY_SEPARATOR.$libraries_path);

// Đường dẫn đến folder module
$module_path = 'module';
define('MODULESPATH',APPPATH.DIRECTORY_SEPARATOR.$module_path);

// REQUIRE CORE FILE
require COREPATH.DIRECTORY_SEPARATOR.'appload.php';

