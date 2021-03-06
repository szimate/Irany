<?php

//az elemekhez használt függvények
//htmlspecialchars security function
function h($string="") {
  return htmlspecialchars($string);
}
//urlencode security function
function u($string="") {
  return urlencode($string);
}
//rövidebb elérési út
function url_for($script_path) {
  if($script_path[0] != '/') {
    $script_path = "/" . $script_path;
  }
  return WWW_ROOT . $script_path;
}
// security function
function raw_u($string="") {
  return rawurlencode($string);
}
//navigation between pages
function redirect_to($location) {
  header("Location: " . $location);
  exit;
}
function is_post_request() {
  return $_SERVER['REQUEST_METHOD'] == 'POST';
}
function is_get_request() {
  return $_SERVER['REQUEST_METHOD'] == 'GET';
}
//show the errors when you fill the form
function display_errors($errors=array()) {
  $output = '';
  if(!empty($errors)) {
    $output .= "<div class=\"errors\">";
    $output .= "A következő hibák merültek fel:";
    $output .= "<ul>";
    foreach($errors as $error) {
      $output .= "<li>" . h($error) . "</li>";
    }
    $output .= "</ul>";
    $output .= "</div>";
  }
  return $output;
}
function get_and_clear_session_message() {
  if(isset($_SESSION['message']) && $_SESSION['message'] != '') {
    $msg = $_SESSION['message'];
    unset($_SESSION['message']);
    return $msg;
  }
}
// session message kiírása
function display_session_message() {
  $msg = get_and_clear_session_message();
  if(!is_blank($msg)) {
    return '<div id="message">' . h($msg) . '</div>';
  }
}
function current_time() {
  $date = $_SERVER['REQUEST_TIME'];
  return $date('Y-m-d H:i:s', storetime($date));
}

?>
