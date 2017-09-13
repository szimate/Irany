<?php require_once('../private/initialize.php'); ?>

<?php $page_title = 'Admin'; ?>

<?php include(SHARED_PATH . '/data_header.php'); ?>

<div id="content">
  <div id="main-menu">
    <h1>Main Menu</h1>
    <ul>
      <li><a href="<?php echo url_for('/data_manager/input/search.php'); ?>">Search</a></li>
      <li><a href="<?php echo url_for('data_manager/input/create.php'); ?>">Create new document</a></li>
      <li><a href="<?php echo url_for('personal.php'); ?>">Personal</a></li>
        <li><a href="<?php echo url_for('manage.php'); ?>">Manage users</a></li>
      <li><a href="<?php echo url_for('wellcome.php'); ?>">Logout</a></li>

    </ul>
  </div>

</div>


<?php include(SHARED_PATH . '/data_footer.php'); ?>
