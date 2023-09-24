<?php
session_start();

ini_set('display_errors', true);
error_reporting(E_ALL);

define('APP_DIR', dirname(__DIR__));

require __DIR__ . '/loadConfig.php';

require __DIR__ . '/includeTemplate.php';
require __DIR__ . '/authorization.php';
require __DIR__ . '/arraySort.php';
require __DIR__ . '/arrayUnity.php';
require __DIR__ . '/cutString.php';
require __DIR__ . '/getCars.php';
require __DIR__ . '/getMenu.php';
require __DIR__ . '/isCurrentUrl.php';
require __DIR__ . '/deleteSection.php';
require __DIR__ . '/validateUserRequest.php';

require __DIR__ . '/account/getDataUser.php';

require __DIR__ . '/createCookies.php';
require __DIR__ . '/resaveCookies.php';

require __DIR__ . '/database/database.php';
require __DIR__ . '/database/findUser.php';
require __DIR__ . '/database/checkUser.php';
require __DIR__ . '/database/findData.php';
require __DIR__ . '/database/findGroups.php';
require __DIR__ . '/database/addUser.php';

if (isset($_GET['logout']) && $_GET['logout'] === 'yes') {
    logout();
}
