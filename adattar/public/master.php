<?php require_once('../private/initialize.php'); ?>

<?php $page_title = 'Admin'; ?>

<?php include(SHARED_PATH . '/data_header.php'); ?>

<div id="content">
  <div id="main-menu">
    <h1>Main Menu</h1>
    <ul>
      <li><a href="<?php echo url_for('/data_manager/input/show.php'); ?>">Search</a></li>
      <li><a href="<?php echo url_for('data_manager/input/create.php'); ?>">Create new document</a></li>

    </ul>
  </div>

</div>


<?php include(SHARED_PATH . '/data_footer.php'); ?>
