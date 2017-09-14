<?php require_once('../private/initialize.php'); ?>

<?php $page_title = 'Personal'; ?>

<?php include(SHARED_PATH . '/data_header.php'); ?>


<div id="Plist">
<ul>
  <li> Name </li>
  <input type="text"> <br/>
  <td><?php //echo h($subject['name']); ?><br/>
  <li> Username</li>
  <input type="text"> <br/>
  <td><?php //echo h($subject['user_name']); ?><br/>
  <li> Password <a class="action" href="<?php /*echo url_for('/staff/subjects/edit.php?id=' . h(u($subject['id'])));*/ ?>">Edit</a></li>
  <input type="password"><br/>
  <td><?php //echo h($subject['user_pass']); ?><br/>
  <li> E-mail <a class="action" href="<?php /*echo url_for('/staff/subjects/edit.php?id=' . h(u($subject['id'])));*/ ?>">Edit</a></li>
  <input type="email"><br/>
  <td><?php //echo h($subject['user_email']); ?><br/>
  <li> Status</li>
  <input type="text">
  <td><?php //echo h($subject['status']); ?>
</ul>
</div>

  <?php //foreach($subjects as $subject) { ?>
  <?php  ?>

<?php include(SHARED_PATH . '/data_footer.php'); ?>
