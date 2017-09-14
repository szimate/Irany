<?php require_once('../../../private/initialize.php'); ?>

<?php
  $list = [
    ['id' => '1', 'position' => '1', 'visible' => '1', 'menu_name' => 'Globe Bank'],
    ['id' => '2', 'position' => '2', 'visible' => '1', 'menu_name' => 'History'],
    ['id' => '3', 'position' => '3', 'visible' => '1', 'menu_name' => 'Leadership'],
    ['id' => '4', 'position' => '4', 'visible' => '1', 'menu_name' => 'Contact Us'],
  ];
?>

<?php $page_title = 'List'; ?>
<?php include(SHARED_PATH . '/data_header.php'); ?>

<div id="content">
  <div class="listing">
    <h1>List</h1>

  	<table class="list">
  	  <tr>
        <th>ID</th>
        <th>Position</th>
        <th>Visible</th>
  	    <th>Name</th>
  	    <th>&nbsp;</th>
  	    <th>&nbsp;</th>
        <th>&nbsp;</th>
  	  </tr>

      <?php foreach($list as $lists) { ?>
        <tr>
          <td><?php echo h($list['id']); ?></td>
          <td><?php echo h($list['position']); ?></td>
          <td><?php echo $list['visible'] == 1 ? 'true' : 'false'; ?></td>
    	    <td><?php echo h($list['menu_name']); ?></td>
        </tr>
      <?php } ?>
  	</table>

  </div>

</div>

<?php include(SHARED_PATH . '/data_footer.php'); ?>
