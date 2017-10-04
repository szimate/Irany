<?php

require_once('../../../private/initialize.php');

require_login();

if(!isset($_GET['id'])) {
  redirect_to(url_for('/data_manager/admins/index.php'));
}
$id = $_GET['id'];

if(is_post_request()) {
  $result = delete_admin($id);
  $_SESSION['message'] = 'Admin törölve.';
  redirect_to(url_for('/data_manager/admins/index.php'));
} else {
  $admin = find_admin_by_id($id);
}
?>

<?php $page_title = 'Admin törlése'; ?>
<?php include(SHARED_PATH . '/data_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/data_manager/admins/index.php'); ?>">&laquo; Vissza a listához</a>

  <div class="admin delete">
    <h1>Admin törlése</h1>
    <p>Biztosan törölni szeretnéd az admint?</p>
    <p class="item"><?php echo h($admin['username']); ?></p>

    <form action="<?php echo url_for('/data_manager/admins/delete.php?id=' . h(u($admin['id']))); ?>" method="post">
      <div id="operations">
        <input type="submit" class="nyomogomb" value="Admin törlése" />
      </div>
    </form>
  </div>
</div>

<?php include(SHARED_PATH . '/data_footer.php'); ?>
