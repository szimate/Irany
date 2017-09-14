<?php require_once('../../../private/initialize.php'); ?>

<?php $page_title = 'Search'; ?>
<?php include(SHARED_PATH . '/data_header.php'); ?>

<div id="content">
  <div id="search">
    <form action="<?php echo url_for('data_manager/output/show.php'); ?>" method="POST">
      Search <input type="text">
      <div id="">
        <input type="submit" name="search" value="Go on!">
      </div>
    </form>
  </div>
</div>

<?php include(SHARED_PATH . '/data_footer.php'); ?>
