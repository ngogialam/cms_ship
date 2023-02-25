<?php

/*
 | --------------------------------------------------------------------
 | App Namespace
 | --------------------------------------------------------------------
 |
 | This defines the default Namespace that is used throughout
 | CodeIgniter to refer to the Application directory. Change
 | this constant to change the namespace that all application
 | classes should use.
 |
 | NOTE: changing this will require manually modifying the
 | existing namespaces of App\* namespaced-classes.
 */
defined('APP_NAMESPACE') || define('APP_NAMESPACE', 'App');

/*
 | --------------------------------------------------------------------------
 | Composer Path
 | --------------------------------------------------------------------------
 |
 | The path that Composer's autoload file is expected to live. By default,
 | the vendor folder is in the Root directory, but you can customize that here.
 */
defined('COMPOSER_PATH') || define('COMPOSER_PATH', ROOTPATH . 'vendor/autoload.php');

/*
 |--------------------------------------------------------------------------
 | Timing Constants
 |--------------------------------------------------------------------------
 |
 | Provide simple ways to work with the myriad of PHP functions that
 | require information to be in seconds.
 */
defined('SECOND') || define('SECOND', 1);
defined('MINUTE') || define('MINUTE', 60);
defined('HOUR')   || define('HOUR', 3600);
defined('DAY')    || define('DAY', 86400);
defined('WEEK')   || define('WEEK', 604800);
defined('MONTH')  || define('MONTH', 2592000);
defined('YEAR')   || define('YEAR', 31536000);
defined('DECADE') || define('DECADE', 315360000);

/*
 | --------------------------------------------------------------------------
 | Exit Status Codes
 | --------------------------------------------------------------------------
 |
 | Used to indicate the conditions under which the script is exit()ing.
 | While there is no universal standard for error codes, there are some
 | broad conventions.  Three such conventions are mentioned below, for
 | those who wish to make use of them.  The CodeIgniter defaults were
 | chosen for the least overlap with these conventions, while still
 | leaving room for others to be defined in future versions and user
 | applications.
 |
 | The three main conventions used for determining exit status codes
 | are as follows:
 |
 |    Standard C/C++ Library (stdlibc):
 |       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
 |       (This link also contains other GNU-specific conventions)
 |    BSD sysexits.h:
 |       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
 |    Bash scripting:
 |       http://tldp.org/LDP/abs/html/exitcodes.html
 |
 */
defined('EXIT_SUCCESS')        || define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          || define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         || define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   || define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  || define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') || define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     || define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       || define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      || define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      || define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code

//Define time 
define('TIME_DEVICE', '315360000');
define('TIME_REMEMBER_LOGIN', '604800');
define('TIME_LOGIN', '86400');
define('TIME_ORDER_DRAFT', '72000');
define('PERPAGE', '20');
define('CONFIG_FEE_WITHDRAW', '3300');
define('CUSTOMER_NAME_VA', 'CONG TY CO PHAN CONG NGHE VA DICH VU IMEDIA');
define('MAX_OTP_TO_DAY', '3');
define('FILE_NAME_IMPORT_EXCEL_NEW', 'HLS280721');

//Link API 
// define('URL_API_PUBLIC','http://192.168.100.90:8098/holaship-api-gateway/public/');
// define('URL_API_PRIVATE','http://192.168.100.90:8098/holaship-api-gateway/');
define('URL_API_PUBLIC','https://haloship.imediatech.com.vn/shop/api/public/');
define('URL_API_PRIVATE','https://haloship.imediatech.com.vn/shop/api/');
define('URL_API_UPLOADIMG','https://haloship.imediatech.com.vn/');
define('URL_API_GET','https://haloship.imediatech.com.vn/api/v1');


//Define Google
define('GG_CALLBACK', 'https://haloship.imediatech.com.vn/vi/ggLogin');
define('GG_CLIENT', '232834827067-oq2lj0ovpa2t80b3je992k8cc60elgl4.apps.googleusercontent.com');
define('GG_SECRET', 'H1Ylt38O2XmDSdLlocBNzhiU');
define('GG_API', 'https://www.googleapis.com/oauth2/v1/userinfo');

//Location Address
define('URL_API_LOCATION_ADDRESS', 'http://103.68.241.92:8885/ward');

//Config firebase
define('APIKEY_FIREBASE', 'AIzaSyCNkaG-Is8Lch6CjEGjthxu01tHhUbHnVQ');
define('AUTHDOMAIN_FIREBASE', 'holaphake2.firebaseapp.com');
define('PROJECTID_FIREBASE', 'holaphake2');
define('DATABASE_URL_FIREBASE', 'https://holaphake2-default-rtdb.firebaseio.com');
define('STORAGE_BUCKET_FIREBASE', 'holaphake2.appspot.com');
define('MESSAGING_SENDER_ID_FIREBASE', '709424045843');
define('APP_ID_FIREBASE', '1:709424045843:web:6911e5d49d08aff4a144e6');
define('MEASUREMENT_ID_FIREBASE', 'G-8LP3ZW8N37');
define('VAPID_KEY_FIREBASE', 'BMXRfqY5RrKioAbQd3pT5auQk00b0QU3lU4nm6RpVBPmSs9Ld-YvyEHfGB9xhJCKtloSNpUaMXmrZTrYjOFQHtw');

//Config FB
define('APP_ID_FB', '550705336297556');
define('HOTLINE', '1900 2345 39');

define('ACCOUNT_TEST', '');
define('PACKCODE_TEST', '');

define('DOMAIN_COOKIE', '');

define('CROSS_CHECK','{"1":"Tự đối soát","2":"Đối soát thứ 2,4,6","3":"Đối soát thứ 2,5","4":"Đối soát thứ 4","5":"Đối soát hàng ngày"}');

define('URL_API_HOLA_PRIVATE','https://haloship.imediatech.com.vn/shop/api/');
define('DOMAIN_TOPUP', 'https://testtopup.holaship.vn/');
define('DOMAIN_HOME', 'https://192.168.100.97:8027/vi');
define('DOMAIN_FOOD', 'https://food.holalife.vn/');
define('DOMAIN_LOGIN', 'https://id.holalife.vn/vi');


define('TIME_SHOW_NOTI_CONTRACT', '300');
define('TIME_SHOW_NOTI_CONTRACT_JS', '5');
define('FANPAGE_SHIP', 'https://www.facebook.com/holaship.vn');

//Suggest Location Address
define('URL_API_SUGGEST_LOCATION_ADDRESS', 'https://haloship.imediatech.com.vn:8087/imedia_address_api/api/public/');
define('MIN_COD_PER_VALUE_CHECK', '10');
define('ACCOUNT_UPDATE_CONTRACT', '0900601106');

