<?php require_once('../../../private/initialize.php'); ?>

<?php

$lists_set = find_all_lists();
mysqli_free_result($lists_set);

  $lists = [
    ['id' => '1', 'lsz' => '1', 'lsz2' => '1', 'title' => 'Globe Bank','author' => 'Nagy Nagy', 'year' => '1957'],
    ['id' => '2', 'lsz' => '2', 'lsz2' => '1', 'title' => 'History','author' => 'Kovács Bence', 'year' => '1990'],
    ['id' => '3', 'lsz' => '3', 'lsz2' => '1', 'title' => 'Leadership','author' => 'Bozóki Renáta', 'year' => '1850'],
    ['id' => '4', 'lsz' => '4', 'lsz2' => '1', 'title' => 'Contact Us','author' => 'Nagy Gábor', 'year' => '1950'],
  ];
?>

<?php $page_title = 'Result'; ?>
<?php include(SHARED_PATH . '/data_header.php'); ?>

<div id="content">
  <div class="listing">
    <h1>Result</h1>

  	<table class="list">
  	  <tr>
        <th>ID</th>
        <th>Lsz</th>
        <th>Lsz2</th>
  	    <th>Title</th>
        <th>Author</th>
        <th>Year</th>

  	    <th>&nbsp;</th>
  	    <th>&nbsp;</th>
        <th>&nbsp;</th>
  	  </tr>

      <?php while($lists as $list) { ?>
        <tr>
          <td><?php echo h($list['id']); ?></td>
          <td><?php echo h($list['lsz']); ?></td>
          <td><?php echo h($list['lsz2']); ?></td>
    	    <td><?php echo h($list['title']); ?></td>
          <td><?php echo h($list['author']); ?></td>
          <td><?php echo h($list['year']); ?></td>
        </tr>
      <?php } ?>
  	</table>
<?php
// mysqli_free_result($lists_set);
?>

  </div>

</div>

<?php include(SHARED_PATH . '/data_footer.php'); ?>
