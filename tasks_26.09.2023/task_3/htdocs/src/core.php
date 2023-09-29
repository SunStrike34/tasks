<?php

define('APP_DIR', dirname(__DIR__));

require 'loadConfig.php';

require 'database/database.php';
require 'database/getComments.php';
require 'database/addComment.php';

require 'validateUserRequest.php';
