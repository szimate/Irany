<?php

require_once('../../../private/initialize.php');

require_login();

if(!isset($_GET['id'])) {
  redirect_to(url_for('/data_manager/users/index.php'));
}
$id = $_GET['id'];

if(is_post_request()) {
  $result = delete_user($id);
  $_SESSION['message'] = 'Felhasználó törölve.';
  redirect_to(url_for('/data_manager/users/index.php'));
} else {
  $user = find_user_by_id($id);
}

?>

<?php $page_title = 'Felhsználó törlése'; ?>
<?php include(SHARED_PATH . '/data_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/data_manager/users/index.php'); ?>">&laquo; Vissza a listához</a>

  <div class="admin delete">
    <h1>Felhasználó törlése</h1>
    <p>Biztos szeretnéd törölni a felhasználót?</p>
    <p class="item"><?php echo h($user['username']); ?></p>

    <form action="<?php echo url_for('/data_manager/users/delete.php?id=' . h(u($user['id']))); ?>" method="post">
      <div id="operations">
        <input type="submit" class="nyomogomb" value="Felhasználó törlése" />
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/data_footer.php'); ?>
