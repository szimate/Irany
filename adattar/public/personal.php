<?php require_once('../private/initialize.php'); ?>

<?php $page_title = 'Personal'; ?>

<?php include(SHARED_PATH . '/data_header.php'); ?>


<div id="Plist">
<ul>
  <li> Name </li> <br/>
  <td><?php //echo h($subject['name']); ?>
  <li> Username</li> <br/>
  <td><?php //echo h($subject['user_name']); ?>
  <li> Password <a class="action" href="<?php /*echo url_for('/staff/subjects/edit.php?id=' . h(u($subject['id'])));*/ ?>">Edit</a></li><br/>
  <td><?php //echo h($subject['user_pass']); ?>
  <li> E-mail <a class="action" href="<?php /*echo url_for('/staff/subjects/edit.php?id=' . h(u($subject['id'])));*/ ?>">Edit</a></li><br/>
  <td><?php //echo h($subject['user_email']); ?>
  <li> Status</li> <br/>
  <td><?php //echo h($subject['status']); ?>
</ul>
</div>

  <?php //foreach($subjects as $subject) { ?>
  <?php  ?>

<?php include(SHARED_PATH . '/data_footer.php'); ?>
