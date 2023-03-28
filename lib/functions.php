<?php
//TODO 1: require db.php
require_once(__DIR__ . "/db.php");
//This is going to be a helper for redirecting to our base project path since it's nested in another folder
//This MUST match the folder name exactly
$BASE_PATH = '/project/';

//TODO 4: Flash Message Helpers
require_once(__DIR__ . "/flash_messages.php");

//require safer_echo.php
require_once(__DIR__ . "/safer_echo.php");

//TODO 2: filter helpers
require_once(__DIR__ . "/sanitizers.php");

//TODO 3: User helpers
require_once(__DIR__ . "/user_helpers.php");

//duplicate email/username
require_once(__DIR__ . "/duplicate_user_details.php");
//reset session
require_once(__DIR__ . "/reset_session.php");
?>