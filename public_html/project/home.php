<?php
require_once(__DIR__."/../../partials/nav.php");
?>
<h1>Home</h1>
<?php
if (is_logged_in()){
  echo "Welcome, " . get_username(); 
}
else{
  echo "You're not logged in";
}
?>
<?php
require_once(__DIR__ . "/../../partials/flash.php");
?>