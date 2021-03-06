<?php

  // Performs all actions necessary to log in an admin
  function log_in_admin($admin) {
  // Renerating the ID protects the admin from session fixation.
    session_regenerate_id();
    $_SESSION['admin_id'] = $admin['id'];
    $_SESSION['last_login'] = time();
    $_SESSION['username'] = $admin['username'];
    return true;
  }
  // Performs all actions necessary to log in an admin
  function log_in_user($user) {
  // Renerating the ID protects the admin from session fixation.
    session_regenerate_id();
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['last_login'] = time();
    $_SESSION['username'] = $user['username'];
    return true;
  }
function is_log_in_user() {
 return isset($_SESSION['user_id']);
}
function is_log_in() {
  return isset($_SESSION['admin_id']);
}
function log_out_admin() {
  unset($_SESSION['admin_id']);
  unset($_SESSION['last_login']);
  unset($_SESSION['username']);
return true;
}
function log_out_user() {
  unset($_SESSION['user_id']);
  unset($_SESSION['last_login']);
  unset($_SESSION['username']);
return true;
}

function require_login() {
  if(!is_log_in()) {
    redirect_to(url_for('/index.php'));
  } else {
  }
}
function require_login_user() {
  if(!is_log_in_user()) {
    redirect_to(url_for('/index.php'));
  } else {
  }
}
?>
